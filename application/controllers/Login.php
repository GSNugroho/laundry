<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }

	public function index(){
        if($this->session->userdata('login') == FALSE){
            $this->load->view('login/login');
        }else{
            redirect(site_url('Laundry/transaksi'));
        }
    }

    public function pagenotfound(){
        $this->load->view('404');
    }
    
    public function auth(){
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));

        $data = $this->M_login->cek_login($username, $password);

        if($data != null){
            foreach($data as $row){
                $this->session->set_userdata('login', TRUE);
                $this->session->set_userdata('kode_user',$row->kode_user);
                $this->session->set_userdata('username',$row->username);
            }
            redirect(site_url('Laundry/transaksi'));
        }else{
            redirect(site_url('Login'));
        }
    }

    public function destroy(){
        $this->session->sess_destroy();
        redirect(site_url('Laundry'));
    }

    public function create_account(){
        $this->load->view('login/login_account');
    }

    public function create_account_action(){
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));

        $data = array(
            'kode_user' => $this->get_kode_user(),
            'username' => $username,
            'password' => $password,
            'dt_create' => date('Y-m-d')
        );

        $this->M_login->insert_account_new($data);
        redirect('Login');
    }
    
    function get_kode_user(){
        $kode = $this->M_login->get_kode_user();

        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodepa = $data;
        $noUrut = (int) substr($kodepa, 3, 6);
        $noUrut++;
        $char = "Usr";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
    }
}

?>