<?php $link = mysqli_connect('localhost', 'root', '', 'eshopper') ?>
<!DOCTYPE html>
<html>
<head>
	<?php include "top.php"; ?>
	<title>Admin LTE</title>
</head>
<body>
	<div id="wrapper">
		<?php include "sidebar.php"; ?>
		<div id="main-panel">
			<?php include "navigasi.php"; ?>

			<div id="content">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default panel-fill">
							<div class="panel-body">
								<span class="text-size-22"><i class="fa fa-archive space-right-10"></i>Barang : <?php $this->db->from('barang');
									echo $this->db->count_all_results(); ?></span> 
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="panel panel-info panel-fill">
							<div class="panel-body">
								<span class="text-size-22"><i class="fa fa-credit-card fa-list-alt space-right-10"></i>Transaksi : <?php $this->db->from('transaksi');
												echo $this->db->count_all_results(); ?></span>
									<!--<p class="break-top-10 text-size-16"></p>-->
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="panel panel-warning panel-fill">
							<div class="panel-body">
								<span class="text-size-22"><i class="fa fa-fw fa-truck space-right-10"></i>Pengiriman : <?php $this->db->from('pengiriman');
									echo $this->db->count_all_results(); ?></span>
									<!--<p class="break-top-10 text-size-16"></p>-->
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<section class="panel panel-primary">
		                <header class="panel-heading">
		                    <h4>Grafik Penjualan</h4>
		                </header>
		                <div class="panel-body">
		        	        <canvas id="linechart" width="600" height="300"></canvas>
		                </div>
		            </section>
				</div>

				<div class="col-md-4">
					<section class="panel panel-success"">
            			<header class="panel-heading">
                           <h4>Notifications</h4>
                            <div class="panel-body" id="noti-box">
                            	<div class="alert alert-success">
                            		<button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
									<strong>Pemberitahuan <?php $query = mysqli_query($link,"SELECT * FROM barang ORDER BY id_barang DESC"); $m=mysqli_fetch_array($query); echo $m['nama_barang']; ?></strong> telah ditambahkan
                            	</div>
                            	<div class="alert alert-warning">
                            		<button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
									<strong>Pemberitahuan</strong> <?php $query = mysqli_query($link,"SELECT * FROM transaksi ORDER BY id_transaksi DESC"); $j=mysqli_fetch_array($query); echo "Pelanggan".$j['nama_pelanggan']; ?></strong> telah melakukan pembelian <b><?= $j['barang_beli'] ?></b>
                            	</div>
                            	<div class="alert alert-info">
                            		<button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
									<strong>Pemberitahuan</strong> <?php $query = mysqli_query($link,"SELECT * FROM pengiriman ORDER BY id_transaksi DESC"); $k=mysqli_fetch_array($query); echo $m['nama_barang']. "telah dikirim kepada "."Pelanggan dengan ID Transaksi".$k['id_transaksi']; ?>
                            	</div>
                            </div>
                        </header>
           		 	</section>
				</div>
			</div>
            
			
		</div>
	</div>
	<?php include "bottom.php"; ?>
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/plugin/chart.js'); ?>"></script>
	<?php  
	$link = mysqli_connect('localhost','root','','eshopper');

	$sql=mysqli_query($link, "SELECT date_format(tanggal, '%b') as bulan FROM pengiriman");
	$id=mysqli_fetch_array($sql);
	$this->db->select('*');
	$this->db->from('pengiriman');
	$this->db->join('transaksi', 'transaksi.id_transaksi = pengiriman.id_transaksi');
	$join = $this->db->get()->result();
	?>
	<script type="text/javascript">
    $(function() {
	                "use strict";
	                //BAR CHART
	                var data = {
	                    labels: [<?php while ($ko=mysqli_fetch_array($sql)) { echo "'".$ko["bulan"]."',"; }?>],
	                    datasets: [
	                        {
	                            label: "My First dataset",
	                            fillColor: "rgba(151,187,205,0.2)",
	                            strokeColor: "rgba(151,187,205,1)",
	                            pointColor: "rgba(151,187,205,1)",
	                            pointStrokeColor: "#fff",
	                            pointHighlightFill: "#fff",
	                            pointHighlightStroke: "rgba(151,187,205,1)",
	                            data: [<?php
	                            	foreach ($join as $key) {
	                            		echo "'".$key->total_beli."',";
	                            	}
	                            ?>]
	                        }
	                    ]
	                };
	            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
	                responsive : true,
	                maintainAspectRatio: false,
	            });

	            });
	            // Chart.defaults.global.responsive = true;
	</script>
</body>
</html>