<!DOCTYPE html>
<html>
<head>
	<?php include "head.php" ; ?>
</head>
<body>
	<header id="header"><!--header-->
		<!--/header_top-->
		<?php include "header-top.php"; ?>
		<!--/header-middle-->
	    <?php include "header-middle.php"; ?>
	</header>
	<br>
	<div class="container" style="padding: 4%;">
	<h1 align="center">Konfirmasi Kode</h1>
		<form method="post" action="<?php echo base_url('index.php/shopping/verifyAction'); ?>">
			<div class="input-group">
    			<input type="text" name="kode" class="form-control input-lg" placeholder="Masukkan Kode">
    			<div class="input-group-btn">
      				<button class="btn btn-warning btn-lg" type="submit">
        			Verifikasi
      				</button>
    			</div>
  			</div>
		</form>
		<h4 align="center">Masukkan Kode verifikasi yang kami berikan kepada anda</h4>
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
</body>
</html>