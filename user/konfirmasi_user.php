<?php 

include '../config/functions_nasabah.php';

$id_mengambil =  $_GET["id_mengambil"];

$tampil = query("SELECT * FROM mengambil WHERE id_mengambil = $id_mengambil")[0];
 ?>
 <!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >

    <title>Bank Sampah Surya Mandala</title>
    <style type="text/css">
            .boxnav{
        height: 100%;
        width: 30px;
        background: #000;

      }
    </style>
  </head>
  <body class="mt-5">
	<!-- Navbar -->
<style type="text/css">
  @media (min-width: 992px) { .drop{
    margin-left: 550px;
    } }
</style>

<div class="container">
    <div class="row">
      <div class="col-md-8 justify-content-center mx-auto">
     <div class="card-group pt-5 pb-5 ml-2">
        <div class="card">
          <div class="card-header">
        <h2 class="text-center pt-4 font-weight-bold">Konfirmasi Mengambil Tabungan</h2>
        </div>
        <div class="card-body">
        	<h2 class="card-text text-center pb-3">Bukti Untuk Pengambilan Uang di Bank Sampah</h2>
        	<div class="row">
        	<div class="card pt-2 col-6">
        	<div class="form-group">
        		<h3 class="card-text text-left pl-3">Nama : </h3>
        	</div>
        	<div class="form-group">
        		<h3 class="card-text text-left pl-3">Tanggal Mengajukan :</h3>
        	</div>
        	<div class="form-group">
        		<h3 class="card-text text-left pl-3">Rekening : </h3>
        	</div>
        	<div class="form-group">
                <h3 class="card-text text-left pl-3">Jumlah Yang Diambil :</h3>
            </div>
            <div class="form-group">
        		<h3 class="card-text text-left pl-3">Tanggal Konfirmasi :</h3>
        	</div>
        	
        	</div>
        	<div class="card col-6 pt-2">
        		<div class="mb-2">
        			<h3><?= $tampil['nama'];?></h3>
        		</div>
        		<div class="mb-2">
        			<h3> <?= $tampil['tgl_permintaan'];?></h3>
        		</div>
        		<div class="mb-2">
        			<h3><?= $tampil['rek'];?></h3>
        		</div>
        		<div class="mb-2">
                    <h3><?= $tampil['jumlah'];?></h3>
                </div>
                <div class="mb-2">
        			<h3><?= $tampil['tgl_konfirmasi'];?></h3>
        		</div>
        	</div>
        	</div>
        	<div class="form-group pt-2">
        		<h3 class="card-text text-center pl-3"><?= $tampil['status'];?></h3>
        	</div>
        	<p class="card-text">*Tunjukan Bukti ini ke petugas jika sudah dikonfirmasi oleh petugas</p>
         </div>
       </div>
        </div>
      </div>      
    </div>
  </div>



    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>