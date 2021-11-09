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
	<title>Admin - Create Show</title>

	<style type="text/css">
		.addRad {
			border-radius: 10px;
			margin: 10px;
		}
	</style>

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
						<li class="breadcrumb__item breadcrumb__item--active">Dashbooard</li>
					</ul>
				</div>
				<div class="col-12">

					<div class="row">
	                    <div class="col-lg-3 col-md-6 col-12 ">
	                        <!-- Card -->
	                        <div class="card mb-4 bg-light addRad">
	                            <div class="p-2">
	                                <span class="fs-12 text-uppercase fw-semi-bold">All Artist</span>
	                                <h2 class="mt-4  mb-1 d-flex align-items-center">
	                                    150
	                                </h2>
	                                <span class="d-flex justify-content-between align-items-center">
	                                    <span>Featured</span>
	                                    <span>75</span>
	                                </span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-6 col-12 ">
	                        <!-- Card -->
	                        <div class="card mb-4 bg-light addRad">
	                            <div class="p-2">
	                                <span class="fs-12 text-uppercase fw-semi-bold">Apllication</span>
	                                <h2 class="mt-4  mb-1 d-flex align-items-center">
	                                    267
	                                </h2>
	                                <span class="d-flex justify-content-between align-items-center">
	                                    <span>Approved</span>
	                                    <span>150</span>
	                                </span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-6 col-12 ">
	                        <!-- Card -->
	                        <div class="card mb-4 bg-light addRad">
	                            <div class="p-2">
	                                <span class="fs-12 text-uppercase fw-semi-bold">Music</span>
	                                <h2 class="mt-4  mb-1 d-flex align-items-center">
	                                    400
	                                </h2>
	                                <span class="d-flex justify-content-between align-items-center">
	                                    <span>Album</span>
	                                    <span>100</span>
	                                </span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-6 col-12 ">
	                        <!-- Card -->
	                        <div class="card mb-4 bg-light addRad">
	                            <div class="p-2">
	                                <span class="fs-12 text-uppercase fw-semi-bold">Shows</span>
	                                <h2 class="mt-4  mb-1 d-flex align-items-center">
	                                    115
	                                </h2>
	                                <span class="d-flex justify-content-between align-items-center">
	                                    <span>Users</span>
	                                    <span>2030</span>
	                                </span>
	                            </div>
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

</body>

</html>