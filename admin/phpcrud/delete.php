<?php
require '../../login/koneksi.php';
$id= $_GET["id"];


if (delete($id) > 0) {
    echo "<script> alert('data berhasil dihapus')
    document.location.href = '../dashboard.php' </script>";
}


?>