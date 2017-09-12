<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filtering extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod');
	}

	public function carikategori()
	{
		$this->load->database();

		$key = $this->input->get('key');

		$search = array('kategori' => $key);

		$jumlah_data = $this->mod->jumlah_data_cari('barang', $search);
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/shopping/index');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;

		$from = $this->uri->segment(3);

		include "paging_style.php";

		$this->pagination->initialize($config);		
		$data['products'] = $this->mod->data_cari('barang',$config['per_page'],$from,$search);
		//$data['barang'] = $this->mod->tampil('barang')->result();
		$this->load->view('public/shop', $data);
	}

	public function caribarang()
	{
		$key = $this->input->get('key');
		$search = array('nama_barang' => $key);
		$jumlah_data = $this->mod->jumlah_data_cari('barang',$search);
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/shopping/index');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;

		$from = $this->uri->segment(3);

		include "paging_style.php";
		$this->pagination->initialize($config);
		$data['products'] = $this->mod->data_cari('barang',$config['per_page'],$from,$search);
		$this->load->view('public/shop', $data);
	}

}

/* End of file filtering.php */
/* Location: ./application/controllers/filtering.php */