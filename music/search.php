<?php 
    session_start(); ob_start(); ob_clean(); 
    

	if (!isset($_GET['q'])) { header('location: .'); }
	$q = $_GET['q'];
?>
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
	<link rel="stylesheet" type="text/css" href="../musicdynasty/fontawesomeweb/css/all.min.css">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Thomas Gideon">
	<title>Watch Show</title>

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
						<li class="breadcrumb__item"><a href="#">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Search</li>
					</ul>
				</div>
			</section>

			<h3 class="text-white mt-3 mb-0">Search result for "<?php echo $q ?>"</h3>


			<section class="row row--grid  mt-0">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Artists</h2>
					</div>
				</div>
				<!-- end title -->

					<?php 
						$sql = $db->query("SELECT * FROM artists WHERE stagename LIKE '%$q%' AND status>4 ")or die('Cannot serach');
						while($res = mysqli_fetch_array($sql)){
					?>
					
						<div class="col-lg-6">
					
							<ul class="main__list">
								<li class="single-item">
									<a href="artistprofile.php?artist=<?php echo $res['sn'] ?>" class="single-item__cover">
										<img src="assets/img/artists/<?php echo $res['photo'] ?? 'avatar.svg' ?>" alt="">
									</a>
									<div class="single-item__title">
										<h4 class="text-lg"><a href="artistprofile.php?artist=<?php echo $res['sn'] ?>"><?php echo $res['stagename'] ?></a></h4>
									</div>
								</li>
							</ul>
						</div>
					<?php } ?>
			</section>




			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Releases</h2>
					</div>
				</div>
				<!-- end title -->

				<?php 
					$sql = $db->query("SELECT * FROM music WHERE name LIKE '%$q%' ORDER BY rand() LIMIT 24 ")or die('Cannot serach');
					while($res = mysqli_fetch_array($sql)){
				?>
				
					<div class="col-6 col-sm-4 col-lg-2">
						<div class="album">
							<div class="album__cover">
								<img src="assets/img/covers/<?php echo $res['photo'] ?>" alt="">
								<a href="<?php echo $res['link'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z"/></svg></a>
							</div>
							<div class="album__title">
								<h3><a href="<?php echo $res['link'] ?>"><?php echo $res['name'] ?></a></h3>
								<span><a href="<?php echo $res['link'] ?>"><?php echo $typ = ($res['type'] == 1 ) ? 'Album' : 'Single' ; ?></a></span>
							</div>
						</div>
					</div>

				<?php } ?>
			</section>




			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h3>Shows</h3>
					</div>
				</div>
				<!-- end title -->



				<div class="col-12">
					<div class="main__carousel-wrap">
						<div class="main__carousel main__carousel--events owl-carousel" id="events">
							<?php 
								$sql = $db->query("SELECT * FROM live_shows WHERE name LIKE '%$q%' ORDER BY rand() LIMIT 24 ")or die('Cannot serach');
								while($res = mysqli_fetch_array($sql)){
							?>
						
								<div class="event" data-bg="assets/img/covers/<?php echo $res['photo'] ?>">
									<span class="event__date"><?php echo $res['date'] ?></span>
									<span class="event__time"><?php echo $res['time'] ?></span>
									<h3 class="event__title"><a href="watchshow.php?show=<?php echo $res['sn'] ?>&&shaShow=<?php echo sha1($res['sn']) ?>" ><?php echo $res['name'] ?></a></h3>
									<p class="event__address"><?php echo $res['venue'] ?></p>
								</div>

							<?php } ?>
						</div>

						<button class="main__nav main__nav--prev" data-nav="#events" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg></button>
						<button class="main__nav main__nav--next" data-nav="#events" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></button>
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
	<script src="assets/js/login.js"></script>
	<!-- <script src="userlogin.js"></script> -->
</body>

</html>