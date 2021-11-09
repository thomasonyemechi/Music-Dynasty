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
	<title>Artist SignUp</title>

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
						<li class="breadcrumb__item breadcrumb__item--active">Artist Sign up</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- registration form -->
				<div class="col-12">
					<div class="sign">
						<div class="sign__content">
							<form method="post" class="sign__form" autocomplete="off" autofill="off">
								<a href="#" class="sign__logo">
									<img src="assets/icon/logo.png" alt="" style=" width: 200px">
								</a>

								<div class="sign__group">
									<input type="text" class="sign__input" placeholder="Name" name="name">
								</div>

								<div class="sign__group">
									<input type="text" class="sign__input" placeholder="Stage Name" name="stagename">
								</div>

								<div class="sign__group"> 
									<input type="text" id="phone" class="sign__input" placeholder="Phone" name="phone">
									<i id="danger2" style="color: red"></i>
								</div>


								<div class="sign__group">
									<input type="email" id="email" class="sign__input" placeholder="Email" name="email">
									<i id="danger1" style="color: red"></i>
								</div>

								<div class="sign__group">
									<input type="password" class="sign__input" placeholder="Password" name="password">
								</div>

								<div class="sign__group sign__group--checkbox">
									<input id="remember" name="remember" type="checkbox" checked="checked">
									<label for="remember">I agree to the <a href="terms.php" target="_blank">Terms And Condition</a></label>
								</div>
								
								<button class="sign__btn" id="signup" type="submit" name="signUpArtistApplication">Sign up</button>

								<span class="sign__delimiter">or</span>

								<span class="sign__text">Already have an account? <a href="artistlogin.php">Sign in!</a></span>
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
	                emailId.classList.add('is-invalid')
	            }else{
	                emailId.classList.remove('is-invalid')
	                $.ajax({
	                    method: 'get',
	                    url: 'api.php?emailChecker='+email,

	                }).done( function (res) {
	                    res = JSON.parse(res);
	                    if(res.status == 0){
	                        document.getElementById('danger1').innerHTML = 'Email is already taken';
	                        $('#signup').attr('disabled', 'disabled');
	                    }else{
	                        document.getElementById('danger1').innerHTML = '';
	                        $('#signup').removeAttr('disabled');
	                    }
	                })
	            }
	        });


	        $('#phone').on('keyup', function () {
	        	let phoneId = document.getElementById('email');
	            let phone = $('#phone').val();
	            if(phone == '' || phone.length < 10){
	                phoneId.classList.add('is-invalid')
	            }else{
	                phoneId.classList.remove('is-invalid')
	                $.ajax({
	                    method: 'get',
	                    url: 'api.php?phoneNumberChecker='+phone,
	                }).done( function (res) {
	                    res = JSON.parse(res);
	                    if(res.status == 0){
	                        document.getElementById('danger2').innerHTML = 'Phone Number is already taken';
	                        $('#signup').attr('disabled', 'disabled');
	                    }else{
	                        document.getElementById('danger2').innerHTML = '';
	                        $('#signup').removeAttr('disabled');
	                    }
	                })
	            }
	        });

		})
	</script>
</body>

</html>