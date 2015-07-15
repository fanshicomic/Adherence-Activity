<?php
	if(!isset($_SESSION)){
	 	session_start();
	}
	if(session_destroy()) {
		// echo $_SERVER['DOCUMENT_ROOT'];
		header("Location: /pharmacology/project1/index.php"); 
		die();
	}
?>