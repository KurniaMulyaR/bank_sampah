<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Bank Sampah Surya Mandala</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style3.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><a href="index2.php"><img src="../img/bsip3.png" height="100px"></a></h3>
              </div>

             <ul class="list-unstyled components">
                <li class="active">
                    <a href="index2.php">Beranda</a>
                </li>
                <li>
                    <a href="nasabah_admin.php">Data Nasabah</a>
                </li>                
                <li>
                    <a href="pembukuan_admin.php">Pembukuan</a>
                </li>
                <li>
                    <a href="Konfrimasi_pengambilan.php">Permintaan Mengambil Tabungan</a>
                </li>
                <li>
                    <a href="data_sampah.php">Data Sampah</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg" style="padding: 36px 10px;">

                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-align-left"></i>
                    </button>
                     <h2 class=" font-weight-bold pt-2 text-light">Bank Sampah Pondok Surya Mandala Sejahtera</h2>
                    <div id="navbarSupportedContent">    
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active" >
                                <button class="btn btn-light">
                                    <a href="logout.php" title="Log Out">
                                    <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
<?php 

include '../config/functions_nasabah.php';

$query_nasabah = mysqli_query($conn, "SELECT * FROM nasabah");
$num_nasabah = mysqli_num_rows($query_nasabah);
 ?>
<div class="container-fluid pl-5 pt-2">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card text-center" style="border-radius: 20px; width: 23rem; height: 15rem;">
          <div style="border-radius: 20px;" class="card-body bg-primary text-light">
            <div class="h4 card-header">
                NASABAH BERGABUNG
            </div>
            <br>
            <h1 class="display-2">
                <?= $num_nasabah;?>
            </h1>
          </div>
        </div>
      </div>
<?php
$bulan = date('m');
$query_saldo = mysqli_query($conn, "SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE date_format((tglmenabung),'%m') like '%$bulan%'");
$saldo = mysqli_fetch_array($query_saldo);
$saldo_bulan = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];


?>
      <div class="col-md-4">
        <div class="card text-center" style="border-radius: 20px; width: 23rem; height: 15rem;">
          <div style="border-radius: 20px;" class="card-body bg-warning text-light">
            <div class="h4 card-header">
                Saldo Bulan ini
            </div>
            <br>
            <h1>
                Rp. <?= $saldo_bulan;?>
            </h1>
          </div>
        </div>
      </div>
  </div>
<?php 
$query_saldo = mysqli_query($conn, "SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah");
$row = mysqli_fetch_array($query_saldo);
$saldo_keseluruhan = $row['jumlah_debit'] - $row['jumlah_kredit'];


?>
      <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card text-center" style="border-radius: 20px; width: 23rem; height: 15rem;">
          <div style="border-radius: 20px;" class="card-body bg-success text-light">
            <div class="h4 card-header">
                Saldo Keseluruhan
            </div>
            <br>
            <h1>
                Rp. <?= $saldo_keseluruhan;?>
            </h1>
          </div>
        </div>
      </div>
      <?php
$tahun = date('Y');
$query_saldo = mysqli_query($conn, "SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE date_format((tglmenabung),'%Y') like '%$tahun%'");
$saldo = mysqli_fetch_array($query_saldo);
$saldo_tahun = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];


?>
      <div class="col-md-4">
        <div class="card text-center" style="border-radius: 20px; width: 23rem; height: 15rem;">
          <div style="border-radius: 20px;" class="card-body bg-dark text-light">
            <div class="h4 card-header">
                Saldo Tahun ini
            </div>
            <br>
            <h1>
                Rp. <?= $saldo_tahun;?>
            </h1>
          </div>
        </div>
      </div>      
    </div>
</div>
  </div>

           

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>