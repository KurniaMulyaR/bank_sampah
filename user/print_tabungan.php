<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

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

$tgl = date('d-m-Y');

$pdf->SetFont('Arial','',14);
$pdf->Cell(120,8,'',0,0,'L',0);
$pdf->Cell(30,8,'Tanggal :	',0,0,'L',0);
$pdf->Cell(50,8,$tgl,0,0,'L',0);

//set initial y axis position per page
$y_axis_initial = 60;

//print column titles

$pdf->SetFont('Arial','',9);
$pdf->SetY($y_axis_initial);
$pdf->SetX(50);
$pdf->Cell(10,10,'NO',1,0,'C',0);
$pdf->Cell(35,10,'TANGGAL NABUNG',1,0,'C',0);
$pdf->Cell(25,10,'DEBIT',1,0,'C',0);
$pdf->Cell(25,10,'KREDIT',1,0,'C',0);


$id_nasabah = $_SESSION['id_nasabah'];
//Select the Products you want to show in your PDF file
$result=mysqli_query($conn,"SELECT * FROM laporan_bank_sampah WHERE id_nasabah = '$id_nasabah'");

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
        $pdf->SetX(50);
        $pdf->Cell(10,10,$i,1,0,'L',0);
        $pdf->Cell(35,10,'tgl_nabung',1,0,'L',0);
        $pdf->Cell(25,10,'debit',1,0,'L',0);
        $pdf->Cell(25,10,'kredit',1,0,'L',0);
        
        //Go to next row
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 1;
    }

    $tgl_nabung = $row['tglmenabung'];
    $tgl_konfirmasi = $row['tgl_konfirmasi'];
	$debit = $row['debit'];
	$kredit = $row['kredit'];

    $pdf->SetY($y_axis);
    $pdf->SetX(50);
    $pdf->Cell(10,10,$i,1,0,'C',0);
    $pdf->Cell(35,10,$tgl_konfirmasi,1,0,'L',0);
	$pdf->Cell(25,10,$debit,1,0,'C',0);
	$pdf->Cell(25,10,$kredit,1,1,'C',0);
	


    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;

}


 $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit FROM laporan_bank_sampah WHERE id_nasabah = '$id_nasabah'");
 $saldo = mysqli_fetch_array($query_saldo);
 $saldo_debit = $saldo['jumlah_debit'];



 $query_saldo1 = mysqli_query($conn,"SELECT SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '$id_nasabah'");
 $saldo1 = mysqli_fetch_array($query_saldo1);
 $saldo_kredit = $saldo1['jumlah_kredit'];

 $total = $saldo_debit - $saldo_kredit;

$pdf->SetFont('Arial','',12);
$pdf->SetX(50);
$pdf->Cell(40,15,'JUMLAH',1,0,'L',0);
$pdf->Cell(25,15,$saldo_debit,1,0,'L',0);
$pdf->Cell(25,15,$saldo_kredit,1,1,'L',0);
$pdf->SetX(50);
$pdf->Cell(65,15,'SALDO KESELURUHAN',1,0,'L',0);
$pdf->Cell(25,15,$total,1,1,'L',0);

    mysqli_close($conn);

//Send file
$pdf->Output(); ?>