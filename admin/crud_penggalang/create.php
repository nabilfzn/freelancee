<?php

require '../../login/koneksi.php';


 $id_user = $_SESSION["id_user"]; 
 $waktu = date('Y-m-d H:i:s');


if (isset($_POST["submit"])) {

    $judul = htmlspecialchars($_POST["judul"]);
    $penerima = htmlspecialchars($_POST["penerima"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);

    $query = "INSERT INTO donasi VALUES
            ('', '$judul', '$penerima', '$deskripsi', '', '$id_user', '$waktu')";

    $result =  mysqli_query($conn, $query);

    echo "<script> alert('data berhasil ditambahkan')
    document.location.href = '../data_penggalang.php' </script>";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah data Baru</h1>

    <form action="" method="post">
    <ul>
        <li><label for="judul">judul :</label>
        <input type="text" name="judul" id="judul" required></li>

        <li><label for="penerima">penerima :</label>
        <input type="text" name="penerima" id="penerima" required ></li>

        <li><label for="deskripsi">deskripsi :</label>
        <input type="text" name="deskripsi" id="deskripsi" required></li>

        <li><button type="submit" name="submit">Add data</button></li>
    </ul>
    </form>

</body>
</html>