<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a class="judul" href="index.html"><?php echo $toko[0]->nama_toko ; ?></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<?php if ($this->session->userdata('status')!='login') {
							}else{?>
								<li><a href="#"><i class="fa fa-user"></i> Halo , <?php echo $this->session->userdata('nama_user'); ?> !</a></li>
							<?php } ?>
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="<?php echo base_url('index.php/shopping/verify'); ?>"><i class="fa fa-check"></i> Konfirmasi Pembayaran</a></li>
								<li><a href="<?php echo base_url('index.php/shopping/cart'); ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							<?php if ($this->session->userdata('status')!='login') { ?>
								<li><a href="<?php echo base_url('index.php/shopping/login'); ?>"><i class="fa fa-lock"></i> Login</a></li>
							<?php }else{?>
								<li><a href="<?php echo base_url('index.php/shopping/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>