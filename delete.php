<?php
	include("login.php");
	if (!isset($_SESSION['login_user'])) {
		header("location:index.php");
	}
	echo "welcome, ".$_SESSION['login_user'].".";
?>
<!DOCTYPE html>
<html>
<head>
	<title>delete coy</title>
</head>
<body>
	<p><a href="index.php">home</a>
	<form action="hapus.php" method="POST">
		NRP :
		<input type="text" name="nrp" placeholder="xx-xxxx">
		<button type="submit" name="submit">delete</button>
		<span><?php echo $error;?></span>
	</form>
</body>
</html>