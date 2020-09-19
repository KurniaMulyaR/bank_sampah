<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

require '../config/db.php';
$id_nasabah = $_SESSION['id_nasabah'];
$r = mysqli_query($conn,"SELECT * FROM mengambil WHERE id_nasabah = '$id_nasabah'"); 
?>
<!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >

        <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>
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
<?php 
include 'navbar.php';
?>
<section class="pt-5">
<div class="container pt-5 mt-5">
  <div class="row">
    <div class="col-md-4">
       <div class="list-group pt-4">
          <a href="profile_user.php" class="list-group-item list-group-item-secondary ">Tentang <?= $_SESSION["nama"];?></a>
          <a href="mengambil.php" class="list-group-item list-group-item-secondary ">Pengambilan</a>  
          <a href="buku_tab_user.php" class="list-group-item list-group-item-secondary">Histori Tabungan</a>
          <a href="mengambil_tabungan.php" class="list-group-item list-group-item-secondary active">Histori Permintaan</a>
        </div>
      </div>
      <div class="col-md-8">
          <h2 class="text-center pt-4 font-weight-bold">Histori Permintaan</h2>
          <table class="table mt-3">
            <input type="hidden" name="id_nasabah" value="<?= $_SESSION['id_nasabah']; ?>">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Ajuan</th>
                <th scope="col">Diambil</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal konfirmasi</th>
                <th>Delete</th>
                <th>Konfirmasi Mengambil</th>
              </tr>
            </thead>
          <?php $i = 1; ?>
          <?php foreach ($r as $row) : ?>
            <tbody>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $row['tgl_permintaan'];?></td>
                <td><?= $row['jumlah'];?></td>
                <td><?= $row['status'];?></td>
                <td><?= $row['tgl_konfirmasi'];?></td>
                <td> 
                  <a href="del_mengambil.php?id_mengambil=<?= $row["id_mengambil"]?>"><button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></button></a></td>
                  <td> 
                  <a href="konfirmasi_user.php?id_mengambil=<?= $row["id_mengambil"]?>"><button class="btn btn-info"><i class="fas fa-list"></i></button></a></td>
              </tr>
            </tbody>
              <?php $i++; ?>
            <?php endforeach; ?>
          </table>
        </div>
      </div> 
    </div>
  </section>
</div>
<footer class="bg-success text-white fixed-bottom">
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