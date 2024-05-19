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
                        <li><a href="dashboard.php"><button>Data user</button></a></li>
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
            <a href="crud_donatur/create.php"><button>Add data</button></a>
        </div>
        
        <table>
            <th>No</th>
            <th>id</th>
            <th>donatur</th>
            <th>donasi yang disumbang</th>
            <th>telephone</th>
            <th>donatur</th>
            <th>alamat</th>
            <th>atm</th>
            <th>nominal</th>
            <th>waktu</th>
            <th>aksi</th>
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
                <button><a href="../admin/crud_donatur/edit.php?id='.$idp.'">Edit</a></button>
                <button><a href="../admin/crud_donatur/delete.php?id='.$idp.'">Delete</a></button>
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