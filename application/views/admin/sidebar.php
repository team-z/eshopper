<div id="sidebar">
			<div id="sidebar-wrapper">
				<div class="sidebar-title">
					<span class="text-size-40"><?php $data = $this->db->get('toko')->result();
					foreach ($data as $key) {
					 	echo $key->nama_toko;
					 } ?></span><br>
					<span class="text-size-18 text-grey">Loe Pasti puaass</span>
				</div>
				<div class="sidebar-avatar">
					<div class="sidebar-avatar-image"><img src="<?php $data = $this->db->get('admin')->result(); foreach ($data as $key) {
						$img = $key->image;
					} if ($img == "") {
						echo base_url('./uploads/personal.jpg');
					} else {
						echo base_url('./uploads/'.$key->image);
					}
					?> " alt="" class="img-circle"></div>
					<div class="sidebar-avatar-text"><?php $data = $this->db->get('toko')->result();
					foreach ($data as $key) {
					 	echo $key->nama_toko;
					 } ?></div>
				</div>
				<ul class="sidebar-nav">
					<li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
					<li><a href="<?php echo base_url('index.php/admin/index'); ?>"><i class="fa fa-fw fa-star"></i><span>Dashboard</span></a></li>
					<li><a href="<?php echo base_url('index.php/admin/viewbarang'); ?>"><i class="fa fa-archive fa-font"></i><span>Barang</span></a></li>
					<li><a href="<?php echo base_url('index.php/admin2/viewtransaksi'); ?>"><i class="fa fa-credit-card fa-list-alt"></i><span>Transaksi</span></a></li>
					<li><a href="<?php echo base_url('index.php/admin2/view_user'); ?>"><i class="fa fa-user-circle"></i><span>User Pelanggan</span></a></li>
					<li><a href="<?php echo base_url('index.php/iklan/index'); ?>"><i class="fa fa-television" aria-hidden="true"></i><span>Iklan</span></a></li>
					<li><a href="<?php echo base_url('index.php/export/index'); ?>"><i class="fa fa-file-pdf-o"></i><span></span> Laporan</a></li>
				</ul>
				<div class="sidebar-footer">
					<hr style="border-color: #DDD">
					created by <a href="#" target="_blank" class="text-default">Team-Z</a><br>
				</div>
			</div>
		</div>