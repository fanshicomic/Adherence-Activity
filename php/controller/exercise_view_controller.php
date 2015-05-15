<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/model/database_manager.php');
	
	function user_validation($exercise) {
		if (has_exercise($exercise)) {
			check_day($exercise);
		} else {
			header("Location: /pharmacy/project1/php/view/protocol_1.php");
		}
	}

	function has_exercise($exercise) {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
			return exist_protocol_1();
		} else {
			return false;
		}
	}

	function check_day($exercise) {
		if (isset($_SESSION['E'.$exercise])) {

		} else {
			$date = get_date($exercise, 1);
			$current;
			if ($date === NULL) {
				$current = 1;
			} else {
				$day1 = strtotime($date);
				$day1_y = date('Y', $day1);
				$day1_m = date('m', $day1);
				$day1_d = date('d', $day1);
				$today_y = date('Y');
				$today_m = date('m');
				$today_d = date('d');
				if ($day1_y == $today_y && $day1_m == $today_m && $today_d - $day1_d >= 0 && $today_d - $day1_d <= 6) {
					$current = $today_d - $day1_d + 1;
				} else {
					$current = 1;
				}
			}
			$_SESSION['E'.$exercise] = $current;
		}
		
	}
	function show_day_table($exercise) {
		$current = $_SESSION['E'.$exercise];
		$table = '<tr>';
		for ($i = 1; $i < 8; $i++) {
			if ($i == $current) {
				if (is_checked($exercise, $i)) {
					$table = $table .'<td class="td-day" day="'.$i.'"><i class="fa fa-check-circle-o fa-2x checked today"></i></td>';
				} else {
					$table = $table .'<td class="td-day" day="'.$i.'"><i class="fa fa-circle-o fa-2x non-checked today"></i></td>';
				}
				if ($i != 7) {
					$table = $table .'<td class="timeline">--------</td>';
				}
			} else {
				if (is_checked($exercise, $i)) {
					$table = $table .'<td class="td-day" day="'.$i.'"><i class="fa fa-check-circle-o fa-2x checked"></i></td>';
				} else {
					$table = $table .'<td class="td-day" day="'.$i.'"><i class="fa fa-circle-o fa-2x non-checked"></i></td>';
				}
				if ($i != 7) {
					$table = $table .'<td class="timeline">--------</td>';
				}
			}
		}
		$table = $table .'</tr>';
		for ($i = 1; $i < 8; $i++) {
			$table = $table .'<td>Day '. $i .'</td>';
			if ($i != 7) {
				$table = $table .'<td class="timeline"></td>';
			}
		}
		echo $table;
	}

	function get_truvada_table() {
		$uid = secureString($_SESSION['uid']);
		$p1_id = get_user_pid(1);
		if (is_day_updated(1, $_SESSION['E1'])) {
			$query = "SELECT TRUVADA_1 FROM PROTOCOL_INSTANCE_1 WHERE P1ID = '$p1_id' AND DAY = ".$_SESSION['E1'];
			$res = fetch_data($query);
			$hour = $res['TRUVADA_1'];
			$table = '<tr><td class="td-drug-name td-border-right">Truvada (citrus twist tic tac)</td>';
			for ($i = 6; $i < 24; $i++) {
				if ($i == $hour) {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-non-clickable hour-mark truvada"></td>';
					} else {
						$table = $table . '<td class="td-hour td-non-clickable hour-mark truvada"></td>';
					}
				} else {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-non-clickable truvada"></td>';
					} else {
						$table = $table . '<td class="td-hour td-non-clickable truvada"></td>';
					}
				}
			}
			for ($i = 0; $i < 3; $i++) {
				if ($i == $hour) {
					$table = $table . '<td class="td-hour td-non-clickable hour-mark truvada"></td>';
				} else {
					$table = $table . '<td class="td-hour td-non-clickable truvada"></td>';
				}
			}
			$table = $table . '<tr>';
		} else {
			$query = "SELECT TRUVADA_1 FROM PROTOCOL_1 WHERE P1ID = '$p1_id'";
			$res = fetch_data($query);
			$hour = $res['TRUVADA_1'];
			$table = '<tr><td class="td-drug-name td-border-right">Truvada (citrus twist tic tac)</td>';
			for ($i = 6; $i < 24; $i++) {
				if ($i == $hour) {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-clickable hour-mark truvada"></td>';
					} else {
						$table = $table . '<td class="td-hour td-clickable hour-mark truvada"></td>';
					}
				} else {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-clickable truvada"></td>';
					} else {
						$table = $table . '<td class="td-hour td-clickable truvada"></td>';
					}
				}
			}
			for ($i = 0; $i < 3; $i++) {
				if ($i == $hour) {
					$table = $table . '<td class="td-hour td-clickable hour-mark truvada"></td>';
				} else {
					$table = $table . '<td class="td-hour td-clickable truvada"></td>';
				}
			}
			$table = $table . '<tr>';
		}
		return $table;
	}

	function show_truvada_table() {
		echo get_truvada_table();
	}

	function get_reyataz_table() {
		$uid = secureString($_SESSION['uid']);
		$p1_id = get_user_pid(1);
		$query = "SELECT REYATAZ_1 FROM PROTOCOL_1 WHERE P1ID = '$p1_id'";
		$res = fetch_data($query);
		$hour = $res['REYATAZ_1'];
		if (is_day_updated(1, $_SESSION['E1'])) {
			$query = "SELECT REYATAZ_1 FROM PROTOCOL_INSTANCE_1 WHERE P1ID = '$p1_id' AND DAY = ".$_SESSION['E1'];
			$res = fetch_data($query);
			$hour = $res['REYATAZ_1'];
			$table = '<tr><td class="td-drug-name td-border-right">Reyataz (orange tic tac)</td>';
			for ($i = 6; $i < 24; $i++) {
				if ($i == $hour) {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-non-clickable hour-mark reyataz"></td>';
					} else {
						$table = $table . '<td class="td-hour td-non-clickable hour-mark reyataz"></td>';
					}
				} else {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-non-clickable reyataz"></td>';
					} else {
						$table = $table . '<td class="td-hour td-non-clickable reyataz"></td>';
					}
				}
			}
			for ($i = 0; $i < 3; $i++) {
				if ($i == $hour) {
					$table = $table . '<td class="td-hour td-non-clickable hour-mark reyataz"></td>';
				} else {
					$table = $table . '<td class="td-hour td-non-clickable reyataz"></td>';
				}
			}
			$table = $table . '<tr>';
		} else {
			$table = '<tr><td class="td-drug-name td-border-right">Reyataz (orange tic tac)</td>';
			for ($i = 6; $i < 24; $i++) {
				if ($i == $hour) {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-clickable hour-mark reyataz"></td>';
					} else {
						$table = $table . '<td class="td-hour td-clickable hour-mark reyataz"></td>';
					}
				} else {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-clickable reyataz"></td>';
					} else {
						$table = $table . '<td class="td-hour td-clickable reyataz"></td>';
					}
				}
			}
			for ($i = 0; $i < 3; $i++) {
				if ($i == $hour) {
					$table = $table . '<td class="td-hour td-clickable hour-mark reyataz"></td>';
				} else {
					$table = $table . '<td class="td-hour td-clickable reyataz"></td>';
				}
			}
			$table = $table . '<tr>';
		}
		return $table;
	}

	function show_reyataz_table() {
		echo get_reyataz_table();
	}

	function get_norvir_table() {
		$uid = secureString($_SESSION['uid']);
		$p1_id = get_user_pid(1);
		$query = "SELECT NORVIR_1 FROM PROTOCOL_1 WHERE P1ID = '$p1_id'";
		$res = fetch_data($query);
		$hour = $res['NORVIR_1'];
		if (is_day_updated(1, $_SESSION['E1'])) {
			$query = "SELECT NORVIR_1 FROM PROTOCOL_INSTANCE_1 WHERE P1ID = '$p1_id' AND DAY = ".$_SESSION['E1'];
			$res = fetch_data($query);
			$hour = $res['NORVIR_1'];
			$table = '<tr><td class="td-drug-name td-border-right norvir">Norvir (wintergreen tic tac)</td>';
			for ($i = 6; $i < 24; $i++) {
				if ($i == $hour) {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-non-clickable hour-mark norvir"></td>';
					} else {
						$table = $table . '<td class="td-hour td-non-clickable hour-mark norvir"></td>';
					}
				} else {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-non-clickable norvir"></td>';
					} else {
						$table = $table . '<td class="td-hour td-non-clickable norvir"></td>';
					}
				}
			}
			for ($i = 0; $i < 3; $i++) {
				if ($i == $hour) {
					$table = $table . '<td class="td-hour td-non-clickable hour-mark norvir"></td>';
				} else {
					$table = $table . '<td class="td-hour td-non-clickable norvir"></td>';
				}
			}
		} else {
			$table = '<td class="td-drug-name td-border-right norvir">Norvir (wintergreen tic tac)</td>';
			for ($i = 6; $i < 24; $i++) {
				if ($i == $hour) {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-clickable hour-mark norvir"></td>';
					} else {
						$table = $table . '<td class="td-hour td-clickable hour-mark norvir"></td>';
					}
				} else {
					if ($i == 11 || $i == 23) {
						$table = $table . '<td class="td-hour td-border-right td-clickable norvir"></td>';
					} else {
						$table = $table . '<td class="td-hour td-clickable norvir"></td>';
					}
				}
			}
			for ($i = 0; $i < 3; $i++) {
				if ($i == $hour) {
					$table = $table . '<td class="td-hour td-clickable hour-mark norvir"></td>';
				} else {
					$table = $table . '<td class="td-hour td-clickable norvir"></td>';
				}
			}
			$table = $table . '<tr>';
		}
		return $table;
	}

	function show_norvir_table() {
		echo get_norvir_table();
	}	

	function show_update_button($exercise) {
		$current = $_SESSION['E'.$exercise];
		if (is_checked($exercise, $current)) {
			echo '';
		} else {
			$btn = '<a href="#" class="btn btn-primary btn-lg btn-update-exercise" exercise="1" day='.$current.'>Update</a>';
			echo $btn;
		}
	}

	function show_exercise_table($exercise) {
		if ($exercise == 1) {
			$table = '<tr>';
			$table = $table .'<td class="td-drug-name td-border-right hour">Drug Name</td>';
			$table = $table .'<td class="td-hour hour">6</td>';
			$table = $table .'<td class="td-hour hour">7</td>';
			$table = $table .'<td class="td-hour hour">8</td>';
			$table = $table .'<td class="td-hour hour">9</td>';
			$table = $table .'<td class="td-hour hour">10</td>';
			$table = $table .'<td class="td-hour td-border-right hour">11</td>';
			$table = $table .'<td class="td-hour hour">12</td>';
			$table = $table .'<td class="td-hour hour">13</td>';
			$table = $table .'<td class="td-hour hour">14</td>';
			$table = $table .'<td class="td-hour hour">15</td>';
			$table = $table .'<td class="td-hour hour">16</td>';
			$table = $table .'<td class="td-hour hour">17</td>';
			$table = $table .'<td class="td-hour hour">18</td>';
			$table = $table .'<td class="td-hour hour">19</td>';
			$table = $table .'<td class="td-hour hour">20</td>';
			$table = $table .'<td class="td-hour hour">21</td>';
			$table = $table .'<td class="td-hour hour">22</td>';
			$table = $table .'<td class="td-hour td-border-right hour">23</td>';
			$table = $table .'<td class="td-hour hour">0</td>';
			$table = $table .'<td class="td-hour hour">1</td>';
			$table = $table .'<td class="td-hour hour">2</td></tr>';
			$table = $table . get_truvada_table();
			$table = $table . get_reyataz_table();
			$table = $table . get_norvir_table();
		} else if (true) {

		} else {

		}
		echo $table;
	}
?>
