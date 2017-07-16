<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin3 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
	}

	public function deletepengiriman($id_transaksi)
	{
		$where = array('id_transaksi' => $id_transaksi );
		$this->mod->hapusdata('pengiriman', $where);
		redirect('admin3/join');
	}

	public function join()
	{
		$this->load->database();
		$jumlah_data = $this->mod->jumlah_data('pengiriman');
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/admin3/join');
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
		//$data['transaksi'] = $this->mod->data('transaksi');

		$this->db->select('*');
		$this->db->from('pengiriman');
		$this->db->join('transaksi', 'transaksi.id_transaksi = pengiriman.id_transaksi');
		$this->db->limit($config['per_page'],$from);
		$join['data'] = $this->db->get()->result();
		$this->load->view('admin/pengiriman/pengiriman', $join);

	}

	public function unduh_excel()
	{
		$this->db->select('*');
		$this->db->from('pengiriman');
		$this->db->join('transaksi', 'transaksi.id_transaksi = pengiriman.id_transaksi');
		$data['pengiriman'] = $this->db->get()->result();
		$this->load->view('admin/pengiriman/pengiriman_excel.php', $data);
	}

	public function unduh_pdf()
	{
		
		$this->db->select('*');
		$this->db->from('pengiriman');
		$this->db->join('transaksi', 'transaksi.id_transaksi = pengiriman.id_transaksi');
		$data['pengiriman'] = $this->db->get()->result();
		$this->load->view('admin/pengiriman/pengiriman_pdf.php', $data);
	}
}

/* End of file admin3.php */
/* Location: ./application/controllers/admin3.php */