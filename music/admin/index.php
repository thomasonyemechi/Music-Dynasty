<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<?php include('link.php'); ?>

	<script src="https://kit.fontawesome.com/0e50f4d65b.js" crossorigin="anonymous"></script>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>Music Dynasty</title>

</head>
<body>
	<!-- header -->
	<?php include('../head.php'); ?>
	<!-- end header -->

	<!-- sidebar -->
	<?php include('../sidebar.php') ?>
	<!-- end sidebar -->

	<!-- player -->
	<div class="player">
		<div class="player__cover">
			<img src="img/covers/cover.svg" alt="">
		</div>

		<div class="player__content">
			<span class="player__track"><b class="player__title">Epic Cinematic</b> – <span class="player__artist">AudioPizza</span></span>
			<audio src="https://dmitryvolkov.me/demo/blast2.0/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3" id="audio" controls></audio>
		</div>
	</div>

	<button class="player__btn" type="button">Player</button>
	<!-- end player -->

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<!-- slider -->
			<section class="row">
				<div class="col-12">
					<div class="hero owl-carousel" id="hero">
						<div class="hero__slide" data-bg="assets/img/home/slide1.jpg">
							<h1 class="hero__title">Record Label & Music streaming</h1>
							<p class="hero__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
							<div class="hero__btns">
								<a href="#" class="hero__btn hero__btn--green">Buy now</a>
								<a href="#" class="hero__btn">Learn more</a>
							</div>
						</div>

						<div class="hero__slide" data-bg="assets/img/home/slide2.jpg">
							<h2 class="hero__title">Metallica and Slipknot feature in trailer for ‘Long Live Rock’ documentary</h2>
							<p class="hero__text">It also features Rage Against The Machine, Guns N' Roses and a number of others</p>
							<div class="hero__btns">
								<a href="#" class="hero__btn hero__btn--green">Learn more</a>
								<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="hero__btn hero__btn--video open-video">video</a>
							</div>
						</div>

						<div class="hero__slide" data-bg="assets/img/home/slide3.jpg">
							<h2 class="hero__title">New Artist of Our Label</h2>
							<p class="hero__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
							<div class="hero__btns">
								<a href="#" class="hero__btn">Learn more</a>
							</div>
						</div>
					</div>

					<button class="main__nav main__nav--hero main__nav--prev" data-nav="#hero" type="button" style="color: white;"> <b>
						<i class="fas fa-arrow-left"></i></b>
					</button>
					<button class="main__nav main__nav--hero main__nav--next" data-nav="#hero" type="button" style="color: white;"><b>
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

						<a href="releases.html" class="main__link">See all  <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
				<!-- end title -->

				<div class="col-6 col-sm-4 col-lg-2">
					<div class="album">
						<div class="album__cover">
							<img src="assets/img/covers/cover1.jpg" alt="">
							<a href="release.html"><i class="fa fa-play"></i></a>
						</div>
						<div class="album__title">
							<h3><a href="release.html">Space Melody</a></h3>
							<span><a href="artist.html">VIZE</a> & <a href="artist.html">Alan Walker</a> & <a href="artist.html">Leony</a></span>
						</div>
					</div>
				</div>

				<div class="col-6 col-sm-4 col-lg-2">
					<div class="album">
						<div class="album__cover">
							<img src="assets/img/covers/cover1.jpg" alt="">
							<a href="release.html"><i class="fa fa-play"></i></a>
						</div>
						<div class="album__title">
							<h3><a href="release.html">Space Melody</a></h3>
							<span><a href="artist.html">VIZE</a> & <a href="artist.html">Alan Walker</a> & <a href="artist.html">Leony</a></span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-4 col-lg-2">
					<div class="album">
						<div class="album__cover">
							<img src="assets/img/covers/cover1.jpg" alt="">
							<a href="release.html">play</a>
						</div>
						<div class="album__title">
							<h3><a href="release.html">Space Melody</a></h3>
							<span><a href="artist.html">VIZE</a> & <a href="artist.html">Alan Walker</a> & <a href="artist.html">Leony</a></span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-4 col-lg-2">
					<div class="album">
						<div class="album__cover">
							<img src="assets/img/covers/cover1.jpg" alt="">
							<a href="release.html">play</a>
						</div>
						<div class="album__title">
							<h3><a href="release.html">Space Melody</a></h3>
							<span><a href="artist.html">VIZE</a> & <a href="artist.html">Alan Walker</a> & <a href="artist.html">Leony</a></span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-4 col-lg-2">
					<div class="album">
						<div class="album__cover">
							<img src="assets/img/covers/cover1.jpg" alt="">
							<a href="release.html">play</a>
						</div>
						<div class="album__title">
							<h3><a href="release.html">Space Melody</a></h3>
							<span><a href="artist.html">VIZE</a> & <a href="artist.html">Alan Walker</a> & <a href="artist.html">Leony</a></span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-4 col-lg-2">
					<div class="album">
						<div class="album__cover">
							<img src="assets/img/covers/cover1.jpg" alt="">
							<a href="release.html">play</a>
						</div>
						<div class="album__title">
							<h3><a href="release.html">Space Melody</a></h3>
							<span><a href="artist.html">VIZE</a> & <a href="artist.html">Alan Walker</a> & <a href="artist.html">Leony</a></span>
						</div>
					</div>
				</div>
			</section>
			<!-- end releases -->

			<!-- events -->
			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Upcoming Events</h2>

						<a href="events.html" class="main__link">See all <i class="fas fa-arrow-alt-square-right"></i></a>
					</div>
				</div>
				<!-- end title -->

				<div class="col-12">
					<div class="main__carousel-wrap">
						<div class="main__carousel main__carousel--events owl-carousel" id="events">
							<div class="event" data-bg="assets/img/events/event1.jpg">
								<a href="#modal-ticket" class="event__ticket open-modal"><i class="fa fa-money-bill-wave"></i>&#32;Buy ticket</a>
								<span class="event__date">March 14, 2021</span>
								<span class="event__time">8:00 pm</span>
								<h3 class="event__title"><a href="event.html">Sorry Babushka</a></h3>
								<p class="event__address">1 East Plumb Branch St.Saint Petersburg, FL 33702</p>
							</div>
						</div>

						<button class="main__nav main__nav--prev" data-nav="#events" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg></button>
						<button class="main__nav main__nav--next" data-nav="#events" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></button>
					</div>
				</div>
			</section>
			<!-- end events -->

			<!-- articts -->
			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Artists</h2>
						<a href="artists.html" class="main__link">See all -></a>
					</div>
				</div>
				<!-- end title -->

				<div class="col-12">
					<div class="main__carousel-wrap">
						<div class="main__carousel main__carousel--artists owl-carousel" id="artists">
							<a href="artist.html" class="artist">
								<div class="artist__cover">
									<img src="assets/img/artists/artist1.jpg" alt="">
								</div>
								<h3 class="artist__title">BENEE Featuring</h3>
							</a>
						</div>

						<button class="main__nav main__nav--prev" data-nav="#artists" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg></button>
						<button class="main__nav main__nav--next" data-nav="#artists" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></button>
					</div>
				</div>
			</section>
			<!-- end articts -->

			<!-- top singles new single -->
			<section class="row row--grid">
				<div class="col-12 col-md-6 col-xl-4">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">Top singles</a></h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12">
							<ul class="main__list">
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-4">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">New singles</a></h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12">
							<ul class="main__list">
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-4">
					<div class="row row--grid">
						<!-- title -->
						<div class="col-12">
							<div class="main__title">
								<h2><a href="#">Podcasts</a></h2>
							</div>
						</div>
						<!-- end title -->

						<div class="col-12">
							<ul class="main__list">
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
								<li class="single-item">
									<a data-link class="single-item__cover">
										<img src="assets/img/covers/cover1.jpg" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="#">Cinematic</a></h4>
										<span><a href="artist.html">AudioPizza</a></span>
									</div>
									<span class="single-item__time">2:35</span>
								</li>
							</ul>
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
						<h2>Podcasts</h2>
						<a href="podcasts.html" class="main__link">See all</a>
					</div>
				</div>
				<!-- end title -->

				<div class="col-12">
					<div class="main__carousel-wrap">
						<div class="main__carousel main__carousel--podcasts owl-carousel" id="podcasts">
							<div class="live">
								<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="live__cover open-video">
									<img src="assets/img/live/1.jpg" alt="">
									<span class="live__status">live</span>
									<span class="live__value">6.5K viewers</span>
									<svg viewBox="0 0 24 24">play</svg>
								</a>
								<h3 class="live__title"><a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="open-video">Beautiful Stories From Anonymous People</a></h3>
							</div>
						</div>

						<button class="main__nav main__nav--prev" data-nav="#podcasts" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg></button>
						<button class="main__nav main__nav--next" data-nav="#podcasts" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></button>
					</div>
				</div>
			</section>
			<!-- end podcasts -->


			<!-- news -->
			<section class="row row--grid">
				<!-- title -->
				<div class="col-12">
					<div class="main__title">
						<h2>News</h2>

						<a href="news.html" class="main__link">See all <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></a>
					</div>
				</div>
				<!-- end title -->

				<!-- post -->
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="post">
						<a href="article.html" class="post__img">
							<img src="assets/img/posts/2.jpg" alt="">
						</a>

						<div class="post__content">
							<a href="#" class="post__category">Music</a>
							<h3 class="post__title"><a href="article.html">Tom Grennan ‘breaks the internet’ as fans overload servers during virtual gig</a></h3>
							<div class="post__meta">
								<span class="post__date"><i class="fa fa-clock"></i> 3 hours ago</span>
								<span class="post__comments"> <i class="fa fa-comment"></i> 18</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="post">
						<a href="article.html" class="post__img">
							<img src="assets/img/posts/2.jpg" alt="">
						</a>

						<div class="post__content">
							<a href="#" class="post__category">Music</a>
							<h3 class="post__title"><a href="article.html">Tom Grennan ‘breaks the internet’ as fans overload servers during virtual gig</a></h3>
							<div class="post__meta">
								<span class="post__date">3 hours ago</span>
								<span class="post__comments"> 18</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="post">
						<a href="article.html" class="post__img">
							<img src="assets/img/posts/2.jpg" alt="">
						</a>

						<div class="post__content">
							<a href="#" class="post__category">Music</a>
							<h3 class="post__title"><a href="article.html">Tom Grennan ‘breaks the internet’ as fans overload servers during virtual gig</a></h3>
							<div class="post__meta">
								<span class="post__date">3 hours ago</span>
								<span class="post__comments"> 18</span>
							</div>
						</div>
					</div>
				</div>
				<!-- end post -->

			</section>
			<!-- end news -->

		</div>
	</main>
	<!-- end main content -->

	<!-- footer -->
	<?php include('foot.php') ?>
	<!-- end footer -->

	


	<?php include('modal.php') ?>


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
	<script type="text/javascript">
		$(function () {
			//alert('hello world')
			//$('#modal-info5').modal('show')
		})
	</script>
</body>

</html>