<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

require '../config/db.php';
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
  </head>
  <body class="mt-5 pt-3">
	<!-- Navbar -->
<?php 
include 'navbar.php';
?>
<section class="pt-5 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group pt-4">
          <a href="profile_user.php" class="list-group-item list-group-item-secondary ">Tentang <?= $_SESSION["nama"];?></a>
          <a href="mengambil.php" class="list-group-item list-group-item-secondary ">Pengambilan</a>  
          <a href="buku_tab_user.php" class="list-group-item list-group-item-secondary active">Histori Tabungan</a>
          <a href="mengambil_tabungan.php" class="list-group-item list-group-item-secondary">Histori Permintaan</a>
        </div>
      </div>
      <div class="col-md-8">
                  <h2 class="text-center pt-4 font-weight-bold">Histori Tabungan <?= $_SESSION["nama"];?></h2>
                  <a href="print_tabungan.php" class="mb-3 btn btn-info">Print Tabungan</a>
          <table class="table">
            <input type="hidden" name="id_nasabah" value="<?= $_SESSION['id_nasabah']; ?>">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Menabung</th>
                <th scope="col">Tanggal Mengambil</th>
                <th scope="col">Debit</th>
                <th scope="col">Kredit</th>
              </tr>
            </thead>
<?php 
$id_nasabah = $_SESSION['id_nasabah'];
$row = mysqli_query($conn,"SELECT * FROM laporan_bank_sampah WHERE id_nasabah = '$id_nasabah'");
$i = 0;
while ( $r = mysqli_fetch_array($row)) {
 

$i++; 
 ?>
            <tbody>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $r['tglmenabung'];?></td>
                <td><?= $r['tgl_konfirmasi'];?></td>
                <td><?= $r['debit'];?></td>
                <td><?= $r['kredit'];?></td>
              </tr>
<?php 
  } ?>
             <tr>
      <td colspan="2">
        JUMLAH 
      </td>
      <?php
         $id_nasabah = $_SESSION['id_nasabah'];
         $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit FROM laporan_bank_sampah WHERE id_nasabah = '$id_nasabah'");
          $saldo = mysqli_fetch_array($query_saldo);
          $saldo_debit = $saldo['jumlah_debit'];?>
      <td>
        <?= $saldo_debit;?>
      </td>
        <?php
         $id_nasabah = $_SESSION['id_nasabah'];
         $query_saldo = mysqli_query($conn,"SELECT SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '$id_nasabah'");
          $saldo = mysqli_fetch_array($query_saldo);
          $saldo_kredit = $saldo['jumlah_kredit'];?>
      <td>
        <?= $saldo_kredit ?>
      </td>
      <?php 
      $total = $saldo_debit - $saldo_kredit; ?>
      <td>
        
      </td>
    </tr>
    <tr>
      <td colspan="3">
        TOTAL
      </td>
      <td>
        <?= $total; ?>
      </td>
    </tr>
            </tbody>
          </table>
        </div>
      </div>      
    </div>
  </div>
</section>


<footer class="bg-success text-white">
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