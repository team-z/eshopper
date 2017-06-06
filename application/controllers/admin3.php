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
		$this->db->select('*');
		$this->db->from('pengiriman');
		$this->db->join('transaksi', 'transaksi.id_transaksi = pengiriman.id_transaksi');
		$join['data'] = $this->db->get()->result();
		$this->load->view('admin/pengiriman/pengiriman', $join);

	}

}

/* End of file admin3.php */
/* Location: ./application/controllers/admin3.php */