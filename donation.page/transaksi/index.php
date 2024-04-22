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

                <!-- nama donatur -->
                <label for="judul">Nama Donatur :</label>
                <input type="text" name="judul" id="judul" required>
                <br>
                <!-- alamat -->
                <label for="penerima">Alamat :</label>
                <input type="text" name="penerima" id="penerima" required>
                <br>
                <!-- deskripsi -->
                <label for="deskripsi">deskripsi :</label>
                <textarea id="deskripsi" name="deskripsi"></textarea><br>
                <br>
                <!-- Nomor ATM -->
                <label for="gambar">Nomor ATM :</label>
                <input type="text" name="gambar" id="gambar" required>
                <br>
                <!-- Nomor ATM -->
                <label for="gambar">Nominal :</label>
                <input type="number" name="gambar" id="gambar" required>
                <br>
                
                <div class="submit">
                    <button type="submit" name="submit">Donasi</button>
                </div>

            </form>

    </div>
</div>

</body>
</html>