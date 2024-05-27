<?php
require "../login/koneksi.php";


$query = "SELECT whislist.id_wish, whislist.id_user, whislist.id_donation, donasi.id_donasi, 
donasi.judul, 
donasi.penerima, 
donasi.deskripsi, 
donasi.gambar, 
donasi.id_penggalang_dana, 
donasi.waktu
FROM donasi
INNER JOIN 
whislist ON donasi.id_donasi = whislist.id_donation
WHERE 
whislist.id_user = {$_SESSION["id_user"]}";

$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["wish"])) {
    $id_donation = isset($_POST['idw']) ? $_POST['idw'] : '';

    if ($id_donation == '') {
        echo "<script>alert('ID donasi tidak ditemukan.'); window.history.back();</script>";
        exit;
    }

    $query_delete_wishlist = "DELETE FROM whislist WHERE id_user = {$_SESSION["id_user"]} AND id_donation = $id_donation";
    $result_delete_wishlist = mysqli_query($conn, $query_delete_wishlist);

    if ($result_delete_wishlist) {
        echo "item berhasil dihapus";
        exit;
    } else {
        echo "<script>alert('Gagal menghapus item dari wishlist.'); window.history.back();</script>";
        exit;
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
                        <li><a href="../whistlist/index.php">wishlist</a></li>
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

<div id="donate">
    <div class="container">
        <div class="search">

        </div>
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
                <form action="" method="post">
                    <div class="bwish">
                <button type="submit" name="wish">x</button>
                    </div>
                <input type="hidden" name="idw" value="<?= $id ?>">
                </form>

                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

</body>
</html>
