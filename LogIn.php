<?php
	session_start();
	if (isset($_POST['submitLogin'])){
		$_SESSION['username']=$username=$_POST['username'];
		$_SESSION['password']=$password=$_POST['password'];

		$conn=mysqli_connect("localhost","root","","id3274236_project");
		$result=mysqli_query($conn,"SELECT * FROM account WHERE username='$username' and password='$password'");
		$data=mysqli_fetch_assoc($result);
		mysqli_close($conn);
		if ($data) header("location:VolunteerHomepage.html");
		else $error="Sorry! Username or Password Incorrect.";
	}
?>

<!DOCTYPE html>
<html>
<center>
<head>
	<title>Log-In</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	<div id='parent'>
		<?php
			if (isset($error)) echo $error;
		?>
		<form method="POST">
			Username: <input type="text" name="username" placeholder="Username"> <br>
			Password: <input type="password" name="password" placeholder="Password">
			<input type="submit" name="submitLogin" value="Log In">
		</form>
		<br><span>Don't have an account? <a href="Register.php">Volunteer now!!!</a></span></br>
		<br><a href="Index.html">Go back</a>
	</div>
	</center>
</body>
</body>
</html>
