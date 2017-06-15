<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form','url');
		$this->load->library('upload');
		$this->load->model('mod');
	}

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function tambahbarang()
	{
		$this->load->view('admin/barang/tambahbarang');
	}

	public function tambahkategori()
	{
		$kategori=$this->input->post('kategori');
		$object = array('nama' => $kategori);
		$this->mod->tambahdata('kategori',$object);
		redirect('admin/tambahbarang');
	}

	public function viewbarang()
	{
		$data['barang'] = $this->mod->tampil('barang')->result();
		$this->load->view('admin/barang/barang', $data);
	}

	public function detailbarang($id_barang)
	{
		$where = array('id_barang' => $id_barang );
		$file['data'] = $this->mod->detaildata('barang',$where)->result();
		$this->load->view('admin/barang/detailbarang', $file);
	}

	public function edit($id_barang)
	{
		$where = array('id_barang' => $id_barang );
		$up['data'] = $this->mod->detaildata('barang', $where)->result();
		$this->load->view('admin/barang/updatebarang', $up);
	}

	public function update()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '5000';
		$config['max_width']  = '6000';
		$config['max_height']  = '2048';
		
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$gambar = "";
		}
		else{
			$gambar = $this->upload->file_name;
		}
			$id_barang = $this->input->post('id_barang');
			$nama_barang = $this->input->post('nama_barang');
			$kategori = $this->input->post('kategori');
			$qty = $this->input->post('qty');
			$harga_barang = $this->input->post('harga_barang');
			$discount = $this->input->post('discount');
			$suplier = $this->input->post('suplier');
			$alamat_suplier = $this->input->post('alamat_suplier');
			$spesifikasi = $this->input->post('spesifikasi');

			$where = array('id_barang' => $id_barang);

			$object = array('id_barang' => $id_barang,
							'nama_barang' => $nama_barang,
							'kategori' => $kategori,
							'qty' => $qty,
							'harga_barang' => $harga_barang,
							'discount' => $discount,
							'suplier' => $suplier,
							'alamat_suplier' => $alamat_suplier,
							'spesifikasi' => $spesifikasi,
							'image' => $gambar );

			$this->mod->updatedata('barang', $where, $object);
			redirect('admin/viewbarang');
	}

	public function info()
	{	
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$kategori = $this->input->post('kategori');
		$harga_barang = $this->input->post('harga_barang');
		$discount = $this->input->post('discount');
		$spesifikasi = $this->input->post('spesifikasi');
		$gambar = $this->input->post('image');
		$where = array('id_barang' => $id_barang );

		$object = array('id_barang' => $id_barang, 
						'nama_barang' => $nama_barang,
						'kategori' => $kategori,
						'harga_barang' => $harga_barang,
						'discount' => $discount,
						'spesifikasi' => $spesifikasi);

		$this->mod->updatedata('barang', $where, $object);
		redirect('admin/viewbarang');
	}

	public function tambah()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '5000';
		$config['max_width']  = '6000';
		$config['max_height']  = '2048';
		
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$gambar = "";
		}
		else{
			$gambar = $this->upload->file_name;
		}

			$nama_barang = $this->input->post('nama_barang');
			$kategori = $this->input->post('kategori');
			$qty = $this->input->post('qty');
			$harga_barang = $this->input->post('harga_barang');
			$discount = $this->input->post('discount');
			$suplier = $this->input->post('suplier');
			$alamat_suplier = $this->input->post('alamat_suplier');
			$spesifikasi = $this->input->post('spesifikasi');

			$object = array('nama_barang' => $nama_barang,
							'kategori' => $kategori,
							'qty' => $qty,
							'harga_barang' => $harga_barang,
							'discount' => $discount,
							'suplier' => $suplier,
							'alamat_suplier' => $alamat_suplier,
							'spesifikasi' => $spesifikasi,
							'image' => $gambar );

			$this->mod->tambahdata2('barang', $object);
			redirect('admin/viewbarang');
	}

	public function hapus($id_barang)
	{
		$where = array('id_barang' => $id_barang );
		$this->mod->hapusdata('barang',$where);
		redirect('admin/viewbarang');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */