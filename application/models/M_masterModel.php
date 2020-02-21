<?php

class M_masterModel extends CI_Model{
     
    public function getAll($table)
    {  
        $query = $this->db->get($table);
        return $query->result();
    }

    public function insert($table, $data)
    {     
        $proses = $this->db->insert($table, $data);
        return $proses;
    }

    public function update($where, $table, $data) 
    { 
        $this->db->where($where);
        return $this->db->update($table,$data);
    }

    public function detail($where, $table)
    {
        return $this->db->get_where($table, $where)->row();
    } 

    public function delete($where, $table)
    {
        return $this->db->delete($table, $where);
    }

    public function insert_log($data)
    {
        $data_input  = array(
            'new_value'=>json_encode($data),
            'old_value'=>'',
            'log_tipe'=>3,
            'log_user'=>1,
        );
        $proses = $this->db->insert("tabel_log", $data_input);
        return $proses;
    } 


    public function template_pesan_sukses($keterangan)
    {
        return "Proses tambah data ".$keterangan." berhasil";
    }

    public function template_pesan_gagal($keterangan)
    {
        return "Proses tambah data ".$keterangan." Gagal, silahkan coba lagi";
    }
}
?>