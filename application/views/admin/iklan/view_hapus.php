<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/top'); ?>
	<title>Iklan</title>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('admin/sidebar'); ?>
		<div id="main-panel">
			<?php $this->load->view('admin/navigasi'); ?>
			<div class="panel panel-default">
				<div class="panel panel-heading">
					<h2><center>Iklan Banner</center></h2>
				</div>
				<?php 
						 $link = mysqli_connect('localhost','root','','eshopper');
						 $query = mysqli_query($link,"SELECT * FROM iklan");
						 $iklan = mysqli_fetch_array($query);
						?>
				<section class="content">
					<div>
					    <?php echo @$pesan; ?>
					</div>
				</section>
				<div class="panel panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<?php echo form_open_multipart('iklan/in_iklan/1');?>
								<input type="hidden" name="gambar" value="<?php echo $iklan['banner1']; ?>">
								<input type="hidden" name="posisi" value="banner1">
								<img id="preview1" src="<?php if ($iklan['banner1'] == "") {
				                                   echo base_url('./assets/images/icon_ad.png');
				                               } else {
				                                   echo base_url('uploads/'.$iklan['banner1']);
				                               } ?>" class="img-responsive" alt="User Image"/>
					                <input accept="image/*" class="input btn"  onchange="tampilkanPreview(this,'preview1')" type="file" name="gambar" value="">
								<div class="caption">
									<button type="submit" class="btn btn-block btn-info"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
								</div>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<?php echo form_open_multipart('iklan/in_iklan/1');?>
								<input type="hidden" name="gambar" value="<?php echo $iklan['banner2']; ?>">
								<input type="hidden" name="posisi" value="banner2">
									<img id="preview2" src="<?php if ($iklan['banner2'] == "") {
				                                   echo base_url('./assets/images/icon_ad.png');
				                               } else {
				                                   echo base_url('uploads/'.$iklan['banner2']);
				                               } ?>" class="img-responsive" alt="User Image"/>
					                <input accept="image/*" class="input btn"  onchange="tampilkanPreview(this,'preview2')" type="file" name="gambar" value="">
								<div class="caption">
									<button type="submit" class="btn btn-block btn-info"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
								</div>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<?php echo form_open_multipart('iklan/in_iklan/1');?>
								<input type="hidden" name="gambar" value="<?php echo $iklan['banner3']; ?>">
								<input type="hidden" name="posisi" value="banner3">
									<img id="preview3" src="<?php if ($iklan['banner3'] == "") {
				                                   echo base_url('./assets/images/icon_ad.png');
				                               } else {
				                                   echo base_url('uploads/'.$iklan['banner3']);
				                               } ?>" class="img-responsive" alt="User Image"/>
					                <input accept="image/*" class="input btn"  onchange="tampilkanPreview(this,'preview3')" type="file" name="gambar" value="">
								<div class="caption">
									<button type="submit" class="btn btn-block btn-info"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
								</div>
								</form>
							</div>
						</div>
						<div class="row">
							- untuk ukuran banner di anjurkan 1280X441px
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><center>Iklan Bawah</center></h2>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="thumbnail">
								<?php echo form_open_multipart('iklan/in_iklan/1');?>
								<input type="hidden" name="gambar" value="<?php echo $iklan['gambar1']; ?>">
								<input type="hidden" name="posisi" value="gambar1">
									<img id="preview4" src="<?php if ($iklan['gambar1'] == "") {
				                                   echo base_url('./assets/images/icon_ad.png');
				                               } else {
				                                   echo base_url('uploads/'.$iklan['gambar1']);
				                               } ?>" class="img-responsive" alt="User Image"/>
					                <input accept="image/*" class="input btn"  onchange="tampilkanPreview(this,'preview4')" type="file" name="gambar" value="">
								<div class="caption">
									<button type="submit" class="btn btn-block btn-info"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
								</div>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="thumbnail">
								<?php echo form_open_multipart('iklan/in_iklan/1');?>
								<input type="hidden" name="gambar" value="<?php echo $iklan['gambar2']; ?>">
								<input type="hidden" name="posisi" value="gambar2">
									<img id="preview5" src="<?php if ($iklan['gambar2'] == "") {
				                                   echo base_url('./assets/images/icon_ad.png');
				                               } else {
				                                   echo base_url('uploads/'.$iklan['gambar2']);
				                               } ?>" class="img-responsive" alt="User Image"/>
					                <input accept="image/*" class="input btn"  onchange="tampilkanPreview(this,'preview5')" type="file" name="gambar" value="">
								<div class="caption">
									<button type="submit" class="btn btn-block btn-info"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
								</div>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="thumbnail">
								<?php echo form_open_multipart('iklan/in_iklan/1');?>
								<input type="hidden" name="gambar" value="<?php echo $iklan['gambar3']; ?>">
								<input type="hidden" name="posisi" value="gambar3">
									<img id="preview6" src="<?php if ($iklan['gambar3'] == "") {
				                                   echo base_url('./assets/images/icon_ad.png');
				                               } else {
				                                   echo base_url('uploads/'.$iklan['gambar3']);
				                               } ?>" class="img-responsive" alt="User Image"/>
					                <input accept="image/*" class="input btn"  onchange="tampilkanPreview(this,'preview6')" type="file" name="gambar" value="">
								<div class="caption">
									<button type="submit" class="btn btn-block btn-info"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
								</div>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="thumbnail">
								<?php echo form_open_multipart('iklan/in_iklan/1');?>
								<input type="hidden" name="gambar" value="<?php echo $iklan['gambar4']; ?>">
								<input type="hidden" name="posisi" value="gambar4">
									<img id="preview7" src="<?php if ($iklan['gambar4'] == "") {
				                                   echo base_url('./assets/images/icon_ad.png');
				                               } else {
				                                   echo base_url('uploads/'.$iklan['gambar4']);
				                               } ?>" class="img-responsive" alt="User Image"/>
					                <input accept="image/*" class="input btn"  onchange="tampilkanPreview(this,'preview7')" type="file" name="gambar" value="">
								<div class="caption">
									<button type="submit" class="btn btn-block btn-info"><span class="fa fa-floppy-o"></span> Simpan Perubahan</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					<div class="row" align="center">
						untuk ukuran iklan bawah 262.5X200px
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/bottom'); ?>
</body>
</html>