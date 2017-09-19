<!DOCTYPE html>
<html>
<head>
	<title>Import Data Barang</title>
	<?php $this->load->view('admin/top.php'); ?>
	<style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>
</head>
<body>
<div id="wrapper">
	<?php $this->load->view('admin/sidebar.php'); ?>
	<div id="main-panel">
		<?php $this->load->view('admin/navigasi.php'); ?>

		<h3><center>Import Data (.xlsx)</center></h3>
		<div class="panel panel-default">
        <section class="content">
            <div>
                <?php echo @$pesan; ?>
            </div>
        </section>
		<a href="<?php echo base_url('index.php/admin/buat_template'); ?>" class="btn btn-warning"><span></span>Buat Template</a>
            <div class="panel-heading">
                Members list
                <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Members</a>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url('index.php/php_excel/importfile');  ?>" method="POST" enctype="multipart/form-data" id="importFrm">
                    <input type="file" name="file" id="file">
                    <input type="submit" class="btn btn-primary" id="submit" name="import" value="IMPORT">
                </form>
                <table class="table table-bordered">
                    <thead>
            	        <tr class="danger">
            	        	<TH>NO.</TH>
                            <TH>ID BARANG</TH>
                            <TH>NAMA BARANG</TH>
                            <TH>KATEGORI</TH>
                            <TH>QUANITY</TH>
                            <TH>SUPLIER</TH>
                            <TH>ALAMAT SUPLIER</TH>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    	$no=1;
                    	foreach ($barang as $isi) {
                    		?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $isi->id_barang; ?></td>
                            <td><?php echo $isi->nama_barang; ?></td>
                            <td><?php echo $isi->kategori; ?></td>
                            <td><?php echo $isi->qty; ?></td>
                            <td><?php echo $isi->suplier; ?></td>
                            <td><?php echo $isi->alamat_suplier; ?></td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo base_url('index.php/admin/viewbarang') ;?>" class="btn btn-danger"><span class="fa fa-undo"></span> Kembali</a>
        </div>
	</div>
</div>

<?php $this->load->view('admin/bottom.php'); ?>
</body>
</html>