<?php
	include("login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>AJK PROFILE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	AJK PROFILE
	<span><?php echo $error;?></span>
	<?php
		if(isset($_SESSION['login_user'])){ //tampilkan menu jika sudah log in
			echo "| welcome, ".$_SESSION['login_user'].".<br>";
			echo '<br><a href="add.php"><button>add</button></a>';
			echo '<a href="edit.php"><button>edit</button></a>';
			echo '<a href="delete.php"><button>delete</button></a>';
			echo '<a href="logout.php"><button>logout</button></a><br><br>';
		}else{	//selain itu tampilkan form log in
			echo 
			'<form action="" method="POST">
				<input type="text" name="username" placeholder="username">
				<input type="password" name="password" placeholder="abc">
				<button type="submit" name="submit">login</button>
			</form><br>';
		}
	?>
	<?php
	$query = mysqli_query($connection,"SELECT * FROM profiles ORDER BY birthday");
	
	if(mysqli_num_rows($query) == 0){ //jika tabel kosong
		echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
	}else{
		while($data = mysqli_fetch_assoc($query)){

			echo '
				<div class="card">
				  <img src="'.$data['foto'].'" alt="foto" style="width:290px; height:290px;">
				  <h4>'.$data['name'].'</h4>
				  <table>
				  	<tr>
				  		<th>NRP:</th>
				  		<td>'.$data['nrp'].'</td>
				  	</tr>
				  	<tr>
				  		<th>Born:</th>
				  		<td>'.$data['birthday'].'</td>
				  	</tr>
				  	<tr>
				  		<th>Asal:</th>
				  		<td>'.$data['residence'].'</td>
				  	</tr>
				  </table>
				</div>';				
		}
		
	}
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</body>
</html>