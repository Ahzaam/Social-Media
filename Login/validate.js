function load(){
	document.getElementById("butlogin").value = "Validating...";
	document.getElementById("butsave").value = "Requesting...";
}
function stopload(val){
	document.getElementById("butlogin").value = val;
	document.getElementById("butsave").value = val;
}

$(document).ready(function() {
	$("#register").hide();
	$('#login').on('click', function() {
		$("#login_form").show();
		$("#register_form").hide();

    $("#register").show();
    $("#login").hide();
	});
	$('#register').on('click', function() {
		$("#register_form").show();
		$("#login_form").hide();

    $("#login").show();
    $("#register").hide();
	});
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");

		// $("#load").removeClass('d-none');
		load();
		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var password2 = $('#password2').val();

		if(name!="" && email!=""  && password!="" ){
			if(password2 == password){
				$.ajax({
					url: "save.php",
					type: "POST",
					data: {
						type: 1,
						name: name,
						email: email,
						password: password
					},
					cache: false,
					success: function(dataResult){
						var dataResult = JSON.parse(dataResult);
	          console.log(dataResult);
	          console.log(dataResult.statusCode);
						if(dataResult.statusCode==200){
							// $("#load").addClass('d-none');
							stopload("Register");
							$("#butsave").removeAttr("disabled");
							$('#register_form').find('input:text').val('');
							$("#success").show();
							$('#success').html('Registration successful !\n Now you can Login with your email address and password');
							$("#login_form").show();
							$("#register_form").hide();

							$("#login").show();
					    $("#register").hide();
						}
						else if(dataResult.statusCode==201){
							// $("#load").addClass('d-none');
							stopload("Register");
							$("#error").show();
							$('#error').html('Email ID already exists !');
						}

					}
				});
			}else{
				stopload("Register");
				$("#error").show();
				$('#error').html('Password does not match');
			}
		}
		else{
			// $("#load").addClass('d-none');
			stopload("Register");
			alert('Please fill all the field !');
		}
	});
	$('#butlogin').on('click', function() {
		// $("#load").removeClass('d-none');
		load();
		console.log('loading');
		var email = $('#email_log').val();
		var password = $('#password_log').val();
		if(email!="" && password!="" ){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					type:2,
					email: email,
					password: password
				},
				cache: false,
				success: function(dataResult){
					console.log(dataResult);
					var dataResult = JSON.parse(dataResult);

					if(dataResult.statusCode==200){
						location.href = "../";
					}
					else if(dataResult.statusCode==201){
						stopload("Login");
						$("#load").addClass('d-none');
						$("#error").show();
						$('#error').html('Invalid EmailId or Password !');
					}

				}
			});
		}
		else{
			stopload("Login");
			alert('Please fill all the field !');
			$("#load").addClass('d-none');
		}
	});
});
