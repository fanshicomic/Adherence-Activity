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
    //------------------------------protocol-------------------------------------- 

    function add_protocol_1($truvada, $reyataz, $norvir) {
        $p1_id = uniqid();
        $uid = get_user_id($_SESSION['uid']);
        $date = date("Y-m-d");
        $query_protocol_1 = "INSERT INTO PROTOCOL_1 (P1ID, UID, TRUVADA_1, REYATAZ_1, NORVIR_1) VALUES ('$p1_id', '$uid', '$truvada', '$reyataz', '$norvir')";
        $query_protocol_inst_1 = "INSERT INTO PROTOCOL_INSTANCE_1 (P1ID, DAY) VALUES ('$p1_id', '$date')";
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
        $date = date("Y-m-d");
        $query_protocol_2 = "INSERT INTO PROTOCOL_2 (P2ID, UID, KALETRA_1, KALETRA_2, COMBIVIR_1, COMBIVIR_2, FUZEON_1, FUZEON_2) VALUES ('$p2_id', '$uid', '$kaletra_1', '$kaletra_2', '$combivir_1', '$combivir_2', '$fuzeon_1', '$fuzeon_2')";
        $query_protocol_inst_2 = "INSERT INTO PROTOCOL_INSTANCE_2 (P2ID, DAY) VALUES ('$p2_id', '$date')";
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
        $date = date("Y-m-d");
        $query_protocol_3 = "INSERT INTO PROTOCOL_3 (P3ID, UID, ATRIPLA_1) VALUES ('$p3_id', '$uid', '$atripla')";
        $query_protocol_inst_3 = "INSERT INTO PROTOCOL_INSTANCE_3 (P3ID, DAY) VALUES ('$p3_id', '$date')";
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

?>