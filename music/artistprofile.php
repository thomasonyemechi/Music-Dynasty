<?php session_start(); ob_start();
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

	<script src="https://kit.fontawesome.com/0e50f4d65b.js" crossorigin="anonymous"></script>
	<meta name="description" content="">
	<met aname="keywords" content="">
	<meta name="author" content="Thomas Gideon">
	<title>Profile</title>

</head>
<body>
	<!-- header -->
	<?php include('head.php');?>

	<!-- sidebar -->
	<?php include('sidebar.php') ?>
	<!-- end sidebar -->

	<?php include('player.php') ?>

	<?php 
		$artist = $_GET['artist'] ?? '';
	    if($artist == ''){ header('location: artists.php'); }; 
		$data = $msc->getArtist($artist); 
		if(empty($data)){
			 header('location: artists.php');
		}
	?>




		<main class="main">
		<div class="container-fluid">
			<div class="row row--grid">
				<div class="col-12">
					<div class="article article--page">
						<!-- article content -->
						<div class="article__content">
							<div class="article__artist">
								<img src="assets/img/artists/<?php echo $data['photo']; ?>" alt="">
								<div>
									<h1><?php echo ucfirst($data['stagename']); ?></h1>
									<span><?php echo ucfirst($data['name']); ?></span>
									<p><?php echo ucfirst($data['bio']); ?></p>
								</div>
							</div>
						</div>
						<!-- end article content -->
					</div>
				</div>
			</div>

			<!-- releases -->
			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Releases</h2>
					</div>
				</div>
				<!-- end title -->

				<?php $songs = $msc->getArtistSongs($artist, 12); foreach ($songs as $song) { ?>
					<div class="col-6 col-sm-4 col-lg-2">
						<div class="album">
							<div class="album__cover">
								<img src="assets/img/covers/<?php echo $song['photo'] ?>" alt="">
								<a href="<?php echo $song['link'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z"/></svg></a>
							</div>
							<div class="album__title">
								<h3><a href="<?php echo $song['link'] ?>"><?php echo $song['name'] ?></a></h3>
								<span><a href="<?php echo $song['link'] ?>"><?php echo $typ = ($song['type'] == 1 ) ? 'Album' : 'Single' ; ?></a></span>
							</div>
						</div>
					</div>
				<?php } ?>
			</section>
			<!-- end releases -->

			<!-- events -->
			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Tagged Shows</h2>
					</div>
				</div>
				<!-- end title -->



				<div class="col-12">
					<div class="main__carousel-wrap">
						<div class="main__carousel main__carousel--events owl-carousel" id="events">
							<?php $tagged = $msc->getArtistTaggedShows($artist, 9); foreach($tagged as $tag){  $info = $msc->getShow($tag['live_show']);  ?>
								<div class="event" data-bg="assets/img/covers/<?php echo $info['photo'] ?>">
									<span class="event__date"><?php echo $info['date'] ?></span>
									<span class="event__time"><?php echo $info['time'] ?></span>
									<h3 class="event__title"><a href="watchshow.php?show=<?php echo $info['sn'] ?>&&shaShow=<?php echo sha1($info['sn']) ?>" ><?php echo $info['name'] ?></a></h3>
									<p class="event__address"><?php echo $info['venue'] ?></p>
								</div>
							<?php } ?>
						</div>

						<button class="main__nav main__nav--prev" data-nav="#events" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg></button>
						<button class="main__nav main__nav--next" data-nav="#events" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></button>
					</div>
				</div>
			</section>
			<!-- end events -->
		</div>
	</main>





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

	<script type="text/javascript">
		setTimeout( function() {
			$('#refresh').fadeOut();
		}, 3000)
	</script>
</body>

</html>