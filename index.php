<?php
	include("login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>AJK PROFILE</title>
</head>
<body>
	AJK PROFILE
	<span><?php echo $error;?></span>
	<?php
		if(isset($_SESSION['login_user'])){ //tampilkan menu jika sudah log in
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
	<table cellpadding="5" cellspacing="0" border="1">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Tempat tinggal</th>
			<th>Tanggal lahir</th>
			<th>Foto</th>
		</tr>
		
		<?php
		$query = mysqli_query($connection,"SELECT * FROM profiles ORDER BY nrp DESC");
		
		if(mysqli_num_rows($query) == 0){ //jika tabel kosong
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
		}else{
			$no = 1;	//membuat variabel $no untuk membuat nomor urut
			while($data = mysqli_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				$image=base64_encode($data['photo']);
				//menampilkan row dengan data di database
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$data['nrp'].'</td>';	//menampilkan data nrp dari database
					echo '<td>'.$data['name'].'</td>';	//menampilkan data nama dari database
					echo '<td>'.$data['residence'].'</td>';	//menampilkan data tempat tinggal dari database
					echo '<td>'.$data['birthday'].'</td>';	//menampilkan data tanggal lahir dari database
					echo '<td><img src="/images/'.$data['nrp'].'.jpg" width="175px" height="200px"/></td>';	//menampilkan data tanggal lahir dari database
				echo '</tr>';
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
</body>
</html>