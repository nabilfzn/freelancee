

<style>
    table {
            border-collapse: collapse;
            width: 100%;
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
</style>



<h3>Data pengguna</h3>

<table>
    <th>No</th>
    <th>id</th>
    <th>username</th>
    <th>email</th>
    <th>password</th>
    <th>telephone</th>
    <th>level</th>
    <th>aksi</th>

<?php

    require "../login/koneksi.php";
    $no=1;
    $ambil = mysqli_query($conn, "SELECT * from user") ;
    if ($ambil) {
        while ($tampilan = mysqli_fetch_assoc($ambil)){
        
            $id = $tampilan['id_user'];
            $username = $tampilan['username'];
            $email = $tampilan['email'];
            $password = $tampilan['password'];
            $telephone = $tampilan['telephone'];
            $level = $tampilan['level'];
            
            echo '<tr>
                <td>'.$no.'</td>
                <td>'.$id.'</td>
                <td>'.$username.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
                <td>'.$telephone.'</td>   
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

<button class="btn"><a href="../admin/phpcrud/create.php">Add User</a></button>

<button><a href="../login/logout.php">logout</a></button>