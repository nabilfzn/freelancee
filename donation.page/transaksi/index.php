<?php
 
 require "../../login/koneksi.php";
 
 if (isset($_POST["payment"])) {
    
    if (payment($_POST) > 0) {
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
    
<div class="container">
    <div class="page">
            <form action="" method="post">

                <!-- no telp -->
                <label for="Nomor Telephone">Nomor Telephone :</label>
                <input type="text" name="telephone" id="Nomor Telephone" required>
                <br>
                <!-- nama donatur -->
                <label for="nama_donatur">Nama Donatur :</label>
                <input type="text" name="nama_donatur" id="nama_donatur" required>
                <br>
                <!-- alamat -->
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" required>
                <br>
                <!-- Nomor ATM -->  
                <label for="atm">Nomor ATM :</label>
                <input type="text" name="atm" id="atm" required>
                <br>
                <!-- Nominal -->
                <label for="nominal">Nominal :</label>
                <input type="number" name="nominal" id="nominal" required>
                <br>
                
                <div class="submit">
                    <button type="submit" name="payment">Donasi</button>
                </div>
                
            </form>
            <div class="submit">
                <a href="../index.php"><button>Kembali</button></a>
            </div>

    </div>
</div>

</body>
</html>