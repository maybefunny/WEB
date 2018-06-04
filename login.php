<?php
	session_start();
	include("config.php");
	 // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		}
		else{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = $connection->real_escape_string($username);
			$password = $connection->real_escape_string($password);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($connection, "select * from users where username='$username' AND password='$password'");
			$result = mysqli_query($connection, "select * from profiles order by nrp desc");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {

				$_SESSION['login_user']=$username; // Initializing Session
				header("location:/"); // Redirecting To Other Page
			} else {
				$error = "<br>Username or Password is invalid";
			}
			mysqli_close($connection); // Closing Connection
		}
	}
?>