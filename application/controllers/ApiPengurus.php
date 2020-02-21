<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPengurus extends CI_Controller {

	var $API ="";
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function getPengurus()
	{	
		$ambil = $this->M_pengurus->getPengurus();
		echo json_encode($ambil);
	}

	public function detailPengurus($id_pengurus)
	{	
		$ambil = $this->M_pengurus->detailPengurus($id_pengurus);
		echo json_encode($ambil);
	}
	
}