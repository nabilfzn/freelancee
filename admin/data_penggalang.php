<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin-template.css">
</head>
<body>
    <div id="kiri">
        <nav>
            <div class="navbox">
                <div class="nav-item">
                    <ul>
                        <li><a href=""><button>Data BPS</button></a></li>
                        <li><a href="data_donatur.php"><button>Data Pembayaran</button></a></li>
                        <li><a href="dashboard.php"><button>Data user</button></a></li>
                        <li><a href="../login/logout.php"><button>logout</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    
    <div class="tambahan"></div>
    <div id="kanan">

        <div class="atas">
            <a href="crud_penggalang/create.php"><button>Add data</button></a>
        </div>
        
        <table>
            <th>No</th>
            <th>id</th>
            <th>judul</th>
            <th>gambar</th>
            <th>penerima</th>
            <th>deskripsi</th>
            <th>penggalang dana</th>
            <th>waktu</th>
            <th>aksi</th>

            <br>

<?php



    require "../login/koneksi.php";
    include_once "../login/koneksi.php";
if (!isset($_SESSION["email"]) || $_SESSION["level"] !== "admin") {
    header("Location: ../login/login.php");
    exit;
}

    $no=1;
    $query = "SELECT d.id_donasi, d.judul, d.gambar, d.penerima, d.deskripsi, DATE_FORMAT(d.waktu,  '%W, %d-%m-%Y') AS waktu, 
                u.username AS penggalang_dana
            FROM donasi AS d
            JOIN user AS u ON d.id_penggalang_dana = u.id_user";    

    

    $ambil = mysqli_query($conn, $query) ;
    if ($ambil) {
        while ($tampilan = mysqli_fetch_assoc($ambil)){
        
            $id = $tampilan['id_donasi'];
            $judul = $tampilan['judul'];
            $gambar = "<img src='../open-donation/file/".$tampilan["gambar"]."' alt=''>";
            $penerima = $tampilan['penerima'];
            $deskripsi = $tampilan['deskripsi'];
            $penggalang_dana = $tampilan['penggalang_dana'];
            $waktu = $tampilan['waktu'];
            
            echo '<tr>
                <td>'.$no.'</td>
                <td>'.$id.'</td>
                <td>'.$judul.'</td>
                <td class="pp">'.$gambar.'</td>
                <td>'.$penerima.'</td>
                <td>'.$deskripsi.'</td>
                <td>'.$penggalang_dana.'</td>   
                <td>'.$waktu.'</td>   

                <td>
                    <button><a href="../admin/crud_penggalang/edit.php?id='.$id.'">Edit</a></button>
                    <button><a href="crud_penggalang/delete.php?id='.$id.'">Delete</a></button>
                </td>
            </tr>';
            $no++;
        }
    }

?> 

        </table>

    </div>



</body>
</html>