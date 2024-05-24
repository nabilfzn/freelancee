<?php

require "../../login/koneksi.php";

if (!isset($_SESSION["email"]) || $_SESSION["level"] !== "admin") {
    header("Location: ../../login/login.php");
    exit;
}

if(isset($_POST["submit"])) {

    $judul = htmlspecialchars($_POST["judul"]);
    $penerima = htmlspecialchars($_POST["penerima"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $penggalang = htmlspecialchars($_POST["id_penggalang_dana"]);
    $waktu = date('Y-m-d H:i:s');
    
    $file = $_FILES['gambar'];
    $fileName = $_FILES['gambar']['name'];
    $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Mengambil ekstensi file dengan fungsi pathinfo()
    $ekstentionAllowed = array('png', 'jpg', 'jpeg');
    $fileSize = $_FILES['gambar']['size'];
    $fileTmp = $_FILES['gambar']['tmp_name'];



    if ($fileSize < 6000000) {
        move_uploaded_file($fileTmp, '../../open-donation/file/'. $fileName);
    } else {
        echo "Gambar terlalu besar";
    }

    


    $result_donasi = mysqli_query($conn, "INSERT INTO donasi VALUES ('', '$judul', '$penerima', '$deskripsi', '$fileName', '$penggalang', '$waktu')");

if ($result_donasi) {
    echo "<script> alert('data berhasil ditambahkan')
    document.location.href = '../data_penggalang.php' </script>";
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
                <label for="judul">judul :</label>
                    <input type="text" name="judul" id="judul" required>

                     <label for="penerima">penerima :</label>
                     <input type="text" name="penerima" id="penerima" required>

                     <label for="gambar">gambar :</label>
                     <input type="file" name="gambar" id="gambar" required >

                     <label for="deskripsi">deskripsi :</label>
                     <input type="text" name="deskripsi" id="deskripsi" required>

                     <label for="id_penggalang_dana">id penggalang dana :</label>
                     <input type="text" name="id_penggalang_dana" id="id_penggalang_dana" required >
            </div>   
                <div class="bawah">
                    <div class="btn">
                        <a href=""><button>back</button></a>
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