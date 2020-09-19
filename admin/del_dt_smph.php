<?php 
require '../config/functions_data_sampah.php';

$id_data_smph = $_GET["id_data_smph"];

if ( del_sampah($id_data_smph) > 0 ) {
        echo "
        <script>
        alert('data berhasil dihapus!');
        document.location.href = 'data_sampah.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal dihapus!');
        document.location.href = 'data_sampah.php'
        </script>";
    }


 ?>