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
            $data = $this->db->get($this->nama_tabel);

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
}

/* End of file php_excel.php */
/* Location: ./application/controllers/php_excel.php */