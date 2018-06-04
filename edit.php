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
	<title>Simple CRUD by TUTORIALWEB.NET</title>
</head>
<body>	
	<p><a href="index.php">Home</a>
	
	<h3>Edit Profile</h3>
	
	<?php
		include("editin.php");
		if(isset($_POST['edit'])){
			$nrp=$_POST['nrp'];
			$cari=mysqli_query($connection,"SELECT * FROM profiles WHERE nrp='$nrp'");
			$rows = mysqli_num_rows($cari);
			if($rows==1){
				
				$profile=mysqli_fetch_array($cari);
				echo '
				<form action="editin.php" method="post" enctype="multipart/form-data">
					<table cellpadding="3" cellspacing="0">
						<tr>
							<td>NRP</td>
							<td>:</td>
							<td><input type="text" name="nrp" value="'.$nrp.'" readonly required></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><input type="text" name="name" size="30" value="'.$profile['name'].'" required></td>
						</tr>
						<tr>
							<td>Asal</td>
							<td>:</td>
							<td><input type="text" name="residence" size="30" value="'.$profile['residence'].'" required></td></td>
						</tr>
						<tr>
							<td>Tanggal lahir</td>
							<td>:</td>
							<td><input type="text" name="birthday" size="10" value="'.$profile['birthday'].'" required></td></td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>:</td>
							<td><input type="file" name="fileToUpload" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td></td>
							<td><input type="submit" name="editin" value="edit"></td>
						</tr>
					</table>
				</form>';
			}else{
				echo "data not found, redirecting to edit page in 2";
				echo '<meta http-equiv="refresh" content="2;url=/edit.php">';
			}
		}else{
			echo '
			<form action="" method="post">
				<table cellpadding="3" cellspacing="0">
					<tr>
						<td>NRP</td>
						<td>:</td>
						<td><input type="text" name="nrp" required></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td><input type="submit" name="edit" value="search"></td>
					</tr>
				</table>
			</form>';
		}
	?>
		
</body>
</html>