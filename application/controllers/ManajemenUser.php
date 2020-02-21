<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenUser extends CI_Controller {
 
	public function index()
	{

		$data['data'] = $this->M_masterModel->getAll('user');

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenUser/index', $data);
		$this->load->view('footer');
	}

	public function getAll()
	{
		$data= $this->M_masterModel->getAll('user');
		echo(json_encode($data));
	}

	public function add()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenUser/form_add'); 
		$this->load->view('footer');
	} 
 

	public function do_add()
	{ 
		$hasil="";
		$data = array(
			'nama'=>$this->input->post('nama'),
			'admin'=>$this->input->post('admin'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			'alamat'=>$this->input->post('alamat'),
			'no_hp'=>$this->input->post('no_hp'),
			'username'=>$this->input->post('username'),
		); 

		$hasil = $this->M_masterModel->insert("user", $data);
		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses tambah User berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses tambah User gagal");
		} 
		redirect('ManajemenUser');
		// var_dump($hasil);
	}

	public function update($username)
	{
		$data['data'] = $this->M_masterModel->detail( array('username' => $username ), "user");
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenUser/form_update', $data); 
		$this->load->view('footer');
	} 

	public function do_update()
	{  
		$data2 = array();
		$hasil="";
		$hasil_upload ="";
		$username=$this->input->post('username2');
		$data = array(
			'nama'=>$this->input->post('nama'),
			'admin'=>$this->input->post('admin'),
			'email'=>$this->input->post('email'),
			// 'password'=>$this->input->post('password'),
			'alamat'=>$this->input->post('alamat'),
			'no_hp'=>$this->input->post('no_hp'), 
			'username'=>$this->input->post('username'), 
		);  

		if ($this->input->post('password')!="")
		{
			$data['password'] = md5($this->input->post('password'));
		} 

		$hasil = $this->M_masterModel->update( array('username' =>$username ), "user", $data);
		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses update User berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses update User gagal");
		} 
		redirect('ManajemenUser');
	} 

	public function hapus($username)
	{
		$hasil = $this->M_masterModel->delete( array('username' => $username ), "user");
		if ($hasil==true)
		{
			$this->session->set_flashdata('pesan', "Proses hapus User berhasil");
		}
		else
		{
			$this->session->set_flashdata('pesan', "Proses hapus User gagal");
		} 
		redirect('ManajemenUser');
	}

}
