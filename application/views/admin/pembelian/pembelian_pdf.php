<?php  
$this->load->view('fpdf181/fpdf.php');

$pdf= new FPDF('L','cm',array(28,18));
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->SetX(3); 
$pdf->MultiCell(19.5,0.5,'E shopper',0,'C'); 
$pdf->SetX(3); 
$pdf->MultiCell(19.5,1,'Pembelian Barang',0,'C'); 
$pdf->SetFont('Arial','B',10); 
$pdf->Line(1,3.1,27,3.1); 
$pdf->SetLineWidth(0.1); 
$pdf->Line(1,3.2,27,3.2); 
$pdf->SetLineWidth(0);

$pdf->Ln();

$pdf->SetFont('times','B',8);
$pdf->Cell(2,1,"Id Pembelian",1,0,"C");
$pdf->Cell(3,1,"Nama Pembeli",1,0,"C");
$pdf->Cell(4,1,"Barang Beli",1,0,"C");
$pdf->Cell(2,1,"Jumlah Beli",1,0,"C");
$pdf->Cell(3,1,"Total Harga",1,0,"C");

$pdf->Ln();
	foreach ($pemb as $key) {
	$id_pembeli = $key->id_pembelian;
	$nama_pembeli = $key->nama_pembeli;
	$barang_pembeli = $key->barang_pembeli;
	$qty_pembeli = $key->qty_pembeli;
	$total_harga = $key->total_harga;

	$pdf->Cell(2,1,$id_pembeli,1,0,"C");
	$pdf->Cell(3,1,$nama_pembeli,1,0,"C");
	$pdf->Cell(4,1,$barang_pembeli,1,0,"C");
	$pdf->Cell(2,1,$qty_pembeli,1,0,"C");
	$pdf->Cell(3,1,$total_harga,1,0,"C");

	$pdf->Ln();
	}

$pdf->Output('pembelian','I');
?>