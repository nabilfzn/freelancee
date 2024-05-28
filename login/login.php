<?php
 require 'koneksi.php';

 if (isset($_POST["login"])) {
  
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    // pengambilan data dari database
 $result= mysqli_query ($conn, "SELECT * FROM user WHERE email = '$email'");

//  pengecekan email
if (mysqli_num_rows($result) === 1) {
  // cek passwordo
        $row = mysqli_fetch_assoc($result);


                if (password_verify($password, $row['password'])) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['level'] = $row['level'];

// ------------------------------------------------------------------
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['telephone'] = $row['telephone'];
// ------------------------------------------------------------------
                    
                    if ($row['level'] == 'admin') {
                        header("location: ../admin/dashboard.php");
                        
                    } else {
                        header("location: ../index.php");
                     }

                } else {
                    echo "<script>
    
                    alert('email atau password salah')
                    document.location.href = 'login.php';
                    
                    </script>";

                    exit;
                }
    
         

 }

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
 <div class="box">
    <div class="kiri">
        <div class="box-signup">
            <div class="formk">
                <h1>Login</h1>
                <form action="" method="POST">
                    <div class="txt">
                        <input placeholder="email" type="email" name="email" id="email" required;>
                    </div>
                    <div class="txt">
                        <input placeholder="password" type="password" name="password" id="password" required;>
                    </div>
                    <div class="submit">
                        <button type="submit" name="login">
                            Login</button>
                    </div>
                </form>
            </div>
            <p class="s">Create Account <a href="register.php">SignUp</a></p>
        </div>
    </div>
</div>

</div>

<!-- <div class="transparan">
    .
</div> -->

</body>
</html>