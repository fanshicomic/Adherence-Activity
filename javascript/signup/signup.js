$(function() {
	$.getScript('/pharmacy/project1/javascript/signin/signin.js', function() {});
	$('.btn-signup').click(function() {
		signup();
	})
});

function signup() {
	var id = $('#signup-user-id').val();
	var password = $('#signup-user-password').val();
	var password_confirmation = $('#signup-user-password-confirmation').val();
	var user_existing = is_user_existing(id);
	var valid_user_id = is_valid_user_id(id);
	var valid_password = is_same_password(password, password_confirmation);
	if (!user_existing && valid_user_id && valid_password) {
		$('#warning-msg').html('');
		var success = create_user(id, password);
		if (success) {
			signin_and_redirect_user(id);
		}
	} else { 
		
	}
}


function is_user_existing(id) {
	var res;
	$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/account_manager.php",
    	data    : {command : 'is_user_existing',
    			   		 id: id},
    	success	: function(data) {
    		if (data == 1) {
    			$('#warning-msg').html('This username has been taken');
				$('#warning-msg').css('color', 'red');
    			res = true;
    		} else {
    			res = false;
    		}
		}
	});
	return res;
}

function is_valid_user_id(id) {
	if (id == "") {
		$('#warning-msg').html('Invalid User Name');
		$('#warning-msg').css('color', 'red');	
		return false;
	} else {
		return true;
	}
}

function is_same_password(password, password_confirmation) {
	if (password != "") {
		if (password == password_confirmation)
			return true;
		else {
			$('#warning-msg').html('Passwords should be the same');
			$('#warning-msg').css('color', 'red');	
			return false;
		}
	} else {
		$('#warning-msg').html('Passwords should not be empty');
		$('#warning-msg').css('color', 'red');
	}
}

function create_user(id, password) {
	var res;
	$.ajax({
        async   : false,
        type    :'POST', 
        url     : "/pharmacy/project1/php/model/account_manager.php",
        data    : {command	: 'create_user',
            			id 	: id,
            	   password : password },
        success : function (data) {
            if (data == 1) {
    			res = true;
    		} else {
    			res = false;
    		}
        }
    });
    return res;
}