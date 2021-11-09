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
	<title>Admin - Show</title>

</head>
<body>
	<!-- header -->
	<?php include('head.php'); ?>
	<?php include('adminchecker.php'); ?>
	<!-- end header -->

	<!-- sidebar -->
	<?php include('sidebar.php') ?>
	<!-- end sidebar -->
	<?php include('player.php') ?>

	<?php if (isset($report)) { echo $msc->Alert(); } ?>

	<?php 


		
		if(isset($_GET['show'])){
			$sn = $_GET['show'];
			$show = $db->query("SELECT * FROM live_shows WHERE sn=$sn ")or die('cannot select show');
			$show = mysqli_fetch_array($show);
		}else{
			$show = $db->query("SELECT * FROM live_shows ORDER BY sn DESC LIMIT 1 ")or die('cannot select show');
			$show = mysqli_fetch_array($show);	
		}
	?>

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<!-- slider -->
			<section class="row">
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="#">Admin</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Show</li>
					</ul>
				</div>
				<div class="col-12 col-xl-10 offset-xl-1">
					<div class="article">
						<!-- article content -->
						<div class="article__content">
							 <?php echo $show['youtube'] ?>
							<div class="article__meta">
								<a href="javascript:;" class="article__place" > <?php echo $show['venue'] ?></a>
								<span class="article__date">
									<?php echo date('F j ,Y', strtotime($show['date'])) ?> 
									<?php echo date('h:i a', strtotime($show['time'])) ?>
								</span>
							</div>

							<h3><?php echo ucfirst($show['name']) ?></h3>

							<p><?php echo ucfirst($show['description']) ?></p>

							<div class="d-flex justify-content-between">
								<button class="btn btn-warning" data-toggle="modal" data-target="#tag_artist_modal">Tag Artists</button>
								<button class="btn btn-danger" data-toggle="modal" id="toggle_tagged">View Tagged Artists</button>
								<button class="btn btn-primary" data-toggle="modal" data-target="#edit_show_modal">Edit Show Info</button>
								<?php 
									$vs = $show['vote'];
									$vote = ($vs == 0)?
										'<button class="btn btn-secondary ActivateVote" data-vote="'.$vs.'">Enable vote</button>' :
										'<button class="btn btn-secondary ActivateVote" data-vote="'.$vs.'">Disable vote</button>';
									echo $vote;

									$status = $show['status'];
									$btn = ($status == 0)?
										'<button class="btn btn-success ActivateShow" data-status="'.$status.'">Activate Show</button>' :
										'<button class="btn btn-danger ActivateShow" data-status="'.$status.'">Deactivate Show</button>';
									echo $btn;
								?>
							</div>

							<input type="hidden" id="show_id" value="<?php echo $show['sn'] ?>">

						</div>
						<!-- end article content -->
					</div>
				</div>
			</section>
			<!-- end slider -->
		</div>
	</main>
	<!-- end main content -->


	<div class="modal fade" id="tag_artist_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Tag Artists</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="row">
		    			<div class="col-12">
		    				<form class="search" style="width: 100% " autocomplete="off" style="border-radius: 20px">
								<input type="text" id="search" class="" placeholder="Search artist by stageame">
							</form>

							<div class="dashbox" id="resultDisp">
								<div class="dashbox__title">
									<h3 class="text-small" id="text"></h3>
								</div>
								<div class="dashbox__table-wrap" >
									<div id="alert"></div>
									<div class="dashbox__table-scroll" id="result">
                                        <i>Loading ...</i>
									</div>
				    			</div>
				    		</div>
				    	</div>
		    		</div>
		      	</div>
		    </div>
		</div>
	</div>



	<div class="modal fade" id="tagged_artist_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Tagged Artists</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="row">
		    			<div class="col-12">

							<div class="dashbox">
								<div class="dashbox__title">
									<h3 class="text-small">Artists</h3>
								</div>
								<div class="dashbox__table-wrap">
									<div id="alert2"></div>
									<div class="dashbox__table-scroll" id="tagged">
                                        <i class="text-white">Loading ...</i>
									</div>
				    			</div>
				    		</div>
				    	</div>
		    		</div>
		      	</div>
		    </div>
		</div>
	</div>



	<div class="modal fade" id="edit_show_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Edit Show Info</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="row">
		    			<div class="col-12">

							<div class="dashbox">
								<div class="dashbox__table-wrap">
									<div class="dashbox__table-scroll">
										<form method="post" autocomplete="off">
											<div class="row">

												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label" for="username">Show Title</label>
														<input type="text" name="show" class="sign__input" placeholder="Enter show Title" value="<?php echo $show['name'] ?>" required>
													</div>
												</div>


												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label" for="username">Venue</label>
														<input type="text" name="venue" class="sign__input" placeholder="Enter show venue" value="<?php echo $show['venue'] ?>" required>
													</div>
												</div>

												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label" for="username">Date</label>
														<input type="date" name="date" class="sign__input" placeholder="Enter show date" value="<?php echo $show['date'] ?>" required>
													</div>
												</div>
												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label" for="username">Time</label>
														<input type="time" name="time" class="sign__input" placeholder="Enter show time" value="<?php echo $show['time'] ?>" required>
													</div>
												</div>

												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label" for="username">Info</label>
														<textarea class="sign__textarea" name="description" placeholder="Enter some text"><?php echo $show['description'] ?></textarea>
													</div>
												</div>
												<input type="hidden" name="sn" value="<?php echo $show['sn'] ?>">

												<div class="col-12">
													<button class="sign__btn" type="submit" name="editShow">Edit Show</button>
												</div>
											</div>
										</form>

									</div>
								</div>
							</div>
				    	</div>
		    		</div>
		      	</div>
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
	<script type="text/javascript">
		$(function () {


			const show = document.getElementById('show_id').value;

			const createTaggedBody = (show) =>{
				$.ajax({
					method: 'GET',
					url: 'api.php?showArtist='+show,
				}).done( function (res) {
					res = JSON.parse(res);
					$('#resultDisp').show();
					const tagged = document.getElementById('tagged');
                	tagged.innerHTML = ``;
                	if(res.length > 0) {
                		res.map((artist) => {
	                		const son = document.createElement('ul')
	                		son.classList.add('main__list');
	                		tagged.append(son)
	                		sonContent = `
								<ul class="">
									<li class="single-item">
										<a class="single-item__cover">
											<img src="assets/img/artists/${artist.data.photo}" alt="">
										</a>
										<div class="single-item__title">
											<h4><a href="#">${artist.data.name}</a></h4>
											<span><a href="javascript:;">${artist.data.stagename}</a></span>
										</div>
										<button class="btn btn-danger" id="unTagArtist" data-artist="${artist.id}" data-show="${show}">remove</button>
									</li>
								</ul>
							`
							son.innerHTML = sonContent

	                	})
                	}else {
                		document.getElementById('tagged').innerHTML = `
                			<div class="alert bg-danger">No Artist Tagged Yet</div>
                		`
                	}
				})
			}

			

			$('#toggle_tagged').on('click', function () {
				$('#tagged_artist_modal').modal('show')
				createTaggedBody(show);
			})




			const createBody = (param, show) => {
				$.ajax({
					method: 'GET',
					url: 'api.php?param='+param+'&&show='+show,
				}).done( function (res) {
					res = JSON.parse(res);
					console.log(res);
					$('#resultDisp').show();
					const result = document.getElementById('result');
					document.getElementById('text').innerHTML = 'Search result for "'+param+'"'
                	result.innerHTML = ``;
                	if(res.length > 0) {
                		res.map((artist) => {
                			
                			let btn = (artist.select == 0) ? 
                				`<button class="btn btn-primary" id="tagArtist" data-artist="${artist.id}" data-show="${show}"></button>`:
                				`<button class="btn btn-success" disabled data-artist="${artist.id}" data-show="${show}"></button>
                			`;
	                		const son = document.createElement('ul')
	                		son.classList.add('main__list');
	                		result.append(son)
	                		sonContent = `
								<ul class="">
									<li class="single-item">
										<a class="single-item__cover">
											<img src="assets/img/artists/${artist.img}" alt="">
										</a>
										<div class="single-item__title">
											<h4><a href="#">${artist.name}</a></h4>
											<span><a href="javascript:;">${artist.stagename}</a></span>
										</div>
										${btn}
									</li>
								</ul>
							`
							son.innerHTML = sonContent

	                	})
                	}else {
                		document.getElementById('result').innerHTML = `
                			<div class="alert bg-danger">No result found for search</div>
                		`
                	}
				})
			}




			$('#resultDisp').hide();
			$('#search').on('keyup', function () {
				const param = $('#search').val();
				const show = document.getElementById('show_id').value;
				if (param) {
					createBody(param, show);
				}
			})





			$('body').on('click', '#tagArtist', function () {
				const param = $('#search').val();
				const show = $(this).data('show')
				const data = {
					artist: $(this).data('artist'),
					show: show,
				}
				console.log(data);
				$.ajax({
					method: 'GET',
					url: 'api.php?tagArtist='+JSON.stringify(data)
				}).done( function (res) {
					res = JSON.parse(res);
					console.log(res);
					$('#alert').fadeIn();
					$('#alert').attr('class', 'alert bg-success');
					$('#alert').html(res.message);
					setTimeout( function() {
						$('#alert').fadeOut();
						createBody(param, show);
					}, 1500)
					
				});
			});
			

			$('body').on('click', '.ActivateShow', function () {
				const status = $(this).data('status')
				console.log(status);
				const data = {
					status: status,
					show: show,
				}
				if(confirm('Are you sure you want to perform operation')){
					$.ajax({
						method: 'GET',
						url: 'api.php?showStatus='+JSON.stringify(data),
						beforeSend: () => {
							$('.ActivateShow').html(`Processing...`);
						}
					}).done( function (res) {
						res = JSON.parse(res);
						if(status == 1){
							$('.ActivateShow').html(`Activate Show`);
							$('.ActivateShow').attr('class' ,'btn btn-success ActivateShow');
							$('.ActivateShow').attr('data-status' ,'0');
						}else {
							$('.ActivateShow').html(`Deactivate Show`);
							$('.ActivateShow').attr('class' ,'btn btn-danger ActivateShow');
							$('.ActivateShow').attr('data-status' ,'1');

						}
						alert(res.message);	
					});
				}
			});


			$('body').on('click', '.ActivateVote', function () {
				const vote = $(this).data('vote')
				console.log(vote);
				const data = {
					vote: vote,
					show: show,
				}
				if(confirm('Are you sure you want to perform operation')){
					$.ajax({
						method: 'GET',
						url: 'api.php?showVote='+JSON.stringify(data),
						beforeSend: () => {
							$('.ActivateVote').html(`Processing...`);
						}
					}).done( function (res) {
						res = JSON.parse(res);

						if(status == 1){
							$('.ActivateVote').html(`Enable Vote`);
							$('.ActivateVote').attr('data-status' ,'0');
						}else {
							$('.ActivateVote').html(`Disable Vote`);
							$('.ActivateVote').attr('data-status' ,'1');
						}
						alert(res.message);						
					});
				}
			});

			$('body').on('click', '#unTagArtist', function () {
				const show = $(this).data('show')
				const data = {
					artist: $(this).data('artist'),
					show: show,
				}
				$.ajax({
					method: 'GET',
					url: 'api.php?unTagArtist='+JSON.stringify(data)
				}).done( function (res) {
					res = JSON.parse(res);
					$('#alert2').fadeIn();
					$('#alert2').attr('class', 'alert bg-success');
					$('#alert2').html(res.message);
					setTimeout( function() {
						$('#alert2').fadeOut();
						createTaggedBody(show);
					}, 1500)
					
				});
			});
		})

		setTimeout( function() {
			$('#refresh').fadeOut();
		}, 3000)
	</script>
</body>

</html>