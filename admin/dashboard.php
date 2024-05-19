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
                        <li><a href="data_donatur.php"><button>Data Donatur</button></a></li>
                        <li><a href="data_penggalang.php"><button>Data Penggalangan</button></a></li>
                        <li><a href="../login/logout.php"><button>logout</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    
    <div class="tambahan"></div>
    <div id="kanan">

        <div class="atas">
            <a href="phpcrud/create.php"><button>Add data</button></a>
        </div>
        
        <table>
            <th>No</th>
            <th>id</th>
            <th>gambar</th>
            <th>username</th>
            <th>email</th>
            <th>password</th>
            <th>telephone</th>
            <th>address</th>
            <th>level</th>
            <th>aksi</th>

            <br>

<?php

include_once "../login/koneksi.php";
if (!isset($_SESSION["email"]) || $_SESSION["level"] !== "admin") {
    header("Location: ../login/login.php");
    exit;
}

    $no=1;
    $ambil = mysqli_query($conn, "SELECT * from user");
    if ($ambil) {
        while ($tampilan = mysqli_fetch_assoc($ambil)){
        
            $id = $tampilan['id_user'];
            $photo = "<img src='../profile/file-pp/".$tampilan["photo_profile"]."' alt=''>";
            $username = $tampilan['username'];
            $email = $tampilan['email'];
            $password = $tampilan['password'];
            $telephone = $tampilan['telephone'];
            $level = $tampilan['level'];
            $address = $tampilan['address'];
            
            echo '<tr>
                <td>'.$no.'</td>
                <td>'.$id.'</td>
                <td class="pp">'.$photo.'</td>
                <td>'.$username.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
                <td>'.$telephone.'</td>   
                <td>'.$address.'</td>   
                <td>'.$level.'</td>   
                <td>
                    <button><a href="../admin/phpcrud/edit.php?id='.$id.'">Edit</a></button>
                    <button><a href="../admin/phpcrud/delete.php?id='.$id.'">Delete</a></button>
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