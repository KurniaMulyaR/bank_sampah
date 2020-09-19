<?php 	
session_start();
  include "../config/db.php";
 if (isset($_POST['submit'])) {
  $username = $_POST["username"];
  $pass = $_POST["pass"];
  $result = mysqli_query($conn, "SELECT * FROM nasabah WHERE username = '".$username."' AND pass = '".$pass."'")or die(mysqli_error($conn));
  $data = mysqli_fetch_array($result);
  $id_nasabah = $data['id_nasabah'];
  $level = $data['level'];
  $nama = $data['nama'];
  $username = $data['username'];
  $rek = $data['rek'];
  $email = $data['email'];
  $tgll = $data['tgll'];
  $saldo = $data['saldo'];
  $nohp = $data['nohp'];
  $alamat = $data['alamat'];
  $bergabung = $data['bergabung'];
  // cek username 
  if(mysqli_num_rows($result) > 0){;
  // set session
  $_SESSION["login"] = true;
  $_SESSION["id_nasabah"] = $id_nasabah;
  $_SESSION["nama"] = $nama;
  $_SESSION["username"] = $username;
  $_SESSION["rek"] = $rek;
  $_SESSION["email"] = $email;
  $_SESSION["tgll"] = $tgll;
  $_SESSION["nohp"] = $nohp;
  $_SESSION["saldo"] = $saldo;
  $_SESSION["alamat"] = $alamat;
  $_SESSION["bergabung"] = $bergabung;
  // set cookie
  setcookie('id_nasabah', $data['id_nasabah'], time() + 600);
  setcookie('key', hash('sha256', $data['username']), time() + 600);
  if ($level == 'nasabah') {
    header("location: index.php");
  }elseif($level == 'petugas') {
    header('location: ../admin/index2.php');
   }
 }else{
    // cek password 
   echo "<script>
    window.alert('username atau password yang anda masukan salah!');
   </script>";
  }
 } 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Bank Sampah Pondok Surya Mandala Sejahtera</title>

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/style2.css" >
    <style type="text/css">
    	  @media (min-width: 992px) { .butn{
    margin-left: 80%;
    } }
       @media (max-width: 429px) { 
        .cardb{
          width: 390px;
          height: 600px;
          }}

    </style>
</head>
<body class="bg-primary">

<div class="container">
	<div class="row">
		<div class="mx-auto">
			<div class="shadow p-3 mb-5 pt-5 mt-5 bg-white rounded cardb">
				<div class="card-header mb-4"> 
					Masuk Akun
				</div>
				<form method="post">
				<div class="card-body">
					<h5 class="card-title mb-4">Username : </h5>
					<input type="text" name="username" placeholder="Masukkan Username" required class="form-control mb-4">					
					<h5 class="card-title mb-4">Password : </h5>
					<input type="password" name="pass" placeholder="Masukkan Password" class="form-control mb-5">
          	<button type="submit" name="submit" class="btn mb-4 btn-info ml-3" required style="width: 95%">Login</button>
            <div class="card-footer text-light">
          	<p class="card-text">Jika anda belum mempunyai akun Klik Tombol Daftar</p>
          	<a href="pendaftaran.php" style="width: 100%" class="btn btn-md mb-4 btn-success">Daftar</a>
            </div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>