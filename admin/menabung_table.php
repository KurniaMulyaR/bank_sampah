<?php 

require '../config/functions_nasabah.php'; 

$tampil = query("SELECT * FROM menabung");

// tombol cari ditekan
if(isset($_POST["search_nasabah"])){
  $tampil = search_nasabah($_POST["keyword"]);
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
    <link rel="stylesheet" href="../css/style2.css">
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
                <h3><img src="../img/bsip.png" height="75px"></h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index2.php">Beranda</a>
                </li>
                <li>
                    <a href="nasabah_admin.php">Data Nasabah</a>
                </li>                
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Transaksi Langsung</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li >
                            <a href="menabung_table.php">Mengambil</a>
                        </li>
                         <li class="active">
                            <a href="menabung_table.php">Menabung</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="Konfrimasi_pengambilan.php">Pembukuan</a>
                </li>
                <li>
                    <a href="permintaan_ngambil.php">Permintaan Mengambil Tabungan</a>
                </li>
                <li>
                    <a href="data_sampah.php">Data Sampah</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg" style="padding: 22px 10px;">

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
<h2 class="text-center pb-3">Menabung</h2>
<div class="row">
     <button  class="btn btn-success mb-2 ml-3" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus mr-2" ></i>Menabung</button>
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
      <th scope="col">tanggal Menabung</th>
      <th scope="col">Jenis Sampah</th>
      <th scope="col">Berat Sampah</th>
      <th scope="col">Harga Sampah</th>
      <th scope="col">Debit</th>
      <th>Konfirmasi</th>
    </tr>
  </thead>
      <?php $i = 1; ?>
    <?php foreach ($tampil as $row) : ?>
  <tbody>
    <tr class="mx-auto">
      <th scope="row"><?= $i; ?></th>
      <td><?= $row["nama"];?></td>
      <td><?= $row["tglmenabung"]?></td>
      <td><?= $row["jns_smph"];?></td>
      <td><?= $row["brt_smph"];?></td>
      <td><?= $row["hrg_smph"];?></td>
      <td><?= $row["debit"];?></td>
      <td>
        <a href="" class="btn btn-info"><i class="fas fa-edit"></i></a> 
        <a href="" class="btn btn-danger"><i class="fas fa-delete"></i></a>
       <!--  <a href="edit_nasabah.php?id_nasabah=<?= $row["id_nasabah"];?>"><button class="btn btn-info"><i class="fa fa-edit"></i></button></a>
        <a href="del_nasabah.php?id_nasabah=<?= $row["id_nasabah"]?>"><button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></button></a></td> -->
    </tr>
  </tbody>
  <?php $i++; ?>
<?php endforeach; ?>
</table>
</div>        
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Menabung</h4>
        <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="pembukuan_admin.php?aksi=menabung" class="form-horizontal form-label-left" method="POST">
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group">
                <input type="text" name="rek" id="rek" class="form-control" name="typehead form-control" placeholder="Tulis Nomor Rekening"
                required autofocus="autofocus" autocomplete="off">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>Cari</button>
                </span>
              </div>
            </div>
          </div>
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