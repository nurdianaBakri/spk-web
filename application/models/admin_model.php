<?php /**
* 
*/
class Admin_Model extends CI_Model
{
	// ** ANGGOTA **//
	// get data tabel anggota dari database
	public function getAnggota($limit, $start){
        $query = $this->db->get('anggota', $limit, $start);
        return $query;
	}

	// menghapus data anggota
	function deleteanggota($id){
		$this->db->where('id_anggota', $id);
		$this->db->delete('anggota');
	}

	function getAnggotaId($where, $table){
		return $this->db->get_where($table, $where)->result();
	}
	
	function updateAnggota($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	// ** ANGGOTA **//


	// ** PELATIH **//
	// get data dari database, tabel pelatih
	public function getPelatih($limit, $start){
        $query = $this->db->get('pelatih', $limit, $start);
        return $query;
	}

	public function getDataPelatih(){
        $query = $this->db->get('pelatih')->result();
        return $query;
	}

	//membuat format id pelatih
	// function buat_idPelatih(){
	// 	$this->db->select('RIGHT(pelatih.id_pelatih,2) as kode', FALSE);
	// 	$this->db->order_by('id_pelatih','DESC');    
	// 	$this->db->limit(1);    
	// 	$query = $this->db->get('pelatih');      //cek dulu apakah ada sudah ada kode di tabel.    
	// 	if($query->num_rows() <> 0){      
	// 		//jika kode ternyata sudah ada.      
	// 		$data = $query->row();      
	// 		$kode = intval($data->kode) + 1;    
	// 	}
	// 	else {      
	// 		//jika kode belum ada      
	// 		$kode = 1;    
	// 	}
	// 	$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
	// 	$kodejadi = $kodemax;    // hasilnya ODJ-9921-0001 dst.
	// 	return $kodejadi;
	// }

	// insert data pelatih
	function insertPelatih(){
		$id_pelatih = 'P'.$this->input->post('id_dojang').'-';

		$this->db->select('RIGHT(pelatih.id_pelatih,2) as kode', FALSE);
		$this->db->order_by('id_pelatih','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('pelatih');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			//jika kode ternyata sudah ada.      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;
			// $kode = $id_pelatih.$num;
		}
		else {      
			//jika kode belum ada      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		$kodejadi = $kodemax;    // hasilnya ODJ-9921-0001 dst.
		// return $kodejadi;

		$data = array('id_pelatih' 	=> $id_pelatih.$kodejadi,
					  'nama'		=> $this->input->post('nama'),					  
					  'id_dojang'	=> $this->input->post('id_dojang'),
					  'pelatih'		=> $this->input->post('jabatan'),
					  'alamat'		=> $this->input->post('alamat')
					);
		$this->db->insert('pelatih', $data);
	}

	// get data pelatih berdasarkan id pelatih
	function getPelatihId($where, $table){
		return $this->db->get_where($table, $where)->result();
	}

	function updatepelatih($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function deletePelatih($id){
		$this->db->where('id_pelatih', $id);
		$this->db->delete('pelatih');
	}	

	// ** PELATIH **//


	// ** DOJANG **//
	// get data tabel dojang	
	public function getDojang($limit, $start){
        $query = $this->db->get('dojang', $limit, $start);
        return $query;
	}

	// get data tabel dojang	
	public function getDataDojang(){
        $query = $this->db->get('dojang')->result();
        return $query;
	}

	// membuat format id dojang
	function buat_idDojang(){
		$this->db->select('RIGHT(dojang.id_dojang,2) as kode', FALSE);
		$this->db->order_by('id_dojang','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('dojang');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			//jika kode ternyata sudah ada.      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}
		else {      
			//jika kode belum ada      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		$kodejadi = "D".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
	}

	// insert data dojang
	function insertDojang(){
		$data = array('id_dojang'   => $this->input->post('id_dojang'),
                      'nama'        => $this->input->post('nama'),
                      'alamat'      => $this->input->post('alamat')
                    );
        $this->db->insert('dojang', $data);
	}

	function updateDojang($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// get data dojang berdasarkan id
	function getDojangId($where, $table){
		return $this->db->get_where($table, $where)->result();
	}

	function deleteDojang($id){
		$this->db->where('id_dojang', $id);
		$this->db->delete('dojang');
	}
	// ** DOJANG **//


	// ** EVENT **//

	// load data event
	public function getEvent($limit, $start){
        $query = $this->db->get('event', $limit, $start);
        return $query;
	}

	// membuat format id event
	function buat_idEvent(){
		$this->db->select('RIGHT(event.id_event,2) as kode', FALSE);
		$this->db->order_by('id_event','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('event');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			//jika kode ternyata sudah ada.      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}
		else {      
			//jika kode belum ada      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		$kodejadi = "EVNT".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
	}

	// get data event berdasarkan id
	function getEventId($where, $table){
		return $this->db->get_where($table, $where)->result();
	}	

	function updateevent($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function deleteEvent($id){
		$this->db->where('id_event', $id);
		$this->db->delete('event');
	}

	// get data peserta event
	function getPeserta($where, $table){
		return $this->db->get_where($table, $where)->result();
	}
	// ** EVENT **//

	//  ** LOG IN ** //
	function cek_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $admin = $this->db->get('admin')->row_array();
        return $admin;
	}
	
	// ** JADWAL ** //
	public function getJadwal($limit, $start){
        $query = $this->db->get('jadwal', $limit, $start);
        return $query;
	}
	
	// insert data jadwal
	function insertJadwal(){
		$hari = $this->input->post('hari');
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');
		$waktu_latihan = $hari.', '.$awal.'-'.$akhir;
		$data = array('id_dojang'   		=> $this->input->post('id_dojang'),
                      'waktu_latihan'   	=> $waktu_latihan,
					  'id_pelatih'      	=> $this->input->post('id_pelatih'),
					  'id_asisten_pelatih'	=> $this->input->post('id_asisten_pelatih')
                    );
        $this->db->insert('jadwal', $data);
	}

	// get data jadwal berdasarkan id
	function getJadwalId($where, $table){
		return $this->db->get_where($table, $where)->result();
	}

	function updateJadwal($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// hapus jadwal
	function deleteJadwal($id){
		$this->db->where('id_jadwal', $id);
		$this->db->delete('jadwal');
	}
} 

?>