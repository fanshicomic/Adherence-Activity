<?php
    require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/exercise_view_controller.php');
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/model/database_manager.php');
	function show_exercise_day($protocol) {
		$exist = exist_protocol($protocol);
		if (!$exist) {
			$href='/pharmacy/project1/php/view/protocol_'.$protocol.'.php';
			echo '<a href="'.$href.'"><h4>Start exercise</h4></a>';
		} else {
			$day = get_current_day($protocol);
			echo '<h4> You are now in Day ' . $day .'</h4>';
		}
	}

	function show_trash_button($protocol) {
		$exist = exist_protocol($protocol);
		if (!$exist) {
			
		} else {
			echo '<i class="fa fa-trash-o fa-2x btn-trash" protocol="'.$protocol.'"></i>';
		}
	}
?>