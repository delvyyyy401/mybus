<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_mybus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		$this->getsecurity();
		$this->load->library('form_validation');
		$this->load->helper('tglindo_helper');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('email_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}
	}
	public function index(){
		$data['title'] = "List Tujuan";
		$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal_mybus LEFT JOIN tbl_bus on tbl_jadwal_mybus.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan_mybus on tbl_jadwal_mybus.kd_asal = tbl_tujuan_mybus.kd_tujuan ")->result_array();
		// die(print_r($data));
		$this->load->view('backend/jadwal', $data);
	}

	public function viewtambahjadwal($value=''){
		$data['title'] = "Tambah Jadwal";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan_mybus ORDER BY kota_tujuan asc")->result_array();
		$this->load->view('backend/tambahjadwal', $data);
	}
	
	public function tambahjadwal(){
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required|min_length[1]|max_length[50]');
		if ($this->form_validation->run() ==  FALSE) {
			$data['title'] = "Tambah Jadwal";
			$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
			$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan_mybus ORDER BY kota_tujuan asc")->result_array();
			$this->load->view('backend/tambahjadwal', $data);
		} else {
			$asal = $this->input->post('asal');
			$tujuan = $this->db->query("SELECT * FROM tbl_tujuan_mybus
               WHERE kd_tujuan = ".$this->input->post('tujuan')."")->row_array();
			if ($asal == $tujuan['kd_tujuan']) {
				$this->session->set_flashdata('message', 'swal("Berhasil", "Tujuan Jadwal Tidak Boleh Sama", "error");');
			redirect('backend/jadwal_mybus');
			}else{
			$kode = $this->getkod_model->get_kodjad();
			$simpan = array(
					'kd_jadwal' => $kode,
					'kd_asal' => $asal,
					'kd_tujuan' => $tujuan['kd_tujuan'],
					'kd_bus' => $this->input->post('bus'),
					'wilayah_jadwal' => $tujuan['kota_tujuan'],
					'jam_berangkat_jadwal' => $this->input->post('berangkat'),
					'jam_tiba_jadwal' => $this->input->post('tiba'),
					'harga_jadwal' =>  $this->input->post('harga'),
					 );
			$this->db->insert('tbl_jadwal_mybus', $simpan);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Data Jadwal Di Simpan", "success");');
			redirect('backend/jadwal_mybus');
			}	
		}
	}

	public function hapusjadwal($id=''){
	 	$sqlcek = $this->db->query("DELETE FROM tbl_jadwal_mybus WHERE kd_jadwal ='".$id."'");
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Jadwal Di Hapus", "success");');
		redirect('backend/jadwal_mybus');
	}

	public function viewjadwal($id=''){
		$data['title'] = "List Tujuan";
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_jadwal_mybus LEFT JOIN tbl_bus on tbl_jadwal_mybus.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan_mybus on tbl_jadwal_mybus.kd_tujuan = tbl_tujuan_mybus.kd_tujuan WHERE kd_jadwal ='".$id."'")->row_array();
	 	if ($sqlcek) {
	 		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan_mybus WHERE kd_tujuan = '".$sqlcek['kd_asal']."'")->row_array();
	 		$data['jadwal'] = $sqlcek;
			$data['title'] = "View jadwal";
			$this->load->view('backend/view_jadwal',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Gagal", "Data Jadwal Di Simpan", "error");');
			redirect('backend/jadwal_mybus');
	 	}
	}	

	public function editharga($id=''){
		$kode = (trim(html_escape($this->input->post('kode'))));
		$where = array('kd_jadwal' => $kode );
		$update = array('harga_jadwal' =>  $this->input->post('harga'));
		$this->db->update('tbl_jadwal_mybus', $update,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('backend/jadwal_mybus/');
	}
}