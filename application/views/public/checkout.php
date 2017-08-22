<!DOCTYPE html>
<html>
<head>
	<?php include "head.php"; ?>
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript">
		$(function(){
			$.ajaxSetup({
				type:"POST",
				url: "<?php echo base_url('index.php/shopping/ambil_data') ?>",
				cache: false,
			});
			$("#provinsi").change(function(){
				var value=$(this).val();
				if(value>0){
				$.ajax({
				data:{modul:'kabupaten',id:value},
				success: function(respond){
						$("#kabupaten-kota").html(respond);
						}
					})
				}
			});
			$("#kabupaten-kota").change(function(){
				var value=$(this).val();
				if(value>0){
					$.ajax({
					data:{modul:'kecamatan',id:value},
					success: function(respond){
						$("#kecamatan").html(respond);
						}
					})
				}
			});
			$("#kecamatan").change(function(){
				var value=$(this).val();
				if(value>0){
					$.ajax({
					data:{modul:'kelurahan',id:value},
					success: function(respond){
						$("#kelurahan-desa").html(respond);
						}
					})
				} 
			});
});
	</script>
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			<!--/checkout-options-->

			<div class="register-req">
				<p>Mohon untuk mengisi form checkout untuk menyelesaikan transaksi</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
						<div class="bill-to">
							<p>Bill To</p>
							<?php $rand= rand(79123123,9812736); ?>
								<form class="form-horizontal" method="post" action="<?php echo base_url('index.php/shopping/save_order'); ?>">
					<div class="col-sm-6 clearfix">
								<div class="form-group">
									<input class="form-control" type="hidden" name="no_pesanan" value="<?php echo $rand; ?>">
									<input type="text" disabled="" value="Nomor Pesanan : <?php echo $rand; ?>" class="form-control" name="">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="nama" placeholder="Nama">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="email" placeholder="Email*">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="no_hp" placeholder="No HP">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="no_rek" placeholder="No Rekening*">
								</div>
								<div class="form-group">
									<select name="bank" class="form-control">
										<option>-- Nama Bank --</option>
										<option value="BCA">BCA</option>
										<option value="BRI">BRI</option>
										<option value="CimbNiaga">CimbNiaga</option>
										<option value="Danamon">Danamon</option>
										<option value="Bank Muamalah">Bank Muamalah</option>
										<option value="Bank Jatim">Bank Jatim</option>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id='provinsi' name="provinsi">
										<option value='0'>-- Pilih Provinsi --</option>
									<?php 
										foreach ($provinsi as $prov) {
										echo "<option value='$prov[id]'>$prov[name]</option>";
										}
									?>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" name="kabupaten" id="kabupaten-kota">
										<option value='0'>-- Pilih Kabupaten --</option>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="kecamatan" name="kecamatan">
										<option value='0'>-- Pilih Kecamatan --</option>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="kelurahan-desa" name="kelurahan">
										<option value='0'>-- Pilih Kelurahan --</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Kode Pos*" name="kodepos" class="form-control">
								</div>
								<div class="form-group">
									<textarea name="alamat">Alamat Lengkap</textarea>
								</div>
						</div>
					</div>
					<div class="col-sm-6">
								<div class="form-group">
							<label class="control-label" style="color: red;">*nomor pesanan wajib diingat untuk proses pembayaran</label>
							</div>		
						</div>
					</div>					
				</div>
			</div>
		<div class="container">
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
			<?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo ''; 
             } ?>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
				<?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()){ ?>
					<thead>
						<tr class="cart_menu">
							<td class="image">Products</td>
							<td></td>
							<td class="description">Price</td>
							<td class="price">Quantity</td>
							<td class="quantity">Total</td>
							<td class="total">Action</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
                     // Create form and send all values in "shopping/update_cart" function.
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item){
                        ?>
						<tr>
							<td class="cart_product">
								<h4><?php echo $item['name']; ?></h4>
							</td>
							<td>&nbsp</td>
							<td class="cart_price">
								<p>Rp <?php echo number_format($item['price'],2,',','.'); ?></p>
							</td>
							<td class="cart_quantity">
								<?php echo $item['qty']; ?>
							</td>
							<?php $grand_total = $grand_total + $item['subtotal']; ?>
							<td class="cart_total">
							<p class="cart_total_price">Rp <?php echo number_format($item['subtotal'],2,',','.'); ?></p>
							</td>
							<td>
								<?php echo anchor('shopping/remove/' . $item['rowid'], 'Hapus'); ?>
							</td>
						</tr>
						<?php }; ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Total Harga yang ada di Keranjang</td>
										<td><span>Rp <?php echo number_format($grand_total,2,',','.') ;?></span></td>
									</tr>
									<tr>
										<td colspan="2"><button type="submit" class="btn btn-block btn-warning">Lanjutkan</button></td>
									</tr>
								</table>
								</form>
							</td>
						</tr>
					</tbody>
				</table>
				<?php }else{ ?>
				<div class="container">
				<h1 align="center">Keranjang Tidak ada</h1>
				<center><a href="<?php echo base_url('index.php/shopping/index') ?>" class="btn btn-default update btn-lg">Mulai Berbelanja</a></center>
		</div>
	<?php } ?> 
			</div>
		</div>
		</div>
	</section>
	<?php include "footer.php"; ?>
	<!--/Footer-->
	<?php include "bottom.php"; ?>
</body>
</html>