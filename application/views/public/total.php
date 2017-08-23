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
		<!--/header-bottom-->
		<?php include "header-bottom.php"; ?>
	</header>
	<div class="container">
		<center>
			<h1>Total Pembayaran</h1>
			<?php 
			if ($cart = $this->cart->contents()) { ?>
			 <div class="jumbotron">
			 <table class="table table-striped table-bordered">
			 	<?php 
			 	foreach ($cart as $item) {
			 	foreach ($ongkir as $o) {
			 	$grand_total = 0;
			 	$grand_total = $grand_total + $item['subtotal'];
			 	$total = $grand_total + $o->biaya ;
			 	?>
			 	<tr>
			 	    <td>Harga Total</td>
			 	    <td align="right">Rp. <?php echo number_format($grand_total, 2,',','.'); ?></td>
			 	</tr>
			 	<tr>
			 		<td>Harga Ongkir</td>
			 		<td align="right">Rp. <?php echo number_format($o->biaya, 2,',','.'); ?></td>
			 	</tr>
			 	<tr>
			 		<td>Total Pembayaran</td>
			 		<td align="right">Rp. <?php echo number_format($total, 2,',','.'); ?></td>
			 	</tr>	
			 	<?php } } ?>
			 </table>
			 <a href="<?php echo base_url('index.php/shopping/verify'); ?>" class="btn btn-lg btn-danger">Konfimasi Pembayaran</a>
			 </div>
			<?php } ?>
		</center>
	</div>
</body>
</html>