<?php


$server ="localhost";
$username = "root";
$password = "";
$database_name = "freelancee";

$conn = mysqli_connect ($server, $username, $password, $database_name);
session_start();





function signup($data) {
    global $conn;

    $username = mysqli_real_escape_string($conn, $data["username"]);
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $cpassword = mysqli_real_escape_string($conn, $data["cpassword"]);
    $telephone = mysqli_real_escape_string($conn, $data["telephone"]);
    $level = "user";

    // Cek email sudah terdaftar atau belum
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script> 
                alert('Email sudah terdaftar!!'); 
              </script>";
        return false;
    }

    // Pengecekan password
    if ($password !== $cpassword) {
        echo '<script> 
                alert("Password tidak sesuai"); 
              </script>';
        return false;
    }

    // Hashing password sebelum disimpan
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

       mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password', '$telephone', '$level', '', '')");

    if (mysqli_query($conn, $query)) {
        return mysqli_affected_rows($conn);
    } else {
        echo "<script> 
                alert('Terjadi kesalahan pada sistem. Silakan coba lagi nanti.'); 
              </script>";
        return false;
    }
}







function create($data){
    
    global $conn;

    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $telephone = htmlspecialchars($data["telephone"]);
    $alamat = htmlspecialchars($data["address"]);
    $waktu = date('Y-m-d H:i:s');
    $level = "user";

    $file = $_FILES['gambar'];
    $fileName = $_FILES['gambar']['name'];
    $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Mengambil ekstensi file dengan fungsi pathinfo()
    $ekstentionAllowed = array('png', 'jpg', 'jpeg');
    $fileSize = $_FILES['gambar']['size'];
    $fileTmp = $_FILES['gambar']['tmp_name'];

    if ($fileSize < 6000000) {
        move_uploaded_file($fileTmp, '../../profile/file-pp/'. $fileName);
    } else {
        echo "Gambar terlalu besar";
    }

    $query = "INSERT INTO user VALUES
            ('', '$username', '$email', '$password', '$telephone', '$level', '$alamat', '$fileName')";

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

function deleted($id){

    global $conn;

    mysqli_query($conn, "DELETE from payment where id_payment = $id");
    return mysqli_affected_rows($conn);
}





?>

