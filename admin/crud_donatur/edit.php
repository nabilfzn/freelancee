<?php
require '../../login/koneksi.php';

if(isset($_POST["edit"])) {
    $id = ($_POST['id']);
    $idd = ($_POST['id_donasi']);
    $idu = ($_POST['id_user']);
    $no = ($_POST['no_telp']);
    $donatur = ($_POST['nama_donatur']);
    $alamat = ($_POST['alamat']);
    $atm = ($_POST['atm']);
    $nominal = ($_POST['nominal']);
    $waktu = date('Y-m-d H:i:s');





    $result_donasi= mysqli_query($conn, "UPDATE payment SET 
    
    id_donasi = '$idd',
    id_user = '$idu',
    no_telp = '$no',
    nama_donatur = '$donatur',
    alamat = '$alamat',
    atm = '$atm',
    nominal = '$nominal',
    waktu_pembayaran = '$waktu'
    
    where id_payment = $id");

if ($result_donasi) {
    echo "<script> alert('data berhasil diupdate')
    document.location.href = '../data_donatur.php' </script>";
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
$user = mysqli_query($conn, "SELECT * FROM payment WHERE id_payment = '$id'");
while ($data = mysqli_fetch_array($user)){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donasi</title>
    <link rel="stylesheet" href="../phpcrud/galang-dana.css">
</head>
<body>
    <div id="page">
        <div class="box">
            <div class="atas">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" required value="<?php echo htmlspecialchars($data['id_payment']); ?>">

                    <label for="id_donasi">id donasi :</label>
                    <input type="text" name="id_donasi" id="id_donasi" required value="<?php echo htmlspecialchars($data['id_donasi']); ?>">

                    <label for="id_user">id user :</label>
                    <input type="text" name="id_user" id="id_user" required value="<?php echo htmlspecialchars($data['id_user']); ?>">

                    <label for="no_telp">telephone :</label>
                    <input type="text" name="no_telp" id="no_telp" required value="<?php echo htmlspecialchars($data['no_telp']); ?>">

                    <label for="nama_donatur">nama donatur :</label>
                    <input type="text" name="nama_donatur" id="nama_donatur" required value="<?php echo htmlspecialchars($data['nama_donatur']); ?>">

                    <label for="alamat">alamat :</label>
                    <input type="text" name="alamat" id="alamat" required value="<?php echo htmlspecialchars($data['alamat']); ?>">

                    <label for="atm">no atm :</label>
                    <input type="text" name="atm" id="atm" required value="<?php echo htmlspecialchars($data['atm']); ?>">

                    <span>Rp.</span>
                    <input type="text" name="nominal" id="nominal" required value="<?php echo number_format($data['nominal'], 0, ',', '.'); ?>">                    
                </div>
                <div class="bawah">
                    <div class="btn">
                        <a href="javascript:history.back()"><button type="button">Back</button></a>
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