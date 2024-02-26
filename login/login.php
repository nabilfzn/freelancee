<?php
 require 'koneksi.php';

 if (isset($_POST["login"])) {
  
    $email = $_POST["email"];
    $password = $_POST["password"];

    // pengambilan data dari database
 $result= mysqli_query ($conn, "SELECT * FROM user WHERE email = '$email'");

//  pengecekan email
if (mysqli_num_rows($result) === 1) {
  
  // cek password
  $row = mysqli_fetch_assoc($result);


  if ($password == $row["password"]) {
    header("Location:../index.php");

  } else {
        echo '<script> 
       alert("password atau email salah")
       </script>';

       exit;
  }
    
  }


}
?>

<!-- // if ( password_verify($password, $row["password"])) {
  //   header("Location: index.php");
  //   exit;
  // } -->

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
                        <input type="email" name="email" id="email" required;>
                        <span></span>
                        <label for="email">email</label>
                    </div>
                    <div class="txt">
                        <input type="password" name="password" id="password" required;>
                        <span></span>
                        <label for="password">password</label>
                    </div>
                    <div class="submit">
                        <button type="submit" name="login">
                            Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<!-- <div class="transparan">
    .
</div> -->

</body>
</html>