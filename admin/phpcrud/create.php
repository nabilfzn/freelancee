<?php

require '../../login/koneksi.php';

if (isset($_POST["submit"])) {

// pengecekan berhasil atau tidak
if (create($_POST) > 0) {
    echo "<script>
    
    alert('data berhasil ditambahkan')
    document.location.href = '../dashboard.php';
    
    </script>";

}  else {echo "<script>
alert('data gagal ditambahkan')
</script>";
}

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah User Baru</h1>

    <form action="" method="post">
    <ul>
        <li><label for="username">username :</label>
        <input type="text" name="username" id="username" required></li>

        <li><label for="email">email :</label>
        <input type="email" name="email" id="email" required ></li>

        <li><label for="password">password :</label>
        <input type="password" name="password" id="password" required></li>

        <li><label for="telephone">telephone :</label>
        <input type="text" name="telephone" id="telephone" required></li>

        <li><button type="submit" name="submit">Add User</button></li>
    </ul>
    </form>

</body>
</html>