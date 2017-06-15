<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod extends CI_Model {

	public function tampil($table)
		{
			return $this->db->get($table);
		}	

	public function detaildata($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	public function updatedata($table,$where,$object)
	{
		$this->db->where($where);
		$this->db->update($table, $object);
	}

	public function tambahdata2($table,$object)
	{
		$this->db->insert($table, $object);
		return $this->db->insert_id();
	}

	public function tambahdata($table,$object)
	{
		$this->db->insert($table, $object);
	}

	public function hapusdata($table,$where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
		function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
}

/* End of file mod.php */
/* Location: ./application/models/mod.php */