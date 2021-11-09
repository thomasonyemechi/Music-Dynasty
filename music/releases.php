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
	<title>Realses</title>

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
						<li class="breadcrumb__item breadcrumb__item--active">Releases</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>Releases</h1>
					</div>
				</div>
				<!-- end title -->
			</div>

			<!-- releases -->
			<div class="row row--grid">
				<div class="col-12">
					<div class="row row--grid">
						<?php
					        if (isset($_GET['pageno'])) {$pageno = $_GET['pageno'];} else {$pageno = 1; }
					        $no_of_records_per_page = 18;
					        $offset = ($pageno-1) * $no_of_records_per_page;
					        $total_pages_sql = $db->query("SELECT * FROM music WHERE type=0 ");
					        $total_rows = mysqli_num_rows($total_pages_sql);
					        $total_pages = ceil($total_rows / $no_of_records_per_page);
					        $sql = $db->query("SELECT * FROM music WHERE  type=0 ORDER BY sn DESC LIMIT $offset, $no_of_records_per_page");
					        while($newr = mysqli_fetch_array($sql)){
					    ?>
							<div class="col-6 col-sm-4 col-lg-2">
								<div class="album">
									<div class="album__cover">
										<img src="assets/img/covers/<?php echo $newr['photo'] ?>" alt="">
										<a href="<?php echo $newr['link'] ?>"><i class="fa fa-play"></i></a>
									</div>
									<div class="album__title">
										<h3><a href="<?php echo $newr['link'] ?>"><?php echo $newr['name'] ?></a></h3>
										<span><a href="#"><?php echo $msc->getArtist($newr['artist'])['stagename'] ?></a></span>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>

					<?php if($total_rows > 18){ ?>

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
			<!-- end releases -->

			<section class="row row--grid">
				<div class="col-12 col-xl-8">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">Shows</a></h2>
							</div>
						</div>
						<!-- end title -->
						<?php
							$shows = $db->query("SELECT * FROM  live_shows ORDER BY sn DESC LIMIT 2 ")or die('cannot connect');
							while ($show = mysqli_fetch_array($shows)) { ?>
							<div class="col-12 col-md-6">
								<div class="event" data-bg="assets/img/covers/<?php echo $show['photo'] ?>">
									<span class="event__date"><?php echo date('j M, y', strtotime($show['date'])) ?></span>
									<span class="event__time"><?php echo date('h:1 A', strtotime($show['time'])) ?></span>
									<h3 class="event__title"><a href="watchshow.php?show=<?php echo $show['sn'] ?>&&shaShow=<?php echo sha1($show['sn']) ?>" ><?php echo $show['name'] ?></a></h3>
									<p class="event__address"><?php echo $show['venue'] ?></p>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="col-12 col-xl-4">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">New Singles</a></h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12" id="newSingleBody">
							<ul class="main__list">
								
							</ul>
						</div>
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