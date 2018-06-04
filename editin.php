<?php
	include("config.php");
	if(isset($_POST['editin'])){
		$nrp		= $_POST['nrp'];
		$name		= $_POST['name'];
		$residence	= $_POST['residence'];
		$birthday	= $_POST['birthday'];
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
		$target_file = "images/".$nrp.".".$imageFileType;

		//check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		//check file type
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		$query=mysqli_query($connection,"UPDATE profiles SET name='$name', residence='$residence', birthday='$birthday', foto='$target_file' WHERE nrp='$nrp' ");

		if(file_exists("images/".$nrp.".jpg")) unlink("images/".$nrp.".jpg");
		else if(file_exists("images/".$nrp.".png")) unlink("images/".$nrp.".png");
		else if(file_exists("images/".$nrp.".gif")) unlink("images/".$nrp.".gif");
		else if(file_exists("images/".$nrp.".jpeg")) unlink("images/".$nrp.".jpeg");


		if($query && $uploadOk){
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "edit success, redirecting to index in 1";
				echo '<meta http-equiv="refresh" content="1;url=/index.php">';
		    }
		}else{
			echo $uploadOk;
			echo "edit failed, redirecting to index in 1";
			echo '<meta http-equiv="refresh" content="1;url=/index.php">';
		}
	}else{
	}
?>