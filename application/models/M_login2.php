<?php 

class M_login2 extends CI_Model{	

	
	function __construct() {
		parent::__construct();
	}

	 public function cek_userIsLogedIn()
	{
    	$this->secure_header();
		if($this->session->userdata('status')=="login")
	    {
	      return true;
	    }  
	    else
	    {
	      return false;
	    }
	}	

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	public function update($where, $data)
	{
		$this->db->where($where);
		$hasil = $this->db->update('user',$data);
		return $hasil;
	}


	function get() { 
		if (isset($_SESSION['username']))
		{
			$data = array( 
				'username' => $_SESSION['username'], 
				'email' => $_SESSION['email'], 
				'admin' => $_SESSION['admin'], 
				'alamat' => $_SESSION['alamat'],  
				'no_hp' => $_SESSION['no_hp'],  
				'nama' => $_SESSION['nama'],  
			);
		}
		else
		{
			$data = array( 
				'role' => null,  
			);
		}
		return $data;  
	} 
	
	function clear() {
		session_destroy ();
	}

	 public function secure_header()
    {
     	// Prevent some security threats, per Kevin
		// Turn on IE8-IE9 XSS prevention tools
		$this->output->set_header('X-XSS-Protection: 1; mode=block');
		// Don't allow any pages to be framed - Defends against CSRF
		$this->output->set_header('X-Frame-Options: DENY');
		// prevent mime based attacks
    	$this->output->set_header('X-Content-Type-Options: nosniff');
    }
}