
<?php
require '../../login/koneksi.php';

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


$id = $_GET ['id'];
$donasi = mysqli_query($conn, "SELECT * FROM donasi WHERE id_donasi = '$id'");
while ($data = mysqli_fetch_array($donasi)){    
    ?>

    <div class="container">
        <div class="kotak">
            <input type="hidden" name="id">

            <div class="diatas">
                <div class="gambar" name="gambar">
                </div>
    <style>
        .diatas {
        background-image: url("../../open-donation/file/<?php echo $data['gambar']?>");
        background-size: cover;
        background-repeat: no-repeat;
        width: auto;
        height: 400px;
    }
    </style>
            </div>

            <div class="bawah">
                <div class="judul" name="judul">
                <h2><?php echo $data['judul']?></h2>
                </div>

                <div class="deskripsi" name="deskripsi">
                    <?php echo $data['deskripsi']?>   
                </div>

                <div class="button">
                    <a href="../transaksi/index.php?id=<?php echo $id?>"><button>donate</button></a>
                </div>
                <div class="button">
                    <a href="../index.php"><button>back</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
}
?>