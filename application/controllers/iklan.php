<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form','url','download');
		$this->load->library('upload');
		$this->load->model('mod');
		if($this->session->userdata('status')!='login'){
			redirect('login/index');
		}
	}

	public function index()
	{
		$this->load->view('admin/iklan/view_iklan');
	}

	public function in_iklan()
	{
		$posisi = $this->input->post('posisi');
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10000';
		$config['max_width']  = '6144';
		$config['max_height']  = '6144';
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('gambar')){
			//$gambar = "";		
			$data['pesan'] = '';
			$data['pesan'] .= '<div class="alert alert-default" role="alert">';
      		$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      		$data['pesan'] .= '<strong>Gagal!!!</strong> ukuran gambar terlalu besar.';
      		$data['pesan'] .= '</div>';
      		$this->load->view('admin/iklan/view_iklan', $data);
		}
		else{
			$gambar = $this->upload->file_name;

			if ($posisi == "gambar1") {
				$object = array('gambar1' => $gambar );
				$this->mod->tambahdata('iklan', $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_iklan', $data);

			} elseif ($posisi == "gambar2") {
				$object = array('gambar2' => $gambar );
				$this->mod->tambahdata('iklan', $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_iklan', $data);

			} elseif ($posisi == "gambar3") {
				$object = array('gambar3' => $gambar );
				$this->mod->tambahdata('iklan', $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_iklan', $data);

			} elseif ($posisi == "gambar4") {
				$object = array('gambar4' => $gambar );
				$this->mod->tambahdata('iklan', $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_iklan', $data);

			} elseif ($posisi == "banner1") {
				$object = array('banner1' => $gambar );
				$this->mod->tambahdata('iklan', $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_iklan', $data);

			} elseif ($posisi == "banner2") {
				$object = array('banner2' => $gambar );
				$this->mod->tambahdata('iklan', $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_iklan', $data);

			} elseif ($posisi == "banner3") {
				$object = array('banner3' => $gambar );
				$this->mod->tambahdata('iklan', $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_iklan', $data);
			} else {
				$data['pesan'] = '';
				$data['pesan'] .= '<div class="alert alert-default" role="alert">';
	      		$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Gagal!!!</strong> list tidak boleh kosong.';
	      		$data['pesan'] .= '</div>';
	      		$this->load->view('admin/iklan/view_iklan', $data);
			}
		}
	}

	public function view_hapus()
	{
		$data['img'] = $this->mod->tampil('iklan')->result();
		$this->load->view('admin/iklan/view_hapus', $data);
	}

	public function proses_hapus($id_iklan)
	{
		error_reporting(0);
		$where = array('id_iklan' => $id_iklan );

		$data_ik = $this->mod->detaildata('iklan', $where)->result();

		foreach ($data_ik as $va) {
			$gambar1 = $va->gambar1;
			$gambar2 = $va->gambar2;
			$gambar3 = $va->gambar3;
			$gambar4 = $va->gambar4;
			$banner1 = $va->banner1;
			$banner2 = $va->banner2;
			$banner3 = $va->banner3;	
		}

		unlink('./uploads/'.$gambar1);
		unlink('./uploads/'.$gambar2);
		unlink('./uploads/'.$gambar3);
		unlink('./uploads/'.$gambar4);
		unlink('./uploads/'.$banner1);
		unlink('./uploads/'.$banner2);
		unlink('./uploads/'.$banner3);

		$this->mod->hapusdata('iklan', $where);
		redirect('iklan/view_hapus','refresh');
	}
}

/* End of file iklan.php */
/* Location: ./application/controllers/iklan.php */