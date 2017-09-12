<div class="col-sm-3">
					<div class="left-sidebar">
					<h2>Searchbox</h2>
					<form method="get" action="<?php echo base_url('index.php/filtering/caribarang/'); ?>">
					<div class="input-group">
      						<input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." name="key">
      						<span class="input-group-btn">
        						<button class="btn btn-secondary" type="submit">Go!</button>
        						<form action="<?php echo base_url('index.php/shopping/index'); ?>">
        						<button type="submit" class="btn btn-secondary" style="border-left: 1px solid white;">Reset</button>
        						</form>
      						</span>
    					</div>
    				</form><br><br>
    						<h2>Category</h2>
    						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Topswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="<?php echo base_url('index.php/filtering/carikategori/?key=tshirt') ?>">T-Shirt </a></li>
											<li><a href="#">Long Sleeve</a></li>
											<li><a href="<?php echo base_url('index.php/filtering/carikategori/?key=singlet') ?>">Singlet</a></li>
											<li><a href="<?php echo base_url('index.php/filtering/carikategori/?key=jaket') ?>">Jacket</a></li>
											<li><a href="<?php echo base_url('index.php/filtering/carikategori/?key=sweater') ?>">Sweater</a></li>
										</ul>
									</div>
								</div>
							</div>
							</div>
						<!--/category-products-->
					<img src="<?php echo base_url('assets/ads/barber.jpg'); ?>" class="img-responsive" alt="">
					</div>
				</div>