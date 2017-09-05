<!DOCTYPE html>
<html>
<head>
<?php include "head.php" ?>
<script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Are you sure want to clear all bookings?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>index.php/shopping/remove/all";
                } else {
                    return false; // cancel button
                }
            }
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
				  <li><a href="">Home</a></li>
				  <li class="active">Shopping Cart</li>
				  <li><a href="">Checkout</a></li>
				</ol>
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
							<td class="image">Nama Produk</td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Total Harga</td>
							<td class="total">Opsi</td>
						</tr>
					</thead>
					<tbody>
					<?php
                     // Create form and send all values in "shopping/update_cart" function.
                    echo form_open('shopping/update_cart');
                    $grand_total = 0;
                    $i = 1;
                    foreach ($cart as $item){
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //  Will produce the following output.
                        // <input type="hidden" name="cart[1][id]" value="1" />
                        
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
						<tr>
							<td class="cart_product">
								<h4><?php echo $item['name']; ?></h4>
							</td>
							<td class="cart_price">
								<p>Rp <?php echo number_format($item['price'],2,',','.'); ?></p>
							</td>
							<td class="cart_quantity">
								<?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
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
						
					</tbody>
				</table>
		</div>
	</section> <!--/#cart_items-->
	   <div class="container">
	        <div class="row">
				<div class="col-md-2">
					<a href="<?php echo base_url('index.php/shopping/index'); ?>" class="btn btn-default btn-block">Lanjut Belanja</a>
				</div>
				<div class="col-md-2">
					<input type="button" class ='btn btn-default btn-block' value="Hapus Keranjang" onclick="clear_cart()">
				</div>
				<div class="col-md-2">
					<input type="submit" class ='btn btn-default btn-block' value="Perbarui Keranjang">
				</div>
			</div>
		</div>
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Apa yang akan anda lakukan selanjutnya ?</h3>
			</div>
			
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total Harga <span><strong>Rp <?php echo number_format($grand_total, 2,',','.'); ?></strong></span><br>(Harga tidak termasuk ongkir)</li>
							<li style="background-color: white;padding: 0;">
							<a class="btn btn-default" href="<?php echo base_url('index.php/shopping/billing_view'); ?>">Checkout</a>
							</li>
						</ul>
							<?php echo form_close(); ?>
						</div>
                            <!-- "Place order button" on click send "billing" controller  -->
					</div>
				 <div class="col-sm-6">
				 	<div class="total_area">
				 		<div class="container">
				 		Punya Kode Kupon ?<br>
				 		<form class="form-inline">
				 			<div class="form-group">
				 				<input type="text" class="form-control" name="" placeholder="Masukkan Kode Kupon ...">
				 			</div>
				 			<div class="form-group">
				 				<input type="submit" value="Verifikasi" class="form-control" name="">
				 			</div>
				 		</form>
				 		</div>
				 	</div>
				 </div>
				</div>
			</div>
		</div>
	</section>
	<?php }else{ ?>
		<div class="container">
				<h1 align="center">Keranjang Tidak ada</h1>
				<center><a href="<?php echo base_url('index.php/shopping/index') ?>" class="btn btn-default update btn-lg">Mulai Berbelanja</a></center>
		</div>
	<?php } ?> 
	<?php include "bottom.php" ; ?>
</body>
</html>