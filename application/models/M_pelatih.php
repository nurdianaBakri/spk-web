<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelatih extends CI_Model 
{ 
	public function getPelatih() 
	{
      $dataBalikan = array(
        'kosong' => true,
        'data' => '',
      );

      $data = $this->db->get('pelatih');
      if ($data->num_rows()>0)
      {

        $data_pelatih = array();
        foreach ($data->result_array() as $key) 
        {
            $this->db->where('id_dojang', $key['id_dojang']);
            $nama_dojang = $this->db->get('dojang')->row_array()['nama'];

            $this->db->where('id_dojang', $key['id_dojang']);
            $data_jadwal = $this->db->get('jadwal')->result_array();

            //jabatan
            // $jabatan="";
            // if ($key['pelatih']==true)
            // {
            //   $jabatan = "Pelatih";
            // }
            // else
            // {
            //   $jabatan = "Asisten Pelatih";
            // }

            if ($key['pelatih']==true)
            {
               $data_pelatih[] = array(
                  'nama' => $key['nama'], 
                  'id_pelatih' => $key['id_pelatih'], 
                  'alamat' => $key['alamat'], 
                  'data_jadwal' => $data_jadwal, 
                  // 'jabatan' => $jabatan, 
                  'id_dojang' => $key['id_dojang'], 
                  'nama_dojang' => $nama_dojang, 
              );
            }

             
        }

         $dataBalikan = array(
            'kosong' => false,
            'data' => $data_pelatih,
          );
      }
      return $dataBalikan;
    }

    public function detailPelatih($id_pelatih)
    {
      $this->db->where('id_pelatih', $id_pelatih);
       $data = $this->db->get('pelatih')->row_array();

       $this->db->where('id_dojang', $data['id_dojang']);
       $dojang = $this->db->get('dojang')->row_array();

        $this->db->where('id_dojang', $data['id_dojang']);
        $data_jadwal = $this->db->get('jadwal')->result_array();

        //jabatan
        $jabatan="";
        if ($data['pelatih']==true)
        {
          $jabatan = "Pelatih";
        }
        else
        {
          $jabatan = "Asisten Pelatih";
        }

       $data_balikan = array(
          'nama' => $data['nama'], 
          'id_pelatih' => $data['id_pelatih'], 
          'id_dojang' => $data['id_dojang'], 
          'alamat' => $data['alamat'], 
          'data_jadwal' => $data_jadwal, 
          'jabatan' => $jabatan, 
          'nama_dojang' => $dojang['nama'], 
          'alamat_dojang' => $dojang['alamat'], 
      );
       return $data_balikan;
    }

    public function getPelatihByDojang($id_dojang)
    {
      $this->db->where('id_dojang', $id_dojang);
      $this->db->where('pelatih', true);
      $data = $this->db->get('pelatih')->row();

      return $data;
    }

}