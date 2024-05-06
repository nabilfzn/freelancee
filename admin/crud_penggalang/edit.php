<?php
require '../../login/koneksi.php';

if(isset($_POST['edit'])){	
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penerima = $_POST['penerima'];
    $deskripsi = $_POST['deskripsi'];


    $result = mysqli_query($conn, "UPDATE donasi SET 
        judul = '$judul',
        penerima = '$penerima',
        deskripsi = '$deskripsi'
        WHERE id_donasi = $id");

    header("Location: ../data_penggalang.php");
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
</head>
<body>
    <h1>Edit User</h1>

    <form action="" method="post">
    <ul>
        <input type="hidden" name="id" required value= "<?php echo $data['id_donasi']?>">

        <li><label for="judul">judul :</label>
        <input type="text" name="judul" id="judul" required value= "<?php echo $data['judul']?>"></li>

        <li><label for="penerima">penerima :</label>
        <input type="text" name="penerima" id="penerima" required value= "<?php echo $data['penerima']?>"></li>

        <li><label for="deskripsi">deskripsi :</label>
        <input type="text" name="deskripsi" id="deskripsi" required value= "<?php echo $data['deskripsi']?>"></li>

        <li><button type="submit" name="edit">Edit data</button></li>
    </ul>
    </form>

</body>
</html>

<?php
}
?>
