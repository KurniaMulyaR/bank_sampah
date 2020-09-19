<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

require '../config/db.php';
$tampil = query("SELECT * FROM nasabah"); 

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
          <a href="profile_user.php" class="list-group-item list-group-item-secondary active">Tentang <?= $_SESSION["nama"];?></a>
          <a href="mengambil.php" class="list-group-item list-group-item-secondary ">Pengambilan</a>  
          <a href="buku_tab_user.php" class="list-group-item list-group-item-secondary ">Histori Tabungan</a>
          <a href="mengambil_tabungan.php" class="list-group-item list-group-item-secondary ">Histori Permintaan</a>
        </div>
      </div>
    <div class="mx-auto">
      <div class="shadow p-3 mb-5 bg-white rounded" style="width: 100%;">
        <div class="card-header mb-4" > 
           <h2 class="text-center pt-4">Tentang <?= $_SESSION["nama"]; ?></h2>
         </div>
            <div class="row">
              <div class="col-md-12">
              <?php 
              $id_nasabah = $_SESSION['id_nasabah'];
               $r = query("SELECT * FROM nasabah WHERE id_nasabah = '$id_nasabah'")[0];
 ?>           
              <table class="table">
                <tbody>
                  <tr>
                    <td><h3>Saldo</h3></td>
                    <td><h3><?= $r['saldo'];?></h3></td>
                  </tr> 
                  <tr>
                    <td>Nama</td>
                    <td><?= $_SESSION["nama"];?></td>
                  </tr>
                  <tr>
                    <td>UserID</td>
                    <td><?= $_SESSION["username"];?></td>
                  </tr>
                  <tr>
                    <td>Rekening</td>
                    <td><?= $_SESSION["rek"];?></td>
                  </tr>
                  <tr>
                    <td>E-Mail</td>
                    <td><?= $_SESSION["email"];?></td>
                  </tr>
                  <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td><?= $_SESSION["tgll"];?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?= $_SESSION["alamat"];?></td>
                  </tr>
                  <tr>
                    <td>Nomor hp</td>
                    <td><?= $_SESSION["nohp"];?></td>
                  </tr>
                  <tr>
                    <td>Bergabung</td>
                    <td><?= $_SESSION["bergabung"];?></td>
                  </tr>
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
</div>
</div>
</div>
</div>
</section>

 <?php 
include 'footer.php'; ?>  
    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>