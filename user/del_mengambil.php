<?php 
require '../config/functions_mengambil.php';

$id_mengambil = $_GET["id_mengambil"];

if ( del_mengambil($id_mengambil) > 0 ) {
        echo "
        <script>
        alert('data berhasil dihapus!');
        document.location.href = 'mengambil_tabungan.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal dihapus!');
        document.location.href = 'mengambil_tabungan.php'
        </script>";
    }


 ?>