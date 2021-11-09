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
	<?php 
	    if($artist == ''){ header('location: index.php'); }; 
		$data = $msc->getArtist($artist); 
	?>
	<!-- end header -->

	<!-- sidebar -->
	<?php include('sidebar.php') ?>
	<!-- end sidebar -->

	<?php include('player.php') ?>


	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<!-- slider -->
			<section class="row">
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="#">Artist</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Profile</li>
					</ul>
				</div>



				<?php if (isset($report)) { echo $msc->Alert(); } ?>
				
				
				<div class="row row--grid">
					<div class="col-12">
						<div class="profile">
							<div class="profile__user">
								<div class="profile__avatar">
									<?php $pic = ($data['photo'] == '' ) ? 'avatar.svg' : $data['photo']; ?>
									<img src="assets/img/artists/<?php echo $pic ?>" alt="">
								</div>

								<?php  ?>
								<div class="profile__meta">
									<h3><?php echo ucfirst($data['name']); ?></h3>
									<span><?php echo ($data['email']); ?></span>
								</div>
							</div>

							<!-- tabs nav -->
							<ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Music</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Profile</a>
								</li>

							</ul>
							<!-- end tabs nav -->

							<a class="profile__logout" href="logOut.php">
								<span>Sign out</span>
							</a>
						</div>

						<!-- content tabs -->
						<div class="tab-content">
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel">
								<div class="row row--grid">
									<?php if($data['status'] > 4) { 
										$afterMusic = $msc->getArtistSongs($artist); 
										$tagged = $msc->getArtistTaggedShows($artist); ?>

										<div class="col-12 col-lg-6">
											<div class="dashbox">
												<div class="dashbox__title">
													<h3 class="text-small">Your Songs</h3>
												</div>

												<div class="dashbox__list-wrap">

													<div class="row row--grid">
														<?php  foreach($afterMusic as $mc){ $col = ($mc['top'] == 1) ? 'text-success' : '' ; $typ = ($mc['type'] == 1) ? 'Album' : 'Single' ;?>
															<div class="col-12">
																<ul class="main__list">
																	<li class="single-item">
																		<a class="single-item__cover">
																			<img src="assets/img/covers/<?php echo $mc['photo'] ?>" alt="">
																		</a>
																		<div class="single-item__title">
																			<h4  class="<?php echo $col ?>" ><?php echo $mc['name'] ?></h4>
																			<span><a href="javascript:;"><?php echo $typ ?></a></span>
																		</div>

																		<span class="single-item__time"><?php echo date('j M, Y',$mc['ctime']) ?></span>
																		
																	</li>
																</ul>
															</div>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>


										<div class="col-12 col-lg-6">
											

											<div class="dashbox">
												<div class="dashbox__title">
													<h3 class="text-small"> Shows where you were tagged</h3>
												</div>

												<div class="dashbox__list-wrap">

													<div class="row row--grid">
														<?php  foreach($tagged as $tag){ $info = $msc->getShow($tag['live_show']); ?>
															<div class="col-12">
																<ul class="main__list">
																	<li class="single-item">
																		<a class="single-item__cover">
																			<img src="assets/img/covers/<?php echo $info['photo'] ?>" alt="">
																		</a>
																		<div class="single-item__title">
																			<h4><a href="javascript:;"><?php echo $info['name'] ?></a></h4>
																			<span><a href="javascript:;"><?php echo $info['venue'] ?> (<?php echo $info['date'] ?>)</a></span>
																		</div>
																		<span class="single-item__time"><?php echo $msc->fetchArtistVote($info['sn'], $artist) ?></span>
																	</li>
																</ul>
															</div>
														<?php } ?>
													</div>

												</div>
											</div>
										</div>
									<?php } else{  $songs = $msc->getArtistTestSongs($artist); ?>
										<!-- details form -->
										<div class="col-12 col-lg-6">
											<div class="dashbox">
												<div class="dashbox__title">
													<h3 class="text-small">Uploaded your Songs</h3>
													<em class="text-white">Upload 3 of your songs</em>
												</div>

												<div class="dashbox__list-wrap">

													<form method="post" enctype="multipart/form-data" autocomplete="off">
														<div class="row">

															<?php if(count($songs) < 3){ ?>
																<div class="col-12 col-md-6 col-lg-6 col-xl-6">
																	<div class="sign__group">
																		<label class="sign__label" for="username">Song Title</label>
																		<input type="text" name="title" class="sign__input" placeholder="Enter Song Title" required>
																	</div>
																</div>

																<div class="col-12 col-md-6 col-lg-6 col-xl-6">
																	<div class="sign__group">
																		<label class="sign__label" for="username">Song</label>
																		<input type="file" name="song" class="sign__input" placeholder="Upload Mp3" required>
																	</div>
																</div>


																<div class="col-12">
																	<button class="sign__btn" type="submit" name="uploadTestSong">Upload Song</button>
																</div>
															<?php }else{ ?>
																<div class="col-12">
																	<div class="alert bg-success">Song Upload Done</div>
																</div>
															<?php } ?>
														</div>
													</form>
												</div>
											</div>
										</div>


										<div class="col-12 col-lg-6">
											<div class="dashbox">
												<div class="dashbox__title">
													<h3 class="text-small">Uploaded Songs</h3>
												</div>

												<div class="dashbox__list-wrap">
													<ul class="main__list main__list--dashbox">
														<?php foreach($songs as $song){ ?>
															<li class="single-item">
																<a class="single-item__cover">
																	<img src="assets/img/covers/cover.svg" alt="">
																</a>
																<div class="single-item__title">
																	<h4><a href="#"><?php echo $song['title'] ?></a></h4>
																	<span><a href="javascript:;"><?php echo $data['stagename'] ?></a></span>
																</div>
																<span class="single-item__time">2:58</span>
															</li>
														<?php } ?>

													</ul>
												</div>
											</div>
										</div>
									<?php } ?>

								</div>
							</div>

							<div class="tab-pane fade" id="tab-2" role="tabpanel">
								<div class="row row--grid">
									<!-- details form -->
									<div class="col-12 col-lg-6">
										<div class="dashbox">
											<div class="dashbox__title">
												<h3 class="text-small">Update Profile</h3>
											</div>

											<div class="dashbox__list-wrap">
												<form method="post">
													<div class="row">

														<div class="col-12 col-md-6 col-lg-6 col-xl-6">
															<div class="sign__group">
																<label class="sign__label" for="username">Name</label>
																<input type="text" name="name" value="<?php echo ($data['name']); ?>" class="sign__input">
															</div>
														</div>

														<div class="col-12 col-md-6 col-lg-6 col-xl-6">
															<div class="sign__group">
																<label class="sign__label" for="username">Stage Name</label>
																<input type="text" name="stagename" value="<?php echo ($data['stagename']); ?>" class="sign__input">
															</div>
														</div>

														<div class="col-12 col-md-6 col-lg-6 col-xl-6">
															<div class="sign__group">
																<label class="sign__label" for="username">Email</label>
																<input type="email" name="email" disabled value="<?php echo ($data['email']); ?>" class="sign__input">
															</div>
														</div>

														<div class="col-12 col-md-6 col-lg-6 col-xl-6">
															<div class="sign__group">
																<label class="sign__label" for="username">Phone</label>
																<input type="text" name="phone" value="<?php echo ($data['phone']); ?>" class="sign__input">
															</div>
														</div>

														<div class="col-12 col-md-12">
															<div class="sign__group">
																<label class="sign__label" for="username">Bio</label>
																<input type="hidden" name="sn" value="<?php echo ($data['sn']); ?>" class="sign__input">
																<textarea class="sign__textarea" rows="4" name="bio"><?php echo ($data['bio']); ?></textarea>
															</div>
														</div>



														<div class="col-12">
															<button class="sign__btn" type="submit" name="updateMyArtistProfile">Update Profile</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="dashbox">
											<div class="dashbox__title">
												<h3 class="text-small">Update Profile Picture</h3>
											</div>

											<div class="dashbox__list-wrap">
												<form method="post" autocomplete="off" autofill="off" enctype="multipart/form-data">
													<i class="text-white">Upload preferably a square image</i>
													<div class="form-group">
														<label class="sign__label" for="username">Image</label>
				                                        <div class="custom-image">
				                                            <label for="image"></label>
				                                            <input type="file" id="image" accept="image/*" name="image" >
				                                            <span>No file selected</span>
				                                        </div>
				                                    </div>
													
													<button class="sign__btn" type="submit" name="artistUploadProfilePic">Click to Upload</button>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- end content tabs -->
					</div>


			</section>
			<!-- end slider -->
		</div>
	</main>
	<!-- end main content -->



	<div class="modal fade" id="artist_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('admin.editProjectCategory') }}" enctype="multipart/form-data">
            <div class="modal-body">
                
                <div id="artist_info">
                </div>
                

            </div>
        </form>
      </div>
    </div>
</div>


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
		$(function () {
			
	        //validating login form input on submit
	        $('body').on('click', '#viewArtist', function () {
	            const artist = $(this).data('artist');
	            const sn = $(this).data('sn');

	            $('#artist_modal').modal('show');
	            $('.modal-title').html(artist);
	            	            

                $.ajax({
                    method: 'get',
                    url: 'api.php',
                    beforeSend: () => {
                        $('#artist_info').html(`<i class="text-center">Loading...</i>`);
                    }
                }).done( function (res) {
                });
            })
		})
	</script>

	<script type="text/javascript">
		setTimeout( function() {
			$('#refresh').fadeOut();
		}, 3000)
	</script>
</body>

</html>