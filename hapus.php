<?php 
	include('config.php');
	//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=siswa_id
	if(isset($_POST['submit'])){
		//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=siswa_id
		$nrp = $_POST['nrp'];
		
		//cek ke database apakah ada data siswa dengan siswa_id='$id'
		$check = mysqli_query($connection, "SELECT nrp FROM profiles WHERE nrp='$nrp'");
		
		//jika data siswa tidak ada
		if(mysqli_num_rows($check) == 0){
			//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
			echo '<script>window.history.back()</script>';
		}else{
			//jika ada maka di delete
			$del = mysqli_query($connection, "DELETE FROM profiles WHERE nrp='$nrp'");
			
			if($del){ // pesan berhasil
				echo 'Data siswa berhasil di hapus! redirecting in 2';
				echo '<meta http-equiv="refresh" content="2;url=/index.php">';
			}else{ // gagal
				echo 'Gagal menghapus data! redirecting in 2';
				echo '<meta http-equiv="refresh" content="2;url=/index.php">';
			}
		}
	}else{
		echo '<script>window.history.back()</script>';	
	}
?>