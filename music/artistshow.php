<?php 
    session_start(); ob_start(); ob_clean(); 
    
    
    ///echo $_SESSION['user_id'];
    
    //exit();
	if(isset($_GET['show'])){
		$show = $_GET['show'];
	}else{ header('location: liveshows.php'); }

	if(isset($_GET['artist'])){
		$artist = $_GET['artist']; 
	}else{ header('location: liveshows.php'); }

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

	<?php 
		$show = $db->query("SELECT * FROM live_shows WHERE sn='$show' ")or die('cannot select show');
		$show = mysqli_fetch_array($show);
	?>

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<!-- slider -->
			<section class="row">
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="#">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Watch Show</li>
					</ul>
				</div>
				<div class="col-12 col-xl-10 offset-xl-1">
					<div class="article">
						<!-- article content -->
						<div class="article__content">
							<?php echo $show['youtube'] ?>
							<div class="d-flex justify-content-between">
								<a href="javascript:;" class="article__place" > <?php echo $show['venue'] ?></a>
								<span class="article__date">
									<?php echo date('F j ,Y', strtotime($show['date'])) ?> 
									<?php echo date('H:i a', strtotime($show['time'])) ?>
								</span>
							</div>

							<h3><?php echo ucfirst($show['name']) ?></h3>

							<p><?php echo ucfirst($show['description']) ?></p>
							<input type="hidden" id="show_id" value="<?php echo $show['sn'] ?>">
							<input type="hidden" id="vote" value="<?php echo $show['vote'] ?>">
							<input type="hidden" id="voter" value="<?php echo $_SESSION['user_id']; ?>">

						</div>
						<!-- end article content -->
					</div>


					<div class="dashbox__title">
						<h3 class="text-small">Tagged Talent </h3><small class="text-white"> click on Talent to vote</small>
					</div>
					<div class="dashbox__table-wrap">
						<div id="alert2"></div>
						<div class="dashbox__table">
							<div class="row" id="tagged">
									
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
									<img src="assets/icon/logo.png" alt="" style=" width: 200px">
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
	<!-- <script src="userlogin.js"></script> -->
	<script type="text/javascript">
		$(function () {

			//$('#login_modal').modal('show');

			const show = document.getElementById('show_id').value;
			const art = '<?= $_GET['artist'] ?>'
			const vote = document.getElementById('vote').value;
			const voter = document.getElementById('voter').value;

			const artistSectionBody = (show) => {
				$.ajax({
					method: 'GET',
					url: `api.php?showSingleArtist=${show}&&artist=${art}`,
				}).done( function (res) {
					res = JSON.parse(res);
					const tagged = document.getElementById('tagged');
                	tagged.innerHTML = ``;

            		const son = document.createElement('div')
            		son.classList.add('col-lg-6');
            		tagged.append(son)
            		let color = (res.useropt > 0) ? 'text-danger' : 'text-white' ;
            		sonContent = `
						<div class="">
							<ul class="main__list">
								<li class="single-item">
									<a class="single-item__cover">
										<img src="assets/img/artists/${res.data.photo}" alt="">
									</a>
									<div class="single-item__title">
										<h4><a href="javascript:;">${res.data.name}</a></h4>
										<span><a href="javascript:;">${res.data.stagename}</a></span>
									</div>
									<a href="javascript:;"><i class="fa fa-heart ${color} vote" id=${res.data.sn} data-artist=${res.data.sn} 
									data-voted=${res.useropt}  style="font-size:17px"> </i><big class="text-bold text-white id="big"  "> ${res.votes}</big></a>
								</li>
							</ul>
						</div>
					`
					son.innerHTML = sonContent

				})
			}


			artistSectionBody(show)

			$('body').on('click', '.vote', function () {
				const artist = $(this).data('artist');
				const voted = $(this).data('voted');
				const id = document.getElementById(artist);

				if(voter == 0 || voter == ''){
					if(confirm('You are not logged in, pls log in to vote')){
						$('#login_modal').modal('show');
					}
				}else{
					if(voted > 0){
						console.log('you voted already');
					}else{
						data = {
							voter: voter,
							show: show,
							artist: artist,
						}
						$.ajax({
							method: 'GET',
							url: 'api.php?castVote='+JSON.stringify(data),
							beforeSend: () => {
								id.classList.remove('text-white');
								id.classList.remove('vote');
								id.classList.add('text-danger');
							}
						}).done( function (res) {
							artistSectionBody(show);
							console.log(res);
						});
					}
				}
			})




			//validating login form input on submit
			$('#login_user').on('click', function (e) {
			    e.preventDefault();
			    const alert = document.getElementById('alert');
			    const email = $('#email').val();
			    const password = $('#password').val();
			    
			    if(email == '' || password == ''){
			    	$('#alert').fadeIn()
			        alert.setAttribute('class', 'alert bg-danger text-white');
			        alert.innerHTML = 'Email cannot be empty'
			        setTimeout( function () {
			        	$('#alert').fadeOut();
			        }, 2000)
			    }else{
			        alert.removeAttribute('class', 'alert bg-danger');
			        alert.innerHTML = ''
			        data = {
			            email : email,
			            password : password,
			        };

			        $.ajax({
			            method: 'get',
			            url: 'api.php?LoginUsersApiViaMusic=' + JSON.stringify(data),
			            beforeSend: () => {
			                $('#login_user').html(`Processing....`)
			                $('#login_user').attr('disabled', 'disabled');
			            }
			        }).done( function (res) {

			        	console.log(res);
			        	
			            res = JSON.parse(res);
			            if(res.success){
			                
			                alert.setAttribute('class', 'alert bg-success text-white');
			                alert.innerHTML = res.message
			                setTimeout(function () {
			                	window.location.reload();
			                }, 3000);

			            }else{
			                $('#alert').fadeIn()
					        alert.setAttribute('class', 'alert bg-danger text-white');
					        alert.innerHTML = res.message
					        setTimeout( function () {
					        	$('#alert').fadeOut();
					        }, 2000)
			            }
			            $('#login_user').html(`Sign In`)
			            $('#login_user').removeAttr('disabled');
			        });
			    }        
			})


		})
	</script>
</body>

</html>