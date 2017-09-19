<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
	<?php $this->load->view('admin/top.php'); ?>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>

			<div class="panel panel-default">
				<div class="panel panel-heading">
					<h1><center>Tambah Barang</center></h1>
				</div>
				<div class="panel panel-body">
					<?php echo form_open_multipart('admin/tambah'); ?>
						<div class="col-md-3">
						<h2>Gambar Produk</h2>
							<img id="preview" height="200" width="200" class="img-circle" alt="User Image"/>
							<input accept="image/*" onchange="tampilkanPreview(this,'preview')" type="file" name="gambar">
						</div>

						<div class="col-md-9">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>
											<div class="form-group">
												<label for="user">Nama Barang</label>
												<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
											</div>
										</th>
										<th>
											<div class="form-group">
												<label for="user">Kategori</label>
												<select class="form-control" name="kategori" placeholder="kategori">
												<?php 
												$link=mysqli_connect('localhost','root','','eshopper');
												$query=mysqli_query($link,"SELECT * FROM kategori");
												while ($row=mysqli_fetch_array($query)) {
												?>
												<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
												<?php } ?>
												</select>
											</div>
										</th>
									</tr>
									<tr>
										<th>
											<div class="form-group">
												<label for="user">Harga Barang</label>
												<input type="text" class="form-control" name="harga_barang" placeholder="Rp.">
											</div>
										</th>
										<th>
											<div class="form-group">
												<label for="user">Discount</label>
												<input type="text" class="form-control" name="discount" placeholder="%">
											</div>
										</th>
										<th>
											<div class="form-group">
												<label for="user">Quanity</label>
												<input type="text" class="form-control" name="qty" placeholder="unit">
											</div>
										</th>
									</tr>
									<tr>
										<th>
											<div class="form-group">
												<label for="user">Suplier</label>
												<input type="text" class="form-control" name="suplier" placeholder="Nama Suplier">
											</div>
										</th>
										<th>
											<div class="form-group">
												<label for="user">Alamat Suplier</label>
												<input type="text" class="form-control" name="alamat_suplier" placeholder="Alamat Lengkap Suplier">
											</div>
										</th>
									</tr>
									<tr>
										<th>
											<div class="form-group">
												<label for="user">Spesifikasi</label>
												<textarea class="form-control" name="spesifikasi" placeholder="spesifikasi lengkap"></textarea>
											</div>
										</th>
									</tr>
								</thead>
							</table>
							<div class="form-group">
								<button type="submit" class="btn btn-primary" onclick="return confirm ('Simpan Data ini ?');"title="Simpan"><i class="fa fa-floppy-o"></i> Simpan</button>
								<a href="<?php echo base_url('index.php/admin/viewbarang'); ?>" class="btn btn-danger"><span class="fa fa-undo"></span> Kembali</a>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>