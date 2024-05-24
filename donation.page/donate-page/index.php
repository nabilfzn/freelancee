
<?php
require '../../login/koneksi.php';
if (!isset($_SESSION["email"])) {
    header("location:../../login/login.php");
    exit;
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

    
<?php

// SELECT id_donasi, , COUNT(id_donasi) AS jumlah_donatur, SUM(nominal) AS total_nominal
// FROM payment
// GROUP BY id_donasi;

$id = $_GET ['id'];
$donasi = mysqli_query($conn, "SELECT * FROM donasi WHERE id_donasi = '$id'");
$data = mysqli_fetch_assoc($donasi);

$sql = "SELECT COUNT(id_donasi) AS jumlah_donatur, SUM(nominal) AS total_nominal
        FROM payment
        WHERE id_donasi = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($data && $row){    
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="detail-donate.css">
</head>
<body>
    
    <div id="page">
        <div class="box">
             <div class="atas">
                <img src="../../open-donation/file/<?php echo $data['gambar']?>" alt="">
             </div>   
             <div class="bawah">
                    <div class="tag">
                        <div class="judul">
                            <h1><?php echo $data['judul']?></h1>
                        </div>
                        <div class="angka">
                        <p>Donasi terkumpul :</p> Rp<?php echo number_format($row['total_nominal'])?>
                        </div>
                    </div>
                    <div class="text">
                        <div class="pgf">
                            <p> <?php echo $data['deskripsi']?> </p>
                        </div>
                        <div class="btn">
                            <a href="../index.php#donate"><button>back</button></a>
                            <a href="../transaksi/index.php?id=<?php echo $id?>"><button>donate</button></a>
                        </div>
                    </div>
             </div>
        </div>
    </div>

</body>
</html>

<?php
}
?>
