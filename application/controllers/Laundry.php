<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laundry extends CI_Controller {

    public function __construct(){
            parent::__construct();
            $this->load->model('M_laundry');
    }

	public function index()
	{
		$this->load->view('laundry/laundry');
    }

    public function transaksi(){
        if((!empty($_SESSION['login'])) && (!empty($_SESSION['kode_user'])) && (!empty($_SESSION['username']))){
            $this->load->view('laundry/laundry_transaksi');
        }else{
            echo redirect('Laundry');
        }
    }

    public function create_transaksi(){
        if((!empty($_SESSION['login'])) && (!empty($_SESSION['kode_user'])) && (!empty($_SESSION['username']))){
            $data = array(
                'dd_kategori' => $this->M_laundry->get_kategori()
            );
            $this->load->view('laundry/laundry_input', $data);
        }else{
            echo redirect('Laundry');
        }
    }
    
    function create_transaksi_action(){
        $data = array(
            'tgl_transaksi' => date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE))),
            'laundry' => $this->input->post('nm_laundry', TRUE),
            'almt_laundry' => $this->input->post('almt_laundry', TRUE),
            'pic' => $this->input->post('pic', TRUE),
            'kode_user' => $this->input->post('kode_user', TRUE)
        );

        $cek_trans = $this->M_laundry->cek_kode($this->input->post('kode_user', TRUE));

        foreach($cek_trans as $row){
            $kode_transaksi = $row->kd_tmp_transaksi;
            $detail = array(
                'kd_transaksi' => $row->kd_tmp_transaksi,
                'kd_pakaian' => $row->kd_pakaian
            );

            $last = array(
                'dt_last_trans' => date('Y-m-d')
            );

            $this->M_laundry->insert_laundry_detail($detail);
            $this->M_laundry->update_last_laundry($row->kd_pakaian, $last);
        }

        $this->M_laundry->update_transaksi($kode_transaksi, $data);
        $this->M_laundry->delete_all_tmp($kode_transaksi);

        redirect('Laundry/transaksi');
    }

    function tambah_barang(){
        $pakaian = $this->input->post('pakaian', TRUE);
        $kode_user = $this->input->post('kode', TRUE);

        $cek = $this->M_laundry->cek_kode($kode_user);

        foreach($cek as $row){
            $kode_tmp = $row->kd_tmp_transaksi;
        }

        if($kode_tmp == ''){
            $kode_tmp = $this->get_kode_transaksi();
            
            $data_trans = array(
                'kd_transaksi' => $kode_tmp
            );
            $this->M_laundry->insert_dt_transaksi($data_trans);
        }

        $data_tmp = array(
            'kd_tmp_transaksi' => $kode_tmp,
            'kd_pakaian' => $pakaian,
            'kode_user' => $kode_user
        );


        $this->M_laundry->insert_tmp_barang($data_tmp);
        
    }

    function read_transaksi($id){
        $data = array(
            'rincian' => $this->M_laundry->get_rincian_transaksi($id),
            'detail_rincian' => $this->M_laundry->get_detail_rincian_transaksi($id)
        );

        $this->load->view('laundry/laundry_detail', $data);
    }

    function dt_tbl_trans(){
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
            nm_jns like '%".$searchValue."%'  ) ";
        }

        ## Total number of records without filtering
        $sel = $this->M_laundry->get_total_dt();
        // $records = sqlsrv_fetch_array($sel);
        foreach($sel as $row){
            $totalRecords = $row->allcount;
        }
        

        ## Total number of record with filtering
        $sel = $this->M_laundry->get_total_fl($searchQuery);
        // $records = sqlsrv_fetch_array($sel);
        foreach($sel as $row){
            $totalRecordwithFilter = $row->allcount;
        }
        

        ## Fetch records
        $empQuery = $this->M_laundry->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
        $empRecords = $empQuery;
        $data = array();

        foreach($empRecords as $row){
        // while( $row = sqlsrv_fetch_array( $empQuery, SQLSRV_FETCH_ASSOC) ) {
            $rinci = '
            <a class="waves-effect waves-light btn-flat" href="'.base_url("Laundry/read_transaksi/").$row->kd_transaksi.'"><i class="material-icons center">info_outline</i></a>
            ';
        $data[] = array( 
            "tgl_transaksi"=>$row->tgl_transaksi,
            "laundry"=>$row->laundry,
            "almt_laundry"=>$row->almt_laundry,
            "pic"=>$row->pic,
            "rinci"=>$rinci
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

    function get_rincian_barang(){
        $id = $this->input->get('kode_user', TRUE);
        $data = array(
            'table' => $this->M_laundry->get_rincian_barang($id)
        );

        echo json_encode($data);
    }

    function get_data_kategori(){
        $id = $this->input->get('id', TRUE);
        $kode_user = $this->input->get('kode_user', TRUE);

        $data = array(
            'baju' => $this->M_laundry->get_data_kategori($id, $kode_user)
        );

        echo json_encode($data);
    }

    function get_kode_transaksi(){
        $kode = $this->M_laundry->get_kode_transaksi();

        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodepa = $data;
        $noUrut = (int) substr($kodepa, 3, 6);
        $noUrut++;
        $char = "TRS";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
    }

    function laundry_detail_download($id){
        $data = array(
            'rincian' => $this->M_laundry->get_rincian_transaksi($id),
            'detail_rincian' => $this->M_laundry->get_detail_rincian_transaksi($id)
        );

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('laundry/laundry_detail_download', $data, true);
        $stylesheet = file_get_contents('assets/css/mpdfstyletables.css');

        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->AddPage('P');
        $mpdf->WriteHtml($html);
        $mpdf->Output();
    }
}

?>