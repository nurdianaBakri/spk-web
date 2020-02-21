<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiAnggota extends CI_Controller {

	 var $API ="";
	function __construct()
	{
		parent::__construct();
       header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function getAnggota()
	{	
		$ambil = $this->M_anggota->getAnggota();
		echo json_encode($ambil);
	}

	public function detailAnggota($id_anggota)
	{	
		$ambil = $this->M_anggota->detailAnggota($id_anggota);
		echo json_encode($ambil);
	}

	public function daftar()
	{
		$returnData = array();
        $hasil="";

        $request = json_decode(file_get_contents("php://input"));

        //GET MAX ID ANGGOTA
        $id_anggota =$this->db->query("select MAX(CAST(SUBSTRING(id_anggota,4, length(id_anggota)-3) as UNSIGNED)) AS id_anggota FROM anggota")->row_array()['id_anggota']+1;
        $id_anggota ='ANG'.$id_anggota;

        //generate qrcode
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './gambar/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$id_anggota.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $id_anggota; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE       

        //get data pelatih di dojang 
        $id_dojang = $request->id_dojang;
        $data_pelatih = $this->M_pelatih->getPelatihByDojang($id_dojang);

        $data_inputan = array(
            'id_anggota' => $id_anggota,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => substr($request->tanggal_lahir, 0,10),
            'tempat_lahir' => $request->tempat_lahir,
            'no_hp' => $request->no_hp,
            'tingkat_lama' => 10,
            'username' => $request->username,
            'password' => $request->password,
            'id_dojang' => $id_dojang,
            'id_pelatih' => $data_pelatih->id_pelatih,
            'qr_code'      => $image_name
        );
        
        $hasil =  $this->db->insert('anggota',$data_inputan);
        if ($hasil==true)
        {
            $returnData = array(
                'sukses' => true,
                'pesan' => "berhasil memasukkan data ke database",
            );
        }
        else
        {
            $returnData = array(
                'sukses' => false,
                'pesan' => "gagal memasukkan data ke database",
            );
        }

        // var_dump($hasil);
        echo json_encode($returnData);
	}

    public function update()
    {
        $returnData = array();
        $request = json_decode(file_get_contents("php://input"));

        $id_dojang = $request->id_dojang;
        $data_pelatih = $this->M_pelatih->getPelatihByDojang($id_dojang);

        $data_inputan = array(
            'id_anggota' => $request->id_anggota,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => substr($request->tanggal_lahir, 0,10),
            'tempat_lahir' => $request->tempat_lahir,
            'no_hp' => $request->no_hp,
            'tingkat_lama' => $request->tingkat_lama,
            'tingkat_baru' => $request->tingkat_baru,
            'id_dojang' => $id_dojang,
            'id_pelatih' => $data_pelatih->id_pelatih,
        );
        // var_dump($data_inputan);

        $id_anggota = $request->id_anggota;
        $hasil =  $this->M_anggota->update($id_anggota, $data_inputan);
        if ($hasil==true)
        {
            $returnData = array(
                'sukses ' => true,
                'pesan' => "berhasil mengubah anggota",
            );
        }
        else
        {
            $returnData = array(
                'sukses ' => false,
                'pesan' => "gagal mengubah anggota",
            );
        }

        // var_dump($hasil);
        echo json_encode($returnData);
    }


    public function hapus($id_anggota)
    {
        $ambil = $this->M_anggota->hapus($id_anggota);
        echo json_encode($ambil);
    }
	
}