<?php
require '../../login/koneksi.php';
$id= $_GET["id"];


if (deletep($id) > 0) {
    echo "<script> alert('data berhasil dihapus')
    document.location.href = '../data_penggalang.php' </script>";
}


?>

