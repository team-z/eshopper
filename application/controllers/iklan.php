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
		$this->load->view('admin/iklan/view_hapus');
	}

	public function in_iklan($id)
	{
		$posisi = $this->input->post('posisi');
		$gambar = $this->input->post('gambar');

		unlink('./uploads/'.$gambar);
		$where = array('id_iklan' => $id );
		
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
      		$this->load->view('admin/iklan/view_hapus', $data);
		}
		else{
			$gambar = $this->upload->file_name;

			if ($posisi == "gambar1") {
				$object = array('gambar1' => $gambar );
				$this->mod->updatedata('iklan', $where, $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar1 berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_hapus', $data);

			} elseif ($posisi == "gambar2") {
				$object = array('gambar2' => $gambar );
				$this->mod->updatedata('iklan', $where, $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar2 berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_hapus', $data);

			} elseif ($posisi == "gambar3") {
				$object = array('gambar3' => $gambar );
				$this->mod->updatedata('iklan', $where, $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar3 berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_hapus', $data);

			} elseif ($posisi == "gambar4") {
				$object = array('gambar4' => $gambar );
				$this->mod->updatedata('iklan', $where, $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> gambar4 berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_hapus', $data);

			} elseif ($posisi == "banner1") {
				$object = array('banner1' => $gambar );
				$this->mod->updatedata('iklan', $where, $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> banner1 berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_hapus', $data);

			} elseif ($posisi == "banner2") {
				$object = array('banner2' => $gambar );
				$this->mod->updatedata('iklan', $where, $object,$where);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> banner2 berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_hapus', $data);

			} elseif ($posisi == "banner3") {
				$object = array('banner3' => $gambar );
				$this->mod->updatedata('iklan', $where, $object);

				$data['pesan'] = '<div class="alert alert-success" role="alert">';
				$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Success!!!</strong> banner3 berhasil dimasukkan.';
	      		$data['pesan'] .= '</div>';
	      		$data['pesan'] .= '';
	      		$this->load->view('admin/iklan/view_hapus', $data);

			} else {
				$data['pesan'] = '';
				$data['pesan'] .= '<div class="alert alert-default" role="alert">';
	      		$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	      		$data['pesan'] .= '<strong>Gagal!!!</strong> gambar kosong.';
	      		$data['pesan'] .= '</div>';
	      		$this->load->view('admin/iklan/view_hapus', $data);
			}
		}
	}
}

/* End of file iklan.php */
/* Location: ./application/controllers/iklan.php */