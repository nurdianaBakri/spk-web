<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenWisata extends CI_Controller {
 
	public function index()
	{

		$data['data'] = $this->M_masterModel->getAll('destinasi_wisata');

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenWisata/index', $data);
		$this->load->view('footer');
	}

	public function getAll()
	{
		$data= $this->M_masterModel->getAll('destinasi_wisata');
		echo(json_encode($data));
	}

	public function add()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenWisata/form_add'); 
		$this->load->view('footer');
	} 

	public function aksi_upload()
	{
		// $new_name = time().str_replace(" ", "-", $_FILES["gambar"]['name']);
		$new_name = time().rand('8304390432');
		$data_return = array();

		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name'] = $new_name.".png";
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('gambar')){
			$error = array('error' => $this->upload->display_errors());

			$data_return = array(
				'file_name' => $new_name, 
				'status' => false, 
			);

		}else{
			$data = array('upload_data' => $this->upload->data());

			$data_return = array(
				'file_name' => $new_name, 
				'status' => true, 
			);
		}
		return $data_return;
	}

	public function do_add()
	{ 
		$hasil="";
		$data = array(
			'nama_wisata'=>$this->input->post('nama_wisata'),
			'jenis_wisata'=>$this->input->post('jenis_wisata'),
			'lng'=>$this->input->post('lng'),
			'lat'=>$this->input->post('lat'),
			'alamat'=>$this->input->post('alamat'),
			'keterangan'=>$this->input->post('keterangan'),
		); 

		//masukkan data fasilitas
		{
			$fasilitas = implode(",",$this->input->post('fasilitas'));
		}
		$data['fasilitas'] = $fasilitas;

		$hasil_upload =$this->aksi_upload();
		if ($hasil_upload['status']==true)
		{
			$data['gambar'] = $hasil_upload['file_name'];
			$hasil = $this->M_masterModel->insert("destinasi_wisata", $data);
		}

		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses tambah wisata berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses tambah wisata gagal");
		}  

		redirect('ManajemenWisata');
		// var_dump($hasil);
	}

	public function update($id_wisata)
	{
		$data['data'] = $this->M_masterModel->detail( array('id_wisata' => $id_wisata ), "destinasi_wisata");

		$data_f = array();
		$data_fasilitas= explode(",", $data['data']->fasilitas);
		foreach ($data_fasilitas as $key ) {
			$data_f[] = $key;
		}
		$data['fasilitas']=$data_f;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenWisata/form_update', $data); 
		$this->load->view('footer');
	} 

	public function do_update()
	{ 

		$data2 = array();
		$hasil="";
		$hasil_upload ="";
		$id_wisata=$this->input->post('id_wisata');
		$data = array(
			'nama_wisata'=>$this->input->post('nama_wisata'),
			'jenis_wisata'=>$this->input->post('jenis_wisata'),
			'lng'=>$this->input->post('lng'),
			'lat'=>$this->input->post('lat'),
			'alamat'=>$this->input->post('alamat'),
			'keterangan'=>$this->input->post('keterangan'),
		); 

		//masukkan data fasilitas
		{
			$fasilitas = implode(",",$this->input->post('fasilitas'));
		}
		$data['fasilitas'] = $fasilitas;

		//jika tidak mengupload gambar, set gambar == gambar selumnya
		if($_FILES['gambar']['error']==0)
		{ 
			$hasil_upload =$this->aksi_upload();
			if ($hasil_upload['status']==true)
			{
				$data['gambar'] = $hasil_upload['file_name'].".png";
			} 
		}


		$hasil = $this->M_masterModel->update( array('id_wisata' =>$id_wisata ), "destinasi_wisata", $data);

		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses update wisata berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses update wisata gagal");
		}  
		redirect('ManajemenWisata');
	}


	public function hapus($id_wisata)
	{
		$hasil = $this->M_masterModel->delete( array('id_wisata' => $id_wisata ), "destinasi_wisata");
		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses hapus wisata berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses hapus wisata gagal");
		}  
		redirect('ManajemenWisata');
	}

}
