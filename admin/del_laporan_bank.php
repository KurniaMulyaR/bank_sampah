<?php
require '../config/functions_laporan.php';
$id_laporan_bank = $_GET["id_laporan_bank"];

if ( del_laporan($id_laporan_bank) > 0 ) {
        echo "
        <script>
        alert('data berhasil dihapus!');
        document.location.href = 'pembukuan_admin.php'
        </script>";
    }else {
         echo "
        <script>
        alert('data gagal dihapus!');
        document.location.href = 'pembukuan_admin.php'
        </script>";
    }
?>