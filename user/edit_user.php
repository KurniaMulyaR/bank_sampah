<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 
include '../config/functions_nasabah.php';

$id_nasabah =  $_SESSION["id_nasabah"];

$t_edit = query("SELECT * FROM nasabah WHERE id_nasabah = $id_nasabah")[0];

if(isset($_POST["edit"]) ){
    if (e_ad_nasabah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diedit!');
        document.location.href = 'profile_user.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal diedit!');
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

    <title>Bank Sampah Surya Mandala</title>
  </head>
  <body class="mt-5">
<?php 
include 'navbar.php';
?>
<section class="mt-5 pt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        
      </div>
      <div class="col-md-6">
        <h2 class="text-center pt-4 font-weight-bold">MY PROFILE</h2>
          <form class="form-group" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="hidden" name="id_nasabah" value="<?= $t_edit['id_nasabah'];?>">
          <input type="text" class="form-control" value="<?= $t_edit['nama'];?>" id="nama" placeholder="nama">
        </div>
        <div class="form-group">
          <label for="nama">Username</label>
          <input type="text" class="form-control" id="nama" value="<?= $t_edit['username'];?>" placeholder="nama">
        </div>
        <div class="form-group">
          <label for="nama">Email</label>
          <input type="text" class="form-control" id="nama" value="<?= $t_edit['email'];?>" placeholder="nama">
        </div>
        <div class="form-group">
          <label for="nama">Alamat</label>
          <input type="text" class="form-control" id="nama" value="<?= $t_edit['alamat'];?> " placeholder="nama">
        </div>
        <div class="form-group">
          <label for="nama">No hp</label>
          <input type="text" class="form-control" value="<?= $t_edit['nohp'];?> " id="nama" placeholder="nama">
        </div>
        <div class="form-group">
          <label for="nama">Picture</label>
          <input type="file" class="form-control" value="<?= $t_edit['gambar'];?> " id="gambar" placeholder="nama">
        </div>
         <button type="sumbit" name="edit" class="btn btn-info" >EDIT</button>
         <button type="reset" class="btn btn-danger" >CANCEL</button>
         </form>
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