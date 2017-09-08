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
		<!--/header-bottom-->
		<?php include "header-bottom.php"; ?>
	</header>
		<div class="container">
			<div class="row">
				<?php include "sidebar.php"; ?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
				<?php 
					foreach ($barang as $b) {
				?>
				<form method="post" action="<?php echo base_url('index.php/shopping/add') ?>">
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url('uploads/').$b->image ; ?>" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $b->nama_barang ; ?></h2>
								<p>ID Barang: <?php echo $b->id_barang; ?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>Rp <?php echo number_format($b->harga_barang,2,',','.'); ?></span><br>
									<label>Quantity:</label>
									<input type="text" value="1" name="qty" />
									<?php if ($b->qty <= 0){ ?>
									<button disabled="" type="button" class="btn btn-default cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>	
									<?php }else{ ?>	
									<button type="submit" class="btn btn-default cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									<?php } ?>
								</span>
								<?php if ($b->qty <= 0) { ?>
									<p style="color: red;"><b style="color: black;">Stok :</b> HABIS</p>
								<?php	}
								else{ 
								?>
								<p style="color: green ";"><b style="color: black;">Stok :</b> <?php echo $b->qty; ?></p>
								<p><b>Condition:</b> Good</p>
								<p><b>Brand:</b> <?php echo $b->suplier ; ?></p>
								<p><b>Spesifikasi :</b><br>
									<textarea class="form-control" readonly=""><?php echo $b->spesifikasi; ?></textarea></p>
								<?php } ?>
							</div><!--/product-information-->
						</div>

						<input type="hidden" name="id" value="<?php echo $b->id_barang ; ?>">
						<input type="hidden" name="name" value="<?php echo $b->nama_barang ; ?>">
						<input type="hidden" name="price" value="<?php echo $b->harga_barang ; ?>">
						<input type="hidden" name="image" value="<?php echo base_url('uploads/').$b->image; ?>">
						</form>
					<?php } ?>
					</div><!--/product-details-->		
				</div>
			</div>
		</div>
		<?php include "footer.php"; ?>
<?php include "bottom.php"; ?>
</body>
</html>