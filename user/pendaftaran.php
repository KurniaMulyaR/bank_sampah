<?php
require '../config/functions_nasabah.php';

if (isset($_POST["daftar"])) {
  if (t_nasabah($_POST) >=1) {
     echo "
        <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'login.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'pendaftaran.php'
        </script>";
  }
}
          $tahun = date('Y');

          $query_2 = "SELECT max(rek) as maxREK FROM nasabah ";
          $hasil_2 = mysqli_query($conn,$query_2);
          $data_2 = @mysqli_fetch_array($hasil_2);
          $idMax_2 = $data_2['maxREK'];

          $noUrut_2 = (int) substr($idMax_2, 6, 9);
          $noUrut_2++;
          $char_2 = $tahun;
          $newID_2 = $char_2.sprintf("%03s", $noUrut_2);  
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
<script type="text/javascript">
    function periksaEmail(email) {
    if (email.length == 0) {
    window.alert("Anda Harus menyediakan alamat-email.");
    return false;
    }
    if (email.indexOf("/") > -1) {
    window.alert("Alamat email memiliki karakter tak-valid: /");
    return false;
    }
    if (email.indexOf(":") > -1) {
    window.alert("Alamat email memiliki karakter tak-valid: :");
    return false;
    }
    if (email.indexOf(",") > -1) {
    window.alert("Alamat email memiliki karakter tak-valid: ,");
    return false;
    }
    if (email.indexOf(";") > -1) {
    window.alert("Alamat email memiliki karakter tak-valid: ;");
    return false;
    }
    if (email.indexOf("@") < 0) {
    window.alert("Alamat email memiliki karakter tidak memiliki @");
    return false;
    }
    if (email.indexOf("\.") < 0) {
    window.alert("Alamat email memiliki karakter tidak memiliki titik");
    return false;
    }
 return true;
  }
  function periksaForm(objekForm){
    return periksaEmail(objekForm.email.value);
  }
  </script>
  </head>
  <body class="mt-5">
<section class="mt-5 pt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 justify-content-center mx-auto">
     <div class="card-group pt-5 pb-5 ml-2">
        <div class="card">
          <div class="card-header">
        <h2 class="text-center pt-4 font-weight-bold">Pendaftaran</h2>
        </div>
        <div class="card-body">
          <form method="post" name="formKu" onsubmit="return periksaForm(this);">
        <div class="form-group">
          <label for="nama">Nama lengkap</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group">
          <label for="noktp">Nomor KTP</label>
          <input type="number"  maxlength="13" class="form-control" name="noktp" id="noktp" placeholder="Nomor KTP" required>
        </div>
        <div class="form-group">
          <input type="hidden"  class="form-control"  disabled value="<?php echo $newID_2;?>" />
          <input type="hidden"  maxlength="30" class="form-control" autocomplete="off"  name="rek"  value="<?php echo $newID_2;?>" />
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text"  maxlength="30" class="form-control" name="username" id="username" placeholder="Username" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" maxlength="30" class="form-control" name="email" value="<?php $email?>" placeholder="E-mail" required>
        </div>
        <div class="form-inline">
          <label>Tempat Lahir</label>
          <input type="text"  maxlength="30" class="form-control mr-2 ml-4" name="tmpt" id="nama" placeholder="Tempat" height="50%" required>
          <label> Tanggal Lahir</label>
          <input type="date" class="form-control ml-4" name="tgll"  placeholder="tanggal lahir" height="50%" required>
        </div>
        <div>
          <input type="hidden" value="<?= date("Y-m-d");?>" name="bergabung">
        </div>
        <div class="form-group">
          <label for="Alamat">Alamat</label>
          <input type="text"  maxlength="255" class="form-control" name="alamat" id="Alamat" placeholder="Alamat" required>
        </div>
        <div class="form-group">
          <label for="pass">Password</label>
          <input type="password"  maxlength="30" type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="pass1">Re-Password</label>
          <input type="password"  maxlength="30" type="password" class="form-control" name="pass1" id="pass1" placeholder="Re-Password" required>
        </div>
        <div class="form-group">
          <label for="nohp">No hp</label>
          <input type="number" maxlength="13" class="form-control" name="nohp" id="nohp" placeholder="No HandPhone" required>
        </div>
        <div>
          <input type="hidden" value="0" name="saldo">
          <input type="hidden" name="level" value="nasabah">
        </div>
         <input type="submit" name="daftar" class="btn btn-primary">
        <a href="login.php" class="btn btn-danger">CANCEL</a>
         </form>
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