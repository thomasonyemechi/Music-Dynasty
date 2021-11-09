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
	<title>Shows</title>

</head>
<body>
	<!-- header -->
	<?php include('head.php'); ?>
	<!-- end header -->

	<!-- sidebar -->
	<?php include('sidebar.php') ?>
	<!-- end sidebar -->


	<?php if (isset($report)) { echo $msc->Alert(); } ?>


	<!-- player -->
	<?php include('player.php') ?>
	<!-- end player -->

	<!-- main content -->
		<main class="main">
		<div class="container-fluid">
			<!-- artists -->
			<div class="row row--grid">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="#">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Shows</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>Shows</h1>
					</div>
				</div>
				<!-- end title -->
			</div>

			<div class="row row--grid">
				<div class="col-12">

					<div class="row row--grid">
						<?php
					        if (isset($_GET['pageno'])) {$pageno = $_GET['pageno'];} else {$pageno = 1; }
					        $no_of_records_per_page = 15;
					        $offset = ($pageno-1) * $no_of_records_per_page;
					        $total_pages_sql = $db->query("SELECT * FROM live_shows ");
					        $total_rows = mysqli_num_rows($total_pages_sql);
					        $total_pages = ceil($total_rows / $no_of_records_per_page);
					        $sql = $db->query("SELECT * FROM live_shows ORDER BY sn DESC LIMIT $offset, $no_of_records_per_page");
							while ($show = mysqli_fetch_array($sql)) { 
					    ?>
						<?php ?>
							<div class="col-lg-4 col-12">
								<div id="podcasts">
									<div class="live">
										<a href="watchshow.php?show=<?php echo $show['sn'] ?>&&shaShow=<?php echo sha1($show['sn']) ?>" class="live__cover">
											<img src="assets/img/covers/<?php echo $show['photo'] ?>" alt="">
											<span class="live__status bg-success"><?php echo date('j M, y', strtotime($show['date'])) ?></span>
											<span class="live__value"><?php echo $show['venue'] ?></span>
										</a>
										<h3 class="live__title"><a href="watchshow.php?show=<?php echo $show['sn'] ?>&&shaShow=<?php echo sha1($show['sn']) ?>"><?php echo $show['name'] ?> </a></h3>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>

					<?php if($total_rows > 15){ ?>

						<nav aria-label="Page navigation example" style="margin-top: 20px;">
						  <ul class="pagination justify-content-center">
						    <li class="page-item ">
						      <a class="page-link" href="?pageno=1">First</a>
						    </li>
						    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
						    	<a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
						    </li>
						    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
						    	<a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
						    </li>
						    <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>

						  </ul>
						</nav>
					<?php } ?>
				</div>
			</div>
			<!-- end artists -->

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

</body>

</html>