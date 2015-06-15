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
	var e = $('#schedule-table').attr('exercise');
	change_day_attr(e, get_day(e));
});

function get_day(exercise) {
	var res;
	$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {	command : 'get_day',
	    				exercise: exercise},
	    	success	: function(data) {
	    		res = data;
			}
		});
	return res;
}

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
	var drug = $(btn).attr('drug');
	var index = $(btn).attr('index');
	// if (is_drug_number_correct(exercise)) {
	// 	swal({   
	// 	    title: "Update Confirmation",   
	// 	    text: "Are you sure you want update day "+ day +" 's table?",   
	// 	    type: "warning",   
	// 	    showCancelButton: true,   
	// 	    confirmButtonColor: "#DD6B55",   
	// 	    confirmButtonText: "Yes",   
	// 	    cancelButtonText: "No",   
	// 	    closeOnConfirm: false,   
	// 	    closeOnCancel: false 
	// 	}, function(isConfirm){   
	//     	if (isConfirm) {     
	//     		save_exercise(exercise, day);		 
	//     	} else {     
	//     		swal("Cancelled", 
	//     			"The action has been cancelled", 
	//     			"error");   
	//     	} 
	//     });
	// } else {

	// }
	save_exercise(exercise, day, drug, index);
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

function save_exercise(exercise, day, drug, index) {
	// if (exercise == '1') {	
	// 	var truvada = get_drug_taken_hour('truvada', 0); 
	// 	var reyataz = get_drug_taken_hour('reyataz', 0);
	// 	var norvir = get_drug_taken_hour('norvir', 0);
	// 	$.ajax({
	// 		async	: false,
	// 		type	:'POST', 
	//     	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	//     	data    : {	command : 'save_exercise',
	//     				exercise: exercise,
	//     					day	: day,
	//     			   	truvada : truvada,
	//     			   	reyataz : reyataz,
	//     			   	 norvir : norvir},
	//     	success	: function(data) {
	//     		if (data == 1) {
	//     			swal("Success!", "Your table has been saved!", "success");
	//     		} else {
	//     			sweetAlert("Oops...", "Something in database went wrong!", "error");
	//     		}
	// 		}
	// 	});
	// } else if (exercise == '2') {
	// 	var kaletra_1 = get_drug_taken_hour('kaletra', 0);
	// 	var kaletra_2 = get_drug_taken_hour('kaletra', 1);
	// 	var combivir_1 = get_drug_taken_hour('combivir', 0);
	// 	var combivir_2 = get_drug_taken_hour('combivir', 1);
	// 	var fuzeon_1 = get_drug_taken_hour('fuzeon', 0);
	// 	var fuzeon_2 = get_drug_taken_hour('fuzeon', 1);
	// 	$.ajax({
	// 		async	: false,
	// 		type	:'POST', 
	//     	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	//     	data    : {	command : 'save_exercise',
	//     				exercise: exercise,
	//     					day	: day,
	//     			   	kaletra_1 : kaletra_1,
	//     			   	kaletra_2 : kaletra_2,
	//     			   	combivir_1 : combivir_1,
	//     			   	combivir_2 : combivir_2,
	//     			   	fuzeon_1 : fuzeon_1,
	//     			   	fuzeon_2 : fuzeon_2},
	//     	success	: function(data) {
	//     		if (data == 1) {
	//     			swal("Success!", "Your table has been saved!", "success");
	//     		} else {
	//     			sweetAlert("Oops...", "Something in database went wrong!", "error");
	//     		}	
	// 		}
	// 	});
	// } else if (exercise == '3') {
	// 	var atripla = get_drug_taken_hour('atripla', 0);
	// 	$.ajax({
	// 		async	: false,
	// 		type	:'POST', 
	//     	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	//     	data    : {	command : 'save_exercise',
	//     				exercise: exercise,
	//     					day	: day,
	//     			   	atripla : atripla},
	//     	success	: function(data) {
	//     		if (data == 1) {
	//     			swal("Success!", "Your table has been saved!", "success");
	//     		} else {
	//     			console.log(data);
	//     			sweetAlert("Oops...", "Something in database went wrong!", "error");
	//     		}
	// 		}
	// 	});
	// } else {

	// }
	$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {	command : 'save_exercise',
	    				exercise: exercise,
	    					day	: day,
	    			   	   drug : drug,
	    			   	  index : index},
	    	success	: function(data) {
	    		if (data == 1) {
	    			swal({   
	    				title: "Success!",   
	    				text: "Your time has been saved!",   
	    				type: "success",   
	    				confirmButtonColor: "#DD6B55",   
	    				confirmButtonText: "OK",   
	    				closeOnConfirm: false }, 
	    				function(){
	    					window.location.href = '/pharmacy/project1/php/view/exercise_'+ exercise +'.php';
	    				});
	    		} else {
	    			console.log(data);
	    			sweetAlert("Oops...", "Something in database went wrong!", "error");
	    		}
			}
		});
}

