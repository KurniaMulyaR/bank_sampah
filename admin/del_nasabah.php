<?php 
require '../config/functions_nasabah.php';

$id_nasabah = $_GET["id_nasabah"];

if ( del_nasabah($id_nasabah) > 0 ) {
        echo "
        <script>
        alert('data berhasil dihapus!');
        document.location.href = 'nasabah_admin.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal dihapus!');
        document.location.href = 'nasabah_admin.php'
        </script>";
    }


 ?>