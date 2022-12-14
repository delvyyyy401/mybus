<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_mybus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}
	}
	
	public function index(){
	$data['title'] = "List Konfirmasi";
	$data['konfirmasi'] = $this->db->query("SELECT * FROM tbl_konfirmasi_mybus WHERE total_konfirmasi < 1000000 GROUP BY kd_konfirmasi")->result_array();
	$this->load->view('backend/konfirmasi', $data);	
	}

	public function index2(){
		$data['title'] = "List Konfirmasi";
		$data['konfirmasi'] = $this->db->query("SELECT * FROM tbl_konfirmasi_mybus WHERE total_konfirmasi > 1000000 GROUP BY kd_konfirmasi")->result_array();
		$this->load->view('backend/konfirmasi_institusi', $data);	
	}

	public function viewkonfirmasi($id=''){
	 $sqlcek = $this->db->query("SELECT * FROM tbl_konfirmasi_mybus WHERE kd_order ='".$id."'")->result_array();
	 $data['title'] = "View Konfirmasi";
	 if ($sqlcek == NULL) {
	 	$this->session->set_flashdata('message', 'swal("Kosong", "Tidak Ada Kiriman Konfirmasi", "error");');
		redirect('backend/order_mybus/vieworder/'.$id);
	 }else{		
		$data['konfirmasi'] = $sqlcek;
	 	$this->load->view('backend/view_konfirmasi',$data);
		}
	}
}
