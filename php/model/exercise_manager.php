<?php

	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/model/database_manager.php');
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/exercise_view_controller.php');
		
	$command = "";

	if (isset($_REQUEST['command'])) {
		$command = secureString($_REQUEST['command']);

	}

	if ($command == 'save_exercise') {
		$exercise = secureString($_REQUEST['exercise']);
		$day = secureString($_REQUEST['day']);
		if ($exercise == 1) {
			$truvada = secureString($_REQUEST['truvada']);
			$reyataz = secureString($_REQUEST['reyataz']);
			$norvir = secureString($_REQUEST['norvir']);
			$checked = is_day_updated($exercise, $day);
			if (!$checked) {
				$res = add_exercise_1($day, $truvada, $reyataz, $norvir);
				echo $res;
			} else {
				echo false;
			}
		} else if ($exercise == 2) {
			$kaletra_1 = secureString($_REQUEST['kaletra_1']);
			$kaletra_2 = secureString($_REQUEST['kaletra_2']);
			$combivir_1 = secureString($_REQUEST['combivir_1']);
			$combivir_2 = secureString($_REQUEST['combivir_2']);
			$fuzeon_1 = secureString($_REQUEST['fuzeon_1']);
			$fuzeon_2 = secureString($_REQUEST['fuzeon_2']);
			$checked = is_day_updated($exercise, $day);
			if (!$checked) {
				$res = add_exercise_2($day, $kaletra_1, $kaletra_2, $combivir_1, $combivir_2, $fuzeon_1, $fuzeon_2);
				echo $res;
			} else {
				echo false;
			}
		} else if ($exercise == 3) {
			$atripla = secureString($_REQUEST['atripla']);
			$checked = is_day_updated($exercise, $day);
			if (!$checked) {
				$res = add_exercise_3($day, $atripla);
				echo true;
			} else {
				echo false;
			}
		} else {
			echo false;
		}
	}

	if ($command == "get_day") {
		$exercise = secureString($_REQUEST['exercise']);
		$day = $_SESSION['E' . $exercise];
		echo $day;
	}

	if ($command == "change_day") {
		$exercise = secureString($_REQUEST['exercise']);
		$day = secureString($_REQUEST['day']);
		$_SESSION['E' . $exercise] = $day;
	}

	if ($command == "change_day_table") {
		$exercise = secureString($_REQUEST['exercise']);
		$day = secureString($_SESSION['E'.$exercise]);
		show_day_table($exercise);
	}

	if ($command == "change_exercise_table") {
		$exercise = secureString($_REQUEST['exercise']);
		$day = secureString($_SESSION['E'.$exercise]);
		show_exercise_table($exercise);
	}

	if ($command == "change_update_button") {
		$exercise = secureString($_REQUEST['exercise']);
		$day = secureString($_SESSION['E'.$exercise]);
		show_update_button($exercise);
	}

?>