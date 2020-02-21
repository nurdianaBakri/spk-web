<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiUser extends CI_Controller {

	 var $API ="";
	function __construct()
	{
		parent::__construct();

        header('Access-Control-Allow-Origin:*'); 
        header('Access-Control-Allow-Headers:X-Request-With');
        header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	}

	public function getProfile($id_user, $level)
	{	
		$ambil = $this->M_anggota->getProfile($id_user, $level);
		echo json_encode($ambil);
	}
	
}