<?php
require "../login/koneksi.php";
// session_start();



    
if (isset($_POST["submit"])) {
    // $email = $_SESSION['email'];
    // $query = "SELECT id_user FROM user WHERE email = '$email'";
    $judul = $_POST['judul'];
    $penerima = $_POST['penerima'];
    $deskripsi = $_POST['deskripsi'];
    // $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($result);
    $uid = $_SESSION['id_user'];



    $file = $_FILES['gambar'];
    $fileName = $_FILES['gambar']['name'];
    $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Mengambil ekstensi file dengan fungsi pathinfo()
    $ekstentionAllowed = array('png', 'jpg', 'jpeg');
    $fileSize = $_FILES['gambar']['size'];
    $fileTmp = $_FILES['gambar']['tmp_name'];

    // var_dump($_POST);
    // var_dump($_FILES);

    // if (!in_array($fileExtention, $ekstentionAllowed)) {
    //     echo "tipe file tidak sesuai (png, jpg, jpeg)";
    //     exit();
    // }

    if ($fileSize < 6000000) {
        move_uploaded_file($fileTmp, 'file/'. $fileName);
    } else {
        echo "Gambar terlalu besar";
    }

    $result_donasi = mysqli_query($conn, "INSERT INTO donasi VALUES ('', '$judul', '$penerima', '$deskripsi', '$fileName', '$uid')");

    if ($result_donasi) {
        header("Location:../donation.page/index.php");
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
    
<div class="container">
    <div class="page">

            <form action="" method="post" enctype="multipart/form-data" >

                <!-- judul -->
                <label for="judul">Judul :</label>
                <input type="text" name="judul" id="judul" required>
                <br>
                <!-- deskripsi -->
                <label for="penerima">penerima :</label>
                <input type="text" name="penerima" id="penerima" required>
                <br>
                <!-- deskripsi -->
                <label for="deskripsi">deskripsi :</label>
                <textarea id="deskripsi" name="deskripsi"></textarea><br>
                <br>
                <!-- tagline/ajakan -->
                <label for="gambar">upload gambar :</label>
                <input type="file" name="gambar" id="gambar">
                <br>
                
                <div class="submit">
                    <button type="submit"name="submit">Galang Dana!</button>
                </div>
                
            </form>
            <div class="submit">
                <a href="../donation.page/index.php"><button>Kembali</button></a>
            </div>

    </div>
</div>

</body>
</html>