$(function() {
	$('.btn-signin').click(function() {
		signin();
	})
});

function signin() {
	var id = $('#signin-user-id').val();
	var password = $('#signin-user-password').val();
	console.log(password);
	if (is_valid_password(id, password)) {
		console.log('valid');
		$('#warning-msg').html('');
		signin_and_redirect_user(id);
	} else {
		console.log('Invalid');
		$('#warning-msg').html('Invalid User Name or Password');
		$('#warning-msg').css('color', 'red');
	}
}

function is_valid_password(id, password) {
	var res;
	$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/account_manager.php",
    	data    : {command : 'is_valid_password',
    			   		 id: id,
    			  password : password},
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

function signin_and_redirect_user(id) {
	$.ajax({
		async	: false,
		type	:'POST', 
    	url		: "/pharmacy/project1/php/model/account_manager.php",
    	data    : {command : 'signin',
    			   		 id: id},
    	success	: function(data) {
    		if (data == 1) {
    			window.location.href= '../../index.php';
    		} else {
    			$('#warning-msg').html('You have alerady logged in, please log out first.');
				$('#warning-msg').css('color', 'red');
    		}
		}
	});
}