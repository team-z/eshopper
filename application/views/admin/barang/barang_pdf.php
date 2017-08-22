<?php 
$this->load->view('fpdf181/fpdf.php');

$pdf= new FPDF('L','cm',array(30,20));
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->MultiCell(29,0.5,'E shopper',0,'C'); 
$pdf->SetX(3); 
$pdf->MultiCell(25,0.5,'Loe Pasti Puas',0,'C'); 
$pdf->SetFont('Arial','B',10); 
$pdf->SetX(3); 
$pdf->MultiCell(25,0.5,'MASCITRA.COM',0,'C'); 
$pdf->SetX(3);
$pdf->MultiCell(25,0.5,'Jl.Bungur N0.130, Gebang, Kec.Patrang, Kab.Jember',0,'C'); 
$pdf->SetX(3);
$pdf->Line(1,3.1,29,3.1); 
$pdf->SetLineWidth(0.1); 
$pdf->Line(1,3.2,29,3.2); 
$pdf->SetLineWidth(0);

$pdf->Ln();

$pdf->SetFont('times','B',8);
$pdf->Cell(1.5,1,"Id Barang",1,0,"C");
$pdf->Cell(4,1,"Nama Barang",1,0,"C");
$pdf->Cell(2,1,"Kategori",1,0,"C");
$pdf->Cell(2,1,"QTY",1,0,"C");
$pdf->Cell(3,1,"Harga Barang",1,0,"C");
$pdf->Cell(2,1,"Discount",1,0,"C");
$pdf->Cell(4,1,"Spesifikasi",1,0,"C");
$pdf->Cell(4,1,"Suplier",1,0,"C");
$pdf->Cell(4,1,"Alamat Suplier",1,0,"C");

$pdf->Ln();

	foreach ($barang as $isi) {
		$id_barang = $isi->id_barang;
		$nama_barang = $isi->nama_barang;
		$kategori = $isi->kategori;
		$qty = $isi->qty;
		$harga_barang = $isi->harga_barang;
		$discount = $isi->discount;
		$spesifikasi = $isi->spesifikasi;
		$suplier = $isi->suplier;
		$alamat_suplier = $isi->alamat_suplier;

		$pdf->Cell(1.5,1,$id_barang,1,0,"R");
		$pdf->Cell(4,1,$nama_barang,1,0,"R");
		$pdf->Cell(2,1,$kategori,1,0,"R");
		$pdf->Cell(2,1,$qty,1,0,"R");
		$pdf->Cell(3,1,$harga_barang,1,0,"R");
		$pdf->Cell(2,1,$discount,1,0,"R");
		$pdf->Cell(4,1,$spesifikasi,1,0,"R");
		$pdf->Cell(4,1,$suplier,1,0,"R");
		$pdf->Cell(4,1,$alamat_suplier,1,0,"R");
		
		$pdf->Ln();
	}

$pdf->Output('barang','I');
?>