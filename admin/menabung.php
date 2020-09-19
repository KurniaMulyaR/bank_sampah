
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
    function periksaKredit(debit) {
    if (debit.indexOf("-") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (debit.indexOf("+") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (debit.indexOf(",") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (debit.indexOf(";") > -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (debit.indexOf("\.") < -1) {
    window.alert("Jumlah Yang anda masukan tidak sesuai");
    return false;
    }
    if (debit > saldo){
    window.alert("Saldo Tidak mencukupi");
    return false
    }
 
 return true;
  }

  function periksaForm(objekForm){
    return periksaKredit(objekForm.debit.value);
  }
    </script>

<div class="container pb-5 pt-5">
<div class="row">
<div class="card mx-auto col-md-6 shadow">
  <div class="text-center pt-4">
    <h4 class="pt-2">Menabung</h4>
  </div>
  <div class="card-body">
    <form method="post" onsubmit="return periksaForm(this);"  action="pembukuan_admin.php?aksi=menabung">
      <div class="form-group">
        <input type="hidden" value="<?= date('Y-m-d'); ?>" maxlength="20" name="tglmenabung">
      </div>
      <?php 
          $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '".$r['id_nasabah']."'");
          $saldo = mysqli_fetch_array($query_saldo);
          $saldoo = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
          ?>     
      <div class="form-group">
        <h4 class="card-title">Saldo Keseluruhan Nasabah : Rp. <?= $saldoo;?></h4>
      </div> 
      <div class="form-group">
        <input type="hidden" name="id" value="<?= $r['id_laporan_bank'];?>">
        <label class="card-title">Nama Penabung</label>
        <input type="text" maxlength="30" class="form-control" name="nama" disabled value="<?= $r['nama'];?>">
      </div>
      <div class="form-group">
        <label class="card-title">Rekening</label>  
        <input type="hidden" maxlength="20" name="id_nasabah" value="<?= $r['id_nasabah'];?>" class="form-control" > 
        <input type="number" maxlength="20" disabled name="rek" value="<?= $r['rek'];?>" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title">Alamat</label>
        <input id="alamat" maxlength="225" type="text" name="alamat" disabled value="<?= $r['alamat']?>" class="form-control">
      </div>
    <div class="form-group">
      <label for="inputState">Jenis Sampah</label>
      <input type="text" maxlength="50" class="form-control" required name="jns_smph" id="searchsmph">
    </div>
    <div class="form-group">
        <label class="card-title">Harga Sampah</label>
        <input type="text" maxlength="20" required name="hrg_smph"  onfocus="starthitung()" onblur="hasil()" class="form-control" id="hrg_smph">
      </div>
      <div class="form-group">
        <label class="card-title">Berat Sampah (kg)</label>
        <input type="number" required name="brt_smph" maxlength="20"  id="brt_smph"  onfocus="starthitung()" onblur="hasil()" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title">Petugas</label>
        <input type="text" maxlength="20" required name="petugas" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title">Jumlah Nabung</label>
        <input type="hidden" maxlength="11" name="kredit" class="form-control">
        <input type="text" maxlength="11" name="debit" class="form-control" id="nabung">
      </div>
    <button name="nabung" type="submit" class="btn btn-primary">Nabung</button>
    <a href="#" name="reset" type="reset" class="btn btn-danger" onclick="self.history.back()">Batal</a>
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
<script type="text/javascript">
  $( function() {
         $( "#searchsmph" ).autocomplete({
            source: function( request, response ) { 
                $.ajax({
                    url: "ajak_cek_smph.php",
                    type : "POST",
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#searchsmph').val(ui.item.label); // display the selected text
                $('#hrg_smph').val(ui.item.value);
                return false;
            }
        });

    });
 function starthitung(){
    interval = setInterval("hitung()",1);
 }
 function hitung(){
    var hrg_smph = parseInt(document.getElementById("hrg_smph").value);
    var brt_smph = parseInt(document.getElementById("brt_smph").value);
    jumlah = hrg_smph * brt_smph
    document.getElementById("nabung").value = jumlah;
}
function hasil(){
    clearInterval(interval);
}
    </script>