<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

require '../config/functions_mengambil.php';
$id_nasabah = $_SESSION['id_nasabah'];
$saldo = $_SESSION['saldo'];
$r = query("SELECT * FROM nasabah WHERE id_nasabah = '$id_nasabah'")[0];
$query_saldo = mysqli_query($conn,"SELECT SUM(jumlah) as jumlah_jumlah FROM mengambil WHERE id_nasabah = '$id_nasabah'");
$saldo = mysqli_fetch_array($query_saldo);
$saldo_debit = $saldo['jumlah_jumlah'];

if(isset($_POST["ngambil"]) ){

    if (mengambil($_POST) >=1) {
        echo "
        <script>
        alert('data berhasil dikirim!');
        document.location.href = 'mengambil_tabungan.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal dikirim!');
        document.location.href = 'mengambil.php'
        </script>";
    }
}  
 
?>
<!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <script type="text/javascript">
    function periksaJumlah(jumlah) {
    if (jumlah.indexOf("-") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (jumlah.indexOf("+") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (jumlah.indexOf(";") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
 return true;
  }
  function periksaSaldo() {
    var jml = document.getElementById("jml").value;
    var saldo = document.getElementById("saldo").value;
    var jumlah = document.getElementById("jumlah").value;
    if (jumlah) {
      if (jml > saldo) {
    window.alert("Saldo anda kurang");
    return false;
        }
    }
    return true
  }

  function periksaForm(objekForm){
    return periksaJumlah(objekForm.jumlah.value);
  }
    </script>
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
<?php 
include 'navbar.php';
?>
<section class="pt-5 mt-5">
<div class="container pt-5 mt-5">
  <div class="row">
    <div class="col-md-4">
       <div class="list-group pt-4">
          <a href="profile_user.php" class="list-group-item list-group-item-secondary ">Tentang <?= $_SESSION["nama"];?></a>
          <a href="mengambil.php" class="list-group-item list-group-item-secondary active">Pengambilan</a>  
          <a href="buku_tab_user.php" class="list-group-item list-group-item-secondary">Histori Tabungan</a>
          <a href="mengambil_tabungan.php" class="list-group-item list-group-item-secondary">Histori Permintaan</a>
        </div>
      </div>
            <?php
         $id_nasabah = $_SESSION['id_nasabah'];
          ?>

      <div class="col-md-8">

          <h2 class="text-center pt-4 font-weight-bold mb-5">Mengambil Tabungan</h2>
        <form method="POST" name="formKu" onsubmit="return periksaSaldo(); periksaForm();">
        <input type="hidden" name="saldongambil" id="saldongambil" value="<?= $saldo_debit;?>">
          <input type="hidden" name="id_nasabah" value="<?= $r['id_nasabah'];?>">
          <input type="hidden" name="nama" value="<?= $r['nama'];?>">
          <input type="hidden" name="rek" value="<?= $r['rek'];?>">
         <h5 class="">Saldo Akhir Anda </h5>
         <input type="number" name="saldo" id="saldo" class="ml-2 col-md-8 form-control mb-5 mr-2" value="<?= $r['saldo'];?>" disabled>
         <input type="hidden" name="saldo" value="<?= $r['saldo'];?>">
         <div class="row pb-5 mb-5">
          <input type="hidden" name="jml" id="jml" value="<?= $saldo_debit;?>">
         <h4 class="col-md-2">Jumlah </h4>
          <input type="text" name="jumlah" id="jumlah" maxlength="20" class="ml-2 mr-2 col-md-8 form-control mb-4" placeholder="Minimal pengambilan 5000" required>
          <input type="hidden" name="status" value="Belum dikonfirmasi">
          <input type="hidden" name="tgl_permintaan" value="<?= date("Y-m-d");?>">
         <button class="btn btn-info col-md-2" type="submit" name="ngambil">Mengambil</button>
         </div>
        </div>
      </div> 
      </form>
    </div>
</div>
<footer class="bg-success text-white mt-5 fixed-bottom">
  <div class="container">
    <div class="row pt-3 mt-2">
      <div class="col text-center">
        <p>Bank Sampah Pondok Surya Mandala Sejahtera</p>
      </div>

    </div>
  </div>
</footer> 
    
    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>