<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Php_excel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->helper('form','url');
		$this->load->library(array('upload','PHPExcel'));
    $this->load->model('mod');
    if($this->session->userdata('status') != "login"){
      redirect('login/index');
    }
	}

	public function index() 
	{
    $data['barang'] = $this->db->get('barang')->result();
		$this->load->view('admin/barang/import.php', $data);
	}

  public function importfile()
  {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'xls|xlsx|csv';
    $config['max_size']  = '5000';
    
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
    if ( ! $this->upload->do_upload('file')){
      $error = array('error' => $this->upload->display_errors());
      $this->session->set_flashdata('message','Ada kesalah dalam upload');
      redirect('php_excel/index', 'refresh');
    }
    else{
      $data = array('upload_data' => $this->upload->data());
      $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
      $filename = $upload_data['file_name'];
      $this->mod->php_excelmodel($filename);
      unlink('./uploads/'.$filename);

      $data['pesan'] = '<div class="alert alert-success alert-dismissible">';
      $data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      $data['pesan'] .= '<h4><i class="icon fa fa-check"></i> Alert!</h4>';
      $data['pesan'] .= 'Success.. data berhasil dikirim';
      $data['pesan'] .= '</div>';
      $data['barang'] = $this->db->get('barang')->result();

      $this->load->view('admin/barang/import.php', $data);
    }
  }
  
  public function export()
  {
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
            header('Content-Disposition: attachment;filename="barang.xlsx"');

            //Download
            $objWriter->save("php://output");
  }

  public function export_1()
  {
    $objPHPExcel = new PHPExcel();
          //$data = $this->db->get($this->nama_tabel);
          $this->db->select('*');
          $this->db->from('transaksi');
          $this->db->join('pesanan', 'transaksi.id_transaksi = pesanan.id_transaksi');
          $this->db->join('pengiriman', 'transaksi.id_transaksi = pengiriman.id_transaksi');
          $data = $this->db->get();

            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Sample Sheet'); //sheet title

          $cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N");

          $val = array("id_transaksi","nama_pelanggan","email_pelanggan","no_hp","total_beli","no_rekening","bank","provinsi","kabupaten_kota","kecamatan","kelurahan","kodepos","alamat_lengkap_pengirim","tanggal_transaksi");

          for ($a=0; $a<14 ; $a++) { 
            $objset->setCellValue($cols[$a].'1', $val[$a]);

            //Setting lebar cell
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // id_transaksi
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // nama_pelanggan
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // email_pelanggan
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // no_hp
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // total_beli
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // no_rekening
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // bank
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // provinsi
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // kabupaten_kota
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25); // kecamatan
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // kelurahan
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25); // kodepos
            $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25); // alamat_lengkap_pg
            $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25); // tanggal_transaksi
            
            
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
                $objset->setCellValue("E".$baris, $data->total_harga); //membaca data total_beli
                $objset->setCellValue("F".$baris, $data->no_rekening); //membaca data no_rekening
                $objset->setCellValue("G".$baris, $data->bank); //membaca data bank
                $objset->setCellValue("H".$baris, $data->provinsi); //membaca data provinsi
                $objset->setCellValue("I".$baris, $data->kabupaten_kota); //membaca data kabupaten_kota
                $objset->setCellValue("J".$baris, $data->kecamatan); //membaca data kecamatan
                $objset->setCellValue("K".$baris, $data->kelurahan); //membaca data kelurahan
                $objset->setCellValue("L".$baris, $data->kodepos); //membaca data kodepos
                $objset->setCellValue("M".$baris, $data->alamat_lengkap); //membaca data alamat_lengkap
                $objset->setCellValue("N".$baris, $data->tanggal_transaksi); //membaca data tanggal_transaksi

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
            header('Content-Disposition: attachment;filename="transaksi.xlsx"');

            //Download
            $objWriter->save("php://output");
  }
}

/* End of file php_excel.php */
/* Location: ./application/controllers/php_excel.php */