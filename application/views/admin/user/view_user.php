<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top'); ?>
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/css/print.css'); ?>" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/css/style.css'); ?>" media="screen">
	<script>
        (function($) {
            // fungsi dijalankan setelah seluruh dokumen ditampilkan
            $(document).ready(function(e) {
                 
                // aksi ketika tombol cetak ditekan
                $("#cetak").click(function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#user').printArea();
                });
            });
        }) (jQuery);
    </script>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi'); ?>

			<div id="user">
				<div class="title">
					<center>
						<b></b> E-shopper<br>
						Loe Pasti Puas<br>
						MASCITRA.COM<br>
						Jl.Bungur N0.130, Gebang, Kec.Patrang, Kab.Jember<br>
						<hr size="2px" color="black" style="padding-bottom: 10px">
						<hr size="6px" color="black">
					</center>
				</div><br>
				<table class="table table-striped">
					<thead>
						<tr class="action">
							<td colspan="3">
								<form action="<?php echo base_url('index.php/admin2/cari_viewuser'); ?>" method="GET">
									<div class="input-group">
								      <input type="text" name="key" class="form-control">
								      <span class="input-group-btn">
								        <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
								      </span>
								    </div>
								</form>
							</td>
							<td>
								<button id="cetak" target="_blank" class="btn btn-warning"><span class="fa fa-file-pdf-o"></span> Cetak PDF</button>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>No.</th>
							<th>Nama User</th>
							<th>Email</th>
							<th>Password</th>
							<th class="action">Opsi</th>
						</tr>
						<?php
						$no = 1;
						foreach ($user as $key) {?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $key->nama_user; ?></td>
							<td><?php echo $key->email; ?></td>
							<td><?php echo $key->password; ?></td>
							<td class="action"><a href="<?php echo base_url('index.php/admin2/delete_user/'.$key->id); ?>" class="btn btn-danger" onclick="return confirm ('Hapus <?php echo $key->nama_user;?> ini ?');"title="Hapus"><span class="fa fa-trash-o"></span> Hapus</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<ul class="pagination">
				<?php echo $this->pagination->create_links(); ?>
			</ul>
		</div>
	</div>
<?php $this->load->view('admin/bottom'); ?>
</body>
</html>