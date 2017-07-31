<?php  
	$ha = mysqli_connect('localhost','root','','eshopper');

	$dat = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='01' GROUP BY date_format(tanggal_transaksi, '%m')='01' ");
	$ss = mysqli_num_rows($dat);

	$dat2 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='02' GROUP BY date_format(tanggal_transaksi, '%m')='02' ");
	$ss2 = mysqli_num_rows($dat2);

	$dat3 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='03' GROUP BY date_format(tanggal_transaksi, '%m')='03' ");
	$ss3 = mysqli_num_rows($dat3);

	$dat4 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='04' GROUP BY date_format(tanggal_transaksi, '%m')='04' ");
	$ss4 = mysqli_num_rows($dat4);

	$dat5 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='05' GROUP BY date_format(tanggal_transaksi, '%m')='05' ");
	$ss5 = mysqli_num_rows($dat5);

	$dat6 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='06' GROUP BY date_format(tanggal_transaksi, '%m')='06' ");
	$ss6 = mysqli_num_rows($dat6);

	$dat7 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='07' GROUP BY date_format(tanggal_transaksi, '%m')='07' ");
	$ss7 = mysqli_num_rows($dat7);

	$dat8 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='08' GROUP BY date_format(tanggal_transaksi, '%m')='08' ");
	$ss8 = mysqli_num_rows($dat8);

	$dat9 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='09' GROUP BY date_format(tanggal_transaksi, '%m')='09' ");
	$ss9 = mysqli_num_rows($dat9);

	$dat10 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='10' GROUP BY date_format(tanggal_transaksi, '%m')='10' ");
	$ss10 = mysqli_num_rows($dat10);

	$dat11 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='11' GROUP BY date_format(tanggal_transaksi, '%m')='11' ");
	$ss11 = mysqli_num_rows($dat11);

	$dat12 = mysqli_query($ha, "SELECT id_pesanan FROM pesanan WHERE YEAR(tanggal_transaksi) = YEAR(NOW()) AND date_format(tanggal_transaksi, '%m')='12' GROUP BY date_format(tanggal_transaksi, '%m')='12' ");
	$ss12 = mysqli_num_rows($dat12);
?>