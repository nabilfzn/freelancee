


session_start();    
if (!isset($_SESSION["email"])) {
    header("location:login.php");
    exit;
}





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>halaman admin</h1>
    <h2>selamat datang <?php echo $_SESSION['email']; ?> </h2>
    <a href="logout.php">logout</a>
</body>
</html>