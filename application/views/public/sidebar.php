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
							<ul>
								<?php 
									$link = mysqli_connect('localhost','root','','eshopper');
									$query = mysqli_query($link,"SELECT * FROM kategori");
									while ($data = mysqli_fetch_array($query)) {
								?>
							    <li><a href="<?php echo base_url('index.php/filtering/carikategori?key=').$data['nama']; ?>" class="btn btn-inv"><?php echo $data['nama']; ?></a></li>
								<?php }	?>
							</ul>
							</div>
						<!--/category-products-->
					<img src="<?php echo base_url('assets/images/barber.jpg'); ?>" class="img-responsive" alt="">
					</div>
				</div>