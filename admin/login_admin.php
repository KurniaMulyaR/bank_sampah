<?php 
session_start();
 require '../config/db.php';

 if (isset($_POST["submit"])) {
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");

  // cek username 
  $rows = (mysqli_num_rows($result));
  // set session
  $_SESSION["petugas"] = true;
  // set cookie
  
  if ($rows == 1) {
    header("location: index2.php");
  }else {
    // cek password 
   $error = true;
 }
 mysqli_close($conn); 
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
    <link rel="stylesheet" href="../css/style.css" >

    <title>Bank Sampah Surya Mandala</title>
  </head>
  <body style="	background: #19b4a4; padding-top: 10%;">
        <?php if (isset($error)) :?>
      <script>
        alert('username / password salah');
      </script>
    <?php endif; ?> 
   <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-6 col-md-auto login-box">
          <h1 class="text-center text-info pb-4">Login</h1>
          <hr>
          <form method="post">
            <div class="form-row">
              <div class="col-md-12 pb-4">
                <input type="text" name="username" class="form-control form-control-lg flat-input" placeholder="username">
              </div>
              <div class="col-md-12 pb-4">
                <input type="password" name="password" class="form-control form-control-lg flat-input" placeholder="password">
              </div>
              <button type="submit" name="submit" class="btn btn-lg btn-block btn-info">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>

      
    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>