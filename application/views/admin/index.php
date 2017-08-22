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
							<a href="<?php echo base_url('index.php/admin/viewbarang'); ?>">
								<div class="panel-body">
								<span class="text-size-22"><i class="fa fa-archive space-right-10"></i>Barang : <?php $this->db->from('barang');
									echo $this->db->count_all_results(); ?></span> 
							</div>
							</a>
						</div>
					</div>

					<div class="col-md-3">
						<div class="panel panel-info panel-fill">
							<a href="<?php echo base_url('index.php/admin2/viewtransaksi'); ?>">
								<div class="panel-body">
									<span class="text-size-22"><i class="fa fa-credit-card fa-list-alt space-right-10"></i>Transaksi : <?php $this->db->from('transaksi');
													echo $this->db->count_all_results(); ?></span>
										<!--<p class="break-top-10 text-size-16"></p>-->
								</div>
							</a>
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
		        	        Menampilkan data banyaknya transaksi per-Bulan
		                </div>
		            </section>
		            <section class="panel panel-primary">
			            <header class="panel-heading">
			                <h4>Grafik Barang</h4>
			            </header>
			            <div class="panel-body">
			               <div id="piechart" width="300" height="300" style="margin: 0 auto"></div>
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
									<strong>Pemberitahuan</strong> <?php $query = mysqli_query($link,"SELECT * FROM transaksi ORDER BY id_transaksi DESC"); $j=mysqli_fetch_array($query); echo "Pelanggan "."<b>".$j['nama_pelanggan']."</b>"; ?></strong> telah melakukan transaksi pembelian
                            	</div>
                            	<div class="alert alert-info">
                            		<button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
									<strong>Pemberitahuan <?php $query = mysqli_query($link,"SELECT * FROM pengiriman ORDER BY id_transaksi DESC"); $k=mysqli_fetch_array($query); echo $m['nama_barang']."</strong>". " telah dikirim kepada "."Pelanggan dengan ID Transaksi <b>".$k['id_transaksi']."</b>"; ?>
                            	</div>
                            	<div class="alert alert-default">
                            		<button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
									<strong>Pemberitahuan</strong> <?php $kk = mysqli_query($link, "SELECT * FROM pesanan GROUP BY id_pesanan DESC"); $ao=mysqli_fetch_array($kk); 
									echo "Pelanggan dengan id transaksi <b>".$ao['id_transaksi']."</b> telah membeli barang <b>".$ao['nama_barang']."</b> dengan jumlah <b>".$ao['qty_pesanan']."</b> unit"; ?>
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
	<script src="<?php echo base_url('assets/js/plugin/highcharts.js'); ?>"></script>
	<script type="text/javascript">
	<?php include "grafik.php";?>
    $(function() {
	                "use strict";
	                //BAR CHART
	                var data = {
	                    labels: ["Jan", "Feb", "March", "April", "Mei", "Jun", "July", "Augst", "Sept", "Oct", "Nov", "Des"],
	                    datasets: [
	                        {
	                            label: "My First dataset",
	                            fillColor: "rgba(151,187,205,0.2)",
	                            strokeColor: "rgba(151,187,205,1)",
	                            pointColor: "rgba(151,187,205,1)",
	                            pointStrokeColor: "#fff",
	                            pointHighlightFill: "#fff",
	                            pointHighlightStroke: "rgba(151,187,205,1)",
	                            data: [<?php echo $ss.",".$ss2.",".$ss3.",".$ss4.",".$ss5.",".$ss6.",".$ss7.",".$ss8.",".$ss9.",".$ss10.",".$ss11.",".$ss12; ?>]
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

	<script type="text/javascript">
		Highcharts.chart('piechart', {
		    chart: {
		        plotBackgroundColor: null,
		        plotBorderWidth: null,
		        plotShadow: false,
		        type: 'pie'
		    },
		    title: {
		        text: 'Stok Barang Saat Ini'
		    },
		    tooltip: {
		       // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' //menampilkan jumlah satuan %
		       valueDecimals: 0,
		       //valuePrefix: '$',
		       valueSuffix: ' Unit'
		    },
		    plotOptions: {
		        pie: {
		            allowPointSelect: true,
		            cursor: 'pointer',
		            dataLabels: {
		                enabled: true,
		                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		                style: {
		                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		                }
		            }
		        }
		    },
		    series: [{
		        name: 'Stok',
		        colorByPoint: true,
		        data: [
		        		<?php
                        $query = mysqli_query($link,"SELECT nama from kategori");
                     
                        while ($row = mysqli_fetch_array($query)) {
                            $barang = $row['nama'];
                         
                            $data = mysqli_query($link,"SELECT SUM(qty) from barang where kategori='$barang'");
                            $jumlah = mysqli_fetch_array($data);
                            ?>
                            [ 
                                '<?php echo $barang ?>', <?php echo $jumlah['SUM(qty)']; ?>
                            ],
                            <?php
                        }
                        ?>
		        	]
		    }]
		});
		</script>
</body>
</html>