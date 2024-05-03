<?php

session_start();    
if (!isset($_SESSION["email"])) {
    header("location:../login/login.php");
    exit;
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
                    <a href=""><img src="../donation.page/user.png" alt=""></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- profil -->
<main>
    <div class="container">
        <div class="kiri">
            <div class="img">
                <img src="../donation.page/user.png" alt="">
            </div>
        </div>
        <div class="kanan">
            <div class="box">
                <ul>
                    <li>Name :   <?php echo    $_SESSION["username"]?></li>
                    <li>Address : </li>
                    <li>Email : <?php echo    $_SESSION["email"]?></li>
                    <li>Phone Number : <?php echo    $_SESSION["telephone"]?></li>
                </ul>
            </div>
        </div>
    </div>
</main>

<a href="../login/logout.php">logout</a>

<!-- whistlist -->
<!-- transaksi yang sudah dibayar -->

</body>
</html>