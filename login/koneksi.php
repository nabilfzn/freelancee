<?php

$server ="localhost";
$username = "root";
$password = "";
$database_name = "freelancee";

$conn = mysqli_connect ($server, $username, $password, $database_name);


function signup($data) {
    global $conn;

    $username = $data ["username"];
    $email = $data["email"];
    $password = $data["password"];
    $cpassword = $data["cpassword"];
    $telephone = $data["telephone"];


    // cek email

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result) ) {
        echo "<script> 
                alert('email sudah terdaftar!!'); 
              </script>"; 
        return false;      
    }

    // pengecekan password

    if ($password !== $cpassword) {
        echo '<script> 
        alert("password tidak sesuai"); 
        </script>';

     return false;
    }
//  return 1;


       mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password', '$telephone')");

       return mysqli_affected_rows($conn);

}



?>