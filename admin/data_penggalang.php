

<style>
    table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
 
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: rgb(19, 110, 170);
            color: white;

        }

        .btn {
            margin-top: 30px;
        }

        img {
        max-width: 100%; /* Maksimum lebar gambar adalah 100% dari lebar parent */
        max-height: 100%; /* Maksimum tinggi gambar adalah 100% dari tinggi parent */
        height: auto; /* Biarkan tinggi gambar menyesuaikan proporsi dengan lebar */
}

    .pp {
        width: 100px;
    }

    .button {
        margin-left: 20px;
    }

</style>



<h3>Data penggalang</h3>

<table>
    <th>No</th>
    <th>id donasi</th>
    <th>judul</th>
    <th>penerima</th>
    <th>deskripsi</th>
    <th>penggalang dana</th>
    <th>tanggal pembuatan</th>
    <th>aksi</th>

    <button class="button"><a href="../login/logout.php">logout</a></button>
    <button class="button"><a href="../admin/crud_penggalang/create.php">Add data</a></button>

    <br>

<?php



    require "../login/koneksi.php";
    $no=1;
    $query = "SELECT d.id_donasi, d.judul, d.penerima, d.deskripsi, DATE_FORMAT(d.waktu,  '%W, %d-%m-%Y') AS waktu, 
                u.username AS penggalang_dana
            FROM donasi AS d
            JOIN user AS u ON d.id_penggalang_dana = u.id_user";    

    

    $ambil = mysqli_query($conn, $query) ;
    if ($ambil) {
        while ($tampilan = mysqli_fetch_assoc($ambil)){
        
            $id = $tampilan['id_donasi'];
            // $photo = "<img src='../profile/file-pp/".$tampilan["photo_profile"]."' alt=''>";
            $judul = $tampilan['judul'];
            $penerima = $tampilan['penerima'];
            $deskripsi = $tampilan['deskripsi'];
            $penggalang_dana = $tampilan['penggalang_dana'];
            $waktu = $tampilan['waktu'];
            
            echo '<tr>
                <td>'.$no.'</td>
                <td>'.$id.'</td>
                <td>'.$judul.'</td>
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

<ul>
    <li><button><a href="dashboard.php">data user</a></button></li>
    <li><button><a href="data_donatur.php">data donatur</button></a></li>
</ul>