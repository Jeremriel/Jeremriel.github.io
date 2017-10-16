<?php
	session_start();

	if (isset($_POST['submitRegister'])){
		$_SESSION['username']=$username=$_POST['username'];
		$_SESSION['password']=$password=$_POST['password'];

		$conn=mysqli_connect("localhost","root","","project");
		$istaken=!mysqli_query($conn,"INSERT INTO account VALUES('$username','$password')");
		mysqli_close($conn);
		if (!$istaken){
			header('location:LogIn.php');
		}
	}

?>

<!DOCTYPE html>
<html>
<center>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	Register your desired Username and Password for protection.</br></br>
	
	<i>
	<div id='parent'>
	<?php
		if (isset($istaken) and $istaken) echo"Sorry this account is already taken.";
	?>
	</i>
	
	<form method="POST">
		<h2> UserName </h2><input type="text" name="username" placeholder="Username" required > <p>
		<h2> Password </h2><input type="password" name="password" placeholder="Password" required >
		<input type="submit" name="submitRegister" value="Sign-Up"><br>
		<a href="LogIn.php">Go back</a>
	</form>
	</center>
	</div>
</body>
</html>
