$(function() {
	$('.btn-trash').click(function() {
		delete_user_exercise_record(this);
	})
});

function delete_user_exercise_record(btn) {
	var protocol = $(btn).attr('protocol');
	swal({   
	    title: "Delete Confirmation",   
	    text: "Are you sure you want to delete this record?",   
	    type: "warning",   
	    showCancelButton: true,   
	    confirmButtonColor: "#DD6B55",   
	    confirmButtonText: "Yes, I'm sure",   
	    cancelButtonText: "No, thanks",   
	    closeOnConfirm: false,   
	    closeOnCancel: false }, 
	    function(isConfirm){   
	    	if (isConfirm) { 
	    		$.ajax({
					async	: false,
					type	:'POST', 
			    	url		: "/pharmacy/project1/php/model/user_manager.php",
			    	data    : {command : 'delete_user_record',
			    				protocol : protocol},
			    	success	: function(data) {
			    		if (data == 1) {
			    			swal({   
		    				title: "Success!",   
		    				text: "Your record has been deleted.",
		    				type: "success",
		    				confirmButtonText: "OK",   
		    				closeOnConfirm: false }, 
		    				function(){
		    					window.location.href='/pharmacy/project1/php/view/user.php';
		    				});
			    		} else {
			    			swal("Oops...", 
				    			"There is something wrong in the database...", 
				    			"error"); 
			    		}
					}
				});
	    	} else {     
	    		swal("Cancelled", 
	    			"The action has been cancelled", 
	    			"error");   
	    	} 
	    });
}