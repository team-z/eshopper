<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin4 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
	}

	public function view_pembelian()
	{
		$this->load->database();
		$jumlah_data = $this->mod->jumlah_data('pembelian');
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/admin4/view_pembelian');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;

		$from = $this->uri->segment(3);

		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
 
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
 
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
 
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
 
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
 
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);		
		$data['pemb'] = $this->mod->data('pembelian',$config['per_page'],$from);

		//$data['pemb'] = $this->mod->tampil('pembelian')->result();
		$this->load->view('admin/pembelian/pembelian.php', $data);
	}

	public function hapuspembelian($id_pembelian)
	{
		$where = array('id_pembelian' => $id_pembelian );
		$this->mod->hapusdata('pembelian',$where);
		redirect('admin4/view_pembelian');
	}

	public function unduh_excel()
	{
		$data['pemb'] = $this->mod->tampil('pembelian')->result();
		$this->load->view('admin/pembelian/pembelian_excel.php', $data);
	}

	public function unduh_pdf()
	{
		$data['pemb'] = $this->mod->tampil('pembelian')->result();
		$this->load->view('admin/pembelian/pembelian_pdf.php', $data);
	}
}

/* End of file admin4.php */
/* Location: ./application/controllers/admin4.php */