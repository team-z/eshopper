<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Model File');

	}

	// List all your items
	public function index()
	{
       $data['user']= $this->model_name->fetch('Table_name')->result();
       $this->load->view('your_view_file',$data);
	}

	// Add a new item
	public function add()
	{
       $name = $this->input->post('name');
       $email = $this->input->post('email');
       $password = $this->input->post('password');
       $address = $this->input->post('address');

       $object = array(
       	'your_attribute' => $name ,
       	'your_attribute' => $email ,
       	'your_attribute' => $password ,
       	'your_attribute' => $address );

       $this->model_name->add('Table_name',$object);
       redirect('crud/index');
	}

	//Update one item
	public function update($id)
	{
	   $name = $this->input->post('name');
       $email = $this->input->post('email');
       $password = $this->input->post('password');
       $address = $this->input->post('address');
       $where = array('your_attribute' => $id);
       $object = array(
       	'your_attribute' => $name ,
       	'your_attribute' => $email ,
       	'your_attribute' => $password ,
       	'your_attribute' => $address );
       $this->model_name->update('Table_name',$object,$where);
       redirect('crud/index');

	}

	//Delete one item
	public function delete($id)
	{
		$where = array('your_attribute' => $id);
		$this->model_name->delete('Table_name',$where);
		redirect('crud/index');
	}
}

/* End of file crud.php */
/* Location: .//C/xampp/htdocs/olshop/crud.php */
