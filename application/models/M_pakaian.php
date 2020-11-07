<?php
    class M_pakaian extends CI_Model{

        function get_total_dt(){
            $query = $this->db->query("SELECT COUNT(*) as allcount FROM laundry_pakaian LEFT JOIN laundry_kategori ON laundry_pakaian.kategori = laundry_kategori.id");
            return $query->result();
        }

        function get_total_fl($searchQuery){
            $query = $this->db->query("SELECT COUNT(*) as allcount FROM laundry_pakaian LEFT JOIN laundry_kategori ON laundry_pakaian.kategori = laundry_kategori.id WHERE 1=1 ".$searchQuery);
            return $query->result();
        }

        function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
            $query = $this->db->query("SELECT 
            kd_pakaian,
            nm_pakaian,
            laundry_kategori.kategori as kategori,
            dt_last_trans,
            foto_pakaian FROM laundry_pakaian LEFT JOIN laundry_kategori ON laundry_pakaian.kategori = laundry_kategori.id WHERE 1=1 ".$searchQuery." 
                order by ".$columnName." ".$columnSortOrder." LIMIT ".$baris.", ".$rowperpage );
            return $query->result();
        }

        function get_kode_pakaian(){
            $query = $this->db->query("SELECT MAX(kd_pakaian) as maxkode FROM laundry_pakaian");
            return $query->result();
        }

        function insert_pakaian($data){
            $this->db->insert('laundry_pakaian', $data);
        }

        function get_rincian_pakaian($id){
            $query = $this->db->query("SELECT kd_pakaian,
            nm_pakaian,
            laundry_kategori.kategori as kategori,
            dt_last_trans,
            foto_pakaian,
            keterangan,
            kode_user
            FROM laundry_pakaian LEFT JOIN laundry_kategori ON laundry_pakaian.kategori = laundry_kategori.id WHERE kd_pakaian = '$id'");
            return $query->result();
        }

        function get_kategori(){
            $query = $this->db->query("SELECT * FROM laundry_kategori ORDER BY id asc");
            return $query->result();
        }
    }
?>