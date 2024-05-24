<?php
require "../login/koneksi.php";
session_start();

if (!isset($_SESSION["email"])) {
    header("location:../login/login.php");
    exit;
}

    
if (isset($_POST["submit"])) {
    $waktu = date('Y-m-d H:i:s');
    $judul = $_POST['judul'];
    $penerima = $_POST['penerima'];
    $deskripsi = $_POST['deskripsi'];
    $uid = $_SESSION['id_user'];



    $file = $_FILES['gambar'];
    $fileName = $_FILES['gambar']['name'];
    $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Mengambil ekstensi file dengan fungsi pathinfo()
    $ekstentionAllowed = array('png', 'jpg', 'jpeg');
    $fileSize = $_FILES['gambar']['size'];
    $fileTmp = $_FILES['gambar']['tmp_name'];

    // var_dump($_POST);
    // var_dump($_FILES);

    if (!in_array($fileExtention, $ekstentionAllowed)) {
        echo "tipe file tidak sesuai (png, jpg, jpeg)";
        exit();
    }

    if ($fileSize < 6000000) {
        move_uploaded_file($fileTmp, 'file/'. $fileName);
    } else {
        echo "Gambar terlalu besar";
    }

    $result_donasi = mysqli_query($conn, "INSERT INTO donasi VALUES ('', '$judul', '$penerima', '$deskripsi', '$fileName', '$uid', '$waktu')");

    if ($result_donasi) {
        echo "<script> alert('donasi     berhasil ditambahkan')
        document.location.href = '../donation.page/index.php' </script>";
    
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div id="page">
        <div class="box">
            <div class="atas">
                <form action="" method="post" enctype="multipart/form-data" >
                    <input type="text" name="judul" placeholder="Masukan Judul">
                    <br>
                    <input type="text" name="penerima" placeholder="Masukan Penerima Donasi">
                    <br>
                    <input type="text" name="deskripsi" placeholder="Masukan Deskripsi Donasi">
                    <br>
                    <input type="file" name="gambar" require>
                    <br>
            </div>   
                <div class="bawah">
                    <div class="btn">
                        <a href="../donation.page/index.php"><button>Kembali</button></a>
                        <div class="s">
                           <button type="submit" name="submit">Galang Dana!</button>
                        </div>
                    </div>
                </div>
                </form>
             </div>
        </div>
    </div>

</body>
</html>