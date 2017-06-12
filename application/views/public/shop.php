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
						<h2 class="title text-center">Features Items</h2>
						<?php
							foreach ($products as $key) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/shop/product12.jpg" alt="" />
										<h2><?php echo $key->harga_barang ; ?></h2>
										<p><?php echo $key->nama_barang ; ?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $key->harga_barang ; ?></h2>
											<p><?php echo $key->nama_barang ; ?></p>
											<?php
							echo form_open('shopping/add');
							echo form_hidden('id', $key->id_barang);
                        	echo form_hidden('name', $key->nama_barang);
                        	echo form_hidden('price', $key->harga_barang);
                        	
						?>
										<?php
                        $btn = array(
                            'class' => 'btn btn-default add-to-cart',
                            'value' => 'Add to Cart',
                            'name' => 'action'
                        );
                        
                        // Submit Button.
                        echo form_submit($btn);
                        echo form_close();
                        ?>
											
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
					<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
              </div>
			</div>
		</div>
	</section>
	<?php include "footer.php"; ?>
<?php include "bottom.php"; ?>
</body>
</html>