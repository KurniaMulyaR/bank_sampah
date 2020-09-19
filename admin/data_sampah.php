<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

require '../config/functions_data_sampah.php'; 
// pagination
$jumlahdataperhalaman = 10;

$jumlahdata = count(query("SELECT * FROM data_sampah"));

$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
// halaman

$tampil = query("SELECT * FROM data_sampah ORDER BY id_data_smph DESC LIMIT $awaldata, $jumlahdataperhalaman");

if(isset($_POST["kata"])){
    $tampil = search_dt_smph($_POST["kata"]);
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
                <li>
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
                <li  class="active">
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
                        <span></span>
                    </button>
                     <h2 class="font-weight-bold pt-2 text-light">Bank Sampah Pondok Surya Mandala Sejahtera</h2>
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
<div class="container-fluid">
<h2 class="text-center pb-3">SIMPANAN SAMPAH BANK SAMPAH PONDOK SURYA MANDALA SEJAHTERA</h2>
<div class="row">
    <form class="form-inline col-4 ml-auto" method="post">
    <div class="form-group mx-sm-3 mb-2 ml-auto">
    <input type="text" class="form-control" id="inputPassword2" name="kata" placeholder="Mencari Sampah" autofocus autocomplete="off">
  </div>
     <button class="btn btn-info mx-sm-3 mb-2" name="search_nasabah" type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<table class="table table-bordered table-hover mr-5">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Jenis Sampah</th>
      <th>Satuan</th>
      <th>Harga Sampah</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($tampil as $row) : ?>
    <tr class="table mx-auto">
      <th><?= $i;?></th>
      <td><?= $row["jns_smph"];?></td>
      <td><?= $row["satuan"];?></td>
      <td><?= $row["hrg_smph"];?></td>
      <td>
        <a href="edit_data_sampah.php?id_data_smph=<?= $row["id_data_smph"];?>"><button class="btn btn-info"><i class="fa fa-edit"></i></button></a>
        <a href="del_dt_smph.php?id_data_smph=<?= $row["id_data_smph"]?>"><button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></button></a></td>
    </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
  </tbody>
</table>
<div class="">
  <?php if ($halamanaktif > 1) : ?>
    <a href="?halaman=<?= $halamanaktif - 1;?>" class="btn btn-info">&lt;</a>
  <?php endif; ?>
<?php for ($i=1; $i <= $jumlahhalaman ; $i++) : ?>
  <?php if( $i == $halamanaktif) : ?>
  <a href="?halaman=<?= $i; ?>" style="font-weight: bold;" class="btn btn-warning"><?= $i; ?></a>
  <?php else : ?>
  <a href="?halaman=<?= $i; ?>" class="btn btn-info"><?= $i; ?></a>
<?php endif; ?>
<?php endfor; ?>

  <?php if ($halamanaktif < $jumlahhalaman) : ?>
    <a href="?halaman=<?= $halamanaktif + 1;?>" class="btn btn-info">&gt;</a>
  <?php endif; ?>
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