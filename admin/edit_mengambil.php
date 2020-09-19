<?php 

include '../config/functions_mengambil.php';

$id_mengambil =  $_GET["id_mengambil"];

$t_edit = query("SELECT * FROM mengambil WHERE id_mengambil = $id_mengambil")[0];

if(isset($_POST["edit"]) ){

    if (e_mengambil($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diedit!');
        document.location.href = 'Konfrimasi_pengambilan.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal diedit!');
        document.location.href = 'edit_mengambil.php';
        </script>";
    }
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
                <h3><img src="../img/bsip3.png" height="100px"></h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index2.php">Home</a>
                </li>
                <li>
                    <a href="nasabah_admin.php">Data Nasabah</a>
                </li>                
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pembukuan</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="pembukuan_admin.php">Laporan Penabung</a>
                        </li>
                    </ul>
                </li>
               <li class="active">
                    <a href="Konfrimasi_pengambilan.php">Pengajuan Mengambil Tabungan</a>
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
<div class="container pb-5">
<div class="row">
<div class="card mx-auto col-md-6">
  <div class="text-center pt-4">
    <h4 class="pt-2">Mengambil Tabungan</h4>
  </div>
  <div class="card-body">
      <form method="post">
        <div>
            <input type="hidden" name="id_mengambil" value="<?= $t_edit["id_mengambil"];?>">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama" maxlength="30" value="<?= $t_edit["nama"];?>" disabled>
        </div>
        <div class="form-group">
          <label>rekening</label>
          <input type="text" class="form-control" maxlength="30" name="username" value="<?= $t_edit["rek"];?>" disabled>
        </div>
        <div class="form-group">
          <label>Jumlah</label>
          <input type="text" class="form-control" name="jumlah" maxlength="225" value="<?= $t_edit["jumlah"];?>" disabled>
        </div>
        <div class="form-group">
          <label>Tanggal Pengajuan</label>
          <input type="date" class="form-control" name="tgl_mengambil" maxlength="13" value="<?= $t_edit["tgl_permintaan"];?>" disabled>
        </div>
        <div class="form-group">
          <label>Status</label>
          <input type="text" class="form-control" maxlength="20" value="Sudah dapat Diambil" disabled><input type="hidden"  name="status" value="Sudah dapat Diambil">
          <input type="hidden" name="tgl_konfirmasi" value="<?= date('Y-m-d');?>">
        </div>
             <button type="sumbit" name="edit" class="btn btn-success" >OK</button>
         </form>
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