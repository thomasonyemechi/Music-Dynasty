<?php session_start(); ?>
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
	<title>Video</title>

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
						<li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Music Video</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>Music Video</h1>
					</div>
				</div>
				<!-- end title -->
			</div>


			<section class="row">
				<div class="col-8 col-8" style="height:420px;">
					<div class="row">
						<?php $sn = $_GET['video'] ?? 6;
							$vi = $db->query("SELECT * FROM  music WHERE sn = '$sn'  ")or die('cannot connect');
							$vid = mysqli_fetch_array($vi) ?>
							<?php echo ($vid['video_url']) ?>
					</div>
				</div>

			</section>		
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
		$.ajax({
			method: 'GET',
			url: 'api.php?fetchNewSingles=5',
		}).done( function (res) {
			res = JSON.parse(res);
			const newSingleBody = document.getElementById('newSingleBody');
        	newSingleBody.innerHTML = ``;
        	if(res.length > 0) {
        		res.map((song) => {
            		const son = document.createElement('ul')
            		son.classList.add('main__list');
            		newSingleBody.append(son)
            		sonContent = `
						<ul class="">
							<li class="single-item">
								<a class="single-item__cover">
									<img src="assets/img/covers/${song.info.photo}" alt="">
								</a>
								<div class="single-item__title">
									<h4><a href="#">${song.info.name}</a></h4>
									<span><a href="javascript:;">${song.artist.stagename}</a></span>
								</div>

								<span class="single-item__time">${song.time}</span>
								
							</li>
						</ul>
					`
					son.innerHTML = sonContent

            	})
        	}
		})
	</script>

</body>

</html>