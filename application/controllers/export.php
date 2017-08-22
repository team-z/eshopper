<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form','download');
		$this->load->library('upload');
		$this->load->model('mod');
		if($this->session->userdata('status') != "login"){
			redirect('login/index');
		}
	}

	public function index()
	{
		$this->load->view('admin/export/view_export');
	}

	public function unduh_pdf()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data['thn'] = $this->db->query("SELECT * FROM transaksi WHERE date_format(tanggal_transaksi, '%Y')='$tahun' AND date_format(tanggal_transaksi, '%m')='$bulan' ")->result();

		$this->load->view('admin/export/unduh_pdf', $data);
	}

	public function unduh_pdf1()
	{
		$this->db->select('*');
		$this->db->from('pengiriman');
		$this->db->join('transaksi', 'pengiriman.id_transaksi = transaksi.id_transaksi');
		$data['pengiriman'] = $this->db->get()->result();

		$this->load->view('admin/export/unduh_pdf1', $data);
	}

	public function unduh_pdf2()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		
		$data['thn'] = $this->db->query("SELECT a.*, b.* FROM pengiriman as a LEFT JOIN transaksi as b ON a.id_transaksi = b.id_transaksi WHERE date_format(tanggal, '%Y')='$tahun' AND date_format(tanggal, '%m')='$bulan' ")->result();

		$this->load->view('admin/export/unduh_pdf2', $data);
	}

	public function unduh_pdf3()
	{
		$kategori = $this->input->post('kategori');

		$where = array('kategori' => $kategori );
		$data['barang'] = $this->mod->detaildata('barang', $where)->result();
		
		$this->load->view('admin/export/unduh_pdf3', $data);
	}

}

/* End of file export.php */
/* Location: ./application/controllers/export.php */