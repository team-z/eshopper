<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
	}

	public function viewtransaksi()
	{
		$data['transaksi'] = $this->mod->tampil('transaksi')->result();
		$this->load->view('admin/transaksi/transaksi', $data);
	}

	public function dtltransaksi($id_transaksi)
	{
		$where = array('id_transaksi' => $id_transaksi );
		$data['kom'] = $this->mod->detaildata('transaksi', $where)->result();
		$this->load->view('admin/transaksi/detail-transaksi', $data);
	}

	public function hapustransaksi($id_transaksi)
	{
		$where = array('id_transaksi' => $id_transaksi );
		$this->mod->hapusdata('transaksi',$where);
		redirect('admin2/viewtransaksi');
	}
}

/* End of file admin2.php */
/* Location: ./application/controllers/admin2.php */