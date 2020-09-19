
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Bank Sampah Surya Mandala</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="../js/jquery-ui.min.css">
       <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>
    <script type="text/javascript">
    function periksaKredit(kredit) {
    if (kredit.indexOf("-") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (kredit.indexOf("+") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (kredit.indexOf(",") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (kredit.indexOf(";") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (kredit.indexOf("\.") < -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (kredit > saldo){
    window.alert("Saldo Tidak mencukupi");
    return false
    }
 
 return true;
  }

  function periksaForm(objekForm){
    return periksaKredit(objekForm.kredit.value);
  }
    </script>
<div class="container pb-5 pt-4">
<div class="row">
<div class="card mx-auto col-md-6 shadow">
  <div class="text-center pt-4">
    <h4 class="pt-2">Mengambil Uang</h4>
  </div>
  <div class="card-body">
    <form method="post" onsubmit="return periksaForm(this);" action="pembukuan_admin.php?aksi=mengambil" >
         <?php 
          $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) 
          as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '".$r['id_nasabah']."'");
          $saldo = mysqli_fetch_array($query_saldo);
          $saldoo = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
          ?>     
      <div class="form-group">
        <h4 class="card-title">Saldo </h4>
        <input type="text" class="form-control" disabled name="saldo" value="<?= $saldoo;?>">      
      </div> 
      <div class="form-group">
        <input type="hidden" value="<?= date('Y-m-d'); ?>" maxlength="20" name="tgl_nabung">
         <input type="hidden" name="id" value="<?= $r['id_laporan_bank'];?>">
      </div>
      <div class="form-group">
        <label class="card-title">Nama Pengambil</label>
        <input type="text" maxlength="30" class="form-control" name="nama" disabled value="<?= $r['nama'];?>">
      </div>
      <div class="form-group">
        <label class="card-title">Rekening</label>  
        <input type="hidden" maxlength="20" name="id_nasabah" name="id_nasabah" value="<?= $r['id_nasabah'];?>" class="form-control" > 
        <input type="text" maxlength="20" disabled name="rek" value="<?= $r['rek'];?>" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title">Alamat</label>
        <input id="alamat" maxlength="225" type="text" name="alamat" disabled value="<?= $r['alamat']?>" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title">Petugas</label>
        <input type="text" maxlength="20" required name="petugas" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title">Tanggal Pengajuan</label>
        <input type="date" name="tgl_permintaan" class="form-control">
      </div>
      <input type="hidden" value="<?= date('Y-m-d'); ?>" maxlength="20" name="tgl_konfirmasi">
      <div class="form-group">
        <label class="card-title">Jumlah Mengambil</label>
        <input type="text" maxlength="11" name="kredit" class="form-control">
        <input type="hidden" maxlength="11" name="debit" class="form-control">
      </div>
    <button name="ambil" type="submit" class="btn btn-primary">Simpan</button>
    <a href="#"  type="reset" class="btn btn-danger" onclick="self.history.back()">Batal</a>
    </form>
</div>       
</div>
</div>
</div>
    <script src='../js/jquery-3.3.1.js' type='text/javascript'></script>
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
