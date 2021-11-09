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
	<title>Admin - Manage Artist</title>
	<style type="text/css">
		label { 
			color: white;
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
						<li class="breadcrumb__item breadcrumb__item--active">Manage Artist</li>
					</ul>
				</div>
				<div class="col-12">
					
					<div class="dashbox">
						<div class="dashbox__title">
							<h3 class="text-small">Manage Artist</h3>
						</div>
						<div class="dashbox__table-wrap">
							<div class="dashbox__table">
								<form method="post" autocomplete="off" autofill="off">

									<div class="sign__group">
										<select name="manageArtist" class="sign__select" onchange="submit();">
											<option>...Select Artist To view</option>
											<?php 
												$ar = $db->query("SELECT * FROM artists ORDER BY name " );
												while($row = mysqli_fetch_array($ar)) {
											?>
												<option value="<?= $row['sn'] ?>"> <?= $row['name'] . ' - ' .$row['stagename'] ?> </option>
											<?php } ?>
										</select>
									</div>
								
								</form>

							</div>
						</div>
					</div>


					<?php
						if(isset($_SESSION['manageArtist'])) {
						$artist = $msc->getArtist($_SESSION['manageArtist']);
					?>

						<div class="dashbox">
							<div class="dashbox__title">
								<h3 class="text-small">Manage <?= $artist['name']. ' - '. $artist['stagename']; ?> </h3>
							</div>
							<div class="dashbox__table-wrap">
								<div class="dashbox__table">
									<h3 class="text-white">Profile Info</h3>
									<form method="post" class="row" autocomplete="off" autofill="off">
										<div class="col-md-6">
											<div class="sign__group">
												<label>Name</label>
												<input type="text" class="sign__input" placeholder="Name" value="<?= $artist['name'] ?>" name="name">
											</div>
										</div>

										<div class="col-md-6">
											<div class="sign__group">
												<label>Stage Name</label>
												<input type="text" class="sign__input" placeholder="Stage Name" value="<?= $artist['stagename'] ?>" name="stagename">
											</div>
										</div>


										<div class="col-md-6">
											<div class="sign__group">
												<label>Email</label>
												<input type="email" class="sign__input" placeholder="Email" value="<?= $artist['email'] ?>" name="email">
											</div>
										</div>

										<div class="col-md-6">
											<div class="sign__group">
												<label>Phone</label>
												<input type="text" class="sign__input" placeholder="Phone" value="<?= $artist['phone'] ?>" name="phone">
												<input type="hidden" value="<?= $artist['sn'] ?>" name="artist_id">
											</div>
										</div>

										<div class="col-md-12">
											<textarea name="bio" rows="4" class="sign__textarea"><?=  $artist['bio']  ?></textarea>

											<button class="sign__btn" name="updateArtistProfileFromAdmin">Update Info</button>
										</div>

									</form>

									<hr>
									<h3 class="text-white">Others</h3>
									<div class="mb-3">
										<div class="d-flex justify-content-center">
											<button class="btn btn-secondary changeArtistPassword">Change Password</button>
											<button class="ml-2 btn btn-info">Upload Photo</button>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="modal fade" id="changePasswordArtist" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" 	aria-hidden="true">
						    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
						      	<div class="modal-content">
							        <div class="modal-header">
								        <h4 class="modal-title" id="staticBackdropLabel">Change Artist Password</h4>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								        	<span aria-hidden="true">&times;</span>
								        </button>
							        </div>
							        <div class="modal-body container-fluid">
							    		<div class="sign">
											<div class="sign__content">
												<form method="post" class="sign__form" autocomplete="off">
													<div id="logger_alert" class=""></div>

													<div class="sign__group">
														<input type="password" class="sign__input form-control" name="newpass" placeholder="Password">
													</div>


													<div class="sign__group">
														<input type="password" class="sign__input form-control" name="cnewpass" placeholder="Confirm Password">

														<input type="hidden" value="<?= $_SESSION['manageArtist'] ?>" name="artist_id" >
													</div>

													<button class="sign__btn" type="submit" name="changeArtistPassword"  >Submit</button>



												</form>
											</div>
										</div>
							      	</div>
							    </div>
							</div>
						</div>









					<?php }  ?>
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
	<script src="assets/js/login.js"></script>
	<script type="text/javascript">
		$(function () {

			$('.changeArtistPassword').on('click', function() {
				$('#changePasswordArtist').modal('show');
			});

			

		})

		setTimeout( function() {
			$('#refresh').fadeOut();
		}, 3000)
	</script>
</body>

</html>