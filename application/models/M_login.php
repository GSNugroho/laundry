<?php
    class M_login extends CI_Model{

        function get_kode_user(){
            $query = $this->db->query("SELECT MAX(kode_user) as maxkode FROM laundry_login");
            return $query->result();
        }

        function insert_account_new($data){
            $this->db->insert('laundry_login', $data);
        }

        function cek_login($username, $password){
            $query = $this->db->query("SELECT kode_user, username, password FROM laundry_login WHERE username = '$username' AND password = '$password'");
            return $query->result();
        }
    }
?>