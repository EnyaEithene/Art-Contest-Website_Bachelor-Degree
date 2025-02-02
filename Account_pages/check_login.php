<?php
	session_start();
	if(isset($_SESSION['ID']) && $_SESSION['loggedin']==true){
		header("Location: user_account.php");
	} else {
		header("Location: login_page.php");
	}
?>