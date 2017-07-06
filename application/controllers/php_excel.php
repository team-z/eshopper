<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Php_excel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory.php'));
        $this->load->model("php_excelmod");
	}

	public function index() 
	{
        $data['barang'] = $this->db->get('barang')->result();
		$this->load->view('admin/barang/import.php', $data);
	}

    public function upload()
    {
        if(isset($_POST["import"]))
          {
              $filename=$_FILES["file"]["tmp_name"];
              if($_FILES["file"]["size"] > 0)
                {
                  $file = fopen($filename, "r");
                   while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
                   {
                          $data = array(
                              'id_barang' => $importdata[0],
                              'nama_barang' =>$importdata[1],
                              'kategori' => $importdata[2],
                              'qty' => $importdata[3],
                              'harga_barang' => $importdata[4],
                              'discount' => $importdata[5],
                              'spesifikasi' => $importdata[6],
                              'suplier' => $importdata[7],
                              'alamat_suplier' => $importdata[8]
                              );
                   $insert = $this->db->insert('barang', $data);
                   }                    
                  fclose($file);
        $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('php_excel/index');
                }else{
        $this->session->set_flashdata('message', 'Something went wrong..');
        redirect('php_excel/index');
            }
          }
    }
}

/* End of file php_excel.php */
/* Location: ./application/controllers/php_excel.php */