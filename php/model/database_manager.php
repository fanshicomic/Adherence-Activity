<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/connection.php');

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
        $query = "SELECT * FROM PROTOCOL_". $protocol ." WHERE UID = '$uid'";
        $data = fetch_data($query);
        return $data["P". $protocol . "ID"];
    }
    //---------------------------------EXERCISE----------------------------------
    function is_checked($exercise, $day) {
        $query = "SELECT DATE FROM PROTOCOL_INSTANCE_$exercise WHERE DAY = $day";
        $res = fetch_data($query);
        $date = $res['DATE'];
        return $date !== NULL;
    }

    function get_date($exercise, $day) {
        $query = "SELECT DATE FROM PROTOCOL_INSTANCE_$exercise WHERE DAY = $day";
        $res = fetch_data($query);
        $date = $res['DATE'];
        return $date;
    }

    function is_day_updated($exercise, $day) {
        $date = get_date($exercise, $day);
        return $date !== NULL;
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
?>