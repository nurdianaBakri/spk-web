<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenHistory extends CI_Controller {
 
	public function index()
	{ 
		$data['data'] = $this->M_masterModel->getAll('user'); 
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenHistory/index', $data);
		$this->load->view('footer');
	}

	public function getAll()
	{
		$data= $this->M_masterModel->getAll('history');
		echo(json_encode($data));
	} 

	public function update($username)
	{
		$data['data'] = $this->M_masterModel->detail( array('username' => $username ), "history");
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenHistory/form_update', $data); 
		$this->load->view('footer');
	} 

	public function detail($username)
	{
		$data['data'] = $this->M_masterModel->detail( array('username' => $username ), "history"); 

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('ManajemenHistory/detail', $data); 
		$this->load->view('footer');
	}  
	 
}
