<?php
require '../../login/koneksi.php';
$id= $_GET["id"];


if (deleted($id) > 0) {
    echo "<script> alert('data berhasil dihapus')
    document.location.href = '../data_donatur.php' </script>";
}


?>

