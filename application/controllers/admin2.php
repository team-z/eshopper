<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
		if($this->session->userdata('status') != "login"){
			redirect('login/index');
		}
	}

	public function viewtransaksi()
	{
		$this->load->database();
		$jumlah_data = $this->mod->jumlah_data('transaksi');
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/admin2/viewtransaksi');
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
		//$data['transaksi'] = $this->mod->data('transaksi',$config['per_page'],$from);
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pengiriman', 'pengiriman.id_transaksi = transaksi.id_transaksi');
		$this->db->limit($config['per_page'],$from);
		$data['transaksi'] = $this->db->get()->result();
		//$data['transaksi'] = $this->mod->tampil('transaksi')->result();
		$this->load->view('admin/transaksi/transaksi', $data);
	}

	public function cari_transaksi()
	{
		$this->load->database();

		$key = $this->input->get('key');

		$search = array('nama_pelanggan' => $key,
						'email_pelanggan' => $key,
						'no_hp' => $key,
						'no_rekening' => $key,
						'kode_vertifikasi' => $key,
						'no_pesanan' => $key);

		$jumlah_data = $this->mod->jumlah_data_cari('transaksi', $search);
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/admin2/viewtransaksi');
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
		//$data['transaksi'] = $this->mod->data('transaksi',$config['per_page'],$from);
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pengiriman', 'pengiriman.id_transaksi = transaksi.id_transaksi');
		$this->db->or_like($search);
		$this->db->limit($config['per_page'],$from);
		$data['transaksi'] = $this->db->get()->result();
		//$data['transaksi'] = $this->mod->tampil('transaksi')->result();
		$this->load->view('admin/transaksi/transaksi', $data);
	}

	public function dtltransaksi($id_transaksi)
	{
		$where = array('id_transaksi' => $id_transaksi );
		$data['kom'] = $this->mod->detaildata('transaksi', $where)->result();
		$this->load->view('admin/transaksi/detail-transaksi', $data);
	}

	public function update_ststransaksi()
	{
		$id_transaksi = $this->input->post('id_transaksi');
		$status = $this->input->post('status');

		$where = array('id_transaksi' => $id_transaksi );

		$object = array('status' => $status );

		$this->mod->updatedata('transaksi', $where, $object);
		redirect('admin2/viewtransaksi');

	}

	public function hapustransaksi($id_transaksi)
	{
		$where = array('id_transaksi' => $id_transaksi );
		$this->mod->hapusdata('transaksi',$where);
		$this->mod->hapusdata('pengiriman',$where);
		redirect('admin2/viewtransaksi');
	}

	public function hapus_semua()
	{
		$this->db->query("DELETE FROM transaksi");

		$this->db->query("DELETE FROM pengiriman");

		redirect('admin2/viewtransaksi');
	}

	public function unduh_excel()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pesanan', 'transaksi.id_transaksi = pesanan.id_transaksi');
		$this->db->join('pengiriman', 'transaksi.id_transaksi = pengiriman.id_transaksi');
		$data['transaksi'] = $this->db->get()->result();
		$this->load->view('admin/transaksi/transaksi_excel.php', $data);
	}

	public function unduh_pdf()
	{
		//$data['transaksi'] = $this->mod->tampil('transaksi')->result();
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pesanan', 'transaksi.id_transaksi = pesanan.id_transaksi');
		$data['transaksi'] = $this->db->get()->result();
		$this->load->view('admin/transaksi/transaksi_pdf.php', $data);
	}
}

/* End of file admin2.php */
/* Location: ./application/controllers/admin2.php */