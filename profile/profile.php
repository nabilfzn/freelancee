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

 <style>
    .img img{
    border-radius: 200px;
    border: 1px solid black;
}
 </style>
</head>
<body>
    

    <!-- navbar -->

    <nav>
        <div class="container">
            <div class="boxnav">
                <div class="logo">
                    <h1>Findceer</h1>
                </div>
                <div class="navbar">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- profil -->
<main>
    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="../login/logout.php"><button>logout</button></a></li>
                <li><a href="edit-profile.php"><button>Edit profile</button></a></li>
                <li><a href="riwayat.php"><button>riwayat donasi</button></a></li>
                <li><a href="../donation.page/index.php"><button>kembali</button></a></li>
            </ul>
        </div>
            <div class="profile">
                <div class="kiri">
                    <div class="img">
                        <img src="file-pp/<?php echo $row["photo_profile"]?>" alt="">
                    </div>
                </div>
                <div class="kanan">
                    <div class="box">
                        <ul>
                            <li>Name :   <?php echo $row["username"]?></li>
                            <li>Address : <?php echo $row["address"]?> </li> 
                            <li>Email : <?php echo $row["email"]?></li>
                            <li>Phone Number : <?php echo $row["telephone"]?></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
</main>
<?php ?>


<!-- whistlist -->
<!-- transaksi yang sudah dibayar -->



</body>
</html>