<?php
	//cek dahulu, jika tombol tambah di klik
	if(isset($_POST['add'])){
		
		//inlcude atau memasukkan file koneksi ke database
		include('config.php');
		
		//jika tombol tambah benar di klik maka lanjut prosesnya
		$nrp		= $_POST['nrp'];
		$name		= $_POST['name'];
		$residence	= $_POST['residence'];
		$birthday	= $_POST['birthday'];
		
		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($connection,"INSERT INTO profiles (nrp, name, position, birthday, residence)VALUES('$nrp', '$name', 'gak ada', '$birthday', '$residence')");
		
		//jika query input sukses
		if($input){
			echo 'Data berhasil di tambahkan! redirecting in 2';
			echo '<meta http-equiv="refresh" content="2;url=/index.php">';
		}else{
			echo 'Gagal menambahkan data! redirecting in 2';
			echo '<meta http-equiv="refresh" content="2;url=/index.php">';
		}
	}else{	//jika tidak terdeteksi tombol tambah di klik
		//redirect atau dikembalikan ke halaman tambah
		echo '<script>window.history.back()</script>';
	}
?>