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
	</header>
	<?php include 'slider.php'; ?>
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
						<form method="post" action="<?php echo base_url('index.php/shopping/add_direct'); ?>">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url('uploads/'.$key->image) ; ?>" class="img-circle" height="250" width="150">
										<h2>Rp <?php echo number_format($key->harga_barang,2,',','.'); ?></h2>
										<p><?php echo $key->nama_barang ; ?></p>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><button type="submit" class="btn btn-inv"><i class="fa fa-plus-square"></i> Beli</button></li>
										<li><a href="<?php echo base_url("index.php/shopping/detail/").$key->id_barang; ?>" class="btn btn-inv"><i class="fa fa-search"></i> Detail</a></li>
									</ul>
								</div>
								<input type="hidden" name="id" value="<?php echo $key->id_barang; ?>">
								<input type="hidden" name="name" value="<?php echo $key->nama_barang ; ?>">
								<input type="hidden" name="price" value="<?php echo $key->harga_barang ; ?>">
						</form>
							</div>
						</div>
						
						</form>
						<?php } ?>
					</div>
					<?php echo $this->pagination->create_links(); ?>
					<?php include "recomend-items.php"; ?>
              </div>
			</div>
		</div>
	</section>
	<header id="header">
		<?php include 'header-bottom.php'; ?>
	</header>
	<?php include "footer.php"; ?>
<?php include "bottom.php"; ?>
</body>
</html>