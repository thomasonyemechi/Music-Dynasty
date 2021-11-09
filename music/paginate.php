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
	<title>Test</title>

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

	<button class="player__btn" type="button">Player</button>
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
						<li class="breadcrumb__item breadcrumb__item--active">Artists</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>Artists</h1>
					</div>
				</div>
				<!-- end title -->
			</div>

			<div class="row row--grid">
				<div class="col-12">
					<div class="main__filter">
						<form action="#" class="main__filter-search">
							<input type="text" placeholder="Search...">
							<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg></button>
						</form>

						<div class="slider-radio">
							<input type="radio" name="grade" id="featured" checked="checked"><label for="featured">Featured</label>
							<input type="radio" name="grade" id="popular"><label for="popular">Popular</label>
							<input type="radio" name="grade" id="newest"><label for="newest">Newest</label>
						</div>
					</div>

					<div class="row row--grid">

					    <?php
					        if (isset($_GET['pageno'])) {$pageno = $_GET['pageno'];} else {$pageno = 1; }
					        $no_of_records_per_page = 6;
					        $offset = ($pageno-1) * $no_of_records_per_page;
					        $total_pages_sql = $db->query("SELECT * FROM artists WHERE status>0");
					        $total_rows = mysqli_num_rows($total_pages_sql);
					        $total_pages = ceil($total_rows / $no_of_records_per_page);
					        $sql = $db->query("SELECT * FROM artists WHERE status>0 ORDER BY sn DESC LIMIT $offset, $no_of_records_per_page");
					        while($art = mysqli_fetch_array($sql)){
							$img = ($art['photo'] == '') ? 'avatar.svg' : $art['photo'] ;
					    ?>
							<div class="col-6 col-sm-4 col-md-3 col-xl-2">
								<a href="#" class="artist">
									<div class="artist__cover">
										<img src="assets/img/artists/<?php echo $img ?>" alt="">
									</div>
									<h3 class="artist__title"><?php echo $art['stagename'] ?></h3>
								</a>
							</div>
						<?php } ?>



					</div>


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



					


					<?php if(mysqli_num_rows($sql) > 20){ ?><button class="main__load" type="button">Load more</button> <?php } ?>
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

</body>

</html>