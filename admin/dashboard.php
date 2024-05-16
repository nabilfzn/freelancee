

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



<h3>Data pengguna</h3>

<table>
    <th>No</th>
    <th>id</th>
    <th>photo</th>
    <th>username</th>
    <th>email</th>
    <th>password</th>
    <th>telephone</th>
    <th>address</th>
    <th>level</th>
    <th>aksi</th>

    <button class="button"><a href="../login/logout.php">logout</a></button>
    <button class="button"><a href="../admin/phpcrud/create.php">Add User</a></button>

    <br>

<?php



    require "../login/koneksi.php";
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

<ul>
    <li><button><a href="data_penggalang.php">data penggalang dana</a></button></li>
    <li><button><a href="data_donatur.php">data donatur</button></a></li>
</ul>