<?php


$server ="localhost";
$username = "root";
$password = "";
$database_name = "freelancee";

$conn = mysqli_connect ($server, $username, $password, $database_name);
session_start();










function signup($data) {
    global $conn;
    
    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $cpassword = $data["cpassword"];
    $telephone = $data["telephone"] ;
    $level = "user";
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


       mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password', '$telephone', '$level', '', '')");

       return mysqli_affected_rows($conn);

}





function create($data){
    
    global $conn;

    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $telephone = htmlspecialchars($data["telephone"]);
    $level = "user";

    $query = "INSERT INTO user VALUES
            ('', '$username', '$email', '$password', '$telephone', '$level', '', '')";

    $result =  mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function delete($id){

    global $conn;

    mysqli_query($conn, "DELETE from user where id_user = $id");
    return mysqli_affected_rows($conn);
}

function deletep($id){

    global $conn;

    mysqli_query($conn, "DELETE from donasi where id_donasi = $id");
    return mysqli_affected_rows($conn);
}



















?>