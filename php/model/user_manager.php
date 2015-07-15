<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacology/project1/php/model/database_manager.php');
	$command = "";
	if (isset($_REQUEST['command'])) {
		$command = secureString($_REQUEST['command']);
	}
	if ($command == 'delete_user_record') {
		$protocol = secureString($_REQUEST['protocol']);
		$_SESSION['E'.$protocol] = 1;
		if (delete_user_record($protocol)) {
			echo true;
		} else {
			echo false;
		}
	}
?>