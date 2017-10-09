<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<?php 
						 $link = mysqli_connect('localhost','root','','eshopper');
						 $query = mysqli_query($link,"SELECT * FROM iklan");
						 $data = mysqli_fetch_array($query);
						?>
						<div class="carousel-inner">
							<div class="item active" style= "padding: 0%;">
									<img src="<?php echo base_url('./uploads/').$data['banner1']; ?>" class="girl img-responsive" style="width: 1280px;height: 441px;background-size: cover;margin-left: auto;margin-right: auto;" alt="" />
							</div>
							<div class="item" style="padding: 0%;">
									<img src="<?php echo base_url('./uploads/').$data['banner2']; ?>" style="width: 1280px;height: 441px;background-size: cover;margin-left: auto;margin-right: auto;"  class="girl img-responsive" alt="" />
							</div>
							
							<div class="item" style="padding: 0%;">
									<img src="<?php echo base_url('./uploads/').$data['banner3']; ?>" style="width: 1280px;height: 441px;background-size: cover;margin-left: auto;margin-right: auto;"  class="girl img-responsive" alt="" />
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>