<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_event extends CI_Model 
{ 
	public function getEvent($jenis_event) 
	{
      $dataBalikan = array(
        'kosong' => true,
        'data' => '',
      );


      $this->db->order_by('id_event','DESC');
      $this->db->where('jenis_event',$jenis_event);
      $data = $this->db->get('event');
      if ($data->num_rows()>0)
      {

        $data_pengurus = array();
        foreach ($data->result_array() as $key) 
        {
            $tanggal_mulai = date('d M Y', strtotime($key['tanggal_mulai']));
            $tanggal_akhir = date('d M Y', strtotime($key['tanggal_akhir']));

            $data_pengurus[] = array(
                'id_event' => $key['id_event'], 
                'nama_event' => $key['nama_event'],
                'jenis_event' => $key['jenis_event'], 
                'keterangan' => $key['keterangan'], 
                'lokasi_event' => $key['lokasi_event'], 
                'tanggal_mulai' => $tanggal_mulai, 
                'tanggal_akhir' => $tanggal_akhir, 
                'gambar' => $key['gambar'], 
            );
        }

         $dataBalikan = array(
            'kosong' => false,
            'data' => $data_pengurus,
          );
      }
      else
      {
        $dataBalikan = array(
            'kosong' => true,
          );
      }
      return $dataBalikan;
    }

    public function detailEvent($id_event, $level, $id_user, $jenis_event)
    {
        $this->db->where('id_event', $id_event);
        $data = $this->db->get('event')->row_array();

        $tanggal_mulai = date('d M Y', strtotime($data['tanggal_mulai']));
        $tanggal_akhir = date('d M Y', strtotime($data['tanggal_akhir']));

         $isAnggota = false;
         $isTerverifikasi = false;
        $isTerdaftar = false;
        if ($level=='anggota')
        {
          $isAnggota = true;
        }
        else
        {
          $isAnggota = false;
        }

        $data2 = $this->db->query("SELECT * FROM mengikuti WHERE id_anggota='$id_user' and id_event='$id_event'");
        if ($data2->num_rows()>0)
        {
          $data3 = $this->db->query("SELECT * FROM mengikuti WHERE id_anggota='$id_user' and id_event='$id_event'")->row();
          $isTerverifikasi = (bool) $data3->terverifikasi;

          $isTerdaftar = true;
        }
        else
        {
          $isTerdaftar=false;
        }

       $data_balikan = array(
          'id_event' => $data['id_event'], 
          'nama_event' => $data['nama_event'],
          'jenis_event' => $data['jenis_event'], 
          'keterangan' => $data['keterangan'], 
          'lokasi_event' => $data['lokasi_event'], 
          'tanggal_mulai' => $tanggal_mulai, 
          'tanggal_akhir' => $tanggal_akhir, 
          'isTerdaftar' => $isTerdaftar, 
          'isTerverifikasi' => $isTerverifikasi, 
          'isAnggota' => $isAnggota, 
          'gambar' => $data['gambar'], 
        );
       return $data_balikan;
    }


    public function daftar_ukt($id_event, $id_user)
    {

      $data_input = array(
        'id_event' => $id_event, 
        'id_anggota' => $id_user, 
      );

      $hasil="";

      //cek apakah anggotanya sudah terverivikasi apa tidak 
      $cek2 = $this->db->query("SELECT * FROM anggota WHERE id_anggota='$id_user'")->row();
      if ($cek2->status=='0')
      {
        $hasil="data anggota belum terverivikasi, silahkan hubungi admin untuk memverivikasi data anda";
      }
      else
      {
        $cek = $this->db->query("SELECT * FROM mengikuti WHERE id_event='$id_event' and id_anggota='$id_user'")->num_rows();
        if ($cek<=0) {
          $hasil = $this->db->insert('mengikuti', $data_input);
          $hasil="Anda berhasil mendaftar event, silhakan reload page untuk melihat data";
        }
        else
        {
          $hasil="Anda berhasil mendaftar event, silhakan reload page untuk melihat data";
        }
      }
      return $hasil;       
    }

    public function verifikasi($id_event, $id_user, $jenis_event)
    {
      $data="";
      $nama_anggota = $this->db->query("SELECT nama from anggota WHERE id_anggota='$id_user'")->row()->nama;

      $cek = $this->db->query("UPDATE mengikuti set terverifikasi=1 WHERE id_event='$id_event' and id_anggota='$id_user'");
      if ($cek==true) {
        $data = array(
          'pesan' => "berhasil menverifikasi ".$nama_anggota."(".$id_user.")", 
        );
      }
      else
      {
        $data = array(
          'pesan' => "gagal menverifikasi ".$nama_anggota."(".$id_user.")"."silahkan coba lagi", 
        );
      }
      return $data;
    }

}