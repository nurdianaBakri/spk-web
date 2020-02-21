<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenKriteria extends CI_Controller {
 
	public function index()
	{

		$data['data'] = $this->M_masterModel->getAll('kriteria');

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenKriteria/index', $data);
		$this->load->view('footer');
	}

	public function getAll()
	{
		$data= $this->M_masterModel->getAll('kriteria');
		echo(json_encode($data));
	}

	public function add()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenKriteria/form_add'); 
		$this->load->view('footer');
	} 
 

	public function do_add()
	{ 
		$hasil="";
		$data = array( 
			'nama'=>$this->input->post('nama'),
			'nilaiP'=>$this->input->post('nilaiP'), 
		); 

		$hasil = $this->M_masterModel->insert("kriteria", $data);
		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses tambah kriteria berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses tambah kriteria gagal");
		}  
		redirect('ManajemenKriteria');
		// var_dump($hasil);
	}

	public function update($id_kriteria)
	{
		$data['data'] = $this->M_masterModel->detail( array('id_kriteria' => $id_kriteria ), "kriteria");
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenKriteria/form_update', $data); 
		$this->load->view('footer');
	} 

	public function do_update()
	{  
		$data2 = array();
		$hasil="";
		$hasil_upload ="";
		$id_kriteria=$this->input->post('id_kriteria');
		$data = array(
			'nama'=>$this->input->post('nama'),
			'nilaiP'=>$this->input->post('nilaiP'), 
		);   
		$hasil = $this->M_masterModel->update( array('id_kriteria' =>$id_kriteria ), "kriteria", $data);
		
		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses update kriteria berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses update kriteria gagal");
		}  
		redirect('ManajemenKriteria');
	} 

	public function hapus($id_kriteria)
	{
		$hasil = $this->M_masterModel->delete( array('id_kriteria' => $id_kriteria ), "kriteria");
		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses hapus kriteria berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses hapus kriteria gagal");
		} 
		redirect('ManajemenKriteria');
	}

}
