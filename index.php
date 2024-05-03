<?php

session_start();    
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
/* halaman 2 */

.banner {
width: 100%;
height: 110vh;
background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url('disabilitas.jpeg'); 
background-size: cover;
background-position: center;
display: flex;
}

.content {

/* top: 50%; */
display: flex;
flex-direction: column;
width: 70%;
text-align: center;
color: white;
align-items: center;
justify-content: center;
margin: auto;
}

.content h1 {
font-size: 50px;
}

.content p {
width: 500px;
}



/* halaman 2 */

/* footer */
footer {
    background-color:#000   ;
}

.footer{
background:#000;
padding:30px 0px;
font-family: 'Play', sans-serif;
text-align:center;
}

.footer .row{
width:100%;
margin:1% 0%;
padding:0.6% 0%;
color:gray;
font-size:0.8em;
}

.footer .row a{
text-decoration:none;
color:gray;
transition:0.5s;
}

.footer .row a:hover{
color:#fff;
}

.footer .row ul{
width:100%;
}

.footer .row ul li{
display:inline-block;
margin:0px 30px;
}

.footer .row a i{
font-size:2em;
margin:0% 1%;
}

@media (max-width:720px){
.footer{
text-align:left;
padding:5%;
}
.footer .row ul li{
display:block;
margin:10px 0px;
text-align:left;
}
.footer .row a i{
margin:0% 3%;
}
}
/* footer */
    
    </style>
</head>
<body>
    
<!-- navigasi -->

<nav>
    <div class="container">
        <div class="boxnav">
            <div class="logo">
                <h1>Findcare</h1>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="aboutme.php">Aboutme</a></li>
                    <li><a href="../akhirrrrrrrrrrrr/donation.page/index.html">Donate</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="loginb">
                <a href="../akhirrrrrrrrrrrr/login/login.php"><button>Login</button></a>
            </div>
        </div>
    </div>
</nav>

<header>

<section id="1">
<div class="container">
    <div class="box-head">
        <div class="box-kiri">
            <h1>Hasilkan Uang dan Bagikan Kepedulianmu</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem maiores voluptates repellat illum, nulla magni inventore excepturi corrupti aliquam fuga.</p>
            <div class="btn-kanan">
                <a href="../akhirrrrrrrrrrrr/isi/index.html"><button>Selengkapnya</button></a>
            </div>
        </div>

        <div class="box-kanan">
            <img src="wepik-export-20240222142800eN1i.png" alt="">
        </div>
    </div>
</div>
</section>

<section id="2">

    <div class="container">

    </div>

</section>

</header>


<!-- halaman 2 -->

        <div class="banner" >
            <div class="content">
                <h1>Donasikan sebagian, untuk mereka yang membutuhkan</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem maiores voluptates repellat illum, nulla magni inventore excepturi corrupti aliquam fuga.</p>
                <div class="btn-kanan">
                    <a href="../akhirrrrrrrrrrrr/donation.page/index.php"><button>Selengkapnya</button></a>
                </div>
            </div>  
        </div>

<!-- halaman 2 -->


 <!-- halaman 3 -->
 <section id="Services">
    <div class="containers">
        <h1 class="heading">Cari Kategori Pilihanmu!</h1>

        <div class="center">

            <div class="boxc">

                <div class="box">
                    <img src="web.png">
                    <h3>Website development</h3>
                    <p>1000 skils</p>
                </div>
                <div class="box">
                    <img src="web.png">
                    <h3>Website development</h3>
                    <p>1000 skils</p>
                </div>
                <div class="box">
                    <img src="web.png">
                    <h3>Website development</h3>
                    <p>1000 skils</p>
                </div>
                <div class="box">
                    <img src="web.png">
                    <h3>Website development</h3>
                    <p>1000 skils</p>
                </div>
                <div class="box">
                    <img src="web.png">
                    <h3>Website development</h3>
                    <p>1000 skils</p>
                </div>
                <div class="box">
                    <img src="web.png">
                    <h3>Website development</h3>
                    <p>1000 skils</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- halaman 3 -->

<footer>

    <div class="footer">
        <div class="row">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-whatsapp"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
        `
        <div class="row">
            <ul>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Career</a></li>
            </ul>
        </div>
        
        <div class="row">
            FINDCARE Copyright © 2024 FINDCARE
        </div>

    </div>
</footer>
</body>
</html>