<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiEvent extends CI_Controller {

	var $API ="";
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function getEvent($jenis_event)
	{	
		$ambil = $this->M_event->getEvent($jenis_event);
		echo json_encode($ambil);
	}

	public function detailEvent($id_event, $level, $id_user, $jenis_event)
	{	
		$ambil = $this->M_event->detailEvent($id_event, $level, $id_user, $jenis_event);
		echo json_encode($ambil);
	}

	public function daftar_ukt($id_event, $id_user)
	{
		$ambil = $this->M_event->daftar_ukt($id_event, $id_user);
		echo json_encode($ambil);
	}

	public function daftar_kejuaraan($id_event, $id_user)
	{
		$ambil = $this->M_event->daftar_ukt($id_event, $id_user);
		echo json_encode($ambil);
	}

	public function verifikasi($id_event,$id_user,$jenis_event)
	{
		$ambil = $this->M_event->verifikasi($id_event,$id_user,$jenis_event);
		echo json_encode($ambil);
		# code...
	}
	
}