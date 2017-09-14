<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form','download');
		$this->load->library(array('upload','PHPExcel'));
		$this->load->model('mod');
		if($this->session->userdata('status') != "login"){
			redirect('login/index');
		}
	}

	public function index()
	{
		$this->load->view('admin/export/view_export');
	}

	public function laporan_barang()
	{
		$kategori = $this->input->post('kategori');
		$laporan = $this->input->post('laporan');

		if ($laporan == 'excel') {
			if ($kategori == 'semua') {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get($this->nama_tabel);
		          $this->db->select('id_barang, nama_barang, kategori, qty, harga_barang, discount, spesifikasi, suplier, alamat_suplier');
		          $this->db->from('barang');
		          $data = $this->db->get();

		            // Nama Field Baris Pertama
		          $fields = $data->list_fields();
		          $col = 0;
		          foreach ($fields as $field)
		          {
		              $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
		              $col++;
		          }
		   
		          // Mengambil Data
		          $row = 2;
		          foreach($data->result() as $data)
		          {
		              $col = 0;
		              foreach ($fields as $field)
		              {
		                  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
		                  $col++;
		              }
		   
		              $row++;
		          }
		          $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('barang');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_barang.xlsx"');

		            //Download
		            $objWriter->save("php://output");
			} else {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get($this->nama_tabel);
		          $this->db->select('id_barang, nama_barang, kategori, qty, harga_barang, discount, spesifikasi, suplier, alamat_suplier');
		          $this->db->from('barang');
		          $this->db->where('kategori', $kategori);
		          $data = $this->db->get();

		            // Nama Field Baris Pertama
		          $fields = $data->list_fields();
		          $col = 0;
		          foreach ($fields as $field)
		          {
		              $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
		              $col++;
		          }
		   
		          // Mengambil Data
		          $row = 2;
		          foreach($data->result() as $data)
		          {
		              $col = 0;
		              foreach ($fields as $field)
		              {
		                  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
		                  $col++;
		              }
		   
		              $row++;
		          }
		          $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('barang');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_barang.xlsx"');

		            //Download
		            $objWriter->save("php://output");
			}
			
		} elseif ($laporan == 'pdf') {
			if ($kategori == 'semua') {
				$data['barang'] = $this->mod->tampil('barang')->result();
				$this->load->view('admin/barang/barang_pdf.php', $data);
			} else {
				$where = array('kategori' => $kategori );
				$data['barang'] = $this->mod->detaildata('barang', $where)->result();
				
				$this->load->view('admin/export/unduh_pdf3', $data);
			}
			
		} else{
			echo "mohon klik salah satu dari opsi tadi";
		}
		
	}

	public function laporan_transaksi()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$laporan = $this->input->post('laporan');

		if ($laporan == "pdf") {
			if ($bulan == 'semua' && $tahun == 'semua') {
				$data['thn'] = $this->db->get('transaksi')->result();
				$this->load->view('admin/export/unduh_pdf', $data);

			} elseif ($bulan == 'semua' && $tahun != 'semua') {
				$data['thn'] = $this->db->query("SELECT * FROM transaksi WHERE date_format(tanggal_transaksi, '%Y')='$tahun' ")->result();
				$this->load->view('admin/export/unduh_pdf', $data);

			} elseif ($bulan != 'semua' && $tahun == 'semua') {
				$data['thn'] = $this->db->query("SELECT * FROM transaksi WHERE date_format(tanggal_transaksi, '%m')='$bulan' ")->result();
				$this->load->view('admin/export/unduh_pdf', $data);

			} elseif ($bulan != 'semua' && $tahun != 'semua') {
				$data['thn'] = $this->db->query("SELECT * FROM transaksi WHERE date_format(tanggal_transaksi, '%Y')='$tahun' AND date_format(tanggal_transaksi, '%m')='$bulan' ")->result();
				$this->load->view('admin/export/unduh_pdf', $data);

			}
			
		} elseif ($laporan == "excel") {
			if ($bulan == 'semua' && $tahun == 'semua') {
				$objPHPExcel = new PHPExcel();
		          $data = $this->db->get('transaksi');

		            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
		 
		            $objget->setTitle('Sample Sheet'); //sheet title

		          $cols = array("A","B","C","D","E","F","G");

		          $val = array("id_transaksi","nama_pelanggan","email_pelanggan","no_hp","no_rekening","bank","tanggal_transaksi");

		          for ($a=0; $a<7 ; $a++) { 
		            $objset->setCellValue($cols[$a].'1', $val[$a]);

		            //Setting lebar cell
		            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // email_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // no_hp
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // no_rekening
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // bank
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // tanggal_trans
		            
		            
		          }

		          // Mengambil Data
		          $baris = 2;
		          foreach($data->result() as $data)
		          {
		               //pemanggilan sesuaikan dengan nama kolom tabel
		                $objset->setCellValue("A".$baris, $data->id_transaksi); //membaca data id
		                $objset->setCellValue("B".$baris, $data->nama_pelanggan); //membaca data nama
		                $objset->setCellValue("C".$baris, $data->email_pelanggan); //membaca data email
		                $objset->setCellValue("D".$baris, $data->no_hp); //membaca data no.hp
		                $objset->setCellValue("E".$baris, $data->no_rekening); //membaca data no_rekening
		                $objset->setCellValue("F".$baris, $data->bank); //membaca data bank
		                $objset->setCellValue("G".$baris, $data->tanggal_transaksi); //membaca data tanggal_transaksi

		                $baris++;
		          }
		            $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('transaksi');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_transaksi.xlsx"');

		            //Download
		            $objWriter->save("php://output");

			} elseif ($bulan == 'semua' && $tahun != 'semua') {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get('transaksi');
					$data = $this->db->query("SELECT * FROM transaksi WHERE date_format(tanggal_transaksi, '%Y')='$tahun' ");

		            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
		 
		            $objget->setTitle('Sample Sheet'); //sheet title

		          $cols = array("A","B","C","D","E","F","G");

		          $val = array("id_transaksi","nama_pelanggan","email_pelanggan","no_hp","no_rekening","bank","tanggal_transaksi");

		          for ($a=0; $a<7 ; $a++) { 
		            $objset->setCellValue($cols[$a].'1', $val[$a]);

		            //Setting lebar cell
		            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // email_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // no_hp
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // no_rekening
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // bank
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // tanggal_trans
		            
		            
		          }

		          // Mengambil Data
		          $baris = 2;
		          foreach($data->result() as $data)
		          {
		               //pemanggilan sesuaikan dengan nama kolom tabel
		                $objset->setCellValue("A".$baris, $data->id_transaksi); //membaca data id
		                $objset->setCellValue("B".$baris, $data->nama_pelanggan); //membaca data nama
		                $objset->setCellValue("C".$baris, $data->email_pelanggan); //membaca data email
		                $objset->setCellValue("D".$baris, $data->no_hp); //membaca data no.hp
		                $objset->setCellValue("E".$baris, $data->no_rekening); //membaca data no_rekening
		                $objset->setCellValue("F".$baris, $data->bank); //membaca data bank
		                $objset->setCellValue("G".$baris, $data->tanggal_transaksi); //membaca data tanggal_transaksi

		                $baris++;
		          }
		            $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('transaksi');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_transaksi.xlsx"');

		            //Download
		            $objWriter->save("php://output");

			} elseif ($bulan != 'semua' && $tahun == 'semua') {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get('transaksi');
					$data = $this->db->query("SELECT * FROM transaksi WHERE date_format(tanggal_transaksi, '%m')='$bulan' ");

		            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
		 
		            $objget->setTitle('Sample Sheet'); //sheet title

		          $cols = array("A","B","C","D","E","F","G");

		          $val = array("id_transaksi","nama_pelanggan","email_pelanggan","no_hp","no_rekening","bank","tanggal_transaksi");

		          for ($a=0; $a<7 ; $a++) { 
		            $objset->setCellValue($cols[$a].'1', $val[$a]);

		            //Setting lebar cell
		            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // email_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // no_hp
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // no_rekening
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // bank
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // tanggal_trans
		            
		            
		          }

		          // Mengambil Data
		          $baris = 2;
		          foreach($data->result() as $data)
		          {
		               //pemanggilan sesuaikan dengan nama kolom tabel
		                $objset->setCellValue("A".$baris, $data->id_transaksi); //membaca data id
		                $objset->setCellValue("B".$baris, $data->nama_pelanggan); //membaca data nama
		                $objset->setCellValue("C".$baris, $data->email_pelanggan); //membaca data email
		                $objset->setCellValue("D".$baris, $data->no_hp); //membaca data no.hp
		                $objset->setCellValue("E".$baris, $data->no_rekening); //membaca data no_rekening
		                $objset->setCellValue("F".$baris, $data->bank); //membaca data bank
		                $objset->setCellValue("G".$baris, $data->tanggal_transaksi); //membaca data tanggal_transaksi

		                $baris++;
		          }
		            $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('transaksi');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_transaksi.xlsx"');

		            //Download
		            $objWriter->save("php://output");

			} elseif ($bulan != 'semua' && $tahun != 'semua') {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get('transaksi');
					$data = $this->db->query("SELECT * FROM transaksi WHERE date_format(tanggal_transaksi, '%Y')='$tahun' AND date_format(tanggal_transaksi, '%m')='$bulan' ");

		            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
		 
		            $objget->setTitle('Sample Sheet'); //sheet title

		          $cols = array("A","B","C","D","E","F","G");

		          $val = array("id_transaksi","nama_pelanggan","email_pelanggan","no_hp","no_rekening","bank","tanggal_transaksi");

		          for ($a=0; $a<7 ; $a++) { 
		            $objset->setCellValue($cols[$a].'1', $val[$a]);

		            //Setting lebar cell
		            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // email_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // no_hp
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // no_rekening
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // bank
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // tanggal_trans
		            
		            
		          }

		          // Mengambil Data
		          $baris = 2;
		          foreach($data->result() as $data)
		          {
		               //pemanggilan sesuaikan dengan nama kolom tabel
		                $objset->setCellValue("A".$baris, $data->id_transaksi); //membaca data id
		                $objset->setCellValue("B".$baris, $data->nama_pelanggan); //membaca data nama
		                $objset->setCellValue("C".$baris, $data->email_pelanggan); //membaca data email
		                $objset->setCellValue("D".$baris, $data->no_hp); //membaca data no.hp
		                $objset->setCellValue("E".$baris, $data->no_rekening); //membaca data no_rekening
		                $objset->setCellValue("F".$baris, $data->bank); //membaca data bank
		                $objset->setCellValue("G".$baris, $data->tanggal_transaksi); //membaca data tanggal_transaksi

		                $baris++;
		          }
		            $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('transaksi');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_transaksi.xlsx"');

		            //Download
		            $objWriter->save("php://output");
			}
			
		} else {
			echo "mohon klik salah satu dari opsi tadi";
		}
		
	}

	public function laporan_pengiriman()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$laporan = $this->input->post('laporan');

		if ($laporan == 'excel') {
			if ($bulan == 'semua' && $tahun == 'semua') {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get($this->nama_tabel);
		          $this->db->select('*');
				  $this->db->from('pengiriman');
				  $this->db->join('transaksi', 'pengiriman.id_transaksi = transaksi.id_transaksi');
		          $data = $this->db->get();

		            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
		 
		            $objget->setTitle('Sample Sheet'); //sheet title

		          $cols = array("A","B","C","D","E","F","G","H","I");

		          $val = array("id_transaksi","nama_pelanggan","provinsi","kabupaten_kota","kecamatan","kelurahan","alamat_pengiriman","kodepos","tanggal_pengiriman");

		          for ($a=0; $a<9 ; $a++) { 
		            $objset->setCellValue($cols[$a].'1', $val[$a]);

		            //Setting lebar cell
		            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // provinsi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // kabupaten_kota
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // kecamatan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // kelurahan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // alamat_peng
		            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // kodepos
		            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // tanggal_pengiriman
		            
		            
		          }

		          // Mengambil Data
		          $baris = 2;
		          foreach($data->result() as $data)
		          {
		               //pemanggilan sesuaikan dengan nama kolom tabel
		                $objset->setCellValue("A".$baris, $data->id_transaksi); //membaca data id
		                $objset->setCellValue("B".$baris, $data->nama_pelanggan); //membaca data nama_pelanggan
		                $objset->setCellValue("C".$baris, $data->provinsi); //membaca provinsi
		                $objset->setCellValue("D".$baris, $data->kabupaten_kota); //membaca kabupaten_kota
		                $objset->setCellValue("E".$baris, $data->kecamatan); //membaca data kecamatan
		                $objset->setCellValue("F".$baris, $data->kelurahan); //membaca data kelurahan
		                $objset->setCellValue("G".$baris, $data->alamat_lengkap); //membaca data alamat_lengkap
		                $objset->setCellValue("H".$baris, $data->kodepos); //membaca kodepos
		                $objset->setCellValue("I".$baris, $data->tanggal_transaksi); //membaca data tanggal
		                $baris++;
		          }
		            $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('pengiriman');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_pengiriman.xlsx"');

		            //Download
		            $objWriter->save("php://output");

			} elseif ($bulan == 'semua' && $tahun != 'semua') {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get($this->nama_tabel);
		          $data = $this->db->query("SELECT a.*, b.* FROM pengiriman as a LEFT JOIN transaksi as b ON a.id_transaksi = b.id_transaksi WHERE date_format(tanggal, '%Y')='$tahun' ");

		            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
		 
		            $objget->setTitle('Sample Sheet'); //sheet title

		          $cols = array("A","B","C","D","E","F","G","H","I");

		          $val = array("id_transaksi","nama_pelanggan","provinsi","kabupaten_kota","kecamatan","kelurahan","alamat_pengiriman","kodepos","tanggal_pengiriman");

		          for ($a=0; $a<9 ; $a++) { 
		            $objset->setCellValue($cols[$a].'1', $val[$a]);

		            //Setting lebar cell
		            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // provinsi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // kabupaten_kota
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // kecamatan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // kelurahan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // alamat_peng
		            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // kodepos
		            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // tanggal_pengiriman
		            
		            
		          }

		          // Mengambil Data
		          $baris = 2;
		          foreach($data->result() as $data)
		          {
		               //pemanggilan sesuaikan dengan nama kolom tabel
		                $objset->setCellValue("A".$baris, $data->id_transaksi); //membaca data id
		                $objset->setCellValue("B".$baris, $data->nama_pelanggan); //membaca data nama_pelanggan
		                $objset->setCellValue("C".$baris, $data->provinsi); //membaca provinsi
		                $objset->setCellValue("D".$baris, $data->kabupaten_kota); //membaca kabupaten_kota
		                $objset->setCellValue("E".$baris, $data->kecamatan); //membaca data kecamatan
		                $objset->setCellValue("F".$baris, $data->kelurahan); //membaca data kelurahan
		                $objset->setCellValue("G".$baris, $data->alamat_lengkap); //membaca data alamat_lengkap
		                $objset->setCellValue("H".$baris, $data->kodepos); //membaca kodepos
		                $objset->setCellValue("I".$baris, $data->tanggal_transaksi); //membaca data tanggal
		                $baris++;
		          }
		            $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('pengiriman');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_pengiriman.xlsx"');

		            //Download
		            $objWriter->save("php://output");

			} elseif ($bulan != 'semua' && $tahun == 'semua') {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get($this->nama_tabel);
		          $data = $this->db->query("SELECT a.*, b.* FROM pengiriman as a LEFT JOIN transaksi as b ON a.id_transaksi = b.id_transaksi WHERE date_format(tanggal, '%m')='$bulan' ");

		            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
		 
		            $objget->setTitle('Sample Sheet'); //sheet title

		          $cols = array("A","B","C","D","E","F","G","H","I");

		          $val = array("id_transaksi","nama_pelanggan","provinsi","kabupaten_kota","kecamatan","kelurahan","alamat_pengiriman","kodepos","tanggal_pengiriman");

		          for ($a=0; $a<9 ; $a++) { 
		            $objset->setCellValue($cols[$a].'1', $val[$a]);

		            //Setting lebar cell
		            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // provinsi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // kabupaten_kota
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // kecamatan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // kelurahan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // alamat_peng
		            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // kodepos
		            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // tanggal_pengiriman
		            
		            
		          }

		          // Mengambil Data
		          $baris = 2;
		          foreach($data->result() as $data)
		          {
		               //pemanggilan sesuaikan dengan nama kolom tabel
		                $objset->setCellValue("A".$baris, $data->id_transaksi); //membaca data id
		                $objset->setCellValue("B".$baris, $data->nama_pelanggan); //membaca data nama_pelanggan
		                $objset->setCellValue("C".$baris, $data->provinsi); //membaca provinsi
		                $objset->setCellValue("D".$baris, $data->kabupaten_kota); //membaca kabupaten_kota
		                $objset->setCellValue("E".$baris, $data->kecamatan); //membaca data kecamatan
		                $objset->setCellValue("F".$baris, $data->kelurahan); //membaca data kelurahan
		                $objset->setCellValue("G".$baris, $data->alamat_lengkap); //membaca data alamat_lengkap
		                $objset->setCellValue("H".$baris, $data->kodepos); //membaca kodepos
		                $objset->setCellValue("I".$baris, $data->tanggal_transaksi); //membaca data tanggal
		                $baris++;
		          }
		            $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('pengiriman');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_pengiriman.xlsx"');

		            //Download
		            $objWriter->save("php://output");

			} elseif ($bulan != 'semua' && $tahun != 'semua') {
				$objPHPExcel = new PHPExcel();
		          //$data = $this->db->get($this->nama_tabel);
		          $data = $this->db->query("SELECT a.*, b.* FROM pengiriman as a LEFT JOIN transaksi as b ON a.id_transaksi = b.id_transaksi WHERE date_format(tanggal, '%Y')='$tahun' AND date_format(tanggal, '%m')='$bulan' ");

		            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
		 
		            $objget->setTitle('Sample Sheet'); //sheet title

		          $cols = array("A","B","C","D","E","F","G","H","I");

		          $val = array("id_transaksi","nama_pelanggan","provinsi","kabupaten_kota","kecamatan","kelurahan","alamat_pengiriman","kodepos","tanggal_pengiriman");

		          for ($a=0; $a<9 ; $a++) { 
		            $objset->setCellValue($cols[$a].'1', $val[$a]);

		            //Setting lebar cell
		            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // provinsi
		            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // kabupaten_kota
		            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // kecamatan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // kelurahan
		            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // alamat_peng
		            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // kodepos
		            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // tanggal_pengiriman
		            
		            
		          }

		          // Mengambil Data
		          $baris = 2;
		          foreach($data->result() as $data)
		          {
		               //pemanggilan sesuaikan dengan nama kolom tabel
		                $objset->setCellValue("A".$baris, $data->id_transaksi); //membaca data id
		                $objset->setCellValue("B".$baris, $data->nama_pelanggan); //membaca data nama_pelanggan
		                $objset->setCellValue("C".$baris, $data->provinsi); //membaca provinsi
		                $objset->setCellValue("D".$baris, $data->kabupaten_kota); //membaca kabupaten_kota
		                $objset->setCellValue("E".$baris, $data->kecamatan); //membaca data kecamatan
		                $objset->setCellValue("F".$baris, $data->kelurahan); //membaca data kelurahan
		                $objset->setCellValue("G".$baris, $data->alamat_lengkap); //membaca data alamat_lengkap
		                $objset->setCellValue("H".$baris, $data->kodepos); //membaca kodepos
		                $objset->setCellValue("I".$baris, $data->tanggal_transaksi); //membaca data tanggal
		                $baris++;
		          }
		            $objPHPExcel->setActiveSheetIndex(0);

		            //Set Title
		            $objPHPExcel->getActiveSheet()->setTitle('pengiriman');
		 
		            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
		            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		 
		            //Header
		            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		            header("Cache-Control: no-store, no-cache, must-revalidate");
		            header("Cache-Control: post-check=0, pre-check=0", false);
		            header("Pragma: no-cache");
		            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		            //Nama File
		            header('Content-Disposition: attachment;filename="laporan_pengiriman.xlsx"');

		            //Download
		            $objWriter->save("php://output");
			}
			
		} elseif ($laporan == 'pdf') {
			if ($bulan == 'semua' && $tahun == 'semua') {
				$this->db->select('*');
				$this->db->from('pengiriman');
				$this->db->join('transaksi', 'pengiriman.id_transaksi = transaksi.id_transaksi');
				$data['pengiriman'] = $this->db->get()->result();
				$this->load->view('admin/export/unduh_pdf2', $data);

			} elseif ($bulan == 'semua' && $tahun != 'semua') {
				$data['pengiriman'] = $this->db->query("SELECT a.*, b.* FROM pengiriman as a LEFT JOIN transaksi as b ON a.id_transaksi = b.id_transaksi WHERE date_format(tanggal, '%Y')='$tahun' ")->result();
				$this->load->view('admin/export/unduh_pdf2', $data);

			} elseif ($bulan != 'semua' && $tahun == 'semua') {
				$data['pengiriman'] = $this->db->query("SELECT a.*, b.* FROM pengiriman as a LEFT JOIN transaksi as b ON a.id_transaksi = b.id_transaksi WHERE date_format(tanggal, '%m')='$bulan' ")->result();
				$this->load->view('admin/export/unduh_pdf2', $data);

			} elseif ($bulan != 'semua' && $tahun != 'semua') {
				$data['pengiriman'] = $this->db->query("SELECT a.*, b.* FROM pengiriman as a LEFT JOIN transaksi as b ON a.id_transaksi = b.id_transaksi WHERE date_format(tanggal, '%Y')='$tahun' AND date_format(tanggal, '%m')='$bulan' ")->result();
				$this->load->view('admin/export/unduh_pdf2', $data);

			}
		} else {
			echo "mohon klik salah satu dari opsi tadi";
		}
		
	}

}

/* End of file export.php */
/* Location: ./application/controllers/export.php */