<?php 	
session_start();
require '../config/db.php';

if (isset($_COOKIE['id_nasabah']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id_nasabah'];
  $key = $_COOKIE['key'];

  $result1 = mysqli_query($conn, "SELECT username FROM nasabah WHERE id_nasabah = $id");
  $row = mysqli_fetch_assoc($result1);


  if ($key == hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 


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
    <link rel="stylesheet" href="../css/style2.css" >
    <link rel="stylesheet" href="../css/sts.css" >

    <title>Bank Sampah Surya Mandala Sejahtera</title>

  </head>
  <style type="text/css">
  .brand1{
      height: 100px;
    }
  @media (max-width: 765px) { 
    .brand{
    height: 68px;
    } }
    @media (max-width: 429px) { 
    .brand{
    margin-left: 18px;
    padding-right: 50px;
    }
    .tggl{
      margin-left: 30px;
      } 
    .sec{
        min-height: 600px;
      }
    .jd{
      padding-left: 20px;
      } } 
    </style>
  <body class="mt-5">
	<!-- Navbar -->
<?php 
include 'navbar.php';
?>

<!-- Akhir Navbar -->
<!-- jumbotron -->
<div id="carouselExampleIndicators" class="carousel slide pb-2 mt-3 pt-5" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/Crl_1.png?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
      <div class="carousel-caption d-none d-md-block text-left">
	    <h1>Bank Sampah Pondok Surya Mandala Sejahtera</h1>
	    <p style="font-size: 24px;" class="text-light">Kegiatan Pengumpulan Sampah Dari Nasabah</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/Crl_2.png?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
      <div class="carousel-caption d-none d-md-block text-left">
	    <h1>Bank Sampah Pondok Surya Mandala Sejahtera</h1>
	    <p style="font-size: 24px;" class="text-light">Kunjunngan Dari Remaja</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/Crl_3.png?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
           <div class="carousel-caption d-none d-md-block text-left">
	    <h1>Bank Sampah Pondok Surya Mandala Sejahtera</h1>
	    <p style="font-size: 24px;" class="text-light">Tempat Produksi Pupuk</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- akhir jumbroton -->
 <section id="" class="pl-5 pr-5">
<div class="row shadow p-3 mb-5 bg-white rounded">
  <div class="col-md-3 pb-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Apa itu Bank Sampah</a>
      <a class="nav-link list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Mekanisme Bank Sampah</a>
      <a class="nav-link list-group-item" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Keuntungan dari Bank Sampah</a>
    </div>
  </div>
  <div class="col-md-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      	<h2 class="text-center pb-4 mx-auto">APA ITU BANK SAMPAH?</h2>
      	<p>Bank Sampah adalah suatu sistem pengelolaan sampah kering secara kolektif yang mendorong masyarakat untuk berperan serta aktif di dalamnya. sistem ini akan menampung, memilah, dan menyalurkan sampah bernilai ekonomi pada pasar sehingga masyarakat mendapat keuntungan ekonomi dari menabung sampah</p>
      	<p>Semua kegiatan dalam sistem bank sampah dilakukan dari, oleh dan untuk masyarakat. Seperti halnya bank konvensional, bank sampah juga memiliki sistem manajerial yang beroperasionalnya dilakukan oleh masyarakat. Bank sampah bahkan bisa juga memberikan manfaat ekonomi untuk masyarakat</p>
      	<p>Sampah yang disetorkan oleh nasabah sudah harus dipilah. persyaratan ini mendorong masyarakat untuk memisahkan dan mengelompokkan sampah. Misalnya, berdasarkan jenis material : plastik, kertas, kaca, dan metal. Jadi, bank sampah akan menciptakan budaya baru agar masyarakat mau memilah</p>


      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <h2 class="text-center pb-4 mx-auto">Mekasnisme Bank Sampah</h2>
        <p>Pengelolaan sampah berbasis bank memberikan banyak manfaat bagi masyarakat. keuntungan berupa kebersihan lingkungan, kesehatan, hingga ekonomi berikut mekanisme kerja bank sampah</p>
        <div class="row">
    <div class="card bg_card_1 col-sm-4" style="width: 15rem; height: 15rem;">
      <div class="card-body">
        <img class="card-img-top mr-5" src="../img/milah_sampah.png" style="width: 50%;" alt="Card image cap">
        <span class="text-light align-self-center" style='font-size:60px;'>&#x2192;</span>
        <p class="card-title text-light">Pemilahan Sampah</p>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#milah_sampah">Penjelasan</button>
      </div>
    </div>
    <div class="card bg_card_2 col-sm-4" style="width: 15rem; height: 15rem;">
      <div class="card-body">
        <img class="card-img-top mr-5" src="../img/plastic.png" style="width: 32%" alt="Card image cap">
        <span class="text-light align-self-center" style='font-size:60px;'>&#x2192;</span>
        <p class="card-title text-light">Penyetoran Sampah</p>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#setor">Penjelasan</button>

      </div>
    </div>
    <div class="card bg_card_3 col-sm-4" style="width: 15rem; height: 15rem;">
      <div class="card-body">
        <img class="card-img-top mr-5" src="../img/nimbang.png" style="width: 54%" alt="Card image cap">
        <span class="text-light align-self-center" style='font-size:60px;'>&#x2193;</span>
        <p class="card-title text-light">Penimbang</p>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#penimbang">Penjelasan</button>
      </div>
    </div>
    <div class="card bg_card_4 col-sm-6" style="width: 15rem; height: 15rem;">
      <div class="card-body">
        <img class="card-img-top" src="../img/truck.png" style="width: 46%" alt="Card image cap">
        <p class="card-title text-light">Pengangkutan</p>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#angkut">Penjelasan</button>
      </div>
    </div>
    <div class="card bg_card_5 col-sm-6" style="width: 15rem; height: 15rem;">
      <div class="card-body">
        <span class="text-light mr-5" style='font-size:60px;'>&#x2190;</span>
        <img class="card-img-top  justify-content-end" src="../img/notes.png" style="width: 20%" alt="Card image cap">
        <p class="card-title text-light ml-5 pl-5">Pencatatan</p>
        <button type="button" class="btn btn-info" style="margin-left: 20%;" data-toggle="modal" data-target="#catat">Penjelasan</button>
      </div>
    </div>
    </div>
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      <h2 class="text-center pb-4 mx-auto">Keuntungan Dari Bank Sampah</h2>
        <p>1. Menjaga kebersihan lingkungan disekitar</p>
        <p>2. Mengurangi sampah masyarakat</p>
        <p>3. Dapat menaikan ekonomi rakyat</p>
  	</div>
    </div>
  </div>
</div>
<!-- modal milah sampah -->
<div class="modal fade" id="milah_sampah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Pemilahan Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Nasabah Harus memilah sampah sebelum disetorkan ke Bank Sampah/ pemilahan sampah tergantung pada kesepakatan saat pembentukan bank sampah. Misalnya, berdasarkan kategori sampah organik dan anorganik. Biasanya jenis bahan : plastik, kertas, kaca, dan lain-lain. Pengelompokan sampah akan memudahkan proses penyaluran sampah. Apakah akan disampaikan ke tempat pembuatan kompos, pabrik plastik atau industri rumah tangga.</p>
        <p>Dengan sistem bank sampah, masyarakat secara tidak langsung telah membantu mengurangi timbunan sampah di tempat pembuangan akhir. Sebab, sebagian besar sampah yang telah dipilah dan dikirimkan ke bank akan dimanfaatkan kembali, sehingga yang tersisa dan dibuang menuju TPA, hanya sampah yang tidak dapat bernilai ekonomi dan B3</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal setor sampah -->
<div class="modal fade" id="setor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Penimbang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Waktu penyetoran sampah biasanya telah disepakati sebelumnya Misalnya, dua hari dalam sepekan setiap Rabu dan Jum'at. Penjadwalan ini maksudnya untuk menyamakan waktu nasabah menyetor dan pengangkutan ke pengepul. Hal ini agar sampah tidak bertumpuk di lokasi bank sampah</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal Penimbang -->
<div class="modal fade" id="penimbang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Penyetor Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Sampah yang sudah disetor ke bank kemudian ditimbang. Berat sampah yang bisa disetorkan sudah ditentukan pada kesepakatan sebelumnya, misalnya minimal harus satu kilogram</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal Pencatat -->
<div class="modal fade" id="catat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Pencatatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Bank sampah sudah bekerjasama dengan pengepul yang sudah ditunjuk dari disepakati. Sehingga setelah sampah terkumpul, ditimbang dan dicatat langsung diangkut ke tempat pengelolahan sampah berikutnya. Jadi, sampah tidak menumpuk di lokasi bank sampah</p>
        <p>Bank sampah bisa berkembang menjadi sumber bahan baku untuk industri rumah tangga di sekitar lokasi bank. Jadi, pengelolahan sampah bisa dilakukan oleh masyarakat yang juga menjadi nasabah bank. Sehingga, masyarakat bisa mendapat keuntungan ganda dari sistem bank sampah yaitu tabungan dan laba dari hasil penjualan pproduk dari bahan daur ulang</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal Pengangkutan -->
<div class="modal fade" id="angkut" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Pengangkutan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Petugas akan mencatat jenis dan bobot sampah setelah penimbangan. Hasil pengukurang tersebut lalu dikonversi ke dalam nilai rupiah yang kemudian ditulis di buku tabungan. Pada sistem bank sampah, tabungan biasanya bisa diambil setiap tiga buklan sekali. Tabungan bank sampah bisa dimodifikasi menjadi beberapa jenis : tabungan hari raya, tabungan pendidikan dan tabungan yang bersifat sosial untuk disalurkan melalui lembaga kemasyarakatan</p>
        <p>Pada tahapan ini, nasabah akan merasakan keuntungan sistem bank sampah, masyarakat akan mendapat keuntungan berupa uang tabungan. Dengan sistem pengelolaan sampah "konvensional", masyarakat justru harus mengeluarkan uang, membayar petugas kebersihan untuk mengelola sampahnya.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	</section>

<div class="pr bg-dark pb-4" id="portofolio">
</div>
 <section>
    <?php 
    
    // pagination
    $jumlahdataperhalaman = 10;

    $jumlahdata = count(query("SELECT * FROM data_sampah"));

    $jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
    $halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

    $awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
    // halaman

    $tampil = query("SELECT * FROM data_sampah ORDER BY id_data_smph ASC LIMIT $awaldata, $jumlahdataperhalaman");

     ?>
   <div class="container pb-4">
        <h2 class="text-center pb-4 mx-auto">DATA SAMPAH YANG DAPAT DI TABUNG</h2>
        <table class="table table-bordered table-hover mr-5">
          <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Jenis Sampah</th>
      <th>Satuan</th>
      <th>Harga Sampah</th>
      <th>Gambar</th>
    </tr>
  </thead>
        <tbody>
    <?php $i = 1; ?>
    <?php foreach ($tampil as $row) : ?>
    <tr class="table mx-auto">
      <th><?= $i;?></th>
      <td><?= $row["jns_smph"];?></td>
      <td><?= $row["satuan"];?></td>
      <td><?= $row["hrg_smph"];?></td>
      <td><img src="../img/data_sampah/<?= $row["pict"];?>" width="120"></td>
    </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
  </tbody>
</table>
  <div class="">
  <?php if ($halamanaktif > 1) : ?>
    <a href="?halaman=<?= $halamanaktif - 1;?>" class="btn btn-info">&lt;</a>
  <?php endif; ?>
<?php for ($i=1; $i <= $jumlahhalaman ; $i++) : ?>
  <?php if( $i == $halamanaktif) : ?>
  <a href="?halaman=<?= $i; ?>" style="font-weight: bold;" class="btn btn-warning"><?= $i; ?></a>
  <?php else : ?>
  <a href="?halaman=<?= $i; ?>" class="btn btn-info"><?= $i; ?></a>
<?php endif; ?>
<?php endfor; ?>

  <?php if ($halamanaktif < $jumlahhalaman) : ?>
    <a href="?halaman=<?= $halamanaktif + 1;?>" class="btn btn-info">&gt;</a>
  <?php endif; ?>
</div>
</div>
  </section>

<section class="contact mb-5" id="Berita">
	<div class="container" id="Berita">
			<div class="col text-center pt-5">
				<h2 class="display-5">Kegiatan Bank Sampah</h2>
			</div>
		<div class="row">
			<div class="card-group pt-5">
        <div class="card col-md-4">
          <img class="card-img-top" src="../img/Photo_12.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Nasabah Menabung Di Bank Sampah</h5>
          </div>
        </div>
        <div class="card col-md-4">
          <img class="card-img-top" src="../img/Photo_8.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Pembuatan Pupuk</h5>
          </div>
        </div>
        <div class="card col-md-4">
          <img class="card-img-top" src="../img/Photo_6.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Pembuatan Pupuk Kompos</h5>
          </div>
        </div>
      </div>
      <div class="card-group">
			  <div class="card col-md-4">
			    <img class="card-img-top" src="../img/Photo_13.png" alt="Card image cap">
			    <div class="card-body">
			      <h5 class="card-title">Pelayanan Bank Sampah Terhadap Nasabah</h5>
			    </div>
			  </div>
			  <div class="card col-md-4">
			    <img class="card-img-top" src="../img/Photo_7.png" alt="Card image cap">
			    <div class="card-body">
			      <h5 class="card-title">Nasabah Bank Sampah</h5>
			    </div>
			  </div>
			  <div class="card col-md-4">
			    <img class="card-img-top" src="../img/Photo_10.png" alt="Card image cap">
			    <div class="card-body">
			      <h5 class="card-title">Pembuatan Produk Dari Sampah</h5>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</section>
<div class="bg-secondary pb-4 nb sec">
  <div class="container">
    <div class="row mx-auto justify-content-center">
      <div class="circle mt-5 btn-info">
        <h1 class="display-1 font-weight-bold mt-2">
        <?= $num_nasabah;?>
        </h1>
        <p class="text-light">NASABAH</p>
      </div>
      <div class="circle mt-5 btn-success">
        <h1 class="display-1 font-weight-bold mt-2">
        <?= $num_petugas;?>
        </h1>
        <p class="text-light">PETUGAS</p>
      </div>
    </div>
  </div>
</div>
<section class="pb-3 pt-5">
	<div class="container">
    <div class="row pb-5">
    <div class="mx-auto">
      <h3 class="jd">Produk Yang Dihasilkan Bank Sampah Pondok Surya Mandala</h3>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <img src="../img/Produk_1.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_2.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_3.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_4.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_5.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_6.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_7.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_8.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_9.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_10.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_12.png" alt="..." class="img-thumbnail">
      </div>
      <div class="col-lg-4">
        <img src="../img/Produk_13.png" alt="..." class="img-thumbnail">
      </div>
    </div>
  
</div>
</section>
 <?php 
include 'footer.php'; ?>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    <script type="text/javascript">
    	
$(function () {
  $('[data-toggle="popover"]').popover()
})

$(function () {
  $('.example-popover').popover({
    container: 'body'
  })
})
    </script>


  </body>
</html>