<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_DestinasiWisata extends CI_Model 
{ 
	public function getDestinasiWisata() 
	{
      $arrayName = array(
        'kosong' => true,
        'data' => '',
      );

      $data = $this->db->get('destinasi_wisata');
      if ($data->num_rows()>0)
      {
        $data_wisata = array();
        foreach ($data->result_array() as $key) 
        {
            $data_wisata[] = array(
                'nama_wisata' => $key['nama_wisata'], 
                'id_wisata' => $key['id_wisata'], 
                'alamat' => $key['alamat'],
                'jenis_wisata' => $key['jenis_wisata'],
                'lng' => $key['lng'],
                'lat' => $key['lat'],
                'biaya' => $key['biaya'],
                'fasilitas' => $key['fasilitas'],
                'gambar' => base_url()."/gambar/".$key['gambar'],
                'keterangan' => $key['keterangan'],
            );
        }

         $arrayName = array(
            'kosong' => false,
            'data' => $data_wisata,
          );
      }
      return $arrayName;
    }

    public function detailDestinasiWisata($id_wisata)
    {
       $this->db->where('id_wisata', $id_wisata);
       $data = $this->db->get('destinasi_wisata')->row_array();

       $this->db->where('id_dojang', $data['id_dojang']);
       $dojang = $this->db->get('dojang')->row_array();

       $foto_ada = true;

       if ($data['foto']==""){
         $foto_ada = false;
       }
       else
       {
        $foto_ada=true;
       }

       $data_balikan = array(
        'nama' => $data['nama'], 
        'id_wisata' => $id_wisata, 
        'alamat' => $data['alamat'], 
        'no_hp' => $data['no_hp']+0, 
        'tingkat_lama' => $data['tingkat_lama'], 
        'tingkat_baru' => $data['tingkat_baru'], 
        'tempat_lahir' => $data['tempat_lahir'], 
        'foto' => $data['foto'],
        'foto_ada' => $foto_ada,
        'qr_code' => $data['qr_code'], 
        'tanggal_lahir' => $data['tanggal_lahir'], 
        'id_dojang' => $data['id_dojang'], 
        'nama_dojang' => $dojang['nama'], 
      );
       return $data_balikan;
    }

    public function getProfile($id_user, $level)
    {
      $data="";
      if ($level=="pengurus")
      {
        $this->db->where('id_admin',$id_user);
        $data =$this->db->get('admin')->row_array();
      }
      else
      {
        $this->db->where('id_wisata',$id_user);
        $data =$this->db->get('destinasi_wisata')->row_array();

        $this->db->where('id_dojang',$data['id_dojang']);
        $data2 =$this->db->get('dojang')->row_array();

        $data = array(
          'id_user' => $data['id_wisata'], 
          'nama' => $data['nama'], 
          'alamat' => $data['alamat'], 
          'id_dojang' => $data['id_dojang'], 
          'nama_dojang' => $data2['nama'], 
          'qr_code' => $data['qr_code'], 
        );
      }
      return $data;
    }

    public function hapus($id_wisata)
    {
      $this->db->where('id_wisata',$id_wisata);
      $data =$this->db->delete('wisata');
      return $data;
    }

    public function update($id_wisata, $data)
    {
       $this->db->where('id_wisata',$id_wisata);
      $hasil =  $this->db->update('wisata',$data);
      return $hasil;
    }

}