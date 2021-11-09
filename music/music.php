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
	<title>Admin - Music</title>

</head>
<body>
	<!-- header -->
	<?php include('head.php'); ?>
	<?php include('adminchecker.php') ?>
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
						<li class="breadcrumb__item breadcrumb__item--active">Music Management</li>
					</ul>
				</div>
				<div class="col-12">
					
					<div class="dashbox">
						<div class="dashbox__title">
							<h3 class="text-small">Add Music / Album</h3>
							<button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#week_music_modal">Week's Music</button>
							<button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#genre_modal">Add Genre</button>
						</div>
						<div class="dashbox__table-wrap">
							<div class="dashbox__table">
								<form method="post" autocomplete="off" autofill="off" enctype="multipart/form-data">

									<div class="sign__group">
										<input type="text" class="sign__input" placeholder="Music/Album Title" name="name">
									</div>



									<div class="sign__group">
										<label class="sign__label">Select Genre</label>
										<select class="sign__select" id="optGenre" name="genre" required>
										</select>
									</div>


									<div class="sign__group">
										<label class="sign__label">Select Artist</label>
										<select class="sign__select" id="artist" name="artist" required>
										</select>
									</div>

									<div class="sign__group">
										<input type="text" class="sign__input" placeholder="Specify Link" name="link">
									</div>


									<div class="form-group">
										<label class="sign__label">Art Work</label>
                                        <div class="custom-image">
                                            <label for="image"></label>
                                            <input type="file" id="image" accept="image/*" name="artwork" >
                                            <span>No file selected</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
	                                    <div class="sign__group sign__group--checkbox">
											<input id="remember" name="alb" type="checkbox" value="1">
											<label for="remember">Check if you are adding an album</label>
										</div>
									</div>
										
									<button class="sign__btn" id="signup" type="submit" name="addArtistMusic">Upload Info</button>

								</form>

							</div>
						</div>
					</div>



					<div class="dashbox">
						<div class="dashbox__title">
							<h3 class="text-small">Recent Music / Album</h3>
						</div>
						<div class="dashbox__table-wrap">
							<div class="dashbox__table-scroll">
								<table class="main__table">
									<thead>
										<tr>
											<th><a href="javascript:;" class="active">#</a></th>
											<th><a href="javascript:;" class="active">Song</a></th>
											<th><a href="javascript:;" class="active">Genre</a></th>
											<th><a href="javascript:;" class="active">Type</a></th>
											<th><a href="javascript:;" class="active">Artist</a></th>
											<th><a href="javascript:;" class="active">Artwork</a></th>
											<th><a href="javascript:;" class="active">Action</a></th>
										</tr>
									</thead>
									<tbody id="musicBody">
										<tr>
											
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


	<div class="modal fade" id="edit_genre_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Edit Genre</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="row">
		    			<div class="col-12">

							<div class="dashbox">
								<div class="dashbox__title"><h3>Edit Genre</h3></div>
								<div class="dashbox__table-wrap">

									<div class="dashbox__table">
										<form method="post" autocomplete="off">
											<div class="row">
												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label">Genre</label>
														<input type="text" name="genre" id="edit_genre_title" class="sign__input" placeholder="Enter show time"required>
														<input type="hidden" name="id" id="edit_genre_id">
													</div>
												</div>

												<div class="col-12">
													<button class="sign__btn" type="submit" name="editGenre">Save</button>
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



	<div class="modal fade" id="edit_music_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Edit Music</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="row">
		    			<div class="col-12">
							<div class="dashbox">
								<div class="dashbox__title"><h3>Edit Music</h3></div>
								<div class="dashbox__table-wrap">

									<div class="dashbox__table">
										<form method="post" autocomplete="off">
											<div class="row">
												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label">Music</label>
														<input type="text" name="name" id="edit_music_title" class="sign__input" placeholder="Enter title"required>
														<input type="hidden" name="sn" id="edit_music_id">
													</div>

													<div class="sign__group">
														<label class="sign__label">Music Link</label>
														<input type="text" name="link" id="edit_music_link" class="sign__input" placeholder="Enter Link"required>
													</div>

												</div>

												<div class="col-12">
													<button class="sign__btn" type="submit" name="updateArtistMusic">Save</button>
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



	<div class="modal fade" id="genre_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Genre</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="row">
		    			<div class="col-12">

							<div class="dashbox">
								<div class="dashbox__title"><h3>Add Genre</h3></div>
								<div class="dashbox__table-wrap">

									<div class="dashbox__table">
										<form method="post" autocomplete="off">
											<div class="row">
												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label">Genre</label>
														<input type="text" name="genre" class="sign__input" placeholder="Enter Genre"required>
													</div>
												</div>

												<div class="col-12">
													<button class="sign__btn" type="submit" name="addGenre">Add</button>
												</div>
											</div>
										</form>

									</div>
								</div>
							</div>


							<div class="dashbox">
								<div class="dashbox__title"><h3>All Gnere</h3></div>
								<div class="dashbox__table-wrap">

									<div class="dashbox__table-scroll">
										<form method="post" autocomplete="off">
											<div class="row">
												<div class="col-12">
													<table class="main__table">
														<thead>
															<tr>
																<th><a href="javascript:;" class="active">Genre</a></th>
																<th><a href="javascript:;" class="active">Action</a></th>
															</tr>
														</thead>
														<tbody id="genreBody">
															<tr>
																
															</tr>
														</tbody>
													</table>
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


	<div class="modal fade" id="week_music_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Music of the week</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="row">
		    			<div class="col-12">

							<div class="dashbox">
								<div class="dashbox__title"><h3>Add Music</h3></div>
								<div class="dashbox__table-wrap">

									<div class="dashbox__table">
										<form method="post" autocomplete="off" enctype="multipart/form-data">
											<div class="row">
												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label">Music Name</label>
														<input type="text" name="name" class="sign__input" placeholder="Enter Music name"required>
													</div>
													<div class="sign__group">
														<label class="sign__label">Arist Name</label>
														<input type="text" name="artist" class="sign__input" placeholder="Enter artist name"required>
													</div>
													<div class="sign__group">
														<label class="sign__label">Mp3</label>
														<input type="file" name="song" class="sign__input" required>
													</div>
												</div>

												<div class="col-12">
													<button class="sign__btn" type="submit" name="musicWeek">Add</button>
												</div>
											</div>
										</form>

									</div>
								</div>
							</div>


							<div class="dashbox">
								<div class="dashbox__title"><h3>Current</h3></div>
								<div class="dashbox__table-wrap">

									<div class="dashbox__table">
										<form method="post" autocomplete="off">
											<div class="row">
												<div class="col-12">
													<table class="main__table">
														<thead>
															<tr>
																<th><a href="javascript:;" class="active">Music</a></th>
																<th><a href="javascript:;" class="active">Artist</a></th>
															</tr>
														</thead>
														<tbody id="weekMusic">
															<tr>
																<th><?php echo ucfirst($Week_msc['title']) ?></th>
																<th><?php echo ucfirst($Week_msc['artist']) ?></th>
															</tr>
														</tbody>
													</table>
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

	<div class="modal fade" id="addVideo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title addVideoTitle" id="staticBackdropLabel"></h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="row">
		    			<div class="col-12">

							<div class="dashbox p-2">
									<div class="dashbox__table">
										<form method="post" autocomplete="off" enctype="multipart/form-data">
											<div class="row">
												<div class="col-12">
													<div class="sign__group">
														<label class="sign__label">Video Frame</label>
														<input type="hidden" name="music" id="add_music_video" >
														<input type="text" name="video" class="sign__input" required>
													</div>
												</div>
												<div class="col-12">
													<button class="sign__btn" type="submit" name="addMusicVideo" >Add</button>
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

			//$('#week_music_modal').modal('show');

			$.ajax({
				method: 'get',
				url: 'api.php?getAllGenre=111',
			}).done( function (res){
				
				res = JSON.parse(res);

				res.map((genre) => {
					const tr = document.createElement('tr');
					const body = document.getElementById('genreBody');
					body.append(tr);

					tr.innerHTML = `
						<td>${genre.genre}</td>
						<td><button class="btn btn-sm btn-info m-1 editGenre" data-genre=${genre.genre} data-id=${genre.sn}>Edit</button></td>
					`
				})


				$('#optGenre').append(`<option selected="" value>--Select genre--</option>`)
                res.map((genre) => {
                    $('#optGenre').append(`<option value=${genre.sn}>${genre.genre}</option>`)
                });


			})


			$.ajax({
				method: 'get',
				url: 'api.php?fetchAllArtist=150',
			}).done( function (res){
				res = JSON.parse(res);
				$('#artist').append(`<option selected="" value>--Select Artist--</option>`)
                res.map((artist) => {
                    $('#artist').append(`<option value=${artist.sn}>${artist.stagename}</option>`)
                });
			})


			$('body').on('click', '.editGenre', function (e) {
				event.preventDefault();
				const genre = $(this).data('genre');
				const id = $(this).data('id');
				$('#genre_modal').modal('hide')
				$('#edit_genre_modal').modal('show');
				$('#edit_genre_title').val(genre);
				$('#edit_genre_id').val(id);
			})


			const loadMusic = () => {
				$.ajax({
					method: 'get',
					url: 'api.php?fetchMusicAlbum=150',
				}).done( function (res) {
					res = JSON.parse(res);
					console.log(res);
					const body = document.getElementById('musicBody');
					body.innerHTML = '';
					res.map((song, index) => {
						const cla = (song.info.top == 0)? 'o' : 'bg-white';
						const tr = document.createElement('tr');
						tr.classList.add(cla);
						
						body.append(tr);

						const ty = (song.info.type == 0) ? 'single' : 'Album';
						const videobtn = (song.info.video_url == null) ? `<button class="btn btn-sm btn-secondary m-1 addVideo" data-id=${song.info.sn} data-name='${song.info.name}'>Video</button>` : `<button class="btn btn-sm btn-warning m-1 addVideo" data-id=${song.info.sn} data-name='${song.info.name}'>Video</button>` ;

						const topbtn = (song.info.top == 0) ? `<button class="btn btn-sm btn-success m-1 markTop" data-id=${song.info.sn}>Top</button>` : `<button class="btn btn-sm btn-danger m-1 unmarkAsTop" data-id=${song.info.sn}>Untop</button>` ;

						tr.innerHTML = `
							<td>${index+1}</td>
							<td>${song.info.name}</td>
							<td>${song.genre}</td>
							<td>${ty}</td>
							<td>${song.artist.stagename}</td>
							<td>
								<a data-link class="single-item__cover">
									<img src="assets/img/covers/${song.info.photo ?? ''}" alt="">
								</a>
							</td>
							<td>
							<button class="btn btn-sm btn-info m-1 editMusic" data-id=${song.info.sn} data-name='${song.info.name}' data-link='${song.info.link}' >Edit</button>
							${videobtn}
							${topbtn}</td>
						`
					})
				});
			}

			loadMusic();


			

			$('body').on('click', '.markTop', function (e) {
				event.preventDefault();
				const id = $(this).data('id');
				if(confirm('Item will be on top List')){
					$.ajax({
						method: 'get',
						url: 'api.php?markAsTop='+id,
					}).done(function (res){
						//res = JSON.parse(res);
						console.log(res);
						//alert(res.message);
						loadMusic();
					})
				}
			})
			

			$('body').on('click', '.unmarkAsTop', function (e) {
				event.preventDefault();
				const id = $(this).data('id');
				if(confirm('Item will be removed top List')){
					$.ajax({
						method: 'get',
						url: 'api.php?unmarkAsTop='+id,
					}).done(function (res){
						//res = JSON.parse(res);
						console.log(res);
						//alert(res.message);
						loadMusic();
					})
				}
			})


			$('body').on('click', '.editMusic', function (e) {
				event.preventDefault();
				const id = $(this).data('id');
				const name = $(this).data('name');
				const link = $(this).data('link');
				$('#edit_music_modal').modal('show');
				$('#edit_music_title').val(name);
				$('#edit_music_link').val(link);
				$('#edit_music_id').val(id);
			})




			$('body').on('click', '.addVideo', function (e) {
				event.preventDefault();
				const id = $(this).data('id');
				const name = $(this).data('name');
				$('#addVideo').modal('show');
				$('.addVideoTitle').html(`Add video for ${name}`);
				$('#add_music_video').val(id);
			})


			



		})


		
		setTimeout( function() {
			$('#refresh').fadeOut();
		}, 3000)
	</script>
</body>

</html>