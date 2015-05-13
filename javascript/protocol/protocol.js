$(function() {
	$('.btn-new-exercise').click(function() {
		new_exercise();
	});

	$('.btn-continue-exercise').click(function() {
		continue_exercise();
	});

	$('.td-clickable').html('<i class="fa fa-check fa-2x hour-check transparent"></i>');
});

function new_exercise() {
	var res;
	$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/protocol_manager.php",
    	data    : {command : 'new_exercise'},
    	success	: function(data) {
    		if (data == 1) {
    			res = true;
    		} else {
    			res = false;
    		}
		}
	});
	if (res) {
		var new_buttons = '<div class="col-lg-4 col-lg-offset-2">';
    	new_buttons += '<a href="#" class="btn btn-default btn-lg btn-cancel-exercise">Cancel</a></div>';
    	new_buttons += '<div class="col-lg-4">';
    	new_buttons += '<a href="#" class="btn btn-primary btn-lg btn-plan-exercise">Plan Schedule</a>';
		$('.exercise-button-row').html(new_buttons);
		$('.btn-cancel-exercise').click(function() {
			cancel_plan_exercise();
		});
		prepare_plan_table();
	} else {
		window.location.href='signin.php';
	}
}

function prepare_plan_table() {
	$('.td-clickable').html('<i class="fa fa-check fa-2x hour-check off"></i>');
	$('.hour-check').click(function() {
		toggle_check(this);
	});
}

function cancel_plan_exercise() {
	var new_buttons = '<div class="col-lg-4 col-lg-offset-2">';
    	new_buttons += '<a href="#" class="btn btn-primary btn-lg btn-new-exercise">New Exercise</a></div>';
    	new_buttons += '<div class="col-lg-4">';
    	new_buttons += '<a href="#" class="btn btn-default btn-lg btn-continue-exercise">Continue Exercise</a>';
    	new_buttons += '<label>Already take this exercise?</label>';
		$('.exercise-button-row').html(new_buttons);
		$('.btn-new-exercise').click(function() {
			new_exercise();
		});
		$('.td-clickable').html('<i class="fa fa-check fa-2x hour-check transparent"></i>');
}

function toggle_check(check) {
	if ($(check).hasClass('off')) {
		$(check).removeClass('off');
		$(check).addClass('on');
	} else {
		$(check).removeClass('on');
		$(check).addClass('off');
	}
}