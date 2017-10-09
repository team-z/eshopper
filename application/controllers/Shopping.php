<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('billing_model');
		$this->load->model('mod');
        $this->load->library('cart');
	}

	public function index()
	{	
        $this->load->library('pagination');
    	$config['base_url'] = 'http://127.0.0.1/eshopper/index.php/shopping/index/';
    	$config['total_rows'] = $this->db->get('barang')->num_rows();
    	$config['per_page'] = 12;
    	$config['num_links'] = 3;
    	include "paging_style.php";
    	$this->pagination->initialize($config);
    	$data['products']=$this->db->get('barang', $config['per_page'], $this->uri->segment(3))->result();
    	$data['kategori']=$this->db->get('kategori')->result();	
		$this->load->view('public/shop', $data);
	}

	public function detail($id)
	{
		$where = array('id_barang' => $id);
		$data['barang'] = $this->mod->detaildata('barang',$where)->result();
		$this->load->view('public/detail',$data);

	}
	public function daftar()
	{
		$object = array('nama_user' => $this->input->post('name') ,
		                'email' => $this->input->post('email')  ,
		                'password' => $this->input->post('password'));
		$this->mod->tambahdata('user',$object);
		redirect('shopping/login');
	}

	public function cart()
	{
		$this->load->view('public/cart');
	}
	
	public function addd()
	{
		if ($this->input->post('qty')>30) {
			echo "kenek";
		}else{
			
			
		}
	}
	
	 function add()
	{
              // Set array for send data.
		$brg = $this->mod->detaildata('barang',$where)->result();
		if ($this->input->post('qty')>$brg[0]->qty) {
			redirect('shopping/detail/'.$this->input->post('id'));
		}else {
			$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty')
		);		

                 // This function add items into cart.
		$this->cart->insert($insert_data);
	      
                // This will show insert data in cart.
		redirect('shopping/cart');
		}
		
	     }
	  function add_direct()
	{
              // Set array for send data.
		$where = array('id_barang' => $this->input->post('id'));
		$brg = $this->mod->detaildata('barang',$where)->result();
		if ($this->input->post('qty')>$brg[0]->qty) {
			redirect('shopping/detail/'.$this->input->post('id'));
		}else {
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
        $data['provinsi']=$this->billing_model->provinsi();
		$this->load->view('public/checkout',$data);
        }
    function ambil_data(){
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');
		if($modul=="kabupaten"){
			echo $this->billing_model->kabupaten($id);
		}
		else if($modul=="kecamatan"){
			echo $this->billing_model->kecamatan($id);

		}
		else if($modul=="kelurahan"){
			echo $this->billing_model->kelurahan($id);
		}
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
			'no_rekening' 		=> $this->input->post('no_rek'),
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

		//fetching barang
		$where = array('id_barang' => $item['id']);
		$row = $this->mod->detaildata('barang',$where)->result();
		$stok = $row[0]->qty - $item['qty'];
		$where1 = array('id_barang' => $item['id']);
		$object = array('qty' => $stok );
		$this->mod->updatedata('barang',$where1,$object);
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
		//konversi id lokasi menjadi nama
		$w1 = array('id' => $this->input->post('provinsi'));
		$row_prov = $this->mod->detaildata('provinces',$w1)->result();
		$w2 = array('id' => $this->input->post('kabupaten'));
		$row_kab = $this->mod->detaildata('regencies',$w2)->result();
		$w3 = array('id' => $this->input->post('kecamatan'));
		$row_kec = $this->mod->detaildata('districts',$w3)->result();
		$w4 = array('id' => $this->input->post('kelurahan'));
		$row_kel = $this->mod->detaildata('villages',$w4)->result();
		//fetching data toko
		$toko = $this->mod->tampil('toko')->result();
		//letak pencarian biaya ongkir
		$ongkir = array('kota_asal' => $toko[0]->lokasi_sekarang ,
						'kabupaten' => $row_kab[0]->name ,
						'kecamatan' => $row_kec[0]->name ,
						'kelurahan' => $row_kel[0]->name );
		//fetching data lokasi
		$row_ong = $this->mod->detaildata('lokasi', $ongkir)->result();
		//insert data pengiriman
		$object = array('id_transaksi' => $cust_id ,
						'provinsi' => $row_prov[0]->name ,
						'kabupaten_kota' => $row_kab[0]->name ,
						'kecamatan' => $row_kec[0]->name ,
						'kelurahan' => $row_kel[0]->name ,
						'kodepos' => $this->input->post('kodepos') ,
						'biaya' => $row_ong[0]->biaya ,
						'alamat_lengkap' => $this->input->post('alamat') ,
						'tanggal' => $date );
		$this->mod->tambahdata('pengiriman',$object);
		//pencarian data pengiriman
		$wer = array('id_transaksi' => $cust_id);
		$dat['ongkir'] = $this->mod->detaildata('pengiriman',$wer)->result();
		$this->load->view('public/total', $dat);
	}
	public function verify()
	{
			$this->cart->destroy();
		
                 // This will show cancle data in cart.
		$this->load->view('public/verify');
	}
	public function verifyAction()
	{
		$where = array('kode_vertifikasi' => $this->input->post('kode'));
		$data['user'] = $this->billing_model->select('transaksi',$where)->result();
		$this->load->view('public/shipping', $data);
	}
	public function login()
	{
		$this->load->view('public/login');
	}
	public function proseslogin()
	{
		$where = array('email' => $this->input->post('user') ,
						'password' => $this->input->post('pwd') );
		$cek = $this->billing_model->cek_login('user',$where)->result();
		if ($cek>0) {
			$data_session = array(
				'id' => $cek[0]->id,
				'nama' => $cek[0]->nama,
				'email' => $username,
				'password' => $password,
				'nama_user' => $cek[0]->nama_user,
				'no_telp' => $cek[0]->no_telp,
				'no_rek' => $cek[0]->no_rek,
				'bank' => $cek[0]->bank,
				'alamat' => $cek[0]->alamat,
				'status' => "login"
				);
 			
			$this->session->set_userdata($data_session);
			redirect('shopping/index');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('shopping/index');
	}
	public function sukses()
	{
		$this->load->view('public/sukses');
	}
}