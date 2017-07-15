<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
									foreach ($kategori as $k) {
							    ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a href="">
										<?php echo $k->nama ; ?>
									</a>
									</h4>
								</div>
							</div>
							<?php } ?>
							
						</div><!--/category-products-->
					
					</div>
				</div>