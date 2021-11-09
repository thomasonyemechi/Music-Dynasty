<?php include ('lib/mconnect.php'); 
	?>
<link rel="stylesheet" type="text/css" href="../musicdynasty/fontawesomeweb/css/all.min.css">
<header class="header">
	<div class="header__content">				
		
		<div class="header__logo">
			<a href="index.php">
				<img src="assets/icon/logo.png" alt="" style=" width: 200px">
			</a>
		</div>

		<nav class="header__nav">
			<a href="about.php">About</a>
			<a href="contact.php">Contacts</a>
		</nav>

		<form method="post" class="header__search">
			<input type="text" name="q" placeholder="Talent, Material or video">
			<button type="submit"><svg viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg></button>
			<button type="button" class="close"></button>
		</form>
		
		
		<div class="header__actions">
			<div class="header__action header__action--search">
				<button class="header__action-btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg></button>
			</div>


			<div class="header__action header__action--signin">
				<a class="header__action-btn" href="liveshows.php">
					<span>Talent League <i class="fa fa-microphone"></i></span>
				</a>
				<?php
				    if(isset($_SESSION['user_id']) OR isset($_SESSION['artist'])){
				        echo '<a class="header__action-btn" href="logout.php" >
        					<span>SignOut </span>
        				</a>';
				    }else {
				        echo '<a class="header__action-btn logmein" >
        					<span>SignIn </span>
        				</a>';
				    }
				    
				?>
			</div>
		</div>

		<button class="header__btn" type="button">
			<span></span>
			<span></span>
			<span></span>
		</button>
	</div>
</header>




	<div class="modal fade" id="logger_login_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" 	aria-hidden="true">
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

								<div id="logger_alert" class=""></div>

								<div class="sign__group">
									<input type="email" class="sign__input form-control" id="logger_email" name="email" placeholder="Email">
									<i id="danger1" style="color: red"></i>
								</div>


								<div class="sign__group">
									<input type="password" class="sign__input form-control" id="logger_password" placeholder="Password">
								</div>
								
								<button class="sign__btn" type="submit" id="logger_login_user" >Sign In</button>


								<span class="sign__text loginSignup">Don't have an account? <a href="#">Sign up!</a></span>

							</form>
						</div>
					</div>
		      	</div>
		    </div>
		</div>
	</div>



	<div class="modal fade" id="signer_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" 	aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
	      	<div class="modal-content">
		        <div class="modal-header">
			        <h4 class="modal-title" id="staticBackdropLabel">Signup To Continue</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		        <div class="modal-body container-fluid">
		    		<div class="sign">
						<div class="sign__content">
							<form class="sign__form">
								<a href="index-2.html" class="sign__logo">
									<img src="assets/icon/logo.png" alt="" style=" width: 200px">
								</a>

								<div id="signer_alert" class=""></div>

								<div class="sign__group">
									<input type="text" class="sign__input form-control" id="signer_firstname" placeholder="Firstname">
								</div>
								<div class="sign__group">
									<input type="text" class="sign__input form-control" id="signer_lastname" placeholder="Lastname">
								</div>
								<div class="sign__group">
									<input type="number" class="sign__input form-control" id="signer_phone" placeholder="Phone">
									<i id="signer_danger1" style="color: red"></i>
								</div>

								<div class="sign__group">
									<input type="email" class="sign__input form-control" id="signer_email" placeholder="Email">
									<i id="signer_danger" style="color: red"></i>
								</div>


								<div class="sign__group">
									<input type="password" class="sign__input form-control" id="signer_password" placeholder="Password">
								</div>
								
								<button class="sign__btn" type="submit" id="signer_user" >Sign Up</button>


								<span class="sign__text signupLogin">Already have an account? <a href="#">Sign in!</a></span>

							</form>
						</div>
					</div>
		      	</div>
		    </div>
		</div>
	</div>
