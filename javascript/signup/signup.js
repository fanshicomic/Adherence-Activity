$(function() {
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
	var valid_password = is_valid_password(password, password_confirmation);
	if (!user_existing && valid_user_id && valid_password) {
		$('#warning-msg').html('');
		var success = create_user(id, password);
	} else {
		$('#warning-msg').html('Invalid User Name or Password');
		$('#warning-msg').css('color', 'red');
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
		return false;
	} else {
		return true;
	}
}

function is_valid_password(password, password_confirmation) {
	if (password != "")
		return password == password_confirmation;
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