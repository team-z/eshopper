<?php  
$this->load->view('fpdf181/fpdf.php');

$pdf= new FPDF('L','cm',array(40,22));
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->MultiCell(37,0.5,'E shopper',0,'C'); 
$pdf->SetX(3); 
$pdf->MultiCell(33,0.5,'Loe Pasti Puas',0,'C'); 
$pdf->SetFont('Arial','B',12); 
$pdf->SetX(3); 
$pdf->MultiCell(33,0.5,'MASCITRA.COM',0,'C'); 
$pdf->SetX(3);
$pdf->MultiCell(33,0.5,'Jl.Bungur N0.130, Gebang, Kec.Patrang, Kab.Jember',0,'C'); 
$pdf->SetX(3);
$pdf->Line(1,3.1,39,3.1); 
$pdf->SetLineWidth(0.1); 
$pdf->Line(1,3.2,39,3.2); 
$pdf->SetLineWidth(0);

$pdf->Ln();

$pdf->SetFont('times','B',10);
$pdf->Cell(2,1,"Id Transaksi",1,0,"C");
$pdf->Cell(6,1,"Nama Pelanggan",1,0,"C");
$pdf->Cell(4,1,"Provinsi",1,0,"C");
$pdf->Cell(4,1,"Kabupaten/Kota",1,0,"C");
$pdf->Cell(4,1,"Kecamatan",1,0,"C");
$pdf->Cell(4,1,"Kelurahan",1,0,"C");
$pdf->Cell(7,1,"Alamat Lengkap Pengiriman",1,0,"C");
$pdf->Cell(4,1,"Kodepos",1,0,"C");
$pdf->Cell(3.5,1,"Tanggal Pengiriman",1,0,"C");

$pdf->Ln();

	foreach ($thn as $key) {
		$pdf->Cell(2,1,$key->id_transaksi,1,0,"R");
		$pdf->Cell(6,1,$key->nama_pelanggan,1,0,"R");
		$pdf->Cell(4,1,$key->provinsi,1,0,"R");
		$pdf->Cell(4,1,$key->kabupaten_kota,1,0,"R");
		$pdf->Cell(4,1,$key->kecamatan,1,0,"R");
		$pdf->Cell(4,1,$key->kelurahan,1,0,"R");
		$pdf->Cell(7,1,$key->alamat_lengkap,1,0,"R");
		$pdf->Cell(4,1,$key->kodepos,1,0,"R");
		$pdf->Cell(3.5,1,$key->tanggal_transaksi,1,0,"R");

		$pdf->Ln();
	}

$pdf->Output('pengiriman','I');
?>