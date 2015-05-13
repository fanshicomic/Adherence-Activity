<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/model/database_manager.php');
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

	if ($command == 'is_valid_password') {
		$id = secureString($_REQUEST['id']);
		$password = secureString($_REQUEST['password']);
		$is_valid = check_password_validation($id, $password);
		if ($is_valid) {
			echo true;
		} else {
			echo false;
		}
	}

	if ($command == 'signin') {

		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
			if (isset($_REQUEST['id'])) {
				$id = secureString($_REQUEST['id']);
				$_SESSION['uid'] = $id;
				$_SESSION['logged_in'] = true;
				echo true;
			} else {
				echo false;
			}
		}
	}
?>