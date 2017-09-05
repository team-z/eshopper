<div class="col-sm-3">
					<div class="left-sidebar">
					<h2>Searchbox</h2>
					<div class="input-group">
      						<input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
      						<span class="input-group-btn">
        						<button class="btn btn-secondary" type="button">Go!</button>
      						</span>
    					</div><br><br>
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
									$kategori = $this->db->get('kategori')->result();
									foreach ($kategori as $k) {
							    ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									<form method="post" action="">
									<button class="btn btn-inv" name="category" value="<?php echo $k->nama ; ?>" type="submit"><?php echo $k->nama ; ?></button>
									</form>
									</h4>
								</div>
							</div>
							<?php } ?>
							
						</div><!--/category-products-->
					<img src="<?php echo base_url('assets/ads/barber.jpg'); ?>" class="img-responsive" alt="">
					</div>
				</div>