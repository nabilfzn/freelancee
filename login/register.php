<?php
require "koneksi.php";

if( isset($_POST["signup"])) {

    if (signup($_POST) > 0 ) {
    //    echo '<script> 
    //    alert("register berhasil")
    //    </script>';
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
                                <input type="text" name="username" id="username" required;>
                                <span></span>
                                <label for="username">username</label>
                            </div>
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
                            <div class="txt">
                                <input type="password" name="cpassword" id="cpassword" required;>
                                <span></span>
                                <label for="cpassword">konfirmasi password</label>
                            </div>
                            <div class="txt">
                                <input type="text" name="telephone" id="telephone" required;>
                                <span></span>
                                <label for="text">telephone</label>
                            </div>
                            <div class="submit">
                                <button type="submit" name="signup">
                                    sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="kanan">
                <div class="gambar">
                    <img src="papers-laptop-office-table.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>