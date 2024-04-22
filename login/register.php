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
    <!-- <link rel="stylesheet" href="register.css"> -->
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
                                <label for="username">username</label>
                                <span></span>
                                <input type="text" name="username" id="username" required;>
                            </div>
                            <div class="txt">
                                <label for="email">email</label>
                                <span></span>
                                <input type="email" name="email" id="email" required;>
                            </div>
                            <div class="txt">
                                <label for="password">password</label>
                                <span></span>
                                <input type="password" name="password" id="password" required;>
                            </div>
                            <div class="txt">
                                <label for="cpassword">konfirmasi password</label>
                                <span></span>w  
                                <input type="password" name="cpassword" id="cpassword" required;>
                            </div>
                            <div class="txt">
                                <label for="text">telephone</label>
                                <span></span>
                                <input type="text" name="telephone" id="telephone" required;>
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