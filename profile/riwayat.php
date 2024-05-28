<?php
    require "../login/koneksi.php";

    $query = "
    SELECT 
        donasi.id_donasi, 
        donasi.judul, 
        donasi.penerima, 
        donasi.deskripsi, 
        donasi.gambar, 
        donasi.id_penggalang_dana, 
        donasi.waktu, 
        COUNT(payment.id_payment) AS berapa_kali
    FROM 
        donasi
    INNER JOIN 
        payment ON donasi.id_donasi = payment.id_donasi
    WHERE 
        payment.id_user = {$_SESSION["id_user"]}
    GROUP BY 
        donasi.id_donasi, 
        donasi.judul, 
        donasi.penerima, 
        donasi.deskripsi, 
        donasi.gambar, 
        donasi.id_penggalang_dana, 
        donasi.waktu
";

    $hasil = mysqli_query($conn, $query);




    ?>       
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="riwayat.css">
        
    </head>
    <body>

    <!-- navigasi -->
    <nav>
        <div class="container">
            <div class="box-nav">
                <div class="logo">
                    <a href="../index.php"><img src="../aset/logo.png" alt=""></a>
                </div>
                <div class="nav-item">
                    <ul>
                    <li><a href="../index.php">home</a></li>
                        <li><a href="../donation.page/index.php#donate">donate</a></li>
                        <li><a href="../aboutme.php">about</a></li>
                        <li><a href="../donation.page/index.php#news">news</a></li>
                        <li><a href="../whistlist/index.php">wishlist</a></li>
                    </ul>
                    <a class="pp" href="../profile/profile.php"><?php 
                    // session_start();
                    
                    $qry = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '{$_SESSION['id_user']}'");
                    $baris = mysqli_fetch_assoc($qry);
                    
                    $pp = $baris["photo_profile"];
                    $_SESSION["pp"] = "../akhirrrrrrrrrrrr/profile/file-pp/$pp";
                    $profile = "../profile/file-pp/$pp";
                    $idus = $baris["id_user"];

                    if ($pp != null) {
                      echo "<img class='pp' src='$profile' alt=''>";
                    }else {
                      echo "<img src='user.png' alt=''>";
                    }
                    
                    ?></a>
                </div>
            </div>  
        </div>
    </nav>

    <div class="placeholder"></div>


<!-- navigasi -->
        
    <div class="container">
        <div class="main-content">
            <div class="card-grid">
            <?php
                while ($row = mysqli_fetch_assoc($hasil)) {
                

                // data
                $judul = $row['judul'];
                $penerima = $row['penerima'];
                $deskripsi = $row['deskripsi'];
                $gambar = $row['gambar'];
                $jumlah = $row['berapa_kali'];
                $_SESSION['id_donasi'] = $row['id_donasi'];
                ?>
                <!-- // format html -->
                
                
                

                <div class="card">
                    <div class="card-image">
                        <img src="../open-donation/file/<?php echo $gambar ?>">
                    </div>
                    
                    <div class="card-content">
                        <h2 class="card-title"><?php echo $judul ?></h2>
                    </div>
                    
                    <div class="ling">
                        <h2 class="card-title"><?php echo $jumlah ?>X</h2>
                    </div>
                </div>
               <?php }?>


    </body>
    </html>
   