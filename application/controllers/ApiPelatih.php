<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPelatih extends CI_Controller {

	var $API ="";
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function getPelatih()
	{	
		$ambil = $this->M_pelatih->getPelatih();
		echo json_encode($ambil);
	}

	public function detailPelatih($id_pelatih)
	{	
		$ambil = $this->M_pelatih->detailPelatih($id_pelatih);
		echo json_encode($ambil);
	}
	
}