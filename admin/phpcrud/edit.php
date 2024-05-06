<?php
require '../../login/koneksi.php';

if(isset($_POST['edit'])){	
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $level = $_POST['level'];

    // Periksa apakah ada file gambar yang diunggah
    if ($_FILES['gambar']['size'] > 0) {
        $file = $_FILES['gambar'];
        $fileName = $_FILES['gambar']['name'];
        $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Mengambil ekstensi file dengan fungsi pathinfo()
        $ekstentionAllowed = array('png', 'jpg', 'jpeg');
        $fileSize = $_FILES['gambar']['size'];
        $fileTmp = $_FILES['gambar']['tmp_name'];

        // Periksa apakah ukuran file terlalu besar
        if ($fileSize < 6000000) {
            // Pindahkan file baru ke direktori
            move_uploaded_file($fileTmp, '../../profile/file-pp/'. $fileName);
        } else {
            echo "Gambar terlalu besar";
            exit; // Keluar dari skrip jika gambar terlalu besar
        }
    } else {
        // Jika tidak ada file yang diunggah, gunakan foto lama
        $fileName = $_POST['photo_profile'];
    }

    // Lakukan pembaruan pada database
    $result = mysqli_query($conn, "UPDATE user SET 
        username = '$username',
        email = '$email',
        password = '$password',
        telephone = '$telephone',
        address = '$address',
        photo_profile = '$fileName',
        level = '$level'
        WHERE id_user = $id");

    header("Location: ../dashboard.php");
}

?>

<!-- edit -->
<?php
$id = $_GET ['id'];
$user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
while ($data = mysqli_fetch_array($user)){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

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
    <h1>Edit User</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <input type="hidden" name="id" id="username" required value= "<?php echo $data['id_user']?>">

        <li><label for="username">Username :</label>
        <input type="text" name="username" id="username" required value= "<?php echo $data['username']?>"></li>

        <li><label for="email">Email :</label>
        <input type="email" name="email" id="email" required value= "<?php echo $data['email']?>"></li>

        <li><label for="password">Password :</label>
        <input type="text" name="password" id="password" required value= "<?php echo $data['password']?>"></li>

        <li><label for="telephone">Telephone :</label>
        <input type="text" name="telephone" id="telephone" required value= "<?php echo $data['telephone']?>"></li>

        <li><label for="address">Address :</label>
        <input type="text" name="address" id="address" required value= "<?php echo $data['address']?>"></li>

        <li><label for="photo_profile">Profile :</label>
        <input type="file" name="gambar" id="photo_profile">
        <input type="hidden" name="photo_profile" value="<?php echo $data['photo_profile']; ?>">
        <?php 
        echo "<img class='pp' src='../../profile/file-pp/".$data["photo_profile"]."'>";
        ?>
        </li>

        <li><label for="level">Level :</label>
        <input type="text" name="level" id="level" required value= "<?php echo $data['level']?>"></li>

        <li><button type="submit" name="edit">Edit User</button></li>
    </ul>
    </form>

</body>
</html>

<?php
}
?>
