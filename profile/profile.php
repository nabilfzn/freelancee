<?php

require_once "../login/koneksi.php";
// session_start();    
if (!isset($_SESSION["email"])) {
    header("location:../login/login.php");
    exit;

}

$query = mysqli_query($conn, "SELECT * FROM user where id_user = '".$_SESSION["id_user"]."'");
if ($query) {

$row = mysqli_fetch_assoc($query) ;

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>

    <div id="kiri">
        <nav>
            <div class="navbox">
                <div class="nav-item">
                    <ul>
                        <li><a href="https://lookerstudio.google.com/reporting/620c7319-713b-401c-893e-ff3f00967174" target="_blank"><button>data analisis</button></a></li>
                        <li><a href="edit-profile.php"><button>edit profile</button></a></li>
                        <li><a href="riwayat.php"><button>riwayat donasi</button></a></li>
                        <li><a href="galangdana.php"><button>galang dana</button></a></li>
                        <li><a href="../donation.page/index.php"><button>kembali</button></a></li>
                        <li><a href="../login/logout.php"><button>logout</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="kanan">
        <div class="box-atas">.</div>
        <div class="profile">
        <img src="file-pp/<?php echo $row["photo_profile"]?>" alt="">
            <p class="name"><?php echo $row["username"]?></p>
        </div>
        <div class="box">
        <div class="box-info">
            <div class="box-text">
                <ul>
                    <li>Address : <?php echo $row["address"]?> </li> 
                    <li>Email : <?php echo $row["email"]?></li>
                    <li>Phone Number : <?php echo $row["telephone"]?></li>
                </ul>
            </div>
        </div>
        </div>

    </div>



</body>
</html>