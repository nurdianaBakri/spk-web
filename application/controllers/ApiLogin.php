<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiLogin extends CI_Controller {

	 var $API ="";
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function login()
	{
		$data = json_decode(file_get_contents("php://input"));
		$username = $data->username;
		$password = $data->password;
		
		$ambil = $this->M_login->cekLogin($username, $password);
		echo json_encode($ambil);
	}

	public function getUser($username)
	{
		$this->db->where('username',$username);
		$data = $this->db->get('user')->row_array();
		echo json_encode($data);
	}
 
	
	
}