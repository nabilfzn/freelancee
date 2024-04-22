<?php

// koneksi
require '../../login/koneksi.php';

// tangkap data dari database

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$telephone = $_POST['telephone'];

// update data ke database

mysqli_query($conn, "UPDATE user SET 

id = '$id',
username = '$username',
email = '$email',
password = '$password ',
telephone = '$telephone'
");

// pindah ke dashboard

header("location: ../dashboard.php");

?>