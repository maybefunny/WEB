<?php
	include("config.php");
	if(isset($_POST['editin'])){
		$nrp		= $_POST['nrp'];
		$name		= $_POST['name'];
		$residence	= $_POST['residence'];
		$birthday	= $_POST['birthday'];
		$query=mysqli_query($connection,"UPDATE profiles SET name='$name', residence='$residence', birthday='$birthday' WHERE nrp='$nrp' ");

		if($query){
			echo "edit success, redirecting to index in 2";
			echo '<meta http-equiv="refresh" content="2;url=/index.php">';
		}else{
			echo "edit failed, redirecting to index in 2";
			echo '<meta http-equiv="refresh" content="2;url=/index.php">';
		}
	}else{//jika tidak terdeteksi tombol tambah di klik
		//redirect atau dikembalikan ke halaman tambah
		//echo '<script>window.history.back()</script>';
	}
?>