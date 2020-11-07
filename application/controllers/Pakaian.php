<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakaian extends CI_Controller {

    public function __construct(){
            parent::__construct();
            $this->load->model('M_pakaian');
    }

	public function index()
	{
        if((!empty($_SESSION['login'])) && (!empty($_SESSION['kode_user'])) && (!empty($_SESSION['username']))){
            $this->load->view('pakaian/pakaian');
        }else{
            echo redirect('Laundry');
        }
    }

    public function read($id){
        $data = array(
            'rincian_pakaian' => $this->M_pakaian->get_rincian_pakaian($id)
        );

        $this->load->view('pakaian/pakaian_detail', $data);
    }

    public function create_pakaian(){
        if((!empty($_SESSION['login'])) && (!empty($_SESSION['kode_user'])) && (!empty($_SESSION['username']))){
            $data = array(
                'dd_kategori' => $this->M_pakaian->get_kategori()
            );
            $this->load->view('pakaian/pakaian_input', $data);
        }else{
            echo redirect('Laundry');
        }
    }

    function create_pakaian_action(){
        $data = array(
            'kd_pakaian' => $this->get_kode_pakaian(),
            'nm_pakaian' => $this->input->post('nm_pakaian', TRUE),
            'kategori' => $this->input->post('jns_pakaian', TRUE),
            'foto_pakaian' => $this->input->post('nama_foto', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
            'dt_create' => date('Y-m-d'),
            'kode_user' => $this->input->post('kode_user', TRUE)
        );

        $this->do_upload();
        $this->M_pakaian->insert_pakaian($data);
        redirect('Pakaian');
    }

    public function do_upload(){
        

    $config['upload_path'] = 'upload/';
    $config['allowed_types'] = 'jpg|jpeg|gif|png';
    $config['max_size'] = '6048';
    $this->load->library('upload', $config);

    $userfile = "foto_pakaian";
            //check if a file is being uploaded
            if(strlen($_FILES["foto_pakaian"]["name"])>0){

                if ( !$this->upload->do_upload($userfile))//Check if upload is unsuccessful
                {
                    $upload_errors = $this->upload->display_errors('', '');
                    $this->session->set_flashdata('errors', 'Error: '.$upload_errors);   
                    redirect('Pakaian');  
                }
                else
                {
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    $config2['new_image'] = 'upload/';
                    $config2['maintain_ratio'] = FALSE;
                    $config2['width'] = 400;
                    $config2['height'] = 400;
                    $config['overwrite'] = TRUE;
                    $this->load->library('image_lib',$config2); 

                    if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
               }      
           }  
    }

   

    function get_kode_pakaian(){
        $kode = $this->M_pakaian->get_kode_pakaian();

        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodepa = $data;
        $noUrut = (int) substr($kodepa, 3, 6);
        $noUrut++;
        $char = "Pak";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
    }

    function dt_tbl_pakaian(){
        ## Read value
        $draw = $_POST['draw'];
        $baris = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value

        ## Search 
        $searchQuery = " ";
         
        if($searchValue != ''){
        $searchQuery .= " and (
            nm_pakaian like '%".$searchValue."%'  ) ";
        }

        ## Total number of records without filtering
        $sel = $this->M_pakaian->get_total_dt();
        // $records = sqlsrv_fetch_array($sel);
        foreach($sel as $row){
            $totalRecords = $row->allcount;
        }
        

        ## Total number of record with filtering
        $sel = $this->M_pakaian->get_total_fl($searchQuery);
        // $records = sqlsrv_fetch_array($sel);
        foreach($sel as $row){
            $totalRecordwithFilter = $row->allcount;
        }
        

        ## Fetch records
        $empQuery = $this->M_pakaian->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
        $empRecords = $empQuery;
        $data = array();

        foreach($empRecords as $row){
            $foto_pakaian = '<a target="_blank" href="'.sprintf("upload/%s", $row->foto_pakaian).'">
            <img src="'.sprintf("upload/%s", $row->foto_pakaian).'" alt="'.$row->foto_pakaian.'" width="100" height="100">
            </a>';

            $aksi = '<a href="Pakaian/read/'.$row->kd_pakaian.'">
            <i class="material-icons center">info_outline</i>
            </a>
            ';
        $data[] = array( 
            "nm_pakaian"=>$row->nm_pakaian,
            "kategori"=>$row->kategori,
            "dt_last_trans"=>$row->dt_last_trans,
            "foto_pakaian"=>$foto_pakaian,
            "aksi"=>$aksi
        );
        }

        ## Response
        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
        );

        echo json_encode($response);
    }
}
?>