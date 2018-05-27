<?php
	include("login.php");
	if (!isset($_SESSION['login_user'])) {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>delete coy</title>
</head>
<body>
	<form action="hapus.php" method="POST">
		NRP :
		<input type="text" name="nrp" placeholder="051***********">
		<button type="submit" name="submit">delete</button>
		<span><?php echo $error;?></span>
	</form>
</body>
</html>