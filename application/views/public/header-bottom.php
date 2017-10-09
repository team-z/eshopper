<?php 
						 $link = mysqli_connect('localhost','root','','eshopper');
						 $query = mysqli_query($link,"SELECT * FROM iklan");
						 $iklan = mysqli_fetch_array($query);
						?>
<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
					<a href="">
						<img src="<?php echo base_url('./uploads/').$iklan['gambar1']; ?>" class="img-responsive" alt="" style="height: 200px;width:300px;">
					</a>
					</div>
					<div class="col-sm-3">
					<a href="">
						<img src="<?php echo base_url('./uploads/').$iklan['gambar2']; ?>" class="img-responsive" alt="" style="height: 200px;width:300px;">
					</a>
					</div>
					<div class="col-sm-3">
					<a href="">
						<img src="<?php echo base_url('./uploads/').$iklan['gambar3']; ?>" class="img-responsive" style="height: 200px;width:300px;" alt="">
					</a>
					</div>
					<div class="col-sm-3">
						<a href="">
							<img src="<?php echo base_url('./uploads/').$iklan['gambar4']; ?>" class="img-responsive" style="height: 200px;width:300px;" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>