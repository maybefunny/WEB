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
		$target_dir = "images/";
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
		$target_file = $target_dir . $nrp . "." . $imageFileType;

		//check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		if (file_exists($target_file)) {
		    echo "Sorry, profile already exists.";
		    $uploadOk = 0;
		}

		//check file type
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($connection,"INSERT INTO profiles (nrp, name, birthday, residence, foto)VALUES('$nrp', '$name', '$birthday', '$residence', '$target_file')");
		
		//jika query input sukses
		if($input && $uploadOk){
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo 'Data berhasil di tambahkan! redirecting in 1';
		        echo '<meta http-equiv="refresh" content="1;url=/index.php">';
		    }			
		}else{
			echo 'Gagal menambahkan data! redirecting in 1';
			echo '<meta http-equiv="refresh" content="1;url=/index.php">';
		}
	}else{	//jika tidak terdeteksi tombol tambah di klik
		//redirect atau dikembalikan ke halaman tambah
		echo '<script>window.history.back()</script>';
	}
?>