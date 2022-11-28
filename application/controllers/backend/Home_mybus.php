<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_mybus extends CI_Controller {
	
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$data['title'] = "Home";
		$data['order'] = $this->db->query("SELECT count(kd_order) FROM tbl_order_mybus WHERE status_order ='1'")->result_array();
		$data['tiket'] = $this->db->query("SELECT count(kd_tiket) FROM tbl_tiket_mybus ")->result_array();
		$data['konfirmasi'] = $this->db->query("SELECT count(kd_konfirmasi) FROM tbl_konfirmasi_mybus ")->result_array();
		$data['total'] = $this->db->query("SELECT sum(total_konfirmasi) FROM tbl_konfirmasi_mybus ")->result_array();
		// die(print_r($data));
		$this->load->view('backend/home', $data);
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}
	}
}