
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
    <link rel="stylesheet" type="text/css" href="../js/jquery-ui.min.css">
       <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>


    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../img/bsip.png" height="75px"></h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index2.php">Home</a>
                </li>
                <li>
                    <a href="nasabah_admin.php">Data Nasabah</a>
                </li>                
                <li  class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pembukuan</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li  class="active">
                            <a href="pembukuan_admin.php">Laporan Penabung</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="informasi_admin.php">Informasi/Berita</a>
                </li>
                <li>
                    <a href="data_sampah.php">Data Sampah</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg">

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
<div class="container pb-5">
<div class="row">
<div class="card mx-auto col-md-6">
  <div class="text-center pt-4">
    <h4 class="pt-2">Tambah Laporan</h4>
  </div>
  <div class="card-body">
    <form method="post">
      <div class="form-group">
        <label class="card-title">Nama Penabung</label>
        <input type="text" maxlength="30" class="form-control" required name="nama" id="searchnama">
      </div>
      <div class="form-group">
        <label class="card-title">Rekening</label>  
        <input type="text" maxlength="20" required name="rek" class="form-control" id="rek">  
      </div>
      <div class="form-group">
        <label class="card-title">Alamat</label>
        <input id="alamat" maxlength="225" type="text" required name="alamat" class="form-control">
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
        <label class="card-title">Berat Sampah</label>
        <input type="text" required name="brt_smph" maxlength="20"  id="brt_smph"  onfocus="starthitung()" onblur="hasil()" class="form-control">
      </div>
      <div class="form-group">
        <label class="card-title">Debit</label>
        <input type="text" maxlength="20" required name="debit" id="debit" class="form-control">
      </div> 
      <div class="form-group">
        <label class="card-title">Petugas</label>
        <input type="text" maxlength="20" required name="petugas" class="form-control">
      </div>     
    <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
    <a href="#" name="reset" type="reset" class="btn btn-danger">Batal</a>
    </div>
</form>
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
    document.getElementById("debit").value = jumlah;
}
function hasil(){
    clearInterval(interval);
}
    </script>