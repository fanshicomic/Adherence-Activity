<?php
	session_start();
	if(session_destroy()) {
		header("Location: " . $_SERVER['DOCUMENT_ROOT'] ."/pharmacy/project1/index.php"); // Redirecting To Home Page
	}
?>