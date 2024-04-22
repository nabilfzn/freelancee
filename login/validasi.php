<?php
session_start();
require 'koneksi.php';

$email = $_POST ['email'];
$password = $_POST['password'];
$login = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' and password = '$password' ");
$cek = mysqli_num_rows($login);

   

if ($cek > 0) {

$data = mysqli_fetch_assoc($login);

    if ($data['level'] == "admin") {

        $_SESSION['email'] = $email;
        $_SESSION['level'] = $level;
        header('Location:admin.php');

    } elseif ($data['level'] == "user") {

        $_SESSION['email'] = $email;
        $_SESSION['level'] = $level;
        header('Location:user.php'); 
    
    } else {
        header(location:'login.php');
    }

} else {
    echo "password atau email yang anda masukkan salah";
    echo "<a href='login.php'>kembali</a>";
}

?>