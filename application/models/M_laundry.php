<?php
    class M_laundry extends CI_Model{

        function get_total_dt(){
            $query = $this->db->query("SELECT COUNT(*) as allcount FROM laundry_transaksi");
            return $query->result();
        }

        function get_total_fl($searchQuery){
            $query = $this->db->query("SELECT COUNT(*) as allcount FROM laundry_transaksi WHERE 1=1 ".$searchQuery);
            return $query->result();
        }

        function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
            $query = $this->db->query("SELECT * FROM laundry_transaksi WHERE 1=1 ".$searchQuery." 
                order by ".$columnName." ".$columnSortOrder." LIMIT ".$baris.", ".$rowperpage );
            return $query->result();
        }

        function get_rincian_barang($id){
            $query = $this->db->query("SELECT 
            nm_pakaian, 
            laundry_kategori.kategori as kategori, 
            foto_pakaian 
            FROM laundry_tmp 
            LEFT JOIN laundry_pakaian ON laundry_tmp.kd_pakaian = laundry_pakaian.kd_pakaian  
            LEFT JOIN laundry_kategori ON laundry_pakaian.kategori = laundry_kategori.id
            WHERE laundry_tmp.kode_user = '$id' ORDER BY laundry_tmp.id ASC");
            return $query->result();
        }

        function get_rincian_transaksi($id){
            $query = $this->db->query("SELECT * FROM laundry_transaksi WHERE kd_transaksi = '$id'");
            return $query->result();
        }
        
        function get_detail_rincian_transaksi($id){
            $query = $this->db->query("SELECT 
            kd_transaksi, 
            nm_pakaian, 
            laundry_kategori.kategori as kategori, 
            foto_pakaian 
            FROM laundry_transaksi_detail
            LEFT JOIN laundry_pakaian ON laundry_transaksi_detail.kd_pakaian = laundry_pakaian.kd_pakaian 
            LEFT JOIN laundry_kategori ON laundry_pakaian.kategori = laundry_kategori.id
            WHERE laundry_transaksi_detail.kd_transaksi = '$id'");
            return $query->result();
        }

        function cek_kode($id){
            $query = $this->db->query("SELECT * FROM laundry_tmp WHERE kode_user = '$id'");
            return $query->result();
        }

        function get_data_kategori($id, $kode_user){
            $query = $this->db->query("SELECT kd_pakaian, nm_pakaian, foto_pakaian FROM laundry_pakaian WHERE kategori = '$id' AND kode_user = '$kode_user'");
            return $query->result();
        }

        function get_kode_transaksi(){
            $query = $this->db->query("SELECT MAX(kd_transaksi) as maxkode FROM laundry_transaksi");
            return $query->result();
        }

        function insert_tmp_barang($data){
            $this->db->insert('laundry_tmp', $data);
        }

        function insert_dt_transaksi($data){
            $this->db->insert('laundry_transaksi', $data);
        }

        function insert_laundry_detail($data){
            $this->db->insert('laundry_transaksi_detail', $data);
        }

        function update_transaksi($id, $data){
            $this->db->where('kd_transaksi', $id);
            $this->db->update('laundry_transaksi', $data);
        }

        function update_last_laundry($id, $data){
            $this->db->where('kd_pakaian', $id);
            $this->db->update('laundry_pakaian', $data);
        }

        function delete_all_tmp($id){
            $this->db->where('kd_tmp_transaksi', $id);
            $this->db->delete('laundry_tmp');
        }

        function get_kategori(){
            $query = $this->db->query("SELECT * FROM laundry_kategori ORDER BY id asc");
            return $query->result();
        }
    }
?>