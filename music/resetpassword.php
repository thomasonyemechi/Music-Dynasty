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
	<title>Reset Password</title>

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


	<?php $order =  isset($_GET['order'])  ? $_GET['order'] : 0 ; ?>

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row row--grid">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Reset Password</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- registration form -->
				<div class="col-12">
					<div class="sign">
						<div class="sign__content">
							<?php if(isset($report)) { echo $msc->Alert(); } ?>
							<form method="Post" class="sign__form">
								<h2 class="text-white">Reset Password</h2>

								<div class="sign__group">
									<input type="password" name="newpass" class="sign__input" placeholder="New Password">
								</div>

								<div class="sign__group">
									<input type="password" name="cnewpass" class="sign__input" placeholder="Confirm New Password">
								</div>

								<div class="sign__group">
									<input type="hidden" name="order" value="<?= $order ?>" >
								</div>
								
								<button class="sign__btn" type="submit" name="resetPassword">Reset</button>

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
			//alert('hello world')
			//$('#modal-info5').modal('show')
		})
	</script>
</body>

</html>