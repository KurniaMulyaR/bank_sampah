<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}  
 require '../config/db.php';
$query_nasabah = mysqli_query($conn, "SELECT * FROM nasabah");
$num_nasabah = mysqli_num_rows($query_nasabah);

$query_petugas = mysqli_query($conn, "SELECT * FROM petugas");
$num_petugas = mysqli_num_rows($query_petugas);
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
      .diamond{
        height: 180px;
        width: 180px;
        border-radius: 50%;    
        background-color: #3d9970;
      }
      .section-background{
        height: 300px;
        background-image: url('../img/Photo_1.png');
        background-attachment: fixed;
        background-size: cover;
        background-position: 0 -100px;

    }
    @media (max-width: 429px) { 
    .sec{
        min-height: 700px;
      }
    .jd{
      padding-left: 20px;
      }}
    </style>
  </head>
  <body class="mt-5">
	<!-- Navbar -->
<?php 
include 'navbar.php';
?>

<section>
  <div class="jumbotron">
  <div class="container text-center pt-5 mt-4">
    <div class="row">
      <div class="col-md-12">
        <h1>BANK SAMPAH MANDALA SEJAHTERA</h1>
        <br>
        <h3 class="font-weight-bold">Latar Belakang</h3>
        <br>
      </div>
    </div>
      <div class="row">
        <div class="col-md-6 mx-auto">
        <p>Banyaknya kerusakan bumi akibat ketidak pedulian manusia kepada lingkungannya, termasuk pemanasan global dan perubahan ikilim yang tidak menentu.</p>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<section style="min-height: 200px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="font-weight-bold">Pendiri</h2>
        <br>
        <p>April 2012 membentuk Gerakan Peduli Lingkungan (GPL). Kegiatan pertama yang dilakukan yaitu menanam pohon peneduh sepanjang jalan utama sebanyak 30 pohon. Kemudian Mei 2012 mengikuti pelatihan “Bimbingan Teknis Bank Sampah”.</p>
        
      </div>
      <div class="col-md-6">
       <div class="card" style="width: 32rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_7.png" alt="Card image cap">
        </div>
      </div>
    </div>
  </div>
</section>
<section style="min-height: 200px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
       <div class="card" style="width: 32rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_8.png" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-6 pt-5 mt-5">
         <p>16 Juni 2012 mendirikan bank sampah SURYA SEJAHTERA. Dana untuk membuat gudang sampah berasal dari pinjaman patungan empat orang dan jumlah biaya pembuatannya sebesar 1,6 juta. April 2013 lantai yang awalnya tanah diganti dengan keramik dan menelan biaya 1,3 juta. Bank sampah diberi nama “Surya Sejahtera” dengan harapan kesejahteraan senantiasa dapat diberikan oleh bank sampah tersebut.</p>       
      </div>
    </div>
  </div>
</section>
<section style="min-height: 200px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 pt-5 mt-5">
         <p>25 November 2014 melakukan kegiatan komposting tingkat kawasan.Maret 2016 memiliki rumah kompos yang diberi nama sama dengan nama bank sampah yaitu RUMAH KOMPOS SURYA SEJAHTERA.
         </p>
      </div>
      <div class="col-md-6 mb-5">
         <div class="card" style="width: 32rem !important;">
            <img class="card-img-top img-fluid" src="../img/Photo_13.png" alt="Card image cap">
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-background sec">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col mt-5 mb-5 pt-2 pb-2">
        <div class="diamond mx-auto">
          <p style="color: #3d9970;" class="text-center">sampah</p>
          <h1 id="ten" class="text-center font-weight-bold mt-5"><?= $num_petugas?></h1>
        </div>
          <h1 class="text-center text-light">Petugas</h1> 
      </div>
      <div class="col mt-5 mb-5 pt-2 pb-2">
        <div class="diamond mx-auto">
          <p style="color: #3d9970;" class="text-center">sampah</p>
          <h1 id="ten" class="text-center font-weight-bold mt-5"><?= $num_nasabah; ?></h1>
        </div>
          <h1 class="text-center text-light">Nasabah</h1> 
      </div>      
    </div>
  </div>
</section>

<section class="pt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mx-auto">
        <h2 class="text-center display-5">Struktur Organisasi</h2>
        <br>
      </div>
    </div>        
        <div class="row">
          <div class="col-md-6 mx-auto">
            <img src="../img/STRUKTUR.png" class="img-fluid" alt="Responsive">
          </div>
        </div>
  </div>
</section>

<section class="portofolio bg-dark pb-4" id="portofolio">
<div class="container">
    <div class="row pt-5">
      <div class="col text-center">
      <h2 class="display-5 text-light">GALERY BANK SAMPAH</h2>
      </div>
    </div>
    <div class="row pt-5 mx-auto jd">
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_4.png" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_5.png" alt="Card image cap">
        </div>
      </div>  
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_6.png" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_7.png" alt="Card image cap">
        </div>
      </div>  
    </div>
    <div class="row pt-2 mx-auto jd">
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_8.png" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_9.png" alt="Card image cap">
        </div>
      </div>  
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_10.png" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" src="../img/Photo_12.png" alt="Card image cap">
        </div>
      </div>  
    </div>
    </div>
  </div>
</section>
<section class="portofolio pb-4" id="portofolio">
<div class="container">
    <div class="row pt-5">
      <div class="col text-center">
      <h2 class="display-5 pb-5">PRODUK</h2>
      </div>
    </div>
    <div class="row pb-5 mx-auto jd">
      <div class="col-md-4">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="../img/Produk_1.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Hasil Kerajinan Tangan/p>
      </div>
      </div>
    </div>      
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="../img/Produk_2.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Tas</p>
      </div>
      </div>
    </div>      
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="../img/Produk_3.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Tempat Tisu</p>
      </div>
      </div>
    </div>
    </div>
    <div class="row mx-auto jd">
      <div class="col-md-4">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="../img/Produk_4.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Keranjang</p>
      </div>
      </div>
    </div>      
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="../img/Produk_5.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Hiasan</p>
      </div>
      </div>
    </div>      
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="../img/Produk_6.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Tas</p>
      </div>
      </div>
    </div>
    </div>
</div>
</section>
 <?php 
include 'footer.php'; ?> 

<script type="text/javascript">


$('#ten')
  .prop('number', 10)
  .animateNumber(
    {
      number: 100
    },
    20000
  );
</script>
    <script src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
    <!-- Number jquery effect -->
    <script src="../js/query.color.min.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>