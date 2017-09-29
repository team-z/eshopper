<!DOCTYPE html>
<html>
<head>
	<title>Home | eshopper</title>
	<?php include "head.php"; ?>
</head>
<body>
	<header id="header"><!--header-->
		<!--/header_top-->
		<?php include "header-top.php"; ?>
		<!--/header-middle-->
	    <?php include "header-middle.php"; ?>
	</header>
	<br>
	<div class="container">
		<center>
			<h1>Total Pembayaran</h1>
			<?php 
			if ($cart = $this->cart->contents()) { ?>
			 <div class="jumbotron">
			 <table class="table table-striped table-bordered">
			 <tbody>
			 	
			 	<?php 
			 	$grand_total = 0;
			 	foreach ($cart as $item) {
			 		foreach ($ongkir as $o) {
                    $ong = $o->biaya;
			 	    $grand_total = $grand_total + $item['subtotal'];
                    $total = $grand_total + $ong ;
			    } }
			 	?>
			 	<tr>
			 	    <td>Harga Total</td>
			 	    <td align="right">Rp. <?php echo number_format($grand_total, 2,',','.'); ?></td>
			 	</tr>
			 	<tr>
			 		<td>Harga Ongkir</td>
			 		<td align="right">Rp. <?php echo number_format($ong,2,',','.'); ?></td>
			 	</tr>
			 	<tr>
			 		<td>Harga Total</td>
			 		<td align="right">Rp. <?php echo number_format($total,2,',','.'); ?></td>
			 	</tr>
			 </tbody>
			 </table><br>
		<form method="post" action="<?php echo base_url('index.php/shopping/verifyAction'); ?>">
			<div class="input-group">
    			<input type="text" name="kode" class="form-control input-lg" placeholder="Masukkan Kode">
    			<div class="input-group-btn">
      				<button class="btn btn-warning btn-lg" type="submit">
        			Verifikasi
      				</button>
      				Atau 
  			<a href="<?php echo base_url('index.php/shopping/'); ?>" class="btn btn-lg btn-danger">Bayar Nanti</a>
    			</div>
  			</div>
  			
		</form>
		<h4 align="center">Masukkan Kode verifikasi untuk melanjutkan transaksi</h4>
		<div class="row">
			<div class="col-md-6">
				<h3 align="center">Cara mendapatkan kode verifikasi</h3>
				<ol>
				    <li>Transfer uang melalui salah satu nomor rekening kami</li>
				    <li>Foto Struk Pembayaran Anda dan kirimkan ke Kontak WA kami</li>
				    <li>
				    Untuk Format penulisannya , cukup ketikkan :<br>
				    (Nomor_Pesanan)(Nama) , Lalu upload foto struk tsb
				    </li>
				    <li>Ketika sudah dikonfirmasi oleh pihak kami , anda akan menerima sebuah kode dari kami untuk melanjutkan ke proses pengiriman barang yang anda beli</li>
				</ol>
			</div>
			<div class="col-md-6">
				<h3 align="center">Daftar No Rekening Kami</h3>
				<ul>
				    <li align="center">
				    	<h5>BRI</h5>
				    	9897.2313.123
				    </li>
				    <li align="center">
				    	<h5>BCA</h5>
				    	9897.2313.123
				    </li>
				    <li align="center">
				    	<h5>Danamon</h5>
				    	9897.2313.123
				    </li>
				    <li align="center">
				    	<h5>CimbNiaga</h5>
				    	9897.2313.123
				    </li>
				    <li align="center">
				    	<h5>Bank Muamalah</h5>
				    	9897.2313.123
				    </li>
				</ul>
			</div>
		</div>
			 </div>
			<?php } ?>
		</center>
	</div>
</body>
</html>