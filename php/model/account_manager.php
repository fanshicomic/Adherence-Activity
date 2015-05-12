<?php
	require_once("database_manager.php");
	$command = "";

	if (isset($_REQUEST['command'])) {
		$command = secureString($_REQUEST['command']);
	}

	if ($command == 'is_user_existing') {
		$id = secureString($_REQUEST['id']);
		$is_existing = is_user_existing($id);
		if ($is_existing) {
			echo true;
		} else {
			echo false;
		}
	}

	if ($command == 'create_user') {
		$id = secureString($_REQUEST['id']);
		$password = secureString($_REQUEST['password']);
		$success = create_user($id, $password);
		if ($success) {
			echo true;
		} else {
			echo false;
		}
	}
?>