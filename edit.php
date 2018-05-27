<?php
	include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD by TUTORIALWEB.NET</title>
</head>
<body>
	<h2>Simple CRUD</h2>
	
	<p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
	
	<h3>Edit Data Siswa</h3>
	
	<?php
		//include('editin.php');
		
		//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
		//$id = $_GET['id'];
		
		//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
		//$show = mysql_query("SELECT * FROM siswa WHERE siswa_id='$id'");
		
		//cek apakah data dari hasil query ada atau tidak
		//if(mysql_num_rows($show) == 0){
			//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		//	echo '<script>window.history.back()</script>';
		//}else{
			//jika data ditemukan, maka membuat variabel $data
		//	$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
		//}
	?>
	
	<?php
		include("editin.php");
		if(isset($_POST['edit'])){
			$nrp=$_POST['nrp'];
			$cari=mysqli_query($connection,"SELECT * FROM profiles WHERE nrp='$nrp'");
			$profile=mysqli_fetch_array($cari);
			echo '
			<form action="editin.php" method="post">
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
						<td>Tempat tinggal</td>
						<td>:</td>
						<td><input type="text" name="residence" size="30" value="'.$profile['residence'].'" required></td></td>
					</tr>
					<tr>
						<td>Tanggal lahir</td>
						<td>:</td>
						<td><input type="text" name="birthday" size="10" value="'.$profile['birthday'].'" required></td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td><input type="submit" name="editin" value="edit"></td>
					</tr>
				</table>
			</form>';
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