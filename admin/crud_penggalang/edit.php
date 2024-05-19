<?php
require '../../login/koneksi.php';

if(isset($_POST["edit"])) {
    $id = htmlspecialchars($_POST['id']);
    $judul = htmlspecialchars($_POST['judul']);
    $penerima = htmlspecialchars($_POST['penerima']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $waktu = date('Y-m-d H:i:s');

    $file = $_FILES['gambar'];
    $fileName = $_FILES['gambar']['name'];
    $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Mengambil ekstensi file dengan fungsi pathinfo()
    $ekstentionAllowed = array('png', 'jpg', 'jpeg');
    $fileSize = $_FILES['gambar']['size'];
    $fileTmp = $_FILES['gambar']['tmp_name'];

if (!empty($fileName)) {
    if (!in_array($fileExtention, $ekstentionAllowed)) {
        echo "tipe file tidak sesuai (png, jpg, jpeg)";
        exit();
    }

    if ($fileSize < 6000000) {
        move_uploaded_file($fileTmp, '../../file/'. $fileName);
    } else {
        echo "Gambar terlalu besar";
        exit();
    }
} else {
    $fileName = $_POST['photo_profile'];

}

    $result_donasi= mysqli_query($conn, "UPDATE donasi SET 
    
    judul = '$judul',
    penerima = '$penerima',
    deskripsi = '$deskripsi',
    gambar = '$fileName'
    
    where id_donasi = $id");

if ($result_donasi) {
    echo "<script> alert('data berhasil diupdate')
    document.location.href = '../data_penggalang.php' </script>";
    exit();
} else {
    echo "Gagal mengupdate data";
}
} else {
mysqli_error($conn);
}










?>

<?php
$id = $_GET ['id'];
$user = mysqli_query($conn, "SELECT * FROM donasi WHERE id_donasi = '$id'");
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
    max-width: 100%;
    max-height: 100%;
    height: auto; }

.pp {
    width: 100px;
}
</style>

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
                <input type="hidden" name="id" required value= "<?php echo $data['id_donasi']?>">

                    <label for="judul">judul :</label>
                    <input type="text" name="judul" id="judul" required value= "<?php echo $data['judul']?>">

                    <label for="penerima">penerima :</label>
                    <input type="text" name="penerima" id="penerima" required value= "<?php echo $data['penerima']?>">

                    <label for="deskripsi">deskripsi :</label>
                    <input type="textarea" name="deskripsi" id="deskripsi" required value= "<?php echo $data['deskripsi']?>">

                    <input type="hidden" name="photo_profile" value="<?php echo $data['gambar']; ?>">
                    <img class="pp" src="../../open-donation/file/<?php echo $data["gambar"]?>" alt="">
                    <br>
                    ganti gambar : <input type="file" name="gambar">
                </div>   
                <div class="bawah">
                    <div class="btn">
                        <a href=""><button>back</button></a>
                        <div class="s">
                            <button type="submit" name="edit">edit</button>
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
