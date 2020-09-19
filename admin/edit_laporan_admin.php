<?php 
include '../config/functions_laporan.php';

$id_laporan_bank =  $_GET["id_laporan_bank"];

$t_edit = query("SELECT * FROM laporan_bank_sampah WHERE id_laporan_bank = $id_laporan_bank")[0];

if(isset($_POST["edit"]) ){

    if (e_laporan($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diedit!');
        document.location.href = 'pembukuan_admin.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal diedit!');
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
                <li class="active">
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
                <li>
                    <a href="Konfrimasi_pengambilan.php">Pengajuan Mengambil Tabungan</a>
                </li>
                <li>
                    <a href="data_sampah.php">Data Sampah</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg">

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
    <h4 class="pt-2">Edit Laporan</h4>
  </div>
  <div class="card-body">
    <form method="post">
      <div class="form-group">
        <input type="hidden" name="id_laporan_bank" value="<?= $t_edit["id_laporan_bank"];?>">
        <label class="card-title" name="">Nama Penabung</label>
        <input type="text" name="nama" maxlength="50" value="<?= $t_edit["nama"];?>" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title" name="">Rekening</label>
        <input type="text" name="rek" maxlength="50" value="<?= $t_edit["rek"];?>" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title" name="">Alamat</label>
        <input type="text" name="alamat" maxlength="225" value="<?= $t_edit["alamat"];?>" class="form-control">
      </div>
       <div class="form-group">
      <label for="inputState">Jenis Sampah</label>
      <select id="inputState" value="<?= $t_edit["jns_smph"];?>" name="jns_smph" class="form-control">
        <option selected>Emberan</option>
        <option>Gelas Bersih</option>
        <option>Gelas Kotor</option>
        <option>Plastik Bening</option>
        <option>Kresek Warna</option>
        <option>Pet Bersih</option>
        <option>Pet Kotor</option>
        <option>Pet Warna</option>
        <option>Tutup Botol</option>
        <option>Tutup Galon</option>
        <option>Mika Tipis/PPC</option>
        <option>Selopan/Bimoli/Wipol</option>
        <option>Yakult/Impek</option>
        <option>Kristal/Mika Tebal</option>
        <option>Karung</option>
        <option>Karpet Talang</option>
        <option>Keping VCD</option>
        <option>Duplek</option>
        <option>Kardus</option>
        <option>Kertas Semen</option>
        <option>Koran A</option>
        <option>Koran B</option>
        <option>Majalah</option>
        <option>Putihan</option>
        <option>Tetrapack</option>
        <option>Alumunium Kaleng</option>
        <option>Besi A</option>
        <option>Besi Stal B/Kerompong</option>
        <option>Botol Saus/ Botol Kecap</option>
        <option>Gabrukan</option>
        <option>Kabel Listrik Rambut/Kecil</option>
        <option>Kulit Kabel</option>
        <option>Sandal Kulit</option>
        <option>Minyak Jelatah</option>
              </select>
    </div>
      <div class="form-group">
        <label class="card-title" name="">Berat Sampah</label>
        <input type="text" maxlength="20" value="<?= $t_edit["brt_smph"];?>" name="brt_smph" class="form-control">
      </div>

      <div class="form-group">
        <label class="card-title" name="">Harga Sampah</label>
        <input type="text" maxlength="20" value="<?= $t_edit["hrg_smph"];?>" name="hrg_smph" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title" name="">debit</label>
        <input type="text" maxlength="20" value="<?= $t_edit["debit"];?>" name="debit" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title" name="">Petugas</label>
        <input type="text" maxlength="30" value="<?= $t_edit["petugas"];?>" name="petugas" class="form-control">
      </div>
    
    <button type="submit" name="edit" class="btn btn-primary"> Edit </button>
    <a type="reset" class="btn btn-danger">Batal</a>
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