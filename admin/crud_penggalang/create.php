<?php

require '../../login/koneksi.php';

if (isset($_POST["submit"])) {

    $judul = htmlspecialchars($data["judul"]);
    $penerima = htmlspecialchars($data["penerima"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $level = "user";

    $query = "INSERT INTO user VALUES
            ('', '$judul', '$penerima', '$deskripsi', '', '$level', '', '')";

    $result =  mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>

alert('data berhasil ditambahkan')
    document.location.href = '../data_penggalang.php';

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