<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiFoto extends CI_Controller {

	var $API ="";
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function upload()
	{	
		$error="";
		$config['upload_path']          = 'gambar/anggota/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 10000000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
			//insert name foto ke db
			$nama_file = $this->input->post('fileName');
			$id_anggota = $this->input->post('id_user');
			$hasil = $this->M_foto->upload($id_anggota, $nama_file);

			if ($hasil==true)
			{
				echo("proses mengubah/update foto berhasil");
			}
			else
			{
				echo("proses mengubah/update foto gagal, silhakan coba kembali");
			}
        }
	}

	public function detailPelatih($id_pelatih)
	{	
		$ambil = $this->M_pelatih->detailPelatih($id_pelatih);
		echo json_encode($ambil);
	}
	
}