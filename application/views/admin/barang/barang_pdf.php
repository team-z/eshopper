<?php 
$this->load->view('fpdf181/fpdf.php');

$pdf= new FPDF('L','cm',array(28,18));
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->SetX(3); 
$pdf->MultiCell(19.5,0.5,'E shopper',0,'C'); 
$pdf->SetX(3); 
$pdf->MultiCell(19.5,0.5,'Barang',0,'C'); 
$pdf->SetFont('Arial','B',10); 
$pdf->Line(1,3.1,27,3.1); 
$pdf->SetLineWidth(0.1); 
$pdf->Line(1,3.2,27,3.2); 
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
$pdf->Cell(2,1,"Image",1,0,"C");

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
		$image = $isi->image;

		$pdf->Cell(1.5,1,$id_barang,1,0,"C");
		$pdf->Cell(4,1,$nama_barang,1,0,"C");
		$pdf->Cell(2,1,$kategori,1,0,"C");
		$pdf->Cell(2,1,$qty,1,0,"C");
		$pdf->Cell(3,1,$harga_barang,1,0,"C");
		$pdf->Cell(2,1,$discount,1,0,"C");
		$pdf->Cell(2,1,$spesifikasi,1,0,"C");
		$pdf->Cell(2,1,$suplier,1,0,"C");
		$pdf->Cell(2,1,$alamat_suplier,1,0,"C");
		$pdf->Image(base_url('uploads/'.$image),1,1,2,2);
		
		$pdf->Ln();
	}

$pdf->Output('barang','I');
?>