<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_destinasiWisata extends CI_Controller {

	 var $API ="";
	function __construct()
	{
		parent::__construct();
       header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function getDestinasiWisata()
	{	
		$ambil = $this->M_DestinasiWisata->getDestinasiWisata();
		echo json_encode($ambil);
	}

	public function detailDestinasiWisata($id_wisata)
	{	
		$ambil = $this->M_DestinasiWisata->detailDestinasiWisata($id_wisata);
		echo json_encode($ambil);
	}

	public function daftar()
	{
		$returnData = array();
        $hasil="";

        $request = json_decode(file_get_contents("php://input"));

        //GET MAX ID ANGGOTA
        $id_wisata =$this->db->query("select MAX(CAST(SUBSTRING(id_wisata,4, length(id_wisata)-3) as UNSIGNED)) AS id_wisata FROM destinasi_wisata")->row_array()['id_wisata']+1;

        $params['data'] = $id_wisata; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        // $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE       

        //get data pelatih di dojang 
        $id_dojang = $request->id_dojang;
        $data_pelatih = $this->M_pelatih->getPelatihByDojang($id_dojang);

        $data_inputan = array(
            'id_wisata' => $id_wisata,
            'nama_wisata' => $request->nama_wisata,
            'alamat' => $request->alamat,
        );
        
        $hasil =  $this->db->insert('wisata',$data_inputan);
        if ($hasil==true)
        {
            $returnData = array(
                'sukses' => true,
                'pesan' => "berhasil memasukkan data wisata ke database",
            );
        }
        else
        {
            $returnData = array(
                'sukses' => false,
                'pesan' => "gagal memasukkan data wisata ke database",
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
            'id_wisata' => $request->id_wisata,
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

        $id_wisata = $request->id_wisata;
        $hasil =  $this->M_DestinasiWisata->update($id_wisata, $data_inputan);
        if ($hasil==true)
        {
            $returnData = array(
                'sukses ' => true,
                'pesan' => "berhasil mengubah Destinasi Wisata",
            );
        }
        else
        {
            $returnData = array(
                'sukses ' => false,
                'pesan' => "gagal mengubah Destinasi Wisata",
            );
        }

        // var_dump($hasil);
        echo json_encode($returnData);
    }


    public function hapus($id_wisata)
    {
        $ambil = $this->M_DestinasiWisata->hapus($id_wisata);
        echo json_encode($ambil);
    }
	
}