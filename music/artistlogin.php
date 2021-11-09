<?php session_start(); ob_start(); ob_clean(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/paymentfont.min.css">
	<link rel="stylesheet" href="assets/css/slider-radio.css">
	<link rel="stylesheet" href="assets/css/plyr.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/gideoncustom.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<script src="https://kit.fontawesome.com/0e50f4d65b.js" crossorigin="anonymous"></script>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Thomas Gideon">
	<title>Artist Sign In</title>

</head>
<body>
	<!-- header -->
	<?php include('head.php'); ?>
	<!-- end header -->

	<!-- sidebar -->
	<?php include('sidebar.php') ?>
	<!-- end sidebar -->

	<!-- player -->
	<?php include('player.php') ?>
	<!-- end player -->

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row row--grid">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="#">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Artist Sign In</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- registration form -->
				<div class="col-12">
					<div class="sign">
						<div class="sign__content">
							<form class="sign__form" autocomplete="off">
								<a href="index-2.html" class="sign__logo">
									<img src="assets/icon/logo.png" alt="" style=" width: 200px">
								</a>

								<div id="alert" class=""></div>

								<div class="sign__group">
									<input type="email" class="sign__input form-control" id="email" name="email" placeholder="Email">
									<i id="danger1" style="color: red"></i>
								</div>


								<div class="sign__group">
									<input type="password" class="sign__input form-control" id="password" placeholder="Password">
								</div>
								
								<button class="sign__btn" type="submit" id="login" >Sign In</button>


								<span class="sign__text">Don't have an account? <a href="artistsignup.php">Sign up!</a></span>

								<span class="sign__text"><a href="forgot.php">Forgot password?</a></span>
							</form>
						</div>
					</div>
				</div>
				<!-- end registration form -->
			</div>
		</div>
	</main>
	<!-- end main content -->

	<!-- footer -->
	<?php include('foot.php') ?>
	<!-- end footer -->

	<!-- JS -->
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/smooth-scrollbar.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/slider-radio.js"></script>
	<script src="assets/js/jquery.inputmask.min.js"></script>
	<script src="assets/js/plyr.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/login.js"></script>
	<script type="text/javascript">
		$(function () {

			const alert = document.getElementById('alert');

			//validating email on key up
	        $('#email').on('keyup', function () {
	        	let emailId = document.getElementById('email');
	            let email = $('#email').val();
	            if(email == '' || email.length < 5){
	                // $('#login_email').attr('class', 'form-control ');
	                emailId.classList.add('is-invalid')
	            }else{
	                emailId.classList.remove('is-invalid')
	                $.ajax({
	                    method: 'get',
	                    url: 'api.php?emailChecker='+email,

	                }).done( function (res) {
	                    res = JSON.parse(res);
	                    if(res.status == 5){
	                        document.getElementById('danger1').innerHTML = 'Invalid Email Address';
	                        $('#login').attr('disabled', 'disabled');
	                    }else{
	                        document.getElementById('danger1').innerHTML = '';
	                        $('#login').removeAttr('disabled');
	                    }
	                })
	            }
	        });



	        //validating login form input on submit
			$('#login').on('click', function (e) {
			    e.preventDefault();
			    const email = $('#email').val();
			    const password = $('#password').val();
			    
			    console.log('seen')
			    
			    if(email == '' || password == ''){
			        alert.setAttribute('class', 'alert bg-danger text-white');
			        alert.innerHTML = 'Email cannot be empty'
			    }else{
			        alert.removeAttribute('class', 'alert bg-danger');
			        alert.innerHTML = ''
			        data = {
			            email : email,
			            password : password,
			        };

			        $.ajax({
			            method: 'get',
			            url: 'api.php?userLogin=' + JSON.stringify(data),
			            beforeSend: () => {
			                $('#login').html(`Processing....`)
			                $('#login').attr('disabled', 'disabled');
			            }
			        }).done( function (res) {
			        	
			            res = JSON.parse(res);
			            console.log(res);
			            if(res.success){
			                
			                alert.setAttribute('class', 'alert bg-success text-white');
			                alert.innerHTML = res.message
			                setTimeout(function () {
			                	window.location.href = 'profile.php'
			                }, 3000);

			            }else{
			                alert.setAttribute('class', 'alert bg-danger text-white');
			                alert.innerHTML = res.message
			            }
			            $('#login').html(`Sign In`)
			            $('#login').removeAttr('disabled');
			        });
			    }        
			})



		})
	</script>
</body>

</html>