<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/model/database_manager.php');
	
	$command = "";
	if (isset($_REQUEST['command'])) {
		$command = secureString($_REQUEST['command']);

	}
	if ($command == 'new_exercise') {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        	echo true;
        } else {
        	echo false;
        }
	}

	if ($command == 'save_schedule') {
		$protocol = secureString($_REQUEST['protocol']);
		if ($protocol == 1) {
			$truvada = secureString($_REQUEST['truvada']);
			$reyataz = secureString($_REQUEST['reyataz']);
			$norvir = secureString($_REQUEST['norvir']);
			$existed = exist_protocol_1();
			if (!$existed) {
				$res = add_protocol_1($truvada, $reyataz, $norvir);
				echo true;
			} else {
				echo false;
			}
		} else if ($protocol == 2) {
			$kaletra_1 = secureString($_REQUEST['kaletra_1']);
			$kaletra_2 = secureString($_REQUEST['kaletra_2']);
			$combivir_1 = secureString($_REQUEST['combivir_1']);
			$combivir_2 = secureString($_REQUEST['combivir_2']);
			$fuzeon_1 = secureString($_REQUEST['fuzeon_1']);
			$fuzeon_2 = secureString($_REQUEST['fuzeon_2']);
		
		} else if ($protocol == 3) {
			$atripla = secureString($_REQUEST['atripla']);
		} else {
			echo false;
		}
	}

?>