<div id="top-nav">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<!-- Navbar toggle button -->
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
								<i class="fa fa-bars"></i>
							</button>
							<!-- Sidebar toggle button -->
							<button type="button" class="sidebar-toggle">
								<i class="fa fa-bars"></i>
							</button>
							<a class="navbar-brand text-size-24" href="#"><i class="fa fa-star-o"></i> Features</a>
						</div>
						<div class="collapse navbar-collapse" id="menu">
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="<?php echo base_url('index.php/opsi_pengaturan/view'); ?>">
										<span class="fa-stack">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-cog fa-stack-1x"></i>
										</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url('index.php/login/logout'); ?>" onclick="return confirm ('Apakah anda yakin ini keluar ?');"title="Exi">
										<span class="fa-stack">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-power-off fa-stack-1x"></i>
										</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="<?php echo base_url('index.php/admin/profil_admin/').$this->session->userdata('id_admin'); ?>">
										<span class="fa-stack">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-user fa-stack-1x"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>