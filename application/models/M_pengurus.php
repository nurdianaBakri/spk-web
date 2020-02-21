<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengurus extends CI_Model 
{ 
	public function getPengurus() 
	{
      $dataBalikan = array(
        'kosong' => true,
        'data' => '',
      );

      $data = $this->db->get('admin');
      if ($data->num_rows()>0)
      {

        $data_pengurus = array();
        foreach ($data->result_array() as $key) 
        {
            $data_pengurus[] = array(
                'nama' => $key['nama'], 
                'alamat' => $key['alamat'],
                'username' => $key['username'], 
                'id_admin' => $key['id_admin'], 
            );
        }

         $dataBalikan = array(
            'kosong' => false,
            'data' => $data_pengurus,
          );
      }
      return $dataBalikan;
    }

    public function detailPengurus($id_pengurus)
    {
      $this->db->where('id_admin', $id_pelatih);
       $data = $this->db->get('pelatih')->row_array();

       $this->db->where('id_dojang', $data['id_dojang']);
       $dojang = $this->db->get('dojang')->row_array()['nama'];

       $data_balikan = array(
          'nama' => $data['nama'], 
          'id_pelatih' => $data['id_pelatih'], 
          'waktu_latihan' => $data['waktu_latihan'], 
          'tempat_latihan' => $data['tempat_latihan'], 
          'alamat' => $data['alamat'],
          'id_dojang' => $data['id_dojang'], 
          'nama_dojang' => $dojang, 
      );
       return $data_balikan;
    }

}