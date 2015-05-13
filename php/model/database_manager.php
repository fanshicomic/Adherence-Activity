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


?>