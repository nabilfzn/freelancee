<?php
require '../../login/koneksi.php';

if (!isset($_SESSION["email"]) || $_SESSION["level"] !== "admin") {
    header("Location: ../../login/login.php");
    exit;
}

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

    // Ambil data user dari database untuk memeriksa password saat ini
    $result = mysqli_query($conn, "SELECT password FROM user WHERE id_user = $id");
    $user = mysqli_fetch_assoc($result);
    
    // Periksa apakah password diubah
    if ($user['password'] !== $password) {
        // Hash password baru sebelum menyimpannya
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    } else {
        // Gunakan password lama jika tidak ada perubahan
        $hashedPassword = $user['password'];
    }

    // Lakukan pembaruan pada database
    $result = mysqli_query($conn, "UPDATE user SET 
        username = '$username',
        email = '$email',
        password = '$hashedPassword',
        telephone = '$telephone',
        address = '$address',
        photo_profile = '$fileName',
        level = '$level'
        WHERE id_user = $id");

    if ($result) {
        header("Location: ../dashboard.php");
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}

?>

<!-- edit -->
<?php
$id = $_GET['id'];
$user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
while ($data = mysqli_fetch_array($user)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="galang-dana.css">
</head>
<body>
    
    <div id="page">
        <div class="box">
            <div class="atas">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="username" required value="<?php echo $data['id_user'] ?>">
                    <br>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" required value="<?php echo $data['username'] ?>">
                    <br>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" required value="<?php echo $data['email'] ?>">
                    <br>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" required value="<?php echo $data['password'] ?>">
                    <br>
                    <label for="telephone">Telephone :</label>
                    <input type="text" name="telephone" id="telephone" required value="<?php echo $data['telephone'] ?>">
                    <br>
                    <label for="address">Alamat :</label>
                    <input type="text" name="address" id="address" required value="<?php echo $data['address'] ?>">
                    <br>
                    <input type="hidden" name="photo_profile" value="<?php echo $data['photo_profile']; ?>">
                    <br>
                    <label for="gambar">Profile :</label>
                    <input type="file" name="gambar" id="gambar">
                    <?php 
                    echo "<img class='pp' src='../../profile/file-pp/".$data["photo_profile"]."'>";
                    ?>
                    <br>
                    <label for="level">Level :</label>
                    <input type="text" name="level" id="level" required value="<?php echo $data['level'] ?>">
                </div>   
                <div class="bawah">
                    <div class="btn">
                        <a href=""><button>Back</button></a>
                        <div class="s">
                            <button type="submit" name="edit">Edit</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
}
?>
