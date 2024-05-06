<?php 
require_once "../login/koneksi.php";

$id = $_SESSION["id_user"];

$ambil= mysqli_query($conn, "SELECT * FROM user WHERE id_user = '".$_SESSION["id_user"]."'");
$row = mysqli_fetch_assoc($ambil);

if(isset($_POST["submit"])) {

    $file = $_FILES['gambar'];
    $fileName = $_FILES['gambar']['name'];
    $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Mengambil ekstensi file dengan fungsi pathinfo()
    $ekstentionAllowed = array('png', 'jpg', 'jpeg');
    $fileSize = $_FILES['gambar']['size'];
    $fileTmp = $_FILES['gambar']['tmp_name'];


    $username = $_POST["username"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];

    if ($fileSize < 6000000) {
        move_uploaded_file($fileTmp, 'file-pp/'. $fileName);
    } else {
        echo "Gambar terlalu besar";
    }

    

    $result_donasi= mysqli_query($conn, "UPDATE user SET 
    
    username = '$username',
    address = '$address',
    email = '$email',
    telephone = '$telephone',
    photo_profile = '$fileName'
    
    where id_user = $id");

if ($result_donasi) {
    header("Location:profile.php");
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

    <style>
                img {
        max-width: 100%; /* Maksimum lebar gambar adalah 100% dari lebar parent */
        max-height: 100%; /* Maksimum tinggi gambar adalah 100% dari tinggi parent */
        height: auto; /* Biarkan tinggi gambar menyesuaikan proporsi dengan lebar */
}

    .pp {
        width: 100px;
    }




    </style>



</head>
<body>
    

<form action="" method="post" enctype="multipart/form-data">


<input type="text" name="username" value="<?php echo $_SESSION['username']?>">
<br>
<input type="text" name="address" value="<?php echo $_SESSION['address']?>">
<br>
<input type="text" name="email" value="<?php echo $_SESSION['email']?>">
<br>
<input type="text" name="telephone" value="<?php echo $_SESSION['telephone']?>">
<br>
<img class="pp" src="file-pp/<?php echo $row["photo_profile"]?>" alt=""> <br>ganti foto profil : <input type="file" name="gambar">

<br>
<input type="submit" name="submit">

</form>



</body>
</html>