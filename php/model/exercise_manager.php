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
		$drug = secureString($_REQUEST['drug']);
		$index = secureString($_REQUEST['index']);
		$today = get_current_day($exercise);
		if ($day == $today) {
			if(!is_drug_updated($exercise, $day, $drug, $index)) {
				$res = update_exercise($exercise, $day, $drug, $index);
				echo $res;
			} else {
				echo false;
			}
		} else {
			$hour = date('G');
			if ($today == $day + 1 && $hour < 3) {
				if(!is_drug_updated($exercise, $day, $drug, $index)) {
					$res = update_exercise($exercise, $day, $drug, $index);
					echo $res;
				} else {
					echo false;
				}
			} else {
				echo false;
			}
		}
		// if ($exercise == 1 && $day == $today) {
		// 	$truvada = secureString($_REQUEST['truvada']);
		// 	$reyataz = secureString($_REQUEST['reyataz']);
		// 	$norvir = secureString($_REQUEST['norvir']);
		// 	$checked = is_day_updated($exercise, $day);
		// 	if (!$checked) {
		// 		$res = add_exercise_1($day, $truvada, $reyataz, $norvir);
		// 		echo $res;
		// 	} else {
		// 		echo false;
		// 	}
		// } else if ($exercise == 2 && $day == $today) {
		// 	$kaletra_1 = secureString($_REQUEST['kaletra_1']);
		// 	$kaletra_2 = secureString($_REQUEST['kaletra_2']);
		// 	$combivir_1 = secureString($_REQUEST['combivir_1']);
		// 	$combivir_2 = secureString($_REQUEST['combivir_2']);
		// 	$fuzeon_1 = secureString($_REQUEST['fuzeon_1']);
		// 	$fuzeon_2 = secureString($_REQUEST['fuzeon_2']);
		// 	$checked = is_day_updated($exercise, $day);
		// 	if (!$checked) {
		// 		$res = add_exercise_2($day, $kaletra_1, $kaletra_2, $combivir_1, $combivir_2, $fuzeon_1, $fuzeon_2);
		// 		echo $res;
		// 	} else {
		// 		echo false;
		// 	}
		// } else if ($exercise == 3 && $day == $today) {
		// 	$atripla = secureString($_REQUEST['atripla']);
		// 	$checked = is_day_updated($exercise, $day);
		// 	if (!$checked) {
		// 		$res = add_exercise_3($day, $atripla);
		// 		echo $res;
		// 	} else {
		// 		echo false;
		// 	}
		// } else {
		// 	echo false;
		// }
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
		$drug = secureString($_REQUEST['drug']);
		$index = secureString($_REQUEST['index']);
		show_update_button($exercise, $drug, $index);
	}

	if ($command == "get_drug_taken_time") {
		$exercise = secureString($_REQUEST['exercise']);
		$drug = secureString($_REQUEST['drug']);
		$index = secureString($_REQUEST['index']);
		$updated = is_drug_updated($exercise, $_SESSION['E'.$exercise], $drug, $index);
		if ($updated) {
			$hour = get_drug_taken_time($exercise, $_SESSION['E'.$exercise], $drug, $index);
		} else {
			$hour = "NA";
		}
		echo $hour;
	}

	if ($command == "get_exercise_result") {
		$exercise = secureString($_REQUEST['exercise']);
		$res = get_exercise_result($exercise);
		echo $res;
	}

	if ($command == "has_exercise_finished") {
		$exercise = secureString($_REQUEST['exercise']);
		$res = has_exercise_finished($exercise);
		echo $res;
	}

?>