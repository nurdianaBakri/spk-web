<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_foto extends CI_Model 
{ 

  public function upload($id_anggota, $nama_file)
  {
    $sql1 = $this->db->query("SELECT * from anggota WHERE id_anggota ='$id_anggota'");
    if ($sql1->num_rows()>0) 
    {
        $row1 = $sql1->row_array();
        //jika nama file ==k
        if ($row1['foto']=='') 
        {
            $sql2= $this->db->query("UPDATE anggota SET foto = '$nama_file' WHERE id_anggota ='$id_anggota'");
            return $sql2;
        }
        else
        {
          //DELETE FILE YANG DULU
          $proses_hapus = unlink("gambar/anggota/".$row1['foto']);
          if ($proses_hapus)
          {
            $sql2= $this->db->query("UPDATE anggota SET foto = '$nama_file' WHERE id_anggota ='$id_anggota'");
            return $sql2;
          }
          else
          {
            return false;
          }
        }
    }
  }

}