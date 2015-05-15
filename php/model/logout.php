<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	if(session_destroy()) {
		echo $_SERVER['DOCUMENT_ROOT'];
		header("Location: /pharmacy/project1/index.php"); 
		die();
	}
?>