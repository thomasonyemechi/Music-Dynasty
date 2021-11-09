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
	<link rel="icon" type="image/png" href="assets/icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="assets/icon/favicon-32x32.png">

	<script src="https://kit.fontawesome.com/0e50f4d65b.js" crossorigin="anonymous"></script>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Thomas Gideon">
	<title>Music Dynasty</title>
	<style>
	    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
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

	<!-- player -->
	<?php include('player.php'); ?>
	<!-- end player -->
	
	
		


	<!-- main content -->
	
	<main class="main">
		<div class="container-fluid">
			<!-- slider -->
			<section class="row">
				<div class="col-12">
					<div class="hero owl-carousel" id="hero">
						<div class="hero__slide" data-bg="assets/img/home/slide1.jpg">
							<h1 class="hero__title">Win record deal worth N1,000,000</h1>
							<div class="hero__btns">
							<a href="artistsignup.php" class="hero__btn">Talent Signup</a> <a href="artistlogin.php" class="hero__btn hero__btn--green">Talent Login</a>
							</div>	
							<p class="hero__text"> Sign up as Talent & upload songs not more than 5MB each (musicians, singers, songwriters, producers & Djs). Follow & tag @musicdynasty.ng on social media(Dancers, Choreographers & other talents) #MusicDynasty
							 <br>
							<br>
							 We will select & contact you for auditioning if you qualify!<br>Ts & Cs APPLY</p>
						
						</div>

						<div class="hero__slide" data-bg="assets/img/home/slide2.jpg">
							<h2 class="hero__title">Live Talent show, ‘Free Voting System’ & Entertainment at its best!</h2>
							<p class="hero__text">We invest, promote and sponsor talents. <br>We fine-tune sales strategy and identify trends to increase talent's success rate!</p>
							<div class="hero__btns">
								<a href="https://www.musicdynasty.ng/music/about" class="hero__btn hero__btn--green">Learn more</a>
								<a href="https://www.youtube.com/watch?v=YnsYP1puMAw" class="hero__btn hero__btn--video open-video">video</a>
							</div>
						</div>

						<div class="hero__slide" data-bg="assets/img/home/slide3.jpg">
							<h2 class="hero__title">Sponsor Talents? Subscribe to <em>BATON</em></h2>
							<p class="hero__text">Sponsor Talents on Our Label and make money! Click <a href="https://www.musicdynasty.ng/music/about"><strong><em>BATON</em></strong></a> to generate subscription referral code that links sponsored Talents’s project. Increase your earnings & Talent's popularity by sharing referral<br> 
							Welcome to financial freedom!</p>
							<div class="hero__btns">
								<a href="https://musicdynasty.ng/musicdynasty/" target="_blank" class="hero__btn hero__btn--green">Baton</a>
								<a href="https://www.musicdynasty.ng/music/about" class="hero__btn">Learn more</a>
							</div>
						</div>
					</div>

					<button class="main__nav main__nav--hero main__nav--prev" data-nav="#hero" type="button" style="color: white;"> <b>
						<i class="fas fa-arrow-left"></i></b>
					</button>
					<button class="main__nav main__nav--hero main__nav--next" data-nav="#hero" type="button" id="fwd" style="color: white;"><b>
						<i class="fas fa-arrow-right"></i></b>
					</button>
				</div>
			</section>
			<!-- end slider -->

			<!-- releases -->
			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>New Releases</h2>

						<a href="releases.php" class="main__link">See all  <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
				<!-- end title -->
				<?php 
					$sql = $db->query("SELECT * FROM music ORDER BY sn DESC LIMIT 6 ");
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
			</section>
			<!-- end releases -->

			<!-- artists -->
			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Talents</h2>
						<a href="artists.php" class="main__link">See all <span> <i class="fas fa-arrow-right"></i></span></a>
					</div>
				</div>
				<!-- end title -->

				<div class="col-12">
					<div class="main__carousel-wrap">
						<div class="main__carousel main__carousel--artists owl-carousel" id="artists">
							<?php 
								$sql = $db->query("SELECT * FROM artists WHERE status>4 ORDER BY rand() LIMIT 9 ");
								while($art = mysqli_fetch_array($sql)){
								$img = ($art['photo'] == '') ? 'avatar.svg' : $art['photo'] ;
							?>
								<a>
									<div class="artist__cover">
										<img src="assets/img/artists/<?php echo $img ?>" alt="">
									</div>
									<h3 class="artist__title"><?php echo $art['stagename'] ?></h3>
								</a>
							<?php  } ?>

						</div>

						<button class="main__nav main__nav--prev" data-nav="#artists" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg></button>
						<button class="main__nav main__nav--next" data-nav="#artists" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></button>
					</div>
			</section>
			<!-- end articts -->

			<!-- top singles new single -->
			<section class="row row--grid">
				<div class="col-12 col-md-6 col-xl-6">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">Next Rated</a> </h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12" id="topSingleBody">
							
						    <div class="spinner-border text-white" role="status">
							  	<span class="sr-only">Loading...</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">New materials</a></h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12" id="newSingleBody">
							<div class="spinner-border text-white" role="status">
							  	<span class="sr-only">Loading...</span>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end top singles new single -->

			<!-- podcasts -->
			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Talent League</h2>
						<a href="podcasts.html" class="main__link">See all <i class="fas fa-arrow-right"></i></a>
					</div>
				</div>
				<!-- end title -->

				<div class="col-12">
					<div class="main__carousel-wrap">
						<div class="main__carousel main__carousel--podcasts owl-carousel" id="podcasts">
							<?php
								$shows = $db->query("SELECT * FROM  live_shows ORDER BY sn DESC LIMIT 6 ")or die('cannot connect');
								while ($show = mysqli_fetch_array($shows)) { 
							?>
								<div class="event" data-bg="assets/img/covers/<?php echo $show['photo'] ?>">
									<span class="event__date"><?php echo date('j M, y', strtotime($show['date'])) ?></span>
									<span class="event__time"><?php echo date('h:1 A', strtotime($show['time'])) ?></span>
									<h3 class="event__title"><a href="watchshow.php?show=<?php echo $show['sn'] ?>&&shaShow=<?php echo sha1($show['sn']) ?>" ><?php echo $show['name'] ?></a></h3>
									<p class="event__address"><?php echo $show['venue'] ?></p>
								</div>
							<?php } ?>
						</div>

						<button class="main__nav main__nav--hero main__nav--prev" data-nav="#podcasts" type="button" style="color: white;"> <b>
							<i class="fas fa-arrow-left"></i></b>
						</button>
						<button class="main__nav main__nav--hero main__nav--next" data-nav="#podcasts" type="button" style="color: white;"><b>
							<i class="fas fa-arrow-right"></i></b>
						</button>

					</div>
				</div>
			</section>
			<!-- end podcasts -->


			<!-- top album new album -->
			<section class="row row--grid">
				<div class="col-12 col-md-6 col-xl-6">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">Top Portfolio</a></h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12" id="topAlbumBody">
						    <div class="spinner-border text-white" role="status">
							  	<span class="sr-only">Loading...</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">New Portfolio</a></h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12" id="newAlbumBody">
							<div class="spinner-border text-white" role="status">
							  	<span class="sr-only">Loading...</span>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end top singles new single -->


			<!-- news -->
			<!--<section class="row row--grid">-->
				<!-- title -->
			<!--	<div class="col-12">-->
			<!--		<div class="main__title">-->
			<!--			<h2>News</h2>-->
			<!--			<a href="#" class="main__link">See all <i class="fas fa-arrow-right"></i></a>-->
			<!--		</div>-->
			<!--	</div>-->
				<!-- end title -->

				<!-- post -->
			<!--	<div class="col-12 col-sm-6 col-lg-4">-->
			<!--		<div class="post">-->
			<!--			<a href="#" class="post__img">-->
			<!--				<img src="assets/img/david2.jpg" alt="">-->
			<!--			</a>-->

			<!--			<div class="post__content">-->
			<!--				<a href="#" class="post__category">Music</a>-->
			<!--				<h3 class="post__title"><a href="#">Davido called out for allegedly scamming record label of millions of naira</a></h3>-->
			<!--				<div class="post__meta">-->
			<!--					<span class="post__date"><i class="fa fa-clock"></i> 3 hours ago</span>-->
			<!--					<span class="post__comments"> <i class="fa fa-comment"></i> 18</span>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->
				
				
			<!--	<div class="col-12 col-sm-6 col-lg-4">-->
			<!--		<div class="post">-->
			<!--			<a href="#" class="post__img">-->
			<!--				<img src="assets/img/david2.jpg" alt="">-->
			<!--			</a>-->

			<!--			<div class="post__content">-->
			<!--				<a href="#" class="post__category">Music</a>-->
			<!--				<h3 class="post__title"><a href="#">Davido called out for allegedly scamming record label of millions of naira</a></h3>-->
			<!--				<div class="post__meta">-->
			<!--					<span class="post__date"><i class="fa fa-clock"></i> 3 hours ago</span>-->
			<!--					<span class="post__comments"> <i class="fa fa-comment"></i> 18</span>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->
				
				
			<!--	<div class="col-12 col-sm-6 col-lg-4">-->
			<!--		<div class="post">-->
			<!--			<a href="#" class="post__img">-->
			<!--				<img src="assets/img/david2.jpg" alt="">-->
			<!--			</a>-->

			<!--			<div class="post__content">-->
			<!--				<a href="#" class="post__category">Music</a>-->
			<!--				<h3 class="post__title"><a href="#">Davido called out for allegedly scamming record label of millions of naira</a></h3>-->
			<!--				<div class="post__meta">-->
			<!--					<span class="post__date"><i class="fa fa-clock"></i> 3 hours ago</span>-->
			<!--					<span class="post__comments"> <i class="fa fa-comment"></i> 18</span>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->
				<!-- end post -->

			<!--</section>-->
			<!-- end news -->



			<!-- top album new album -->
			<section class="row row--grid">
				<div class="col-12 col-md-12 col-xl-12">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">Videos</a></h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12" >
							<div class="row" id="videoBody">
								<div class="spinner-border text-white" role="status">
								  	<span class="sr-only">Loading...</span>
								</div>
							</div>
						    
						</div>
					</div>
				</div>
			</section>
			<!-- end top singles new single -->



		</div>
	</main>
	<!-- end main content -->
	
