<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Item Terbaru</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php 
									$kon = mysqli_connect('localhost','root','','eshopper');
									$sql = mysqli_query($kon,"SELECT * FROM barang ORDER BY id_barang DESC LIMIT 3");
									while ($b = mysqli_fetch_array($sql)) {
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url('uploads/').$b['image']; ?>" alt="" style ='height: 180px;width: 150px;' >
													<h2><?php echo $b['harga_barang']; ?></h2>
													<p><?php echo $b['nama_barang']; ?></p><a href="<?php echo base_url("index.php/shopping/detail/").$b['id_barang']; ?>" class="btn btn-inv"><i class="fa fa-search"></i> Detail</a>
												</div>
												
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
								<div class="item">	
									<?php 
									$kon = mysqli_connect('localhost','root','','eshopper');
									$sql = mysqli_query($kon,"SELECT * FROM barang ORDER BY id_barang LIMIT 3");
									while ($b = mysqli_fetch_array($sql)) {
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url('uploads/').$b['image']; ?>" alt="" style ='height: 180px;width: 150px;' >
													<h2><?php echo $b['harga_barang']; ?></h2>
													<p><?php echo $b['nama_barang']; ?></p>
													<a href="<?php echo base_url("index.php/shopping/detail/").$b['id_barang']; ?>" class="btn btn-inv"><i class="fa fa-search"></i> Detail</a>
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