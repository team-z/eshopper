<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('billing_model');
        $this->load->library('cart');
	}

	public function index()
	{	
        $this->load->library('pagination');
    	$config['base_url'] = 'http://127.0.0.1/eshop/index.php/shopping/index/';
    	$config['total_rows'] = $this->db->get('barang')->num_rows();
    	$config['per_page'] = 6;
    	$config['num_links'] = 3;
    	include "paging_style.php";
    	$this->pagination->initialize($config);
    	$data['products']=$this->db->get('barang', $config['per_page'], $this->uri->segment(3))->result();
    	$data['kategori']=$this->db->get('kategori')->result();	
		$this->load->view('public/shop', $data);
	}
	public function cart()
	{
		$this->load->view('public/cart');
	}
	
	
	 function add()
	{
              // Set array for send data.
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 1
		);		

                 // This function add items into cart.
		$this->cart->insert($insert_data);
	      
                // This will show insert data in cart.
		redirect('shopping/cart');
	     }
	
		function remove($rowid) {
                    // Check rowid value.
		if ($rowid==="all"){
                       // Destroy data which store in  session.
			$this->cart->destroy();
		}else{
                    // Destroy selected rowid in session.
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                     // Update cart data, after cancle.
			$this->cart->update($data);
		}
		
                 // This will show cancle data in cart.
		redirect('shopping/cart');
	}
	
	    function update_cart(){
                
                // Recieve post values,calcute them and update
                $cart_info =  $_POST['cart'] ;
 		foreach( $cart_info as $id => $cart)
		{	
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    	$data = array(
				'rowid'   => $rowid,
                                'price'   => $price,
                                'amount' =>  $amount,
				'qty'     => $qty
			);
             
			$this->cart->update($data);
		}
		redirect('shopping/cart');        
	}	
        function billing_view(){
                // Load "billing_view".
		$this->load->view('public/checkout');
        }
        
        	public function save_order()
	{
          // This will store all values which inserted  from user.
		$rand = rand(17823,21563);
		$date = date("Y-m-d h:i:sa");
		$customer = array(
			'nama_pelanggan' 	=> $this->input->post('nama'),
			'no_pesanan'		=> $this->input->post('no_pesanan'),
			'email_pelanggan' 	=> $this->input->post('email'),
			'no_rekening' 			=> $this->input->post('no_rek'),
			'no_hp' 			=> $this->input->post('no_hp'),
			'bank'				=> $this->input->post('bank'),
			'tanggal_transaksi'	=> $date,
			'kode_vertifikasi'	=> $rand,
			'status'			=> 'PENDING'
		);		
                 // And store user imformation in database.
		$cust_id = $this->billing_model->insert_customer($customer);
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'id_transaksi' 		=> $cust_id,
					'nama_barang' 	=> $item['name'],
					'qty_pesanan' 		=> $item['qty'],
					'total_harga' 		=> $item['subtotal'],
					'tanggal_transaksi' => date("Y-m-d")
				);		

                            // Insert product imformation with order detail, store in cart also store in database. 
                
		    $this->billing_model->insert_order($order_detail);
			endforeach;
		endif;
	      
                // After storing all imformation in database load "billing_success".
                redirect('shopping/verify');
	}
	public function verify()
	{
		$this->load->view('public/verify');
	}
	public function verifyAction()
	{
		$where = array('kode_vertifikasi' => $this->input->post('kode'));
		$data['user'] = $this->billing_model->select('transaksi',$where)->result();
		$this->load->view('public/shipping', $data);
	}
}