<?php
 
 require "../../login/koneksi.php";

 if (!isset($_SESSION["email"])) {
    header("location:../../login/login.php");
    exit;
}

 $id = $_GET ['id'];
 
 if (isset($_POST["payment"])) {


    $qrya = mysqli_query($conn, "SELECT * FROM payment");
    $rslta = mysqli_fetch_assoc($qrya);

    $waktu = date('Y-m-d H:i:s');
    $telephone = $_POST["telephone"];
    $donatur = $_POST["nama_donatur"];
    $alamat = $_POST["alamat"];
    $atm = $_POST["atm"];
    $nominal = $_POST["nominal"];
    $ids = $_SESSION["id_user"];
    $id_donasi = $id;
    // var_dump($waktu, $telephone, $donatur, $alamat, $atm, $nominal, $ids, $id_donasi);

    $result = mysqli_query($conn, "INSERT INTO payment VALUES('', '$id_donasi', '$ids', '$telephone', '$donatur', '$alamat', '$atm', '$nominal', '$waktu')");

    
    if ($result) {
        echo "<script> 
        alert('Transaksi berhasil'); 
        window.location.href = '../../donation.page/index.php'
      </script>"; 
    } else {
        echo "<script> 
        alert('Transaksi gagal'); 
        window.location.href = '../../donation.page/index.php'
      </script>"; 
    }

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
    
    <div id="page">
        <div class="box">
            <div class="atas">
                <form action="" method="post">
                <input type="hidden" name="id_donasi" value="<?php $_SESSION["id_user"]?>"> 
                    <input type="text" name="telephone" placeholder="masukan Nomor telephone">
                    <br>
                    <input type="text" name="nama_donatur" placeholder="masukan nama donatur">
                    <br>
                    <input type="text" name="alamat" placeholder="masukan alamat">
                    <br>
                    <input type="text" name="atm" placeholder="masukan nomor rekening">
                    <br>
                    <input type="text" name="nominal" placeholder="masukan nominal">
                </div>   
                <div class="bawah">
                    <div class="btn">
                        <a href="../index.php"><button>back</button></a>
                        <button type="submit" name="payment">donate</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>

</body>
</html>