function get_drug_taken_hour(drug, number) {
	if ($($('.' + drug + ' .on')[number]).parent().index() != -1) {
		return $('.hour').eq($($('.' + drug + ' .on')[number]).parent().index()).html();
	} else {
		return -1;
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
    		change_day_attr(exercise, day);
    		change_day_table();
    		// change_exercise_table();
    		change_drug_taken_hour(exercise);
    		change_update_button();
    		show_activity(exercise);
		}
	});
}

function change_day_attr(exercise, day) {
	$('.exercise-'+exercise+ '-body').attr('day', day);
	$('#schedule-table').attr('day', day);
}

function change_drug_taken_hour(exercise) {
	if (exercise == 1) {
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "TRUVADA",
    				 index : 1},
    	success	: function(data) {
    		$('.truvada-1').html(data);
		}
		});
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "REYATAZ",
    				 index : 1},
    	success	: function(data) {
    		$('.reyataz-1').html(data);
		}
		});
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "NORVIR",
    				 index : 1},
    	success	: function(data) {
    		$('.norvir-1').html(data);
		}
		});
	} else if (exercise == 2) {
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "KALETRA",
    				 index : 1},
    	success	: function(data) {
    		$('.kaletra-1').html(data);
		}
		});
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "COMBIVIR",
    				 index : 1},
    	success	: function(data) {
    		$('.combivir-1').html(data);
		}
		});
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "FUZEON",
    				 index : 1},
    	success	: function(data) {
    		$('.fuzeon-1').html(data);
		}
		});
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "KALETRA",
    				 index : 2},
    	success	: function(data) {
    		$('.kaletra-2').html(data);
		}
		});
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "COMBIVIR",
    				 index : 2},
    	success	: function(data) {
    		$('.combivir-2').html(data);
		}
		});
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "FUZEON",
    				 index : 2},
    	success	: function(data) {
    		$('.fuzeon-2').html(data);
		}
		});
	} else if (exercise == 3) {
		$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
    	data    : {command : 'get_drug_taken_time',
    			  exercise : exercise,
    				  drug : "ATRIPLA",
    				 index : 1},
    	success	: function(data) {
    		$('.atripla-1').html(data);
		}
		});
	}
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
	if (exercise == 1) {
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "TRUVADA",
	    				 index : 1},
	    	success	: function(data) {
	    		$('.truvada-update').html(data);
			}
		});
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "REYATAZ",
	    				 index : 1},
	    	success	: function(data) {
	    		$('.reyataz-update').html(data);
			}
		});
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "NORVIR",
	    				 index : 1},
	    	success	: function(data) {
	    		$('.norvir-update').html(data);
			}
		});
	} else if (exercise == 2) {
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "KALETRA",
	    				 index : 1},
	    	success	: function(data) {
	    		$('.kaletra-update-1').html(data);
			}
		});
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "COMBIVIR",
	    				 index : 1},
	    	success	: function(data) {
	    		$('.combivir-update-1').html(data);
			}
		});
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "FUZEON",
	    				 index : 1},
	    	success	: function(data) {
	    		$('.fuzeon-update-1').html(data);
			}
		});
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "KALETRA",
	    				 index : 2},
	    	success	: function(data) {
	    		$('.kaletra-update-2').html(data);
			}
		});
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "COMBIVIR",
	    				 index : 2},
	    	success	: function(data) {
	    		$('.combivir-update-2').html(data);
			}
		});
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "FUZEON",
	    				 index : 2},
	    	success	: function(data) {
	    		$('.fuzeon-update-2').html(data);
			}
		});
	} else if (exercise == 3) {
		$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'change_update_button',
	    			  exercise : exercise,
	    				  drug : "ATRIPLA",
	    				 index : 1},
	    	success	: function(data) {
	    		$('.atripla-update').html(data);
			}
		});
	} else {

	}
	$('.btn-update-exercise').click(function() {
		update_exercise(this);
	});
}

function show_activity(exercise) {
	var day = get_day(exercise);
	$(".activity").hide();
	$("#activity-"+day).show();
}

function get_result(exercise) {
	var res;
	$.ajax({
			async	: false,
			type	:'POST', 
	    	url		: "/pharmacy/project1/php/model/exercise_manager.php",
	    	data    : {command : 'get_exercise_result',
	    			  exercise : exercise},
	    	success	: function(data) {
	    		res = data;
			}
		});
	return res;
}

function show_result(exercise) {
	var res = get_result(exercise);
	if (res == "Virus has been suppressed") {
		swal({title: "Congratulation!", text: res, imageUrl: "/pharmacy/project1/img/heart-icon.png"});
	} else if (res == "Resistance occurs") {
		swal({title: "Your Result", text: res, imageUrl: "/pharmacy/project1/img/bacteria-icon.png"});
	} else if (res == "Full blown AIDS") {
		swal({title: "Your Result", text: res, imageUrl: "/pharmacy/project1/img/bacteria-icon.png"});
	} else {
		sweetAlert("Error", res, "error");
	}
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