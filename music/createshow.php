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
	<title>Admin - Create Show</title>

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
						<li class="breadcrumb__item breadcrumb__item--active">Create Show</li>
					</ul>
				</div>
				<div class="col-12">
					
					<div class="dashbox">
						<div class="dashbox__title">
							<h3 class="text-small">Create show</h3>
						</div>
						<div class="dashbox__table-wrap">
							<div class="dashbox__table">
								<form method="post" enctype="multipart/form-data">
									<div class="row">

										<div class="col-12">
											<div class="sign__group">
												<label class="sign__label" for="username">Show Title</label>
												<input type="text" name="show" class="sign__input" placeholder="Enter show Title" required>
											</div>
										</div>


										<div class="col-12">
											<div class="sign__group">
												<label class="sign__label" for="username">Venue</label>
												<input type="text" name="venue" class="sign__input" placeholder="Enter show venue" required>
											</div>
										</div>

										<div class="col-12">
											<div class="sign__group">
												<label class="sign__label" for="username">Date</label>
												<input type="date" name="date" class="sign__input" placeholder="Enter show date" required>
											</div>
										</div>
										<div class="col-12">
											<div class="sign__group">
												<label class="sign__label" for="username">Time</label>
												<input type="time" name="time" class="sign__input" placeholder="Enter show time" required>
											</div>
										</div>
										<div class="col-12">
											<div class="sign__group">
												<label class="sign__label" for="username">Youtube Video Link</label>
												<input type="text" name="link" class="sign__input" placeholder="Enter live video link" required>
											</div>
										</div>

										<div class="col-12">
											<div class="form-group">
												<label class="sign__label" for="username">Show Display Image</label>
		                                        <div class="custom-image">
		                                            <label for="image"></label>
		                                            <input type="file" id="image" accept="image/*" name="cover" >
		                                            <span>No file selected</span>
		                                        </div>
		                                    </div>
		                                </div>

										<div class="col-12">
											<div class="sign__group">
												<label class="sign__label" for="username">Info</label>
												<textarea class="sign__textarea" name="description" placeholder="Enter some text"></textarea>
											</div>
										</div>

										<div class="col-12">
											<button class="sign__btn" type="submit" name="createShow">Create Show</button>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>




					<div class="dashbox">
						<div class="dashbox__title">
							<h3 class="text-small">Recent Shows</h3>
						</div>
						<div class="dashbox__table-wrap">
							<div class="dashbox__table">
								<table class="table table">
									<thead>
										<tr>
											<th>Show Name</th>
											<th>Venue</th>
											<th>Date/Time</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="showsBody">
										<tr>
											<td colspan="12">Loading Shows...</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
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
	<script src="assets/js/img.js"></script>
	<script type="text/javascript">
		$(function () {



			$.ajax({
				method: 'GET',
				url: 'api.php?fetchShows=100',
			}).done( function (res) {
				res = JSON.parse(res);
				const showsBody = document.getElementById('showsBody');
            	showsBody.innerHTML = ``;
            	console.log(res);
            	if(res.length > 0) {
            		res.sort(function(a, b) {
					    return a.sn - b.sn;
					});
            		res.map((show) => {
                		const son = document.createElement('tr')
                		showsBody.append(son)
                		sonContent = `
							<tr>
								<td>${show.name}</td>
								<td>${show.venue}</td>
								<td>${show.date}</td>
								<td><a class="btn btn-sm btn-info" href="showinfo.php?show=${show.sn}">View</a></td>
							</tr>
						`
						son.innerHTML = sonContent
                	})
            	}
			})




		})

		setTimeout( function() {
			$('#refresh').fadeOut();
		}, 3000)
	</script>
</body>

</html>