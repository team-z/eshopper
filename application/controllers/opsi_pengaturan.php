<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opsi_pengaturan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
		if($this->session->userdata('status') != "login"){
			redirect('login/index');
		}
	}

	public function view()	
	{
		$this->load->view('admin/opsi/pengaturan/pengaturan');
	}

	public function dashboard()
	{
		redirect('admin/index');
	}

	public function input_profile()
	{
		$nama_toko = $this->input->post('nama_toko');
		$wa = $this->input->post('wa');
		$bbm = $this->input->post('bbm');
		$line = $this->input->post('line');
		$instagram = $this->input->post('instagram');
		$facebook = $this->input->post('facebook');
		$lokasi_sekarang = $this->input->post('lokasi_sekarang');
		$alamat_toko = $this->input->post('alamat_toko');

		$object = array('nama_toko' => $nama_toko,
						'wa' => $wa,
						'bbm' => $bbm,
						'line' => $line,
						'instagram' => $instagram,
						'facebook' => $facebook,
						'lokasi_sekarang' => $lokasi_sekarang,
						'alamat_toko' => $alamat_toko
					   );
		$this->mod->tambahdata('toko', $object);
		redirect('opsi_pengaturan/dashboard');
	}

	public function update_profile()
	{
		$id = $this->input->post('id');
		$nama_toko = $this->input->post('nama_toko');
		$wa = $this->input->post('wa');
		$bbm = $this->input->post('bbm');
		$line = $this->input->post('line');
		$instagram = $this->input->post('instagram');
		$facebook = $this->input->post('facebook');
		$lokasi_sekarang = $this->input->post('lokasi_sekarang');
		$alamat_toko = $this->input->post('alamat_toko');

		$object = array('nama_toko' => $nama_toko,
						'wa' => $wa,
						'bbm' => $bbm,
						'line' => $line,
						'instagram' => $instagram,
						'facebook' => $facebook,
						'lokasi_sekarang' => $lokasi_sekarang,
						'alamat_toko' => $alamat_toko
					   );
		$where = array('id' => $id );

		$this->mod->updatedata('toko', $where, $object);
		redirect('opsi_pengaturan/dashboard');
	}
}

/* End of file opsi_pengaturan.php */
/* Location: ./application/controllers/opsi_pengaturan.php */