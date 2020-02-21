<?php 
    class User_Model extends CI_Model
    {
        // membuat format id anggota
        function buat_id(){
            $this->db->select('RIGHT(anggota.id_anggota,1) as kode', FALSE);
            $this->db->order_by('id_anggota','DESC');    
            $this->db->limit(1);    
            $query = $this->db->get('anggota');      //cek dulu apakah ada sudah ada kode di tabel.    
            if($query->num_rows() <> 0){      
                //jika kode ternyata sudah ada.      
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {      
                //jika kode belum ada      
                $kode = 1;    
            }
            $kodemax = str_pad($kode, 1, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
            $kodejadi = "ANG".$kodemax;    // hasilnya ODJ-9921-0001 dst.
            return $kodejadi;  
        }

        function getDojang(){
            return $this->db->get('dojang')->result();
        }

        public function getAnggota($limit, $start){
            $query = $this->db->get('anggota', $limit, $start);
            return $query;
        }

        // load data untuk pagination
        public function getDataDojang($limit, $start){
            $query = $this->db->get('dojang', $limit, $start);
            return $query;
        }        

        function getPelatih(){
            return $this->db->get('pelatih')->result();
        }
        
        // load data untuk pagination
        public function getDataPelatih($limit, $start){
            $query = $this->db->get('pelatih', $limit, $start);
            return $query;
        }

        public function getJadwal($limit, $start){
            $query = $this->db->get('jadwal', $limit, $start);
            return $query;
        }

        function getEvent(){
            return $this->db->get('event')->result();
        }

        function insertanggota($data_insert){
            //query to insert into tabel anggota
            $this->db->insert('anggota', $data_insert);
        }
    }
?>