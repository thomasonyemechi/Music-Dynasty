$(function () {


	
	//validating login form input on submit
	$('#logger_login_user').on('click', function (e) {
	    e.preventDefault();
	    const alert = document.getElementById('logger_alert');
	    const email = $('#logger_email').val();
	    const password = $('#logger_password').val();
	    
	    if(email == '' || password == ''){
	    	$('#alert').fadeIn()
	        alert.setAttribute('class', 'alert bg-danger text-white');
	        alert.innerHTML = 'Email cannot be empty'
	        setTimeout( function () {
	        	$('#alert').fadeOut();
	        }, 2000)
	    }else{
	        alert.removeAttribute('class', 'alert bg-danger');
	        alert.innerHTML = ''
	        data = {
	            email : email,
	            password : password,
	        };

	        $.ajax({
	            method: 'get',
	            url: 'api.php?LoginUsersApiViaMusic=' + JSON.stringify(data),
	            beforeSend: () => {
	                $('#logger_login_user').html(`Processing....`)
	                $('#logger_login_user').attr('disabled', 'disabled');
	            }
	        }).done( function (res) {

	        	console.log(res);
	        	
	            res = JSON.parse(res);
	            if(res.success){
	                
	                alert.setAttribute('class', 'alert bg-success text-white');
	                alert.innerHTML = res.message
	                setTimeout(function () {
	                	window.location.reload();
	                }, 3000);

	            }else{
	                $('#logger_alert').fadeIn()
			        alert.setAttribute('class', 'alert bg-danger text-white');
			        alert.innerHTML = res.message
			        setTimeout( function () {
			        	$('#logger_alert').fadeOut();
			        }, 2000)
	            }
	            $('#logger_login_user').html(`Sign In`)
	            $('#logger_login_user').removeAttr('disabled');
	        });
	    }        
	})



	//regex for email validation
	function validateEmail(email) {
	  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}



	//validating login form input on submit
	$('#signer_user').on('click', function (e) {
	    e.preventDefault();
	    const alert = document.getElementById('signer_alert');
	    const email = $('#signer_email').val();
	    const password = $('#signer_password').val();
	    const firstname = $('#signer_firstname').val();
	    const lastname = $('#signer_lastname').val();
	    const phone = $('#signer_phone').val();
	    
	    if(email == '' || password == '' || lastname == '' || firstname == '' || phone == ''){
	    	$('#signer_alert').fadeIn()
	        alert.setAttribute('class', 'alert bg-danger text-white');
	        alert.innerHTML = 'All fields are required'
	        setTimeout( function () {
	        	$('#signer_alert').fadeOut();
	        }, 2000)
	    }else{
	    	if(validateEmail(email)){
		        alert.removeAttribute('class', 'alert bg-danger');
		        alert.innerHTML = ''
		        data = {
		            email : email,
		            password : password,
		            firstname : lastname,
		            lastname : firstname,
		            phone : phone,
		        };

		        $.ajax({
	            method: 'get',
	            url: 'api.php?SignupUsersApiViaMusic='+JSON.stringify(data),
		            // beforeSend: () => {
		            //     $('#signer_user').html(`Processing....`)
		            //     $('#signer_user').attr('disabled', 'disabled');
		            // }
		        }).done( function (res) {
		        	console.log(res);
		            res = JSON.parse(res);
		            if(res.success){
		            	$('#signer_alert').fadeIn()
		                alert.setAttribute('class', 'alert bg-success text-white');
		                alert.innerHTML = res.message+ ' Redirecting'
		                setTimeout(function () {
		                	window.location.reload();
		                }, 3000);
		            }else{
		                $('#logger_alert').fadeIn()
				        alert.setAttribute('class', 'alert bg-danger text-white');
				        alert.innerHTML = res.message
				        setTimeout( function () {
				        	$('#logger_alert').fadeOut();
				        }, 2000)
		            }
		            // $('#signer_user').html(`Sign Up`)
		            // $('#signer_user').removeAttr('disabled');
		        });
		    }else {
		    	$('#signer_alert').fadeIn()
		        alert.setAttribute('class', 'alert bg-danger text-white');
		        alert.innerHTML = 'Enter a valid email address'
		        setTimeout( function () {
		        	$('#signer_alert').fadeOut();
		        }, 2000)
		    }
	    }        
	})


////used in modal toggles

	$('.loginSignup').on('click', function () {
	    $('#logger_login_modal').modal('hide')
	    $('#signer_modal').modal('show')
	})

	$('.signupLogin').on('click', function () {
		$('#signer_modal').modal('hide')
	    $('#logger_login_modal').modal('show')
	    
	})



	$('.logmein').on('click', function () {
	    $('#logger_login_modal').modal('show')
	})

	$('.signmein').on('click', function () {
	    $('#signer_modal').modal('show')
	})






})