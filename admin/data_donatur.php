

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



<h3>Data donatur</h3>

<table>
    <th>No</th>
    <th>id pembayaran</th>
    <th>Donatur</th>
    <th>Donasi Yang disumbang</th>
    <th>telephone</th>
    <th>donatur</th>
    <th>alamat</th>
    <th>atm</th>
    <th>nominal</th>
    <th>waktu pembayaran</th>
    <th>aksi</th>

    <button class="button"><a href="../login/logout.php">logout</a></button>
    <button class="button"><a href="../admin/crud_penggalang/create.php">Add User</a></button>

    <br>

<?php



    require "../login/koneksi.php";
    $no=1;
    $query = "SELECT 
    p.id_payment, 
    p.id_donasi AS id_donasi_payment, 
    p.id_user AS id_user_payment, 
    p.no_telp, 
    p.nama_donatur, 
    p.alamat, 
    p.atm, 
    p.nominal, 
    DATE_FORMAT(p.waktu_pembayaran, '%W, %d-%m-%Y') AS waktu, 
    d.id_donasi, 
    d.judul as judul, 
    u.id_user, 
    u.username as nama
FROM 
    user u
JOIN 
    payment p ON p.id_user = u.id_user
JOIN 
    donasi d ON d.id_donasi = p.id_donasi";
    $ambil = mysqli_query($conn, $query) ;
    if ($ambil) {
        while ($tampilan = mysqli_fetch_assoc($ambil)){
        
            $idp = $tampilan['id_payment'];
            $idd = $tampilan['id_donasi'];
            $idu = $tampilan['id_user'];
            $judul = $tampilan['judul'];
            $nama = $tampilan['nama'];
            $telephone = $tampilan['no_telp'];
            $donatur = $tampilan['nama_donatur'];
            $alamat = $tampilan['alamat'];
            $atm = $tampilan['atm'];
            $nominal = 'Rp ' . number_format($tampilan['nominal'], 0, ',', '.');
            $waktu = $tampilan['waktu'];
            
            echo '<tr>
                <td>'.$no.'</td>
                <td>'.$idp.'</td>
                <td>'.$nama.'</td>
                <td>'.$judul.'</td>
                <td>'.$telephone.'</td>   
                <td>'.$donatur.'</td>
                <td>'.$alamat.'</td>
                <td>'.$atm.'</td>
                <td>'.$nominal.'</td>   
                <td>'.$waktu.'</td>   
                <td>
                    <button><a href="../admin/phpcrud/edit.php?id='.$idp.'">Edit</a></button>
                    <button><a href="../admin/phpcrud/delete.php?id='.$idp.'">Delete</a></button>
                </td>
            </tr>';
            $no++;
        }
    }

?> 
        
</table>

<ul>
    <li><button><a href="dashboard.php">data user</a></button></li>
    <li><button><a href="data_penggalang.php">data penggalang dana</button></a></li>
</ul>