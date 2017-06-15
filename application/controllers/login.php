<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mod');
		$this->load->helper('url');
	}
 
	function index(){
		$this->load->view('admin/login');
	}
 
	function aksi_login(){
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'nama_user' => $username,
			'password' => $password
			);
		$cek = $this->mod->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect('admin');
 
		}else{
			redirect('login/index');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */