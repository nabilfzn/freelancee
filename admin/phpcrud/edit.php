<?php
// include database connection file
require '../../login/koneksi.php';
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['edit']))
{	
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$telephone = $_POST['telephone'];
	$level = $_POST['level'];
		
	// update user data
	$result = mysqli_query($conn, "UPDATE user SET 

    
    username = '$username',
    email = '$email',
    password = '$password',
    telephone = '$telephone',
    level = '$level'

    WHERE id = $id");
	
	// Redirect to homepage to display updated user in list
	header("Location: ../dashboard.php");
}
?>


<?php

// require '../../login/koneksi.php';

$id = $_GET ['id'];
$user = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
while ($data = mysqli_fetch_array($user)){



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>edit User</h1>

    <form action="" method="post">
    <ul>
        <input type="hidden" name="id" id="username" required value= "<?php echo $data['id']?>">

        <li><label for="username">username :</label>
        <input type="text" name="username" id="username" required value= "<?php echo $data['username']?>"></li>

        <li><label for="email">email :</label>
        <input type="email" name="email" id="email" required value= "<?php echo $data['email']?>"></li>

        <li><label for="password">password :</label>
        <input type="text" name="password" id="password" required value= "<?php echo $data['password']?>"></li>

        <li><label for="telephone">telephone :</label>
        <input type="text" name="telephone" id="telephone" required value= "<?php echo $data['telephone']?>"></li>

        <li><label for="level">level :</label>
        <input type="text" name="level" id="level" required value= "<?php echo $data['level']?>"></li>

        <li><button type="submit" name="edit">edit User</button></li>
    </ul>
    </form>

</body>
</html>

<?php
}
?>