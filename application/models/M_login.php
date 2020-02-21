<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model 
{ 
	public function ceklogin($username, $password) 
	{
        $arrayName = array();
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $user = $this->db->get('anggota');
        if ($user->num_rows()>0)
        {
            $row = $user->row_array();
            $arrayName = array(
                'username' => $row['username'],
                'level' => "anggota",
                'id_user' => $row['id_anggota'],
                'logged_in'=>TRUE,
                'berhasil'=>"yes",
            );
        }
        else
        {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $user = $this->db->get('admin');
            if ($user->num_rows()>0)
            {
                $row = $user->row_array();
                $arrayName = array(
                    'username' => $row['username'],
                    'level' => "pengurus",
                    'id_user' => $row['id_admin'],
                    'logged_in'=>TRUE,
                    'berhasil'=>"yes",
                );
            }
            else
            {
                $arrayName = array(
                    'berhasil'=>"tidak",
                    'logged_in'=>FALSE,
                    'username'=>'',
                );
            }
        }
        return $arrayName;
    }

}