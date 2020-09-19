<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

 require '../config/functions_nasabah.php';
   

// tombol cari ditekan
if(isset($_POST["keyword"])){
  $tampil = search_nasabah($_POST["keyword"]);
}
// eror
 if (isset($_GET['aksi'])=='') {
  $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah");
  $row_saldo=mysqli_fetch_array($query_saldo);
  $saldo_keseluruhan= $row_saldo['jumlah_debit'] - $row_saldo['jumlah_kredit'];

  $bulan = date('m');
  $query_saldo = mysqli_query($conn, "SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE date_format((tglmenabung),'%m') like '%$bulan%'");
  $saldo = mysqli_fetch_array($query_saldo);
  $saldo_bulan = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];

 
function cari($keyword) {
  $query = "SELECT * FROM laporan_bank_sampah
      WHERE 
      nama LIKE '%$keyword%' OR 
      rek LIKE '%keyword%'";

  return query($query);
}
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Bank Sampah Surya Mandala</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style3.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><a href="index2.php"><img src="../img/bsip3.png" height="100px"></a></h3>
              </div>

             <ul class="list-unstyled components">
                <li>
                    <a href="index2.php">Beranda</a>
                </li>
                <li>
                    <a href="nasabah_admin.php">Data Nasabah</a>
                </li>                
                <li class="active">
                    <a href="pembukuan_admin.php">Pembukuan</a>
                </li>
                <li>
                    <a href="Konfrimasi_pengambilan.php">Permintaan Mengambil Tabungan</a>
                </li>
                <li>
                    <a href="data_sampah.php">Data Sampah</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg" style="padding: 36px 10px;">

                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                     <h2 class="font-weight-bold pt-2 text-light">Bank Sampah Pondok Surya Mandala Sejahtera</h2>
                    <div id="navbarSupportedContent">    
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active" >
                                <button class="btn btn-light">
                                    <a href="logout.php" title="Log Out">
                                    <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
<div class="container-fluid">
<h2 class="text-center pb-3">LAPORAN TABUNGAN BANK SAMPAH PONDOK SURYA MANDALA SEJAHTERA</h2>
<h4 class="pb-3">Saldo keseluruhan : Rp. <?= $saldo_keseluruhan;?></h4>
<h4 class="pb-3">Saldo Bulan <?= date('m-Y') ?> : Rp. <?= $saldo_bulan; ?></h4>
<div class="row">
    <button  class="btn btn-success mb-2 ml-3" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus mr-2" ></i>Menabung</button>
    <button  class="btn btn-danger mb-2 ml-3" data-toggle="modal" data-target="#tarikAdd"><i class="fa fa-minus mr-2" ></i>Mengambil</button>    
    <form class="col-md-4 mb-2 ml-auto form-inline">
      <div class="form-group">
          <a href="print_pembukuan.php" class="btn btn-info mr-2"><i class="fas fa-print mr-2" ></i>Print</a>
         <input type="text" class="form-control" id="inputPassword2" name="keyword" placeholder="Mencari Nasabah" autofocus autocomplete="off">
        <button class="btn btn-info"><i class="fa fa-search "></i></button>
      </div>
    </form>
