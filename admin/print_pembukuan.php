<?php 

require('../fpdf/fpdf.php');

//Connect to your database
include("../config/db.php");

//Create new pdf file
$pdf=new FPDF('P','mm','A4');
//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(20,8,'',0,0,'L',0);
$pdf->Cell(50,8,'BANK SAMPAH PONDOK SURYA MANDALA SEJAHTERA',0,0,'L',0);
$pdf->Cell(20,8,'',0,1,'L',0);

$pdf->SetFont('Arial','',14);
$pdf->Cell(28,8,'',0,0,'L',0);
$pdf->Cell(50,8,'Perumahan Pondok Surya Mandala, Jakamulya, Bekasi Selatan',0,0,'L',0);
$pdf->Cell(20,8,'',0,1,'L',0);

$pdf->Cell(190,1,'',1,1,'L',1);


$pdf->SetFont('Arial','',16);
$pdf->Cell(28,15,'',0,0,'L',0);
$pdf->Cell(50,15,'Laporan Keuangan Bank Sampah Pondok Surya Mandala',0,0,'L',0);
$pdf->Cell(20,15,'',0,1,'L',0);

$tgl = date('d m Y');

$pdf->SetFont('Arial','',14);
$pdf->Cell(120,8,'',0,0,'L',0);
$pdf->Cell(30,8,'Tanggal :	',0,0,'L',0);
$pdf->Cell(50,8,$tgl,0,0,'L',0);

//set initial y axis position per page
$y_axis_initial = 60;

//print column titles

$pdf->SetFont('Arial','',9);
$pdf->SetY($y_axis_initial);
$pdf->SetX(10);
$pdf->Cell(10,10,'NO',1,0,'C',0);
$pdf->Cell(50,10,'NAMA',1,0,'C',0);
$pdf->Cell(30,10,'REK',1,0,'C',0);
$pdf->Cell(30,10,'TANGGAL NABUNG',1,0,'C',0);
$pdf->Cell(25,10,'DEBIT',1,0,'C',0);
$pdf->Cell(25,10,'KREDIT',1,0,'C',0);
$pdf->Cell(25,10,'SALDO',1,0,'C',0);


//Select the Products you want to show in your PDF file
$result=mysqli_query($conn,"SELECT * FROM laporan_bank_sampah JOIN nasabah ON laporan_bank_sampah.id_nasabah=nasabah.id_nasabah order by id_laporan_bank desc");

//initialize counter
$i = 1;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 10;

$y_axis = $y_axis_initial + $row_height;

while($row = mysqli_fetch_array($result))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(10);
        $pdf->Cell(10,10,$i,1,0,'L',0);
        $pdf->Cell(50,10,'nama',1,0,'L',0);
        $pdf->Cell(30,10,'rek',1,0,'L',0);
        $pdf->Cell(30,10,'tgl_nabung',1,0,'L',0);
        $pdf->Cell(25,10,'debit',1,0,'L',0);
        $pdf->Cell(25,10,'kredit',1,0,'L',0);
        $pdf->Cell(25,10,'saldo',1,0,'L',0);
        
        //Go to next row
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 1;
    }

    $nama = $row['nama'];
    $rek = $row['rek'];
    $tgl_nabung = $row['tglmenabung'];
	$debit = $row['debit'];
	$kredit = $row['kredit'];
	$saldo = $row['saldo'];

    $pdf->SetY($y_axis);
    $pdf->SetX(10);
    $pdf->Cell(10,10,$i,1,0,'C',0);
    $pdf->Cell(50,10,$nama,1,0,'L',0);
    $pdf->Cell(30,10,$rek,1,0,'C',0);
    $pdf->Cell(30,10,$tgl_nabung,1,0,'L',0);
	$pdf->Cell(25,10,$debit,1,0,'L',0);
	$pdf->Cell(25,10,$kredit,1,0,'L',0);
	$pdf->Cell(25,10,$saldo,1,1,'L',0);
	


    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;

}


 $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit FROM laporan_bank_sampah");
 $saldo = mysqli_fetch_array($query_saldo);
 $saldo_debit = $saldo['jumlah_debit'];



 $query_saldo1 = mysqli_query($conn,"SELECT SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah");
 $saldo1 = mysqli_fetch_array($query_saldo1);
 $saldo_kredit = $saldo1['jumlah_kredit'];

 $total = $saldo_debit - $saldo_kredit;

$pdf->SetFont('Arial','',12);
$pdf->Cell(120,15,'JUMLAH',1,0,'L',0);
$pdf->Cell(25,15,$saldo_debit,1,0,'L',0);
$pdf->Cell(25,15,$saldo_kredit,1,0,'L',0);
$pdf->Cell(25,15,'',1,1,'L',0);
$pdf->Cell(145,15,'SALDO KESELURUHAN',1,0,'L',0);
$pdf->Cell(25,15,$total,1,0,'L',0);
$pdf->Cell(25,15,'',1,1,'L',0);

    mysqli_close($conn);

//Send file
$pdf->Output(); ?>