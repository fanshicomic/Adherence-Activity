$(function() {

	$('.btn-new-exercise').click(function() {
		new_exercise(this);
	});
	$('.btn-continue-exercise').click(function() {
		continue_exercise();
	});
	$('.btn-cancel-exercise').click(function() {
		cancel_plan_exercise();
	});
	$('.btn-plan-exercise').click(function() {
		plan_exercise(this);
	});

	$('.td-clickable').html('<i class="fa fa-check fa-2x hour-check transparent"></i>');
});

function new_exercise(btn) {
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
		var protocol = $(btn).attr('protocol');
		var new_buttons = '<div class="col-lg-4 col-lg-offset-2">';
    	new_buttons += '<a href="#" class="btn btn-default btn-lg btn-cancel-exercise">Cancel</a></div>';
    	new_buttons += '<div class="col-lg-4">';
    	new_buttons += '<a href="#" class="btn btn-primary btn-lg btn-plan-exercise" protocol="'+ protocol + '">Plan Schedule And Start</a>';
		$('.exercise-button-row').html(new_buttons);
		$('h4').append(' click the check to mark the time of the day you plan to take your “medicine.”');
		register_button_event();
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
	register_button_event();
	$('h4').html('Instruction:');
	$('.td-clickable').html('<i class="fa fa-check fa-2x hour-check transparent"></i>');
	$('.warning-msg').removeClass('warning');
	$('.warning-msg').addClass('transparent');
}

function toggle_check(check) {
	if ($(check).hasClass('off')) {
		$(check).removeClass('off');
		$(check).addClass('on');
	} else if ($(check).hasClass('on')) {
		$(check).removeClass('on');
		$(check).addClass('off');
	}
}

function plan_exercise(btn) {
	var protocol = $(btn).attr('protocol');
	if (is_drug_number_correct(protocol) && is_adherence_requirement_valid(protocol)) {
		$('.warning-msg').removeClass('warning');
		$('.warning-msg').addClass('transparent');
		save_schedule(protocol);
	} else {
		$('.warning-msg').removeClass('transparent');
		$('.warning-msg').addClass('warning');
	}
}

function is_drug_number_correct(protocol) {
	if (protocol == '1') {
		var truvada = $('.truvada .on').length;
		var reyataz = $('.reyataz .on').length;
		var norvir = $('.norvir .on').length;
		return truvada == 1 && reyataz == 1 && norvir == 1;
	} else if (protocol == '2') {
		var kaletra = $('.kaletra .on').length;
		var combivir = $('.combivir .on').length;
		var fuzeon = $('.fuzeon .on').length;
		return kaletra == 2 && combivir == 2 && fuzeon == 2;
	} else if (protocol == '3') {
		var atripla = $('.atripla .on').length;
		return atripla == 1;
	} else {

	}
}

function is_adherence_requirement_valid(protocol) {
	if (protocol == '1') {
		var reyataz = $('.hour').eq($('.reyataz .on').parent().index()).html();
		var norvir = $('.hour').eq($('.norvir .on').parent().index()).html();
		return reyataz == norvir;
	} else if (protocol == '2') {
		var kaletra_1 = $('.hour').eq($($('.kaletra .on')[0]).parent().index()).html();
		var kaletra_2 = $('.hour').eq($($('.kaletra .on')[1]).parent().index()).html();
		var combivir_1 = $('.hour').eq($($('.combivir .on')[0]).parent().index()).html();
		var combivir_2 = $('.hour').eq($($('.combivir .on')[1]).parent().index()).html();
		var fuzeon_1 = $('.hour').eq($($('.fuzeon .on')[0]).parent().index()).html();
		var fuzeon_2 = $('.hour').eq($($('.fuzeon .on')[1]).parent().index()).html();
		return kaletra_1 == kaletra_2 && combivir_1 == combivir_2 && fuzeon_1 == fuzeon_2;
	} else if (protocol == '3') {
		return true;
	} else {

	}
}

function save_schedule(protocol) {
	if (protocol == '1') {
		var truvada = $('.hour').eq($('.truvada .on').parent().index()).html();
		var reyataz = $('.hour').eq($('.reyataz .on').parent().index()).html();
		var norvir = $('.hour').eq($('.norvir .on').parent().index()).html();
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/protocol_manager.php",
	    	data    : {	command : 'save_schedule',
	    				protocol: protocol,
	    			   	truvada : truvada,
	    			   	reyataz : reyataz,
	    			   	 norvir : norvir},
	    	success	: function(data) {
	    		if (data == 1) {
	    			swal("Success!", "Your schedule for this protocol has been saved!", "success")
	    		} else {
	    			sweetAlert("Oops...", "You have already taken this exercise!", "error");
	    		}
			}
		});
	} else if (protocol == '2') {
		var kaletra_1 = $('.hour').eq($($('.kaletra .on')[0]).parent().index()).html();
		var kaletra_2 = $('.hour').eq($($('.kaletra .on')[1]).parent().index()).html();
		var combivir_1 = $('.hour').eq($($('.combivir .on')[0]).parent().index()).html();
		var combivir_2 = $('.hour').eq($($('.combivir .on')[1]).parent().index()).html();
		var fuzeon_1 = $('.hour').eq($($('.fuzeon .on')[0]).parent().index()).html();
		var fuzeon_2 = $('.hour').eq($($('.fuzeon .on')[1]).parent().index()).html();
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/protocol_manager.php",
	    	data    : {	command : 'save_schedule',
	    				protocol: protocol,
	    			   	kaletra_1 : kaletra_1,
	    			   	kaletra_2 : kaletra_2,
	    			   	combivir_1 : combivir_1,
	    			   	combivir_2 : combivir_2,
	    			   	fuzeon_1 : fuzeon_1,
	    			   	fuzeon_2 : fuzeon_2},
	    	success	: function(data) {
	    		if (data == 1) {
	    			
	    		} else {
	    			
	    		}
			}
		});
	} else if (protocol == '3') {
		var atripla = $('.hour').eq($('.atripla .on').parent().index()).html();
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/protocol_manager.php",
	    	data    : {	command : 'save_schedule',
	    				protocol: protocol,
	    			   	atripla : atripla},
	    	success	: function(data) {
	    		if (data == 1) {
	    			
	    		} else {
	    			
	    		}
			}
		});
	} else {

	}
}

function register_button_event() {
	$('.btn-new-exercise').click(function() {
		new_exercise(this);
	});
	$('.btn-continue-exercise').click(function() {
		continue_exercise();
	});
	$('.btn-cancel-exercise').click(function() {
		cancel_plan_exercise();
	});
	$('.btn-plan-exercise').click(function() {
		plan_exercise(this);
	});
}