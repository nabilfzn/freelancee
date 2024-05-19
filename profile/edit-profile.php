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

if (!empty($fileName)) {
    if ($fileSize < 6000000) {
        move_uploaded_file($fileTmp, 'file-pp/'. $fileName);
    } else {
        echo "Gambar terlalu besar";
    }

} else {
    $fileName = $_POST['photo_profile'];
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
    <link rel="stylesheet" href="edit-profile.css">
</head>
<body>
 <div class="box">
    <div class="kiri">
        <div class="box-signup">
            <div class="formk">
                <h1>Edit Profile</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="txt">
                    ganti foto profil : <input type="file" name="gambar">
                    </div>
                    <div class="txt">
                        <input placeholder="username" type="username" name="username" id="username" value="<?php echo $_SESSION['username']?>" required;>
                    </div>
                    <div class="txt">
                        <input placeholder="email" type="email" name="email" id="email" value="<?php echo $_SESSION['email']?>" required;>
                    </div>
                    <div class="txt">
                        <input placeholder="address" type="address" name="address" id="address" value="<?php echo $_SESSION['address']?>" required;>
                    </div>
                    <div class="txt">
                        <input placeholder="telephone" type="telephone" name="telephone" id="telephone" value="<?php echo $_SESSION['telephone']?>" required;>
                    </div>
                    <div class="submit">
                        <button type="submit" name="submit">
                            Submit</button>
                    </div>
                </form>
            </div>
            <p class="s"><a href="profile.php">Kembali</a></p>
        </div>
    </div>
</div>

</div>
