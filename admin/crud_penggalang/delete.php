<?php
require '../../login/koneksi.php';
$id= $_GET["id"];

if (!isset($_SESSION["email"]) || $_SESSION["level"] !== "admin") {
    header("Location: ../../login/login.php");
    exit;
}

if (deletep($id) > 0) {
    echo "<script> alert('data berhasil dihapus')
    document.location.href = '../data_penggalang.php' </script>";
}


?>

