<?php

include_once "login/koneksi.php";
if (!isset($_SESSION["email"])) {
    header("location:../akhirrrrrrrrrrrr/login/login.php");
    exit;
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindCare</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .pp {
  border-radius: 20px;
  /* border: 1px solid black; */
  width: 35px;
  height: 35px;
}
    </style>
</head>
<body>
    <!-- navigasi -->
<nav>
    <div class="container">
        <div class="box-nav">
            <div class="logo">
                <a href=""><img src="aset/logo.png" alt=""></a>
            </div>
            <div class="nav-item">
                <ul>
                    <li><a href="#">home</a></li>
                    <li><a href="#">donate</a></li>
                    <li><a href="#">about</a></li>
                    <li><a href="#goal">goals</a></li>
                </ul>
                <div class="button">
                <a class="pp" href="profile/profile.php"><?php

                        $qry = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '{$_SESSION['id_user']}'");
                        $baris = mysqli_fetch_assoc($qry);
                        $pp = $baris["photo_profile"];
                        $profile = "profile/file-pp/$pp";

                        if (isset($_SESSION["email"])) {
                            echo "<img class='pp' src='$profile' alt=''>";
                        } else {
                            echo "<a href='../akhirrrrrrrrrrrr/login/login.php'><button>login</button></a>";
                        }
                ?></a>
                </div>
            </div>
        </div>  
    </div>
</nav>
<!-- navigasi -->

<!-- main -->
<div class="banner" >
    <div class="container">
        <div class="content">
            <h1>From Heart to Heart, <br> Sharing Hope <br> Together</h1>
            <div class="btn">
                <a href="donation.page/index.php"><button>Donate Now</button></a>
            </div>
        </div>  
    </div>
</div>

<!-- main -->

<!-- main 2 -->
<div id="goal">
    <div class="container">
        <div class="kotak">
            <div class="judul">
                <h1>Find Your Care</h1>
                <p>In this world there are lots of people in need, it's good for those of us who have <br> enough to help them fulfill their needs so that we can all create a peaceful <br>atmosphere.</p>
            </div>
            <div class="grid">
                        <div class="grid-item">
                            <div class="atas">
                            <img src="aset/p2.jpg" alt="">  
                            </div>
                            <div class="bawah">
                            <h1>Embrace</h1>
                            <p>We are determined to be a bridge for various groups in need, realizing social inclusion and humanity. From disadvantaged children to adults facing adversity, we are committed to providing support that embraces, empowers and inspires every individual to access equal opportunities and live meaningful lives.</p>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="atas">
                            <img src="aset/p2.jpg" alt="">  
                            </div>
                            <div class="bawah">
                            <h1>Embrace</h1>
                            <p>We are determined to be a bridge for various groups in need, realizing social inclusion and humanity. From disadvantaged children to adults facing adversity, we are committed to providing support that embraces, empowers and inspires every individual to access equal opportunities and live meaningful lives.</p>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="atas">
                            <img src="aset/p2.jpg" alt="">  
                            </div>
                            <div class="bawah">
                            <h1>Embrace</h1>
                            <p>We are determined to be a bridge for various groups in need, realizing social inclusion and humanity. From disadvantaged children to adults facing adversity, we are committed to providing support that embraces, empowers and inspires every individual to access equal opportunities and live meaningful lives.</p>
                        </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- main 2 -->

<!-- main 3 -->

<div id="rating">
    <div class="container">
        <div class="bonus">
            <div class="kiri">
                <img src="aset/handshake.png" alt="">
            </div>
            <div class="kanan">
                <p>"Embrace love, <br> cherish family, unite <br>humanity."</p>
            </div>
        </div>
    </div>
</div>

<!-- main 3 -->

<!-- main 4 -->

<div id="analisis">
    <div class="container">

    </div>
</div>

<!-- main 4 -->

<!-- main 5 -->
<div class="bannerl" >
    <div class="contentl">
        <h1>Help Others</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
             Voluptatem maiores voluptates repellat illum, nulla magni <br>
             inventore excepturi corrupti aliquam fuga.</p>
        <div class="btn-kanan">
        </div>
    </div>  
</div>
<!-- main 5 -->
</body>
</html>