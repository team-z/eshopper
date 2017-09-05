<div class="header_top"><!--header_top-->
<?php 
							$toko = $this->db->get('toko')->result();
						?>
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<div class="contactinfo">					
							<ul class="nav nav-pills">
								<li><a href=""><p style="font-weight: bolder;">Contact Us :</p></a></li>
								<li>
								<a href="#">
								  <span>
								    <i>
								    <img src="<?php echo base_url('assets/images/contact/wa.png'); ?>" style="height: 15px;">
								    </i>
								  </span> Whatsapp : <?php echo $toko[0]->wa ; ?></a></li>
								<li>
								<a href="#">
									<span>
										<i>
								    		<img src="<?php echo base_url('assets/images/contact/bbm.png'); ?>" style="height: 15px;">
										</i>
									</span> BBM : <?php echo $toko[0]->bbm ; ?>
								</a>
								</li>
								<li>
								<a href="#">
									<span>
										<i class="fa fa-instagram">
										</i>
									</span> Instagram : <?php echo $toko[0]->instagram ; ?>
								</a>
								</li>
								<li>
								<a href="#">
									<span>
										<i>
								    		<img src="<?php echo base_url('assets/images/contact/line.png'); ?>" style="height: 15px;">
										</i>
									</span> LINE : <?php echo $toko[0]->line ; ?>
								</a>
								</li>
								<li>
								<a href="#">
									<span>
										<i>
								    		<img src="<?php echo base_url('assets/images/contact/fb.png'); ?>" style="height: 15px;">
										</i>
									</span> Facebook : <?php echo $toko[0]->facebook ; ?>
								</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>