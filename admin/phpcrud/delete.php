<?php
require '../../login/koneksi.php';

if (!isset($_SESSION["email"]) || $_SESSION["level"] !== "admin") {
    header("Location: ../../login/login.php");
    exit;
}

$id= $_GET["id"];


if (delete($id) > 0) {
    echo "<script> alert('data berhasil dihapus')
    document.location.href = '../dashboard.php' </script>";
}


?>