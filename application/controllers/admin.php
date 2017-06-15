<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form','url');
		$this->load->library('upload');
		$this->load->model('mod');
		if($this->session->userdata('status') != "login"){
			redirect('login/index');
		}
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

	public function viewimport()
	{
		$data['barang'] = $this->mod->tampil('barang')->result();
		$this->load->view('admin/barang/import.php',$data);
	}

	public function edit($id_barang)
	{
		$where = array('id_barang' => $id_barang );
		$up['data'] = $this->mod->detaildata('barang', $where)->result();
		$this->load->view('admin/barang/updatebarang', $up);
	}

	public function unduh_excel()
	{
		$data['barang'] = $this->mod->tampil('barang')->result();
		$this->load->view('admin/barang/barang_excel.php', $data);
	}

	public function unduh_pdf()
	{
		$data['barang'] = $this->mod->tampil('barang')->result();
		$this->load->view('admin/barang/barang_pdf.php', $data);
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

	public function buat_template()
	{
		$this->load->view('admin/barang/tabel-barang');
	}

	public function import()
	{
		$fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
		   while($csv_line = fgetcsv($fp,1024)) 
		   {
		 for ($i = 0, $j = count($csv_line); $i < $j; $i++) 
		   {
		 
		 
		    $insert_csv = array();
		    $insert_csv['id_barang'] = $csv_line[0];
		    $insert_csv['nama_barang'] = $csv_line[1];
		    $insert_csv['authorized'] = $csv_line[2];
		    $insert_csv['address'] = $csv_line[3];
		    $insert_csv['contact_no'] = $csv_line[4];
		    $insert_csv['mobile_no'] = $csv_line[5];
		    $insert_csv['fax'] = $csv_line[6];
		    $insert_csv['email_id'] = $csv_line[7];
		    $insert_csv['website_addr'] = $csv_line[8];
		    $insert_csv['state'] = $csv_line[9];
		    $insert_csv['city'] = $csv_line[10];
		   
		   }
		 
		   $data = array(
		    'id_barang' => $insert_csv['id_barang'] ,
		    'nama_barang' => $insert_csv['nama_barang'],
		    'authorized' => $insert_csv['authorized'],
		    'address' => $insert_csv['address'] ,
		    'contact_no' => $insert_csv['contact_no'],
		    'mobile_no' => $insert_csv['mobile_no'],
		    'fax' => $insert_csv['fax'] ,
		    'email_id' => $insert_csv['email_id'] ,
		    'website_addr' => $insert_csv['website_addr'],
		    'state' => $insert_csv['state'],
		    'city' => $insert_csv['city']);
		       $data['crane_features']=$this->db->insert('sampledata', $data);
		      }
		                   fclose($fp) or die("can't close file");
		        $data['success']="success";
		        return $data;
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */