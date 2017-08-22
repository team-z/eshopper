<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top.php'); ?>
	<title>Update Barang</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar.php'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi.php'); ?>
			
			<div class="row">

				
				<div class="col-md-3">
					<div class="form-group">
					<?php foreach ($data as $key) {?>
						<img id="preview" src="<?php if ($key->image == "") {
		                                   echo base_url('uploads/barang.jpg');
		                               } else {
		                                   echo base_url('uploads/'.$key->image);
		                               } ?>" height="200" width="200" class="img-circle" alt="User Image"/>
		                    <a href="<?php echo base_url('index.php/admin/view_updateimgbrg/').$key->id_barang; ?>" class="btn btn-block btn-default"><span class="fa fa-picture-o"></span> Update Image</a>
					<?php } ?>
					</div>
				</div>
					
				<?php echo form_open_multipart('admin/update'); ?>
					<div class="col-md-9">
						<table class="table table-striped">
							<?php foreach ($data as $key) {?>
							<thead>
								<tr>
									<th>
										<div class="form-group">
											<label for="user">Nama Barang</label>
											<input type="hidden" name="id_barang" value="<?php echo $key->id_barang; ?>">
											<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?php echo $key->nama_barang; ?>">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">Kategori</label>
											<input type="text" class="form-control" name="kategori" placeholder="kategori" value="<?php echo $key->kategori; ?>">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">Quanity</label>
											<input type="text" class="form-control" name="qty" placeholder="unit" value="<?php echo $key->qty; ?>">
										</div>
									</th>
								</tr>
								<tr>
									<th>
										<div class="form-group">
											<label for="user">Harga Barang</label>
											<input type="text" class="form-control" name="harga_barang" placeholder="Rp." value="<?php echo $key->harga_barang; ?>">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">Discount</label>
											<input type="text" class="form-control" name="discount" placeholder="%" value="<?php echo $key->discount; ?>">
										</div>
									</th>
								</tr>
								<tr>
									<th>
										<div class="form-group">
											<label for="user">Suplier</label>
											<input type="text" class="form-control" name="suplier" placeholder="Nama Suplier" value="<?php echo $key->suplier; ?>">
										</div>
									</th>
									<th>
										<div class="form-group">
											<label for="user">Alamat Suplier</label>
											<input type="text" class="form-control" name="alamat_suplier" placeholder="Alamat Lengkap Suplier" value="<?php echo $key->alamat_suplier; ?>">
										</div>
									</th>
								</tr>
								<tr>
									<th>
										<div class="form-group">
											<label for="user">Spesifikasi</label>
											<textarea class="form-control" name="spesifikasi" placeholder="spesifikasi lengkap"><?php echo $key->spesifikasi; ?></textarea>
										</div>
									</th>
								</tr>
								<?php } ?>
							</thead>
						</table>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" onclick="return confirm ('Simpan data <?php echo $key->nama_barang; ?> ini ?');"title="Simpan"><i class="fa fa-floppy-o"></i> Simpan</button>
							<a href="<?php echo base_url('index.php/admin/viewbarang'); ?>" class="btn btn-danger"><span class="fa fa-undo"></span> Keluar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>