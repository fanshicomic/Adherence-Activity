<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/model/database_manager.php');
	
	$command = "";
	if (isset($_REQUEST['command'])) {
		$command = secureString($_REQUEST['command']);

	}
	if ($command == 'new_exercise') {
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        	echo true;
        } else {
        	echo false;
        }
	}

?>