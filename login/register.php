<?php
require "koneksi.php";

if( isset($_POST["signup"])) {

    if (signup($_POST) > 0 ) {
    header("Location: login.php");
    
    } else {
      echo mysqli_error($conn);
    } 

  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="container">
        <div class="boxbox">
            <div class="kiri">
                <div class="box-signup">
                    <div class="formk">
                        <h1>Signup</h1>
                        <form action="" method="post">
                            <div class="txt">
                                <input placeholder ="username" type="text" name="username" id="username" required;>
                            </div>
                            <div class="txt">
                                <input placeholder ="email" type="email" name="email" id="email" required;>
                            </div>
                            <div class="txt">
                                <input placeholder ="password" type="password" name="password" id="password" required;>
                            </div>
                            <div class="txt">
                                <input placeholder ="konfirmasi password" type="password" name="cpassword" id="cpassword" required;>
                            </div>
                            <div class="txt">
                                <input placeholder ="telephone" type="text" name="telephone" id="telephone" required;>
                            </div>
                            <div class="submit">
                                <button type="submit" name="signup">
                                    sign up</button>
                            </div>
                        </form>
                    </div>
                    <p class="yy">have an account? <a href="login.php">login</a></p>
                </div>
            </div>
            <div class="kanan">
                <div class="gambar">
                    <img src="../aset/register.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>