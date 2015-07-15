<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacology/project1/connection.php');

	function fetch_data($query) {
		global $db;
		$res = $db->query($query);
		if (!($res)) {
			exit("MySQL reports " . $db->error);
		}
		$res = mysqli_fetch_array($res);
		if ($res) {
			return $res;
		} else {
			return false;
		}
	}

    function fetch_data_bunch ($query) {
        global $db;
		$res = $db->query($query);
        
		if ($res) {
			return $res;
		} else {
			exit("MySQL reports " . $db->error);
		}
    }

    function update_data($query) {
    	global $db;
		$res = $db->query($query);
		return $res;
    }

    // -----------------------------------USER---------------------------------------

    function is_user_existing($user_name) {
    	$query = "SELECT * FROM USER WHERE USER_NAME = '$user_name'";
    	if (fetch_data($query)) {
    		return true;
    	} else {
    		return false;
    	}
    }

    function create_user($user_name, $user_password) {
    	$uid = uniqid();
    	$password_hash = md5($user_password);
		$query = "INSERT INTO USER (UID, USER_NAME, PASSWORD) VALUES ('$uid' ,'$user_name', '$password_hash')";
		return update_data($query);
    }

    function get_user_password($user_name) {
    	$query = "SELECT PASSWORD FROM USER WHERE USER_NAME = '$user_name'";
        $data = fetch_data($query);
    	if ($data) {
            if (array_key_exists('PASSWORD', $data)) {
                return $data['PASSWORD'];
            } 
        }
        return false;
    }

    function check_password_validation($user_name, $user_password) {
    	$password =	get_user_password($user_name);
    	$password_hash = md5($user_password);
    	return $password == $password_hash;
    }

    function get_user_id($user_name) {
        $query = "SELECT UID FROM USER WHERE USER_NAME = '$user_name'";
        $data = fetch_data($query);
        if ($data) {
            if (array_key_exists('UID', $data)) {
                return $data['UID'];
            } 
        }
        return false;
    }
    //------------------------------PROTOCOL-------------------------------------- 

    function exist_protocol($protocol) {
        if ($protocol == 1) {
            return exist_protocol_1();
        } else if ($protocol == 2) {
            return exist_protocol_2();
        } else if ($protocol == 3) {
            return exist_protocol_3();
        } else {
            return false;
        }
    }

    function add_protocol_1($truvada, $reyataz, $norvir) {
        $p1_id = uniqid();
        $uid = get_user_id($_SESSION['uid']);
        $query_protocol_1 = "INSERT INTO PROTOCOL_1 (P1ID, UID, TRUVADA_1, REYATAZ_1, NORVIR_1) VALUES ('$p1_id', '$uid', '$truvada', '$reyataz', '$norvir')";
        $query_protocol_inst_1 = "INSERT INTO PROTOCOL_INSTANCE_1 (P1ID, DAY) VALUES ('$p1_id', 1), ('$p1_id', 2), ('$p1_id', 3), ('$p1_id', 4), ('$p1_id', 5), ('$p1_id', 6), ('$p1_id', 7)";
        $query_user = "UPDATE USER SET P1ID = '$p1_id' WHERE UID = '$uid'";
        $res = update_data($query_protocol_1) && update_data($query_protocol_inst_1) && update_data($query_user);
        return $res;
    }

    function exist_protocol_1() {
        $uid = get_user_id($_SESSION['uid']);
        $query = "SELECT * FROM PROTOCOL_1 WHERE UID = '$uid'";
        $data = fetch_data($query);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function add_protocol_2($kaletra_1, $kaletra_2, $combivir_1, $combivir_2, $fuzeon_1, $fuzeon_2) {
        $p2_id = uniqid();
        $uid = get_user_id($_SESSION['uid']);
        $query_protocol_2 = "INSERT INTO PROTOCOL_2 (P2ID, UID, KALETRA_1, KALETRA_2, COMBIVIR_1, COMBIVIR_2, FUZEON_1, FUZEON_2) VALUES ('$p2_id', '$uid', '$kaletra_1', '$kaletra_2', '$combivir_1', '$combivir_2', '$fuzeon_1', '$fuzeon_2')";
        $query_protocol_inst_2 = "INSERT INTO PROTOCOL_INSTANCE_2 (P2ID, DAY) VALUES ('$p2_id', 1), ('$p2_id', 2), ('$p2_id', 3), ('$p2_id', 4), ('$p2_id', 5), ('$p2_id', 6), ('$p2_id', 7)";
        $query_user = "UPDATE USER SET P2ID = '$p2_id' WHERE UID = '$uid'";
        $res = update_data($query_protocol_2) && update_data($query_protocol_inst_2) && update_data($query_user);
        return $res;
    }

    function exist_protocol_2() {
        $uid = get_user_id($_SESSION['uid']);
        $query = "SELECT * FROM PROTOCOL_2 WHERE UID = '$uid'";
        $data = fetch_data($query);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function add_protocol_3($atripla) {
        $p3_id = uniqid();
        $uid = get_user_id($_SESSION['uid']);
        $query_protocol_3 = "INSERT INTO PROTOCOL_3 (P3ID, UID, ATRIPLA_1) VALUES ('$p3_id', '$uid', '$atripla')";
        $query_protocol_inst_3 = "INSERT INTO PROTOCOL_INSTANCE_3 (P3ID, DAY) VALUES ('$p3_id', 1), ('$p3_id', 2), ('$p3_id', 3), ('$p3_id', 4), ('$p3_id', 5), ('$p3_id', 6), ('$p3_id', 7)";
        $query_user = "UPDATE USER SET P3ID = '$p3_id' WHERE UID = '$uid'";
        $res = update_data($query_protocol_3) && update_data($query_protocol_inst_3) && update_data($query_user);
        return $res;
    }

    function exist_protocol_3() {
        $uid = get_user_id($_SESSION['uid']);
        $query = "SELECT * FROM PROTOCOL_3 WHERE UID = '$uid'";
        $data = fetch_data($query);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function get_user_pid($protocol) {
        $uid = get_user_id($_SESSION['uid']);
        $query = "SELECT P". $protocol ."ID FROM USER WHERE UID = '$uid'";
        $data = fetch_data($query);
        return $data["P". $protocol . "ID"];
    }

    function delete_user_record($protocol) {
        $uid = get_user_id($_SESSION['uid']);
        $pid = get_user_pid($protocol);
        $query1 = "DELETE FROM PROTOCOL_". $protocol ." WHERE P".$protocol."ID = '$pid'";
        $query2 = "DELETE FROM PROTOCOL_INSTANCE_". $protocol ." WHERE P".$protocol."ID = '$pid'";
        $query3 = "UPDATE USER SET P".$protocol."ID = NULL WHERE UID = '$uid'";
        $res1 = update_data($query1);
        $res2 = update_data($query2);
        $res3 = update_data($query3);
        return $res1 && $res2 && $res3;
    }
    //---------------------------------EXERCISE----------------------------------
    function is_checked($exercise, $day) {
        $pid = get_user_pid($exercise);
        $query = "SELECT DATE FROM PROTOCOL_INSTANCE_$exercise WHERE DAY = $day AND P".$exercise."ID = '$pid'";
        $res = fetch_data($query);
        $date = $res['DATE'];
        return $date !== NULL;
    }

    function get_date($exercise, $day) {
        $pid = get_user_pid($exercise);
        $query = "SELECT DATE FROM PROTOCOL_INSTANCE_$exercise WHERE DAY = $day AND P".$exercise."ID = '$pid'";
        $res = fetch_data($query);
        $date = $res['DATE'];
        return $date;
    }

    function is_day_updated($exercise, $day) {
        $date = get_date($exercise, $day);
        return $date !== NULL;
    }

    function update_exercise($exercise, $day, $drug, $index) {
        $pid = get_user_pid($exercise);
        $today = get_current_day($exercise);
        $date = date("Y-m-d");
        $time = date('H:i');
        if ($today == $day + 1) {
            $date = date("Y-m-d", mktime(0,0,0,date("Y"), date("m"), date("d") - 1));
        } 
        $query = "UPDATE PROTOCOL_INSTANCE_$exercise SET DATE = '$date'";
        if ($time != -1) {
            $query = $query .", ".$drug."_".$index." = '$time'";
        }
        $query = $query ." WHERE P".$exercise."ID = '$pid' AND DAY = $day";
        $res = update_data($query);
        return $res;
    }

    function is_drug_updated($exercise, $day, $drug, $index) {
        $pid = get_user_pid($exercise);
        $query = "SELECT ".$drug."_".$index." FROM PROTOCOL_INSTANCE_$exercise WHERE P".$exercise."ID = '$pid' AND DAY = $day";
        $res = fetch_data($query);
        $hour = $res[$drug."_".$index];
        return $hour !== NULL;
    }

    function get_drug_taken_time($exercise, $day, $drug, $index) {
        $pid = get_user_pid($exercise);
        $query = "SELECT ".$drug."_".$index." FROM PROTOCOL_INSTANCE_$exercise WHERE P".$exercise."ID = '$pid' AND DAY = $day";
        $res = fetch_data($query);
        $hour = $res[$drug."_".$index];
        return $hour;
    }

    function get_drug_planned_time($exercise, $drug, $index) {
        $pid = get_user_pid($exercise);
        $query = "SELECT ".$drug."_".$index." FROM PROTOCOL_$exercise WHERE P".$exercise."ID = '$pid'";
        $res = fetch_data($query);
        $hour = $res[$drug."_".$index];
        return $hour;
    }

    function add_exercise_1($day, $truvada, $reyataz, $norvir) {
        $pid = get_user_pid(1);
        $date = date("Y-m-d");
        $query = "UPDATE PROTOCOL_INSTANCE_1 SET DATE = '$date'";
        if ($truvada != -1) {
            $query = $query .", TRUVADA_1 = " .$truvada;
        }
        if ($reyataz != -1) {
            $query = $query .", REYATAZ_1 = " .$reyataz;
        }
        if ($norvir != -1) {
            $query = $query .", NORVIR_1 = ".$norvir;
        }
        $query = $query ." WHERE P1ID = '$pid' AND DAY = $day";
        $res = update_data($query);
        return $res;
    }

    function add_exercise_2($day, $kaletra_1, $kaletra_2, $combivir_1, $combivir_2, $fuzeon_1, $fuzeon_2) {
        $pid = get_user_pid(2);
        $date = date("Y-m-d");
        $query = "UPDATE PROTOCOL_INSTANCE_2 SET DATE = '$date'";
        if ($kaletra_1 != -1) {
            $query = $query .", KALETRA_1 = " .$kaletra_1;
        }
        if ($combivir_1 != -1) {
            $query = $query .", COMBIVIR_1 = " .$combivir_1;
        }
        if ($fuzeon_1 != -1) {
            $query = $query .", FUZEON_1 = ".$fuzeon_1;
        }
        if ($kaletra_2 != -1) {
            $query = $query .", KALETRA_2 = " .$kaletra_2;
        }
        if ($combivir_2 != -1) {
            $query = $query .", COMBIVIR_2 = " .$combivir_2;
        }
        if ($fuzeon_2 != -1) {
            $query = $query .", FUZEON_2 = ".$fuzeon_2;
        }
        $query = $query ." WHERE P2ID = '$pid' AND DAY = $day";
        $res = update_data($query);
        return $res;
    }

    function add_exercise_3($day, $atripla) {
        $pid = get_user_pid(3);
        $date = date("Y-m-d");
        $query = "UPDATE PROTOCOL_INSTANCE_3 SET DATE = '$date'";
        if ($atripla != -1) {
            $query = $query .', ATRIPLA_1 =' .$atripla;
        }
        $query = $query ." WHERE P3ID = '$pid' AND DAY = $day";
        $res = update_data($query);
        return $res;
    }

    function get_exercise_result($exercise) {
        $not_follow = 0;
        $forget = 0;
        if ($exercise == 1) {
            $drug = array("TRUVADA", "REYATAZ", "NORVIR");
            $number = 1;
        } else if ($exercise == 2) {
            $drug = array("FUZEON", "KALETRA", "COMBIVIR");
            $number = 2;
        } else if ($exercise == 3) {
            $drug = array("ATRIPLA");
            $number = 1;
        } else {

        }
        $plan = array();
        $real = array();
        for ($i = 0; $i < count($drug) * $number; $i++) {
            $plan[$i] = get_drug_planned_time($exercise, $drug[$i%3], floor($i/count($drug)) + 1);
        }
        for ($i = 1; $i < 8; $i++) {
            for ($j = 0; $j < count($drug) * $number; $j++) {
                $real[$j] = get_drug_taken_time($exercise, $i, $drug[$j%3], floor($j/count($drug)) + 1);
                $is_following = is_following_schedule($plan[$j], $real[$j]);
                if ((int)$is_following == -1) {
                    $forget += 1;
                    break;
                } else if (!$is_following) {
                    $not_follow += 1;
                    break;
                } else {

                }
            }
        }
        if ($forget > 2) {
            echo "Full blown AIDS";
        } else if ($not_follow < 3) {
            echo "Virus has been suppressed";
        } else if ($not_follow >= 3) {
            echo "Resistance occurs";
        } else {
            echo "Invalid result";
        }
    }

    function is_following_schedule($time_plan, $time_real) {
        if (is_null($time_real)) {
            return -1;
        }
        $time_real = strtotime($time_real);
        $hour_plan = $time_plan;
        $hour_real = intval(date("H", $time_real));

        // difference is +- 2 hours
        if ($hour_plan >= 0 && $hour_plan <=1) {
            return ($hour_real >= $hour_plan + 22 && $hour_real <= 23) ||($hour_real >= 0 && $hour_real <= 2);
        } else if ($hour_plan == 2){
            return ($hour_real >= 0 && $hour_real <= 2);
        } else if ($hour_plan >= 22 && $hour_plan < 23) {
            return ($hour_real >= $hour_plan - 2 && $hour_real <= 23) || ($hour_real >= 0 && $hour_real <= $hour_plan - 22);
        } else {
            return ($hour_real >= $hour_plan - 2 && $hour_real <= $hour_plan + 2);
        }
    }
?>