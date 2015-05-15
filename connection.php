<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/config.php');
	
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	$db = new mysqli(db_host, db_uid, db_pwd, db_name);
	if ($db->connect_errno) 
  	exit("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);	

  	function secureString($str) {
		global $db;
		$result = $db->escape_string($str);
		$result = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $result);
		return $result;
	}
?>