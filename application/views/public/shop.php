<!DOCTYPE html>
<html>
<head>
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
	<section>
		<div class="container">
			<div class="row">
              <?php include "sidebar.php"; ?>
              <div class="col-sm-9 padding-right">
              	<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Products</h2>
						<?php
							foreach ($products as $key) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url('uploads/'.$key->image) ; ?>" class="img-circle" height="250" width="150">
										<h2>Rp <?php echo number_format($key->harga_barang,2,',','.'); ?></h2>
										<p><?php echo $key->nama_barang ; ?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Beli</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rp <?php echo number_format($key->harga_barang,2,',','.'); ?></h2>
											<p><?php echo $key->nama_barang ; ?></p>
											<a href="<?php echo base_url("index.php/shopping/detail/").$key->id_barang; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Beli</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									</ul>
								</div>
							</div>
						</div>

						<?php } ?>
					</div>
					<?php echo $this->pagination->create_links(); ?>
              </div>
			</div>
		</div>
	</section>
	<?php include "footer.php"; ?>
<?php include "bottom.php"; ?>
</body>
</html>