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
						$kategori = $b->kategori;
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
								<p><b>Kategori:</b> <?php echo $b->kategori; ?></p>
								<p style="color: green ";"><b style="color: black;">Stok :</b> <?php echo $b->qty; ?></p>
								<p><b>Condition:</b> Good</p>
								<p><b>Brand:</b> <?php echo $b->suplier ; ?></p>
								<p><b>Spesifikasi :</b><br>
									<textarea readonly="" style="height: 100px;background-color: white;"><?php echo $b->spesifikasi; ?></textarea></p>
								<b><a href="<?php echo base_url('index.php/shopping/') ?>" class="btn btn-default cart"><i class="fa fa-arrow-left fa-stack"></i> Kembali</a></b>
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
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Item Yang Sama</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php 
									$kon = mysqli_connect('localhost','root','','eshopper');
									$sql = mysqli_query($kon,"SELECT * FROM barang where kategori = '$kategori' LIMIT 3");
									while($c=mysqli_fetch_array($sql)) {
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url('uploads/').$c['image']; ?>" alt="" style ='height: 180px;width: 150px;' >
													<h2><?php echo $c['harga_barang']; ?></h2>
													<p><?php echo $c['nama_barang']; ?></p><a href="<?php echo base_url("index.php/shopping/detail/").$c['id_barang']; ?>" class="btn btn-inv"><i class="fa fa-search"></i> Detail</a>
												</div>
												
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
								<div class="item">
								<?php 
									$kon = mysqli_connect('localhost','root','','eshopper');
									$sql = mysqli_query($kon,"SELECT * FROM barang where kategori = '$kategori' ORDER BY id_barang DESC LIMIT 3");
									while($c=mysqli_fetch_array($sql)) {
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url('uploads/').$c['image']; ?>" alt="" style ='height: 180px;width: 150px;' >
													<h2><?php echo $c['harga_barang']; ?></h2>
													<p><?php echo $c['nama_barang']; ?></p><a href="<?php echo base_url("index.php/shopping/detail/").$c['id_barang']; ?>" class="btn btn-inv"><i class="fa fa-search"></i> Detail</a>
												</div>
												
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>	
				</div>
			</div>
		</div><br><br>
		<?php include "footer.php"; ?>
<?php include "bottom.php"; ?>
</body>
</html>