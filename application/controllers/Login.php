<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent ::__construct(); 

        // $cek = $this->M_login->cek_userIsLogedIn(); 
        // var_dump($cek);
        if ($this->session->unset_userdata('status')=="login")
        {
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            redirect('ManajemenWisata');
        } 
    }   
 
	public function index()
	{
		// $this->load->view('header');
		// $this->load->view('sidebar');
		// $this->load->view('login');
		// $this->load->view('footer'); ss
		$this->load->view('login/login'); 
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			// 'password' => $password
			'password' => md5($password)
		);
		$cek = $this->M_login2->cek_login("user",$where); 

		var_dump($cek); 

		if($cek->num_rows()  > 0){   
			$cek = $cek->row_array(); 
			$data_session = array( 
				'username' => $cek['username'],  
				'admin' => $cek['admin'], 
				'nama' => $cek['nama'], 
				'alamat' => $cek['alamat'], 
				'no_hp' => $cek['no_hp'], 
				'email' => $cek['email'], 
				'status' => "login"
			);

			$this->session->set_userdata($data_session);  
			redirect(base_url("ManajemenWisata"));  
		}else{
			$this->session->set_flashdata('pesan', "username dan password salah !");
			redirect('Login');
		}
	}

	function logout(){    
		$this->session->unset_userdata('username');  
		$this->session->unset_userdata('admin'); 
		$this->session->unset_userdata('nama'); 
		$this->session->unset_userdata('alamat'); 
		$this->session->unset_userdata('status'); 

		var_dump($_SESSION); 
		$this->session->sess_destroy();  
		redirect(base_url('Login'));
	}

	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

}
