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
		$cek = $this->mod->cek_login("admin",$where)->result();
		if(count($cek) == 1){
			$data_session = array(
				'id_admin' => $cek[0]->id_admin,
				'nama_lengkap' => $cek[0]->nama_lengkap,
				'nama_user' => $username,
				'password' => $password,
				'tempat_lahir' => $cek[0]->tempat_lahir,
				'tanggal_lahir' => $cek[0]->tanggal_lahir,
				'alamat_lengkap' => $cek[0]->alamat_lengkap,
				'no_hp' => $cek[0]->no_hp,
				'no_telepon' => $cek[0]->no_telepon,
				'email' => $cek[0]->email,
				'image' => $cek[0]->image,
				'status' => "login"
				);
 			
			$this->session->set_userdata($data_session);
		}
			redirect('admin');
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */