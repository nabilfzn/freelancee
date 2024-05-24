<?php

require "../../login/koneksi.php";

if (!isset($_SESSION["email"]) || $_SESSION["level"] !== "admin") {
    header("Location: ../../login/login.php");
    exit;
}

if(isset($_POST["submit"])) {

    
    $qrya = mysqli_query($conn, "SELECT * FROM payment");
    $rslta = mysqli_fetch_assoc($qrya);

    $waktu = date('Y-m-d H:i:s');
    $telephone = $_POST["telephone"];
    $donatur = $_POST["donatur"];
    $alamat = $_POST["alamat"];
    $atm = $_POST["atm"];
    $nominal = $_POST["nominal"];
    $ids = $_POST["iduser"];
    $id_donasi = $_POST["id_donasi"];


    $result = mysqli_query($conn, "INSERT INTO payment VALUES('', '$id_donasi', '$ids', '$telephone', '$donatur', '$alamat', '$atm', '$nominal', '$waktu')");

if ($result) {
    echo "<script> alert('data berhasil ditambahkan')
    document.location.href = '../data_donatur.php' </script>";
    exit();
} else {
    echo "Gagal menyimpan data";
}
} else {
mysqli_error($conn);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../phpcrud/galang-dana.css">
</head>
<body>
    
    <div id="page">
        <div class="box">
            <div class="atas">
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <label for="id donasi">id donasi :</label>
                    <input type="text" name="id_donasi" id="id donasi" >
                    
                    <label for="iduser">id user :</label>
                    <input type="text" name="iduser" id="iduser" >

                    <label for="telephone">telephone :</label>
                    <input type="text" name="telephone" id="judul" >

                     <label for="donatur">donatur :</label>
                     <input type="text" name="donatur" id="donatur"  >

                     <label for="alamat">alamat :</label>
                     <input type="text" name="alamat" id="alamat" >

                     <label for="atm">No Rek :</label>
                     <input type="text" name="atm" id="atm" >

                     <label for="nominal">$nominal :</label>
                     <input type="text" name="nominal" id="nominal"  >
            </div>   
                <div class="bawah">
                    <div class="btn">
                        <a href="../data_donatur.php"><button>back</button></a>
                        <div class="s">
                            <button type="submit" name="submit">add data</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

</body>
</html>