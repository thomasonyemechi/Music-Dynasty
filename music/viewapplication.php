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
	<title>Admin - View Application</title>

</head>
<body>
	<!-- header -->
	<?php include('head.php'); ?>
	<!-- end header -->

	<!-- sidebar -->
	<?php include('sidebar.php') ?>
	<!-- end sidebar -->
	<?php include('adminchecker.php'); ?>

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
						<li class="breadcrumb__item breadcrumb__item--active">View Application</li>
					</ul>
				</div>
				<div class="col-12">
					
					<div class="table-responsive">
						<div class="dashbox">
								<div class="dashbox__table-wrap">
									<h4 class="text-white">Recent Application</h4><hr>
									<div class="dashbox__table-scroll">
										<table class="main__table">
											<thead>
												<tr>
													<th>#</th>
													<th><a href="javascript:;" class="active">Artist Name</a></th>
													<th><a href="javascript:;" class="active">StageName</a></th>
													<th><a href="javascript:;" class="active">Email</a></th>
													<th><a href="javascript:;" class="active">Phone Number</a></th>
													<th><a href="javascript:;" class="active">Submited</a></th>
													<th><a href="javascript:;" class="active">Updated</a></th>
													<th><a href="javascript:;" class="active">Progress</a></th>
													<th><a href="javascript:;" class="active">Action</a></th>
												</tr>
											</thead>
											<tbody>
												<?php
										        if (isset($_GET['pageno'])) {$pageno = $_GET['pageno'];} else {$pageno = 1; }
										        $no_of_records_per_page = 100;
										        $offset = ($pageno-1) * $no_of_records_per_page;
										        $total_pages_sql = $db->query("SELECT * FROM artists WHERE status < 5 ")or die('cannot fetch artist');
										        $total_rows = mysqli_num_rows($total_pages_sql);
										        $total_pages = ceil($total_rows / $no_of_records_per_page);
										        $sql = $db->query("SELECT * FROM artists WHERE status < 5 ORDER BY sn DESC LIMIT $offset, $no_of_records_per_page ")or die('cannot fetch artist');
										        while($art = mysqli_fetch_array($sql)){
										    ?>

												<tr>
													<td>#</td>
													<td><?php echo ucfirst($art['name']); ?></td>
													<td><?php echo ucfirst($art['stagename']); ?></td>
													<td><?php echo $art['email']; ?></td>
													<td><?php echo $art['phone']; ?></td>
													<td><?php echo date('j M y',$art['ctime']); ?></td>
													<td><?php echo date('j M y h:i a',strtotime($art['updated'])); ?></td>
													<td></td>
													<td><button class="btn btn-primary btn-sm m-1" id="viewArtist" data-sn="<?php echo $art['sn']; ?>" data-artist="<?php echo $art['name']; ?>">View</button></td>
												</tr>
											<?php } ?>
										</tbody>
										</table>
									</div>

										<?php if($total_rows > $no_of_records_per_page){ ?>

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
					</div>
				</div>
			</section>
			<!-- end slider -->
		</div>
	</main>
	<!-- end main content -->

	<?php 
		$data = $msc->getArtist($artist); 
		$songs = $msc->getArtistTestSongs($artist);
	?>

	<div class="modal fade" id="artist_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h5 class="modal-title" id="staticBackdropLabel"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<?php include('artistmodalinfo.php') ?>
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

		function playAud()
		{
			var audio = new Audio('assets/audio/11625519744.mp3');
			audio.play();
		}
		function pauseAud()
		{
			var audio = new Audio('assets/audio/11625519744.mp3');
			audio.pause();
		}


		function play_audio0(task) {
		      if(task == 'play'){
		           $(".my_audio0").trigger('play');
		           $(".btnp0").addClass("d-none");
		           $(".btns0").removeClass("d-none");
		      }
		      if(task == 'stop'){
		           $(".my_audio0").trigger('pause');
		           $(".my_audio0").prop("currentTime",0);
		           $(".btns0").addClass("d-none");
		           $(".btnp0").removeClass("d-none");
		      }
		}


		function play_audio1(task) {
		      if(task == 'play'){
		           $(".my_audio1").trigger('play');
		           $(".btnp1").addClass("d-none");
		           $(".btns1").removeClass("d-none");
		      }
		      if(task == 'stop'){
		           $(".my_audio1").trigger('pause');
		           $(".my_audio1").prop("currentTime",0);
		           $(".btns1").addClass("d-none");
		           $(".btnp1").removeClass("d-none");
		      }
		}

		function play_audio2(task) {
		      if(task == 'play'){
		           $(".my_audio2").trigger('play');
		           $(".btnp2").addClass("d-none");
		           $(".btns2").removeClass("d-none");
		      }
		      if(task == 'stop'){
		           $(".my_audio2").trigger('pause');
		           $(".my_audio2").prop("currentTime",0);
		           $(".btns2").addClass("d-none");
		           $(".btnp2").removeClass("d-none");
		      }
		}
		
		
		
		function downloadBlob(blob, filename) {
          var a = document.createElement('a');
          a.download = filename;
          a.href = blob;
          document.body.appendChild(a);
          a.click();
          a.remove();
        }
        
        function downloadResource(url) {
          filename = url.split('\\').pop().split('/').pop();
          fetch(url, {
              mode: 'no-cors'
            })
            .then(response => response.blob())
            .then(blob => {
              let blobUrl = window.URL.createObjectURL(blob);
              downloadBlob(blobUrl, filename);
            })
            .catch(e => console.error(e));
        }
        








		

		$(function () {
	        //validating login form input on submit
	        $('body').on('click', '#viewArtist', function () {
	            const artist = $(this).data('artist');
	            const sn = $(this).data('sn');

	            $('#artist_modal').modal('show');
	            $('.modal-title').html(artist);
	            $('#name').html(artist);
	            $('.approveArtist').val(sn);

                $.ajax({
                    method: 'get',
                    url: 'api.php?getTalent='+sn,
                }).done( function (res) {
                	res = JSON.parse(res);
                	
                	let pic = (res.info.photo) ? res.info.photo : 'avatar.svg';
                	document.getElementById('img').src = `assets/img/artists/${pic}`;
                	document.getElementById('img2').src = `assets/img/artists/${pic}`;
                	document.getElementById('emailm').innerHTML = res.info.email;
                	document.getElementById('showartistBio').innerHTML = res.info.bio;
                
                	const songlist = document.getElementById('songlist');
                	songlist.innerHTML = ``;
                	if(res.songs.length > 0) {
                		res.songs.map((song, index) => {
	                		const son = document.createElement('ul')
	                		son.classList.add('main__list');
	                		songlist.append(son)
	                		sonContent = `
								<ul class="">
									<audio class="my_audio${index}" preload="none">
									    <source src="assets/audio/${song.song}" type="audio/mpeg">
									    <source src="assets/audio/${song.song}" type="audio/ogg">
									</audio>

									<li class="single-item">
										<a class="single-item__cover">
											<img src="assets/img/covers/cover.svg" alt="">
										</a>
										<div class="single-item__title">
											<h4><a href="#">${song.title}</a></h4>
											<span><a href="javascript:;">${res.info.stagename}</a></span>
										</div>
										<button class="btnp${index} text-white" onclick="play_audio${index}('play')"><i class="fa fa-play"></i></button>
										<button class="btns${index} d-none text-white" onclick="play_audio${index}('stop')"><i class="fa fa-stop"></i></button>
										<a href="#" class="ml-2" onClick="javascript:downloadResource('https://musicdynasty.ng/music/assets/audio/${song.song}')"><i class="fa fa-download"></i></a>

									</li>
								</ul>
							`
							son.innerHTML = sonContent

							$(".my_audio").trigger('load')


							function play_audio(task) {
							      if(task == 'play'){
							           $(".my_audio").trigger('play');
							      }
							      if(task == 'stop'){
							           $(".my_audio").trigger('pause');
							           $(".my_audio").prop("currentTime",0);
							      }
							 }



	                	})
                	}else {
                		const songlist = document.getElementById('songlist').innerHTML = `
                			<div class="alert bg-danger">No Uploaded Music Yet</div>
                		`
                	}
                });
            })
		})

		setTimeout( function() {
			$('#refresh').fadeOut();
		}, 3000)
	</script>
</body>

</html>