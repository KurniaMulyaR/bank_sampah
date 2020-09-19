<?php 
require '../config/functions_sampah.php';

$id_sampah = $_GET["id_sampah"];

if ( del_sampah($id_sampah) > 0 ) {
        echo "
        <script>
        alert('data berhasil dihapus!');
        document.location.href = 'pembukuan_sampah_keluar.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal dihapus!');
        document.location.href = 'pembukuan_sampah_keluar.php'
        </script>";
    }


 ?>