<?php $Week_msc = $msc->getWeekSong(); ?>

<div class="player">
		<div class="player__content">
			<span class="player__track"><b class="player__title"><?php echo ucfirst($Week_msc['title']) ?></b> – <span class="player__artist"><?php echo $Week_msc['artist'] ?></span></span>
			<audio src="assets/audio/<?php echo $Week_msc['song'] ?>" id="audio"></audio>
		</div>
	</div>
	
	<button class="player__btn" type="button">Player</button>
<!--<a href="" target="_blank"><img class=" feedback pb-3" src="assets/img/whatsapp.png"></a>-->