</div>
<table class="table table-bordered table-hover mr-5">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Tipe</th>
      <th>Nama Penabung</th>
      <th>Rekening</th>
      <th>Alamat</th>
      <th>Tanggal Menabung</th>
      <th>Tanggal Permintaan</th>
      <th>Jenis Sampah</th>
      <th>Berat Sampah</th>
      <th>Harga Sampah/kg</th>
      <th>Petugas</th>
      <th>Debit</th>
      <th>Kredit</th>
      <th>tanggal Konfirmasi</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;
          $query = mysqli_query($conn,"SELECT * FROM laporan_bank_sampah JOIN nasabah ON laporan_bank_sampah.id_nasabah=nasabah.id_nasabah order by id_laporan_bank desc");

          $count = 2;

          while ($row = mysqli_fetch_array($query)) {
            $i++;
          
           ?>
    
    <tr style="background: <?php if ($row['kredit'] == 0){ ?>
                          #defff1;
                          <?php }else{ ?>
                            #feeeea;
                            <?php } ?>" class="table  mx-auto">
      <th scope="row"><?= $i;?></th>
      <td><?php if ($row['kredit'] == 0) {
       ?>
       <a class="btn-success btn-sm"><i class="fa fa-plus"></i></a>
      <?php }else{
      ?> <a class="btn-danger btn-sm"><i class="fa fa-minus"></i></a>
    <?php } ?></td>
      <td><?= $row['nama'];?></td>
      <td><?= $row['rek'];?></td>
      <td><?= $row['alamat'];?></td>
      <td><?= $row['tglmenabung'];?></td>
      <td><?= $row['tgl_permintaan'];?></td>
      <td><?= $row['jns_smph'];?></td>
      <td><?= $row['brt_smph'];?></td>
      <td><?= $row['hrg_smph'];?></td>
      <td><?= $row['petugas'];?></td>

      <?php if ($count==1) {?>
            
      <td><?= "Rp.".$row['debit'];?></td>
      <td><?= "Rp.".$row['kredit'];?></td>
    <?php }else{
      if ($row['debit']!=0) {
        ?>
        <td><?= "Rp.".$row['debit']; ?></td>
        <td><?= "Rp.".$row['kredit']; ?></td>

      <?php }else{?>
        <td><?= "Rp.".$row['debit'];?></td>
        <td><?= "Rp.".$row['kredit'];?></td>
          <?php 
          
        }
      }
      $count++
          ?>
      
      <td><?= $row['tgl_konfirmasi']?></td>
      <td>
        <a href="del_laporan_bank.php?id_laporan_bank=<?= $row["id_laporan_bank"]?>"><button class="btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></button></a></td>
    </tr>


 <?php } ?>
      <tr>
      <td colspan="11">
        JUMLAH 
      </td>
      <?php
         $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit FROM laporan_bank_sampah");
          $saldo = mysqli_fetch_array($query_saldo);
          $saldo_debit = $saldo['jumlah_debit'];?>
      <td>
        <?= $saldo_debit;?>
      </td>
        <?php
         $query_saldo = mysqli_query($conn,"SELECT SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah");
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
      <td colspan="13">
        TOTAL
      </td>
      <td>
        <?= $total; ?>
      </td>
    </tr>
  </tbody>
</div>
</table>
</div>

