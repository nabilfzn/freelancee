<?php

require '../../login/koneksi.php';

if (isset($_POST["submit"])) {

// pengecekan berhasil atau tidak
if (create($_POST) > 0) {
    echo "<script>
    
    alert('data berhasil ditambahkan')
    document.location.href = '../dashboard.php';
    
    </script>";
    exit();
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
    <link rel="stylesheet" href="galang-dana.css">
</head>
<body>
    
    <div id="page">
        <div class="box">
            <div class="atas">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="username" id="username" placeholder="masukkan username" required>
                    <br>
                    <input type="email" name="email" id="email" placeholder="email" required >
                    <br>
                    <input type="password" name="password" id="password" placeholder="password" required>
                    <br>
                    <input type="text" name="address" id="address" placeholder="masukkan alamat" required>
                    <br>
                    <input type="file" name="gambar" id="gambar" required></li>
                    <br>
                    <input type="text" name="telephone" id="telephone" placeholder="masukkan telephone" required></li>
                </div>   
                <div class="bawah">
                    <div class="btn">
                        <a href=""><button>back</button></a>
                        <div class="s">
                            <button type="submit" name="submit">galang dana</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

</body>
</html>