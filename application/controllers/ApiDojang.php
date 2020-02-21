<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiDojang extends CI_Controller {

	 var $API ="";
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function getDojang()
	{	
		$ambil = $this->M_dojang->getDojang();
		echo json_encode($ambil);
	}

	public function detailDojang($id_dojang)
	{	
		$ambil = $this->M_dojang->detailDojang($id_dojang);
		echo json_encode($ambil);
	}
	
}