<?php } elseif (isset($_GET['aksi'])&&$_GET['aksi'] == 'menabung'){

  if (isset($_POST['nabung'])) {
      
    if (empty($_POST['kredit'])) {
      mysqli_query($conn,"INSERT INTO laporan_bank_sampah(id_laporan_bank,
                                    id_nasabah,
                                    jns_smph,
                                    brt_smph,
                                    hrg_smph,
                                    debit,
                                    kredit,
                                    petugas,
                                    tglmenabung) VALUES('$_POST[id]',
                                                    '$_POST[id_nasabah]',
                                                    '$_POST[jns_smph]',
                                                    '$_POST[brt_smph]',
                                                    '$_POST[hrg_smph]',
                                                    '$_POST[debit]',
                                                    '0',
                                                    '$_POST[petugas]',
                                                    '$_POST[tglmenabung]')");

      $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '$_POST[id_nasabah]'");
      $saldo = mysqli_fetch_array($query_saldo);
      $saldoo = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
      mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo' WHERE id_nasabah = '$_POST[id_nasabah]'");
    }else{
     mysqli_query($conn,"INSERT INTO laporan_bank_sampah(id_laporan_bank,
                                    id_nasabah,
                                    jns_smph,
                                    brt_smph,
                                    hrg_smph,
                                    debit,
                                    kredit,
                                    saldo,
                                    petugas,
                                    tglmenabung) VALUES('$_POST[id]',
                                                    '$_POST[id_nasabah]',
                                                    
                                                    '$_POST[jns_smph]',
                                                    '$_POST[brt_smph]',
                                                    '$_POST[hrg_smph]',
                                                    '$_POST[debit]',
                                                    '0',
                                                    '$_POST[saldo]',       
                                                    '$_POST[petugas]',
                                                    '$_POST[tgl_nabung]')");
      $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '$_POST[id_nasabah]'");
      $saldo = mysqli_fetch_array($query_saldo);
      $saldoo = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
      mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo' WHERE id_nasabah = '$_POST[id_nasabah]'");
    }

    echo "<script>document.location='pembukuan_admin.php'</script>";

  }else{

    
    $rek= $_POST['rek'];
    $query=mysqli_query($conn,"SELECT * FROM nasabah WHERE rek='$rek'");
    $r=mysqli_fetch_array($query);
    $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nasabah WHERE rek='$_POST[rek]'"));
    
    if ($cek == 0) {
      echo "<script>window.alert('Nomor Rekening Tidak ada !!')
            window.location=pembukuan_admin.php</script>";
    }else{
      require 'menabung.php';?>

        <?php }
  }
}elseif (isset($_GET['aksi'])&&$_GET['aksi'] == 'mengambil') {
    if (isset($_POST['ambil'])) {
      if (empty($_POST['kredit'])) {
        mysqli_query($conn,"INSERT INTO laporan_bank_sampah(id_laporan_bank,
                                    id_nasabah,
                                    debit,
                                    kredit,
                                    petugas,
                                    tgl_permintaan) VALUES('$_POST[id]',
                                                    '$_POST[id_nasabah]',
                                                    '0',
                                                    '$_POST[kredit]',
                                                    '$_POST[petugas]',
                                                    '$_POST[tgl_permintaan]')");
         $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '$_POST[id_nasabah]'");
          $saldo = mysqli_fetch_array($query_saldo);
          $saldoo = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
          mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo' WHERE id_nasabah = '$_POST[id_nasabah]'");
      }else{
         mysqli_query($conn,"INSERT INTO laporan_bank_sampah(id_laporan_bank,
                                    id_nasabah,
                                    debit,
                                    kredit,
                                    petugas,
                                    tgl_permintaan) VALUES('$_POST[id]',
                                                    '$_POST[id_nasabah]',
                                                    '0',
                                                    '$_POST[kredit]',
                                                    '$_POST[petugas]',
                                                    '$_POST[tgl_permintaan]')");
       $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '$_POST[id_nasabah]'");
      $saldo = mysqli_fetch_array($query_saldo);
      $saldoo = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
      mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo' WHERE id_nasabah = '$_POST[id_nasabah]'");
      }

        echo "<script>document.location='pembukuan_admin.php'</script>";
    }else{
    $rek= $_POST['rek'];
    $query=mysqli_query($conn,"SELECT * FROM nasabah WHERE rek='$rek'");
    $r=mysqli_fetch_array($query);
    $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nasabah WHERE rek='$_POST[rek]'"));
    if ($cek == 0) {
      echo "<script>window.alert('Nomor Rekening Tidak ada !!')
            window.location=pembukuan_admin.php</script>";
          }else{
             include 'mengambil.php'; ?>
<?php          }
    }
}  ?>
<!-- /modal --> 
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Menabung</h4>
        <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="pembukuan_admin.php?aksi=menabung" class="form-horizontal form-label-left" method="POST">
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group">
                <input type="text" name="rek" id="rek" class="form-control" name="typehead form-control" placeholder="Tulis Nomor Rekening"
                required autofocus="autofocus" autocomplete="off">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>Cari</button>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tarikAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Mengambil Tabungan</h4>
        <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="pembukuan_admin.php?aksi=mengambil" class="form-horizontal form-label-left" method="POST">
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group">
                <input type="text" name="rek" id="rek" class="form-control" name="typehead form-control" placeholder="Tulis Nomor Rekening"
                required autofocus="autofocus" autocomplete="off">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>Cari</button>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


</div>
</div>
    
<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
     <!-- jQuery UI -->
    <script src='../js/jquery-ui.min.js' type='text/javascript'></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>