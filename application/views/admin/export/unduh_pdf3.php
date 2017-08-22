<?php  
$this->load->view('fpdf181/fpdf.php');

$pdf= new FPDF('L','cm',array(24,17));
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->MultiCell(23,0.5,'E shopper',0,'C'); 
$pdf->SetX(3); 
$pdf->MultiCell(19,0.5,'Loe Pasti Puas',0,'C'); 
$pdf->SetFont('Arial','B',10); 
$pdf->SetX(3); 
$pdf->MultiCell(19,0.5,'MASCITRA.COM',0,'C'); 
$pdf->SetX(3);
$pdf->MultiCell(19,0.5,'Jl.Bungur N0.130, Gebang, Kec.Patrang, Kab.Jember',0,'C'); 
$pdf->SetX(3);
$pdf->Line(1,3.1,23,3.1); 
$pdf->SetLineWidth(0.1); 
$pdf->Line(1,3.2,23,3.2); 
$pdf->SetLineWidth(0);

$pdf->Ln();

$pdf->SetFont('times','B',8);
$pdf->Cell(1.5,1,"Id Barang",1,0,"C");
$pdf->Cell(4,1,"Nama Barang",1,0,"C");
$pdf->Cell(2,1,"Kategori",1,0,"C");
$pdf->Cell(2,1,"QTY",1,0,"C");
$pdf->Cell(3,1,"Harga Barang",1,0,"C");
$pdf->Cell(2,1,"Discount",1,0,"C");
$pdf->Cell(2,1,"Spesifikasi",1,0,"C");
$pdf->Cell(2,1,"Suplier",1,0,"C");
$pdf->Cell(2,1,"Alamat Suplier",1,0,"C");

$pdf->Ln();

	foreach ($barang as $key) {
		$pdf->Cell(1.5,1,$key->id_barang,1,0,"R");
		$pdf->Cell(4,1,$key->nama_barang,1,0,"R");
		$pdf->Cell(2,1,$key->kategori,1,0,"R");
		$pdf->Cell(2,1,$key->qty,1,0,"R");
		$pdf->Cell(3,1,$key->harga_barang,1,0,"R");
		$pdf->Cell(2,1,$key->discount,1,0,"R");
		$pdf->Cell(2,1,$key->spesifikasi,1,0,"R");
		$pdf->Cell(2,1,$key->suplier,1,0,"R");
		$pdf->Cell(2,1,$key->alamat_suplier,1,0,"R");

		$pdf->Ln();
	}

$pdf->Output('barang','I');
?>