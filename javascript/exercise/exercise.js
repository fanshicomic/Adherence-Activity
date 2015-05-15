$(function() {
	$('.td-clickable').html('<i class="fa fa-check fa-2x hour-check off"></i>');
	$('.td-clickable.hour-mark').html('<i class="fa fa-check fa-2x hour-check off"></i>');
	$('.td-non-clickable').html('<i class="fa fa-check fa-2x transparent"></i>');
	$('.td-non-clickable.hour-mark').html('<i class="fa fa-check fa-2x"></i>');
	$('.hour-check').click(function() {
		toggle_check(this);
	});
	$('.btn-update-exercise').click(function() {
		update_exercise(this);
	});
	$('.td-day').click(function() {
		change_day(this);
	});
});

function toggle_check(check) {
	if ($(check).hasClass('off')) {
		$(check).removeClass('off');
		$(check).addClass('on');
	} else if ($(check).hasClass('on')) {
		$(check).removeClass('on');
		$(check).addClass('off');
	} else {

	}
}

function update_exercise(btn) {
	var exercise = $(btn).attr('exercise');
	var day = $(btn).attr('day');
	if (is_drug_number_correct(exercise)) {
		swal({   
		    title: "Update Confirmation",   
		    text: "Are you sure you want update day "+ day +" 's table?",   
		    type: "warning",   
		    showCancelButton: true,   
		    confirmButtonColor: "#DD6B55",   
		    confirmButtonText: "Yes",   
		    cancelButtonText: "No",   
		    closeOnConfirm: false,   
		    closeOnCancel: false 
		}, function(isConfirm){   
	    	if (isConfirm) {     
	    		save_exercise(exercise, day);		 
	    	} else {     
	    		swal("Cancelled", 
	    			"The action has been cancelled", 
	    			"error");   
	    	} 
	    });
	} else {

	}
}

function is_drug_number_correct(exercise) {
	if (exercise == '1') {
		var truvada = $('.truvada .on').length;
		var reyataz = $('.reyataz .on').length;
		var norvir = $('.norvir .on').length;
		return truvada <= 1 && reyataz <= 1 && norvir <= 1;
	} else if (exercise == '2') {
		var kaletra = $('.kaletra .on').length;
		var combivir = $('.combivir .on').length;
		var fuzeon = $('.fuzeon .on').length;
		return kaletra <= 2 && combivir <= 2 && fuzeon <= 2;
	} else if (exercise == '3') {
		var atripla = $('.atripla .on').length;
		return atripla <= 1;
	} else {

	}
}

function save_exercise(exercise, day) {
	if (exercise == '1') {	
		var truvada = get_drug_taken_hour('truvada', 0); 
		var reyataz = get_drug_taken_hour('reyataz', 0);
		var norvir = get_drug_taken_hour('norvir', 0);
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {	command : 'save_exercise',
	    				exercise: exercise,
	    					day	: day,
	    			   	truvada : truvada,
	    			   	reyataz : reyataz,
	    			   	 norvir : norvir},
	    	success	: function(data) {
	    		if (data == 1) {
	    			swal("Success!", "Your table has been saved!", "success");
	    		} else {
	    			console.log(data);
	    			sweetAlert("Oops...", "Something in database went wrong!", "error");
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
	    			// swal("Success!", "Your schedule for this protocol has been saved!", "success");
	    			swal({   
	    				title: "Success!",   
	    				text: "Your schedule for this protocol has been saved!",   
	    				type: "success",   
	    				confirmButtonColor: "#DD6B55",   
	    				confirmButtonText: "OK",   
	    				closeOnConfirm: false }, 
	    				function(){
	    					window.location.href = '/pharmacy/project1/php/view/exercise_2.php';
	    				});
	    		} else {
	    			swal({   
	    				title: "Oops...",   
	    				text: "You have already taken this exercise, would you like to continue?",   
	    				type: "warning",   
	    				showCancelButton: true,   
	    				confirmButtonColor: "#DD6B55",   
	    				confirmButtonText: "Bring me to my exercise",   
	    				cancelButtonText: "No, thanks",   
	    				closeOnConfirm: false,   
	    				closeOnCancel: false }, 
	    				function(isConfirm){   
	    					if (isConfirm) {     
	    						 
	    					} else {     
	    						swal("Cancelled", 
	    							"The action has been cancelled", 
	    						"error");   
	    					} 
	    				});
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
	    			// swal("Success!", "Your schedule for this protocol has been saved!", "success");
	    			swal({   
	    				title: "Success!",   
	    				text: "Your schedule for this protocol has been saved!",   
	    				type: "success",   
	    				confirmButtonColor: "#DD6B55",   
	    				confirmButtonText: "OK",   
	    				closeOnConfirm: false }, 
	    				function(){
	    					window.location.href = '/pharmacy/project1/php/view/exercise_3.php';
	    				});
	    		} else {
	    			swal({   
	    				title: "Oops...",   
	    				text: "You have already taken this exercise, would you like to continue?",   
	    				type: "warning",   
	    				showCancelButton: true,   
	    				confirmButtonColor: "#DD6B55",   
	    				confirmButtonText: "Bring me to my exercise",   
	    				cancelButtonText: "No, thanks",   
	    				closeOnConfirm: false,   
	    				closeOnCancel: false }, 
	    				function(isConfirm){   
	    					if (isConfirm) {     
	    						 
	    					} else {     
	    						swal("Cancelled", 
	    							"The action has been cancelled", 
	    						"error");   
	    					} 
	    				});
	    		}
			}
		});
	} else {

	}
}

function get_drug_taken_hour(drug, number) {
	if ($($('.' + drug + ' .on')[number]).parent().index() != -1) {
		return $('.hour').eq($($('.' + drug + ' .on')[number]).parent().index()).html();
	} else {
		return null;
	}
}

function change_day(btn) {
	var exercise = $('.day-table').attr('exercise');
	var day = $(btn).attr('day');
	$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'change_day',
    			  exercise : exercise,
    				   day : day},
    	success	: function(data) {
    		change_day_attr(day);
    		change_day_table();
    		change_exercise_table();
    		change_update_button();
		}
	});
}

function change_day_attr(day) {
	$('.exercise-1-body').attr('day', day);
	$('#schedule-table').attr('day', day);
}

function change_day_table() {
	var exercise = $('.day-table').attr('exercise');
	$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'change_day_table',
    			  exercise : exercise},
    	success	: function(data) {
    		$('.day-table-tbody').html(data);
    		$('.td-day').click(function() {
				change_day(this);
			});
		}
	});
}

function change_exercise_table() {
	var exercise = $('.day-table').attr('exercise');
	$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'change_exercise_table',
    			  exercise : exercise},
    	success	: function(data) {
    		$('.schedule-tbody').html(data);
    		$('.td-clickable').html('<i class="fa fa-check fa-2x hour-check off"></i>');
			$('.td-clickable.hour-mark').html('<i class="fa fa-check fa-2x hour-check off"></i>');
			$('.td-non-clickable').html('<i class="fa fa-check fa-2x transparent"></i>');
			$('.td-non-clickable.hour-mark').html('<i class="fa fa-check fa-2x"></i>');
			$('.hour-check').click(function() {
				toggle_check(this);
			});
		}
	});
}

function change_update_button() {
	var exercise = $('.day-table').attr('exercise');
	$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'change_update_button',
    			  exercise : exercise},
    	success	: function(data) {
    		$('.update-button').html(data);
    		$('.btn-update-exercise').click(function() {
				update_exercise(this);
			});
		}
	});
}

function register_button_event() {
	$('.hour-check').click(function() {
		toggle_check(this);
	});
	$('.btn-update-exercise').click(function() {
		update_exercise(this);
	});
	$('.td-day').click(function() {
		change_day(this);
	});
}