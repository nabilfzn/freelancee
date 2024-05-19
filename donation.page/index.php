<?php
require "../login/koneksi.php";

$query = "SELECT * FROM donasi";
$result = mysqli_query($conn, $query);

?>
<?php

$queri = "SELECT donasi.id_donasi, donasi.total, payment.id_donasi, payment.nominal, payment.id_user
FROM payment
INNER JOIN donasi ON donasi.id_donasi = payment.id_donasi";
$risult = mysqli_query($conn, $query);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    </style>
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
                        <li><a href="index.html">home</a></li>
                        <li><a href="#donate">donate</a></li>
                        <li><a href="#">about</a></li>
                        <li><a href="#goal">news</a></li>
                    </ul>
                    <a class="pp" href="../profile/profile.php"><?php 
                    // session_start();
                    
                    $qry = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '{$_SESSION['id_user']}'");
                    $baris = mysqli_fetch_assoc($qry);
                    
                    $pp = $baris["photo_profile"];
                    // $_SESSION["pp"] = "../akhirrrrrrrrrrrr/profile/file-pp/$pp";
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

<!-- banner -->

<div id="spanduk">
    <div class="container">
        <div class="banner">
            <div class="content">
            <h1>Hai <?php echo $_SESSION["username"]?>, Ayo donasikan untuk mereka <br>
                yang membutuhkan</h1>
                <p>Bersama, kita bisa memberi harapan. Donasimu berarti bagi <br> mereka yang membutuhkan. Mari berbagi kebaikan dan <br>menemukan kebahagiaan dalam setiap donasi.</p>
            </div>
            <div class="btn">
                <a href="#rating"><img src="../aset/left-arrows.png" alt=""></a>
            </div>
        </div>
    </div>
</div>

<!-- banner -->


<!-- news -->

<div id="goal">
    <div class="container">
        <div class="kotak">
            <div class="judul">
                <h1>Lastest News</h1>
            </div>
            <div class="grid">
                <div class="grid-item">
                    <div class="atas">
                    <img src="../aset/p2.jpg" alt="">                             </div>
                    <div class="bawah">
                    <h1>Peduli Sesama</h1>
                    <p>We are determined to be a bridge for various <br> groups in need, realizing social inclusion and <br> humanity. From disadvantaged children to <br> adults facing adversity, </p>                        </div>
                </div>
                <div class="grid-item">
                    <div class="atas">
                    <img src="../aset/p2.jpg" alt="">                             </div>
                    <div class="bawah">
                    <h1>Peduli Sesama</h1>
                    <p>We are determined to be a bridge for various <br> groups in need, realizing social inclusion and <br> humanity. From disadvantaged children to <br> adults facing adversity, </p>                        </div>
                </div>
                <div class="grid-item">
                    <div class="atas">
                    <img src="../aset/p2.jpg" alt="">                             </div>
                    <div class="bawah">
                    <h1>Peduli Sesama</h1>
                    <p>We are determined to be a bridge for various <br> groups in need, realizing social inclusion and <br> humanity. From disadvantaged children to <br> adults facing adversity, </p>                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- news -->


<!-- open-donation -->

<div id="rating">
    <div class="container">
        <div class="bonus">
            <div class="kiri">
                <img src="../aset/helping-hand.png" alt="">
            </div>
            <div class="kanan">
                <p>You can also raise donations to help them! Many of them need our help, use your right wisely</p>

                <div class="bttn">
                    <a href="../open-donation/index.php"><button>make a donation</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- open-donation -->

<!-- donate -->

<div id="donate">
    <div class="container">
        <div class="grid-donate">

        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                

                // data
                $id = $row['id_donasi'];
                $judul = $row['judul'];
                $penerima = $row['penerima'];
                $deskripsi = $row['deskripsi'];
                $gambar = $row['gambar'];
                $_SESSION['id_donasi'] = $row['id_donasi'];
            
            ?>

            <div class="item-donate">
                    <div class="up">
                    <img src="../open-donation/file/<?php echo $gambar ?>">
                </div>
                <div class="down">
                    <h1><?php echo $judul ?></h1>
                </div>
                <div class="btnd">
                <a href="../donation.page/donate-page/index.php?id=<?php echo $id ?>">
                    <button>donate</button>                    
                </a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<!-- donate -->


</body>
</html>