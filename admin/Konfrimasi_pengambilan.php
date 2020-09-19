<?php 

require '../config/functions_nasabah.php'; 

$tampil = query("SELECT * FROM mengambil JOIN nasabah ON mengambil.id_nasabah=nasabah.id_nasabah order by id_mengambil");

// tombol cari ditekan
if(isset($_POST["keyword"])){
  $tampil = search_ngambil($_POST["keyword"]);
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
                <li class="active">
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
<h2 class="text-center pb-3">KONFIRMASI UNTUK PENGAMBILAN UANG TABUNGAN</h2>
<div class="row">
    <form class="form-inline col-4 ml-auto" method="post">
    <div class="form-group mx-sm-3 mb-2 ml-auto">
    <input type="text" class="form-control" id="inputPassword2" name="keyword" placeholder="Mencari Nasabah" autofocus autocomplete="off">
  </div>
     <button class="btn btn-info mx-sm-3 mb-2" name="search_nasabah" type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<table class="table table-bordered table-hover table-md mr-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Rekening</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Tanggal Pengajuan</th>
      <th scope="col">status</th>
      <th scope="col">Saldo</th>
      <th scope="col">Keterangan</th>
      <th>Tanggal Konfirmasi</th>
      <th>Sudah Diambil</th>
    </tr>
  </thead>
      <?php $i = 1; ?>
    <?php foreach ($tampil as $row) : ?>
  <tbody>
    <tr class="mx-auto">
      <th scope="row"><?= $i; ?></th>
      <td><?= $row["nama"];?></td>
      <td><?= $row["rek"];?></td>
      <td><?= $row["jumlah"];?></td>
      <td><?= $row["tgl_permintaan"];?></td>
      <td><?= $row["status"];?></td>
      <td><?= $row["saldo"];?></td>
      <td>
        <a href="edit_mengambil.php?id_mengambil=<?= $row["id_mengambil"];?>"><button class="btn btn-success" name="edit" type="submit">OK</button></a>
        <a href="del_mengambil.php?id_mengambil=<?= $row["id_mengambil"]?>"><button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-times"></i></button></a>
      </td>
      <td><?= $row['tgl_konfirmasi'];?></td>
      <td> 
        <a href="sudah_diambil.php?id_mengambil=<?= $row["id_mengambil"];?>"><button class="btn btn-info" name="edit" type="submit" data-toggle="modal" data-target="#exampleModal">Sudah Diambil</button></a>
      </td>
    </tr>
  </tbody>
  <?php $i++; ?>
<?php endforeach; ?>
</table>
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