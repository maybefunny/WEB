<?php
	session_start();
	if(session_destroy()){ // Destroying All Sessions
		echo 'sayonara! redirecting in 2';
		echo '<meta http-equiv="refresh" content="2;url=/index.php">';
	}
?>