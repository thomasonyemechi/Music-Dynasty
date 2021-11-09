<div class="row row--grid">
	<div class="col-12">
		<div class="profile">
			<div class="profile__user">
				<div class="profile__avatar">
					<img src="assets/img/artists/avatar.svg" id="img2" alt="">
				</div>

				<?php  ?>
				<div class="profile__meta">
					<h3 id="name"></h3>
					<span id="emailm"></span>
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

		</div>

		<!-- content tabs -->
		<div class="tab-content">
			<div class="tab-pane fade show active" id="tab-1" role="tabpanel">
				<div class="row row--grid">
					<!-- details form -->
					<div class="col-12 col-lg-12">
						<div class="dashbox">
							<div class="dashbox__title">
								<h3 class="text-small">Uploaded Songs</h3>
							</div>

							<div class="dashbox__list-wrap" id="songlist">
	

	

							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="tab-pane fade" id="tab-2" role="tabpanel">
				<div class="row row--grid">
					<!-- details form -->
					<div class="col-12 col-lg-12">
						<div class="dashbox">
							<div class="dashbox__title">
								<h3 class="text-small">Profile</h3>
							</div>

							<div class="dashbox__list-wrap">
							    <p class="text-white" id="showartistBio"></p>
								<img  class="img-fluid" width="100%" id="img" src="assets/img/artists/avatar.svg">
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- end content tabs -->

		
	</div>
	<div class="col-12">
		<form method="post">
			<button class="sign__btn approveArtist" name="approveArtist" type="submit" onclick="return confirm('Are you sure you want to approve application? Action cannot be reversed')">Approve Application</button>
		</form>
	</div>
	
</div>