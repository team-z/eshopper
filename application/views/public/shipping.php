<!DOCTYPE html>
<html>
<head>
	<?php include "head.php" ; ?>
</head>
<body>
	<header id="header"><!--header-->
		<!--/header_top-->
		<?php include "header-top.php"; ?>
		<!--/header-middle-->
	    <?php include "header-middle.php"; ?>
		<script type="text/javascript">
			var input = document.getElementById('input-rupiah');
				input.addEventListener('onchage', function(e)
			{
	var 	number_string = bilangan.replace(/[^,\d]/g, '').toString(),
		split	= number_string.split(','),
		sisa 	= split[0].length % 3,
		rupiah 	= split[0].substr(0, sisa),
		ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
		
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
});
		</script>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
			<h1>Data Pelanggan</h1><br>
				<table class="table table-striped table-bordered">
					<thead style="background-color: orange;color: white">
						<tr>
							<td>Tanggal Transaksi</td>
							<td>Nomor Pesanan</td>
							<td>Nama Pelanggan</td>
							<td>Email Pelanggan</td>
							<td>No Rekening</td>
							<td>Bank</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($user as $u) {
						$Value = array('id_transaksi' => $u->id_transaksi);
						$this->db->where($Value);
						$order = $this->db->get('pesanan')->result();
					?>
						<tr>
							<td><?php echo $u->tanggal_transaksi ; ?></td>
							<td><?php echo $u->no_pesanan; ?></td>
							<td><?php echo $u->nama_pelanggan; ?></td>
							<td><?php echo $u->email_pelanggan; ?></td>
							<td><?php echo $u->no_rekening; ?></td>
							<td><?php echo $u->bank; ?></td>
							<td><?php echo $u->status; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table><br>
				<h1>Data Pembelian & Pembayaran</h1><br>
				<table class="table table-striped table-bordered">
					<thead style="background-color: orange;color: white">
						<tr>
							<th>Nama Barang</th>
							<th>Qty</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$total = 0;
					foreach ($order as $o) {
						$dat = $this->db->get('pengiriman')->result();
					?>
						<tr>
							<td><?php echo $o->nama_barang; ?></td>
							<td><?php echo $o->qty_pesanan; ?></td>
							<td>Rp. <?php echo number_format($o->total_harga,2,',','.'); ?> ,-</td>
						</tr>
						<?php
						$total += $o->total_harga;
						$ongkir = $total + $dat[0]->biaya;
						 } ?>
					</tbody>
					<footer>
							<tr>
								<td colspan="2" align="center">Total Harga Barang</td>
								<td>Rp. <?php echo number_format($total,2,',','.'); ?>,-</td>
							</tr>
							<tr>
								<td colspan="2" align="center">Ongkir</td>
								<td>Rp. <?php echo number_format($dat[0]->biaya,2,',','.'); ?>,-</td>
							</tr>
							<tr>
								<td colspan="2" align="center">Total Bayar</td>
								<td>Rp. <?php echo number_format($ongkir,2,',','.');?>,-</td>
							</tr>
						</footer>
				</table>
			</div>
			<div class="col-md-5">
			<h1>Data Pengiriman</h1><br>
				<table class="table table-bordered table-striped">
				<?php 
				$this->db->where($Value);
				$row = $this->db->get('pengiriman')->result();
				foreach ($row as $r) { ?>
						<tr>
							<th style="background-color: orange;color: white">Provinsi</th>
							<td><?php echo $r->provinsi; ?></td>
						</tr>
						<tr>
							<th style="background-color: orange;color: white">Kabupaten / Kota</th>
							<td><?php echo $r->kabupaten_kota ; ?></td>
						</tr>
						<tr>
							<th style="background-color: orange;color: white">Kecamatan</th>
							<td><?php echo $r->kecamatan; ?></td>
						</tr>
						<tr>
							<th style="background-color: orange;color: white">Kelurahan</th>
							<td><?php echo $r->kelurahan; ?></td>
						</tr>
						<tr>
							<th style="background-color: orange;color: white">Kodepos</th>
							<td><?php echo $r->kodepos; ?></td>
						</tr>
						<tr>
							<th style="background-color: orange;color: white">Alamat Lengkap</th>
							<td><?php echo $r->alamat_lengkap; ?></td>
						</tr>

						<?php } ?>
				</table>
				<br>
				<a href="<?php echo base_url('index.php/shopping/sukses/') ?>" class="btn btn-warning btn-lg btn-block" title="">Konfirmasi</a>
			</div>
		</div>
	</div>
</body>
</html>