<?php
session_start();    
if (!isset($_SESSION["email"])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aboutme</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

    
    <section id="ame">
        <div class="container">
            <div class="content">      
                <div class="kiri">
                    <div class="konten-left">
                        <p class="sa">THIS IS ME</p>
                        <p class="du">Ahmad Nabil </p>
                        <p class="ti">You can do it if you want to do it. keep going and never give up, believe in yourslef, you can do it </p>
                    </div>
                    <!-- -0- -->
                    <button class="btn">
                        <a href="#Services">Selengkapnya</a>
                    </button>                
                </div>
                <div class="kanan">
                    <div class="img">
                        <img src="fotoweb.png">
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- halaman 2 -->

<section id="Services">
    <div class="containers">
        <h1 class="heading">Tentang Nabil</h1>

        <div class="center">

            <div class="boxc">
                <div class="box">
                    <img src="school.png">
                    <h3>Sekolah</h3>
                    <p>Nabil adalah Siswa aktif dari salah satu sekolah yang berada di sidoarjo yaitu SMK Telkom Sidoarjo</p>
                </div>
                <div class="box">
                    <img src="creative-thinking.png">
                    <h3>Keahlian</h3>
                    <p>Saya Menguasai beberapa Software yaitu Ms Word, VS Code, Ms power point, canva. saya juga sedang belajar tentang programming</p>
                </div>
                <div class="box">
                    <img src="hobbies.png">
                    <h3>Hobi</h3>
                    <p>Hobi saya yang utama adalah bersepeda. selain bersepeda saya juga suka menulis, fotografi, dan membaca buku</p>
                </div>
                <div class="box">
                    <img src="user-experience.png">
                    <h3>Pengalaman</h3>
                    <p>Saya Pernah menjabat sebagai Wakil Ketua Osis pada masa SMP dan juga saya sebagai Jurnalis di SMP saya dahulu</p>
                </div>
                <div class="box">
                    <img src="interest.png">
                    <h3>Minat</h3>
                    <p>Saya memiliki ketertarikan pada bidang teknologi, selain teknologi saya tertarik pada ilmu Psikologi dan juga filsafat  </p>
                </div>
                <div class="box">
                    <img src="cv.png">
                    <h3>Curriculum Vitae</h3>
                    <p>Berikut adalah CV saya</p>
                    <div class="cv"><a href="cv nabil asli.pdf" target="_blank">Klik</a></div>

            </div>
            <a class="link"  href="../akhirrrrrrrrrrrr/index.php"><h1>Kembali</h1></a>
        </div>
    </div>
</section>

</body>
</html>
