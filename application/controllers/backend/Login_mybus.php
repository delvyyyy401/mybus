<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_mybus extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if ($username) {
			redirect('backend/home_mybus');
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}else{
			redirect('backend/login_mybus');
		}
	}
	function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
        
    }
	public function index(){
		// $this->getsecurity();
		$data['ipaddres'] = $this->getUserIP();
		// die(print_r($data));
		$this->load->view('backend/login',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('backend/login_mybus'));
	}
	public function cekuser(){
    $email = strtolower($this->input->post('email'));
    $ambil = $this->db->query('select * from tbl_admin_mybus where email_admin = "'.$email.'"')->row_array();
    $password = $this->input->post('password');

    if (password_verify($password,$ambil['password_admin'])) {
    	$this->db->where('email_admin',$email);
        $query = $this->db->get('tbl_admin_mybus');
            foreach ($query->result() as $row) {
                $sess = array(
                	'kd_admin' => $row->kd_admin,
                    'username_admin' => $row->username_admin,
                    'password_admin' => $row->password_admin,
                    'nama_admin'     => $row->nama_admin,
                    'img_admin'	=> $row->img_admin,
                    'email_admin'   => $row->email_admin,
                    'telpon_admin'   => $row->telpon_admin,
                    'alamat_admin'	=> $row->alamat_admin,
                    'level'	=> $row->level_admin
                );
                $this->session->set_userdata($sess);
                redirect('backend/home_mybus');
            }
    }else{
    	$this->session->set_flashdata('message', 'swal("Something Wrong!", "Email atau Password Salah", "error");');
    	redirect('backend/login_mybus');
    	}
	}

}
