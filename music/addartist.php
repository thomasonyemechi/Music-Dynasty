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
	<title>Admin - Add Artist</title>

</head>
<body>
	<!-- header -->
	<?php include('head.php'); ?>
	<!-- end header -->

	<!-- sidebar -->
	<?php include('sidebar.php') ?>
	<!-- end sidebar -->

	<?php include('player.php') ?>

	<?php if (isset($report)) { echo $msc->Alert(); } ?>

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<!-- slider -->
			<section class="row">
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="#">Admin</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Add Artist</li>
					</ul>
				</div>
				<div class="col-12">
					
					<div class="dashbox">
						<div class="dashbox__title">
							<h3 class="text-small">Add Artist</h3>
						</div>
						<div class="dashbox__table-wrap">
							<div class="dashbox__table">
								<form method="post" autocomplete="off" autofill="off">

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
									
									<button class="sign__btn" id="signup" type="submit" name="addArtist">Sign up</button>

								</form>

							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end slider -->
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
	<script src="assets/js/img.js"></script>
	<script src="assets/js/login.js"></script>
	<script type="text/javascript">
		$(function () {

		})

		setTimeout( function() {
			$('#refresh').fadeOut();
		}, 3000)
	</script>
</body>

</html>