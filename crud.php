<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		->load->helper('url');
		->load->model('Model File');

	}

	// List all your items
	public function index()
	{
       ['user']= ->model_name->fetch('Table_name')->result();
       ->load->view('your_view_file',);
	}

	// Add a new item
	public function add()
	{
        = ->input->post('name');
        = ->input->post('email');
        = ->input->post('password');
        = ->input->post('address');

        = array(
       	'your_attribute' =>  ,
       	'your_attribute' =>  ,
       	'your_attribute' =>  ,
       	'your_attribute' =>  );

       ->model_name->add('Table_name',);
       redirect('crud/index');
	}

	//Update one item
	public function update()
	{
	    = ->input->post('name');
        = ->input->post('email');
        = ->input->post('password');
        = ->input->post('address');
        = array('your_attribute' => );
        = array(
       	'your_attribute' =>  ,
       	'your_attribute' =>  ,
       	'your_attribute' =>  ,
       	'your_attribute' =>  );
       ->model_name->update('Table_name',,);
       redirect('crud/index');

	}

	//Delete one item
	public function delete()
	{
		 = array('your_attribute' => );
		->model_name->delete('Table_name',);
		redirect('crud/index');
	}
}

/* End of file crud.php */
/* Location: .//C/xampp/htdocs/olshop/crud.php */
