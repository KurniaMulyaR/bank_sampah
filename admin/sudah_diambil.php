<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

include '../config/functions_mengambil.php';

$id_mengambil =  $_GET["id_mengambil"];

$t_edit = query("SELECT * FROM mengambil WHERE id_mengambil = $id_mengambil")[0];

if(isset($_POST["edit"]) ){

    if (t_mengambil($_POST) > 0) {
        echo "
        <script>
        document.location.href = 'Konfrimasi_pengambilan.php'
        </script>";
    }else {
         echo "
        <script>
        document.location.href = 'Konfrimasi_pengambilan.php';
        </script>";
    }
if (del_mengambil($id_mengambil) > 0 ) {
        echo "";
    }else {
         echo "";
    }
  }
?>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style3.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>

      <form method="post" onsubmit="return periksaForm(this);">
         <?php 
          $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) 
          as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '".$t_edit['id_nasabah']."'");
          $saldo = mysqli_fetch_array($query_saldo);
          $saldoo = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
          ?>     
      <div class="form-group">
        <input type="hidden" class="form-control" disabled name="saldo" value="<?= $saldoo;?>">      
      </div>
      <input type="hidden" name="id_mengambil" value="<?= $t_edit['id_mengambil'];?>">
      <input type="hidden" name="id" value="<?= $t_edit['id_laporan_bank'];?>">
      <div class="form-group">
        <input type="hidden" class="form-control" value="<?= $t_edit['tgl_konfirmasi']; ?>" maxlength="20" name="tgl_konfirmasi">
      </div>
      <div class="form-group">
        <input type="hidden" maxlength="30" class="form-control" name="nama" disabled value="<?= $t_edit['nama'];?>">
      </div>
      <div class="form-group"> 
        <input type="hidden" maxlength="20" name="id_nasabah" name="id_nasabah" value="<?= $t_edit['id_nasabah'];?>" class="form-control" > 
        <input type="hidden" maxlength="20" disabled name="rek" value="<?= $t_edit['rek'];?>" class="form-control">
      </div>
      <div class="form-group">
        <input type="hidden" maxlength="20" required name="petugas" value="<?= $_SESSION['nama']?>" class="form-control">
      </div>
      <div class="form-group">
        <input type="hidden" name="tgl_permintaan" value="<?=  $t_edit['tgl_permintaan'];?>" class="form-control">
      </div>
      <div class="form-group">
        <input type="hidden" maxlength="11" name="kredit" value="<?=  $t_edit['jumlah'];?>" class="form-control">
        <input type="hidden" maxlength="11" name="debit" class="form-control">
      </div>
      <div class="row"> 
      <div class="card shadow mx-auto bg-light col-4">
        <div class="card-body">
          <h4>Data Berhasil Di input!!!</h4>
          <button name="edit" type="submit" class="btn btn-primary" style="margin-left: 400px;">OK</button>
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