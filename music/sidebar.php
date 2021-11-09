<style type="text/css">
/*	@media screen and (max-width: 600px) {
		.signin-link-hider {
			display: block;
		}
	}*/

	@media only screen  and (min-width : 1824px) {
		.signin_link {
			display: none;
			color: #fc0;
			
		}
	}
</style>


<div class="sidebar">
		<!-- sidebar logo -->
		<div class="sidebar__logo">
			<a href="index.php">
			    <img src="assets/icon/logo.png" alt="" style=" width: 200px">
			</a>
		</div>
		<!-- end sidebar logo -->

		<!-- sidebar nav -->
		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a href="index.php" class="sidebar__nav-link sidebar__nav-link--active"><span><i class="fa fa-home"></i> Home</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="artists.php" class="sidebar__nav-link"><span><i class="fa fa-users"></i> Talents</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="releases.php" class="sidebar__nav-link"><span> <i class="fa fa-music"></i> Materials</span></a>
			</li>


			<li class="sidebar__nav-item">
				<a href="liveshows.php" class="sidebar__nav-link"><span><i class="fa fa-microphone"></i> Talent League </span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="about.php" class="sidebar__nav-link"><span><i class="fa fa-address-card"></i> About </span></a>
			</li>

			<li class="sidebar__nav-item ">
				<a href="contact.php" class="sidebar__nav-link"><span><i class="fa fa-phone"></i> Contact </span></a>
			</li>

			<li class="sidebar__nav-item signin_link">
				
				<?php if(isset($_SESSION['user_id'])){
				        echo '<a href="logout.php" class="sidebar__nav-link"><span><i class="fa fa-sign-out-alt"></i> Sign Out </span></a>';
				    }else {
				        echo '<a href="javascript:;" class="sidebar__nav-link logmein"><span><i class="fa fa-sign-in-alt"></i> Sign In </span></a>';
				    } 
				?>
			</li>

			<!--<li class="sidebar__nav-item">-->
			<!--	<a href="#" class="sidebar__nav-link"><span>News</span></a>-->
			<!--</li # >-->

			<?php if (isset($_SESSION['user_id'])){ if($msc->getUser($_SESSION['user_id'])['level'] > 5){ ?>
				
				<li class="sidebar__nav-item">
					<hr style="color: white;">
					<a href="#" class="sidebar__nav-link"><h4>Administrator Panel</h4></a>
					<hr style="color: white;">
				</li>

				<li class="sidebar__nav-item">
					<a href="#" class="sidebar__nav-link"><span>Dashboard</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="viewapplication.php" class="sidebar__nav-link"><span>View Application</span></a>
				</li>

		<!-- 		<li class="sidebar__nav-item">
					<a href="#" class="sidebar__nav-link"><span>Artist Management</span></a>
				</li>
 -->
				<li class="sidebar__nav-item">
					<a href="addartist.php" class="sidebar__nav-link"><span>Add Talents</span></a>
				</li>


				<li class="sidebar__nav-item">
					<a href="music.php" class="sidebar__nav-link"><span>Music/Album/Portfolio</span></a>
				</li>


				<li class="sidebar__nav-item">
					<a href="createshow.php" class="sidebar__nav-link"><span>Create League</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="martist.php" class="sidebar__nav-link"><span>Manage Artist</span></a>
				</li>

				
			<?php  }else { ?>
			
			    <li class="sidebar__nav-item">
					<hr style="color: white;">
					<a href="#" class="sidebar__nav-link"><h4>Panel</h4></a>
					<hr style="color: white;">
				</li>

				<li class="sidebar__nav-item">
					<a href="../portal/userdashboard" class="sidebar__nav-link"><span>Dashboard</span></a>
				</li>
			
			<?php } } ?>

		</ul>
		<!-- end sidebar nav -->
	</div>