</section>
</div>
</main>

	<!-- footer -->
	<?php include('foot.php') ?>
	<!-- end footer -->
	

	
	<div class="modal fade" id="login_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Login TO Continue</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="sign">
						<div class="sign__content">
							<form class="sign__form" autocomplete="off">
								<a href="index-2.html" class="sign__logo">
									<img src="assets/img/logo.svg" alt="">
								</a>

								<div id="alert" class=""></div>

								<div class="sign__group">
									<input type="email" class="sign__input form-control" id="email" name="email" placeholder="Email">
									<i id="danger1" style="color: red"></i>
								</div>


								<div class="sign__group">
									<input type="password" class="sign__input form-control" id="password" placeholder="Password">
								</div>
								
								<button class="sign__btn" type="submit" id="login_user" >Sign In</button>


								<span class="sign__text">Don't have an account? <a href="artistsignup.php">Sign up!</a></span>

								<span class="sign__text"><a href="forgot.php">Forgot password?</a></span>
							</form>
						</div>
					</div>
		      	</div>
		    </div>
		</div>
	</div>









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

			const createNewSingleBody = () =>{
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

				$.ajax({
					method: 'GET',
					url: 'api.php?fetchTopSingles=5',
				}).done( function (res) {
					res = JSON.parse(res);
					const topSingleBody = document.getElementById('topSingleBody');
                	topSingleBody.innerHTML = ``;
                	if(res.length > 0) {
                		res.map((song) => {
	                		const son = document.createElement('ul')
	                		son.classList.add('main__list');
	                		topSingleBody.append(son)
	                		sonContent = `
								<ul class="">
									<li class="single-item">
										<a class="single-item__cover" href="${song.info.link}">
											<img src="assets/img/covers/${song.info.photo}" alt="">
										</a>
										<div class="single-item__title">
											<h4><a href="${song.info.link}">${song.info.name}</a></h4>
											<span><a href="${song.info.link}">${song.artist.stagename}</a></span>
										</div>

										<span class="single-item__time">${song.time}</span>
										
									</li>
								</ul>
							`
							son.innerHTML = sonContent

	                	})
                	}
				})


			}

			createNewSingleBody();



			const createNewAlbumBody = () =>{
				$.ajax({
					method: 'GET',
					url: 'api.php?fetchNewAlbums=5',
				}).done( function (res) {
					res = JSON.parse(res);
					const newAlbumBody = document.getElementById('newAlbumBody');
                	newAlbumBody.innerHTML = ``;
                	if(res.length > 0) {
                		res.map((song) => {
	                		const son = document.createElement('ul')
	                		son.classList.add('main__list');
	                		newAlbumBody.append(son)
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

				$.ajax({
					method: 'GET',
					url: 'api.php?fetchTopAlbums=5',
				}).done( function (res) {
					res = JSON.parse(res);
					const topAlbumBody = document.getElementById('topAlbumBody');
                	topAlbumBody.innerHTML = ``;
                	if(res.length > 0) {
                		res.map((song) => {
	                		const son = document.createElement('ul')
	                		son.classList.add('main__list');
	                		topAlbumBody.append(son)
	                		sonContent = `
								<ul class="">
									<li class="single-item">
										<a class="single-item__cover" href="${song.info.link}">
											<img src="assets/img/covers/${song.info.photo}" alt="">
										</a>
										<div class="single-item__title">
											<h4><a href="${song.info.link}">${song.info.name}</a></h4>
											<span><a href="${song.info.link}">${song.artist.stagename}</a></span>
										</div>

										<span class="single-item__time">${song.time}</span>
										
									</li>
								</ul>
							`
							son.innerHTML = sonContent

	                	})
                	}
				})


			}


			createNewAlbumBody();




			const createVideoBody = () =>{
				$.ajax({
					method: 'GET',
					url: 'api.php?fetchVideo=10',
				}).done( function (res) {
					res = JSON.parse(res);
					const videoBody = document.getElementById('videoBody');
                	videoBody.innerHTML = ``;
                	console.log(res);
                	if(res.length > 0) {
                		res.map((song) => {
	                		const son = document.createElement('div')
	                		son.classList.add('col-lg-6');
	                		videoBody.append(son)
	                		sonContent = `
										<ul class="main__list">
											<li class="single-item">
												<a class="single-item__cover">
													<img src="assets/img/covers/${song.info.photo}" alt="assets/img/covers/${song.info.photo}">
												</a>
												<div class="single-item__title">
													<h4><a href="video.php?video=${song.info.sn}">${song.info.name}</a></h4>
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

			}


			
			
			
			
	createVideoBody();





		})
		
		
		
	setInterval(function(){ 
   $("#fwd").click();
   //console.log('seeem');
},10000);

	</script>
</body>

</html>