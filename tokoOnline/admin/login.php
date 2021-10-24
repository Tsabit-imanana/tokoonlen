<?php 
session_start();
require "function.php";

if ( isset($_POST["login"])) {
	

	$user = $_POST["user"];
	$pass = $_POST["pass"];

	$cek = mysqli_query($conn, "SELECT * FROM admin WHERE user = '$user'");

	//kalau tidak ada nilai 0 (cek username)
	if( mysqli_num_rows($cek) === 1) {

		//cek password
		$row = mysqli_fetch_assoc($cek);
		if ($pass === $row["pass"] ) {

			$_SESSION["login"] = true;
			header("Location: index.php");
			exit;
		}
		
	} else {

	$error = true;}
}





 ?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
	
	 <label for="username" class="text-info">Username:</label>
     <input type="text" name="user" autocomplete="off"> <br>
     <label for="password" class="text-info">Password:</label>
	 <input type="password" name="pass"> <br>
	 <button type="submit" name="login" value="submit">Login</button>
</form>


</body>
</html>