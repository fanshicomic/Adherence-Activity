$(function() {
	$('.btn-new-exercise').click(function() {
		new_exercise();
	});
	$('.btn-continue-exercise').click(function() {
		continue_exercise();
	});
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
    	new_buttons += '<a href="#" class="btn btn-default btn-lg btn-cancel-exercise p1">Cancel</a></div>';
    	new_buttons += '<div class="col-lg-4">';
    	new_buttons += '<a href="#" class="btn btn-primary btn-lg btn-plan-exercise p1">Plan Schedule</a>';
		$('.exercise-button-row').html(new_buttons);
	} else {
		window.location.href='signin.php';
	}
}