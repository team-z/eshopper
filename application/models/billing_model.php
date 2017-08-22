<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model {
    
     // Get all details ehich store in "products" table in database.
        public function get_all()
	{
		return $this->db->get('barang')->result();
	}
    
    // Insert customer details in "customer" table in database.
	public function insert_customer($data)
	{
		$this->db->insert('transaksi', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;		
	}
	
        // Insert order date with customer id in "orders" table in database.
	public function insert_order($data)
	{
		$this->db->insert('pesanan', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
        // Insert ordered product detail in "order_detail" table in database.
	public function insert_order_detail($data)
	{
		$this->db->insert('order_detail', $data);
	}

	// Get one Item
    public function select($table,$where)
    {
    	$this->db->where($where);
    	return $this->db->get($table);
    }

    //Login
    public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function provinsi(){
		$this->db->order_by('name','ASC');
		$provinces= $this->db->get('provinces');
		return $provinces->result_array();
	}

	function kabupaten($provId){
		$kabupaten="<option value='0'>-- Pilih Kabupaten --</option>";
		$this->db->order_by('name','ASC');
		$kab= $this->db->get_where('regencies',array('province_id'=>$provId));
		foreach ($kab->result_array() as $data ){
			$kabupaten.= "<option value='$data[id]'>$data[name]</option>";
		}
		return $kabupaten; 
	}

	function kecamatan($kabId){
		$kecamatan="<option value='0'>-- Pilih Kecamatan --</option>";
		$this->db->order_by('name','ASC');
		$kec= $this->db->get_where('districts',array('regency_id'=>$kabId));
		foreach ($kec->result_array() as $data ){
		$kecamatan.= "<option value='$data[id]'>$data[name]</option>";
		}
		return $kecamatan;
	}	

	function kelurahan($kecId){
		$kelurahan="<option value='0'>-- Pilih Kelurahan --</option>";
		$this->db->order_by('name','ASC');
		$kel= $this->db->get_where('villages',array('district_id'=>$kecId));
		foreach ($kel->result_array() as $data ){
		$kelurahan.= "<option value='$data[id]'>$data[name]</option>";
		}
		return $kelurahan;
	}
}