<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('billing_model');
		$this->load->library('cart');
	}

	public function index()
	{
		$this->load->view('public/checkout');
	}

}

/* End of file checkout.php */
/* Location: ./application/controllers/checkout.php */