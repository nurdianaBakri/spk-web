<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dojang extends CI_Model 
{ 
	public function getDojang() 
	{
      $dataBalikan = array(
        'kosong' => true,
        'data' => '',
      );

      $data = $this->db->get('dojang');
      if ($data->num_rows()>0)
      {
        foreach ($data->result_array() as $data2) {
           $data_dojang[] = array(
            'id_dojang' => $data2['id_dojang'], 
            'nama' => $data2['nama'], 
            'alamat' => $data2['alamat'], 
            'selected' => false, 
          );
        }

         $dataBalikan = array(
            'kosong' => false,
            'data' => $data_dojang,
          );
      }
      return $dataBalikan;
    }

    public function detailDojang($id_anggota)
    {
       $this->db->where('id_anggota', $id_anggota);
       $data = $this->db->get('anggota')->row_array();

       $this->db->where('id_dojang', $data['id_dojang']);
       $dojang = $this->db->get('dojang')->row_array();

       $data_balikan = array(
        'nama' => $data['nama'], 
        'alamat' => $data['alamat'], 
        'id_dojang' => $data['id_dojang'], 
        'nama_dojang' => $dojang['nama'], 
      );
       return $data_balikan;
    }

}