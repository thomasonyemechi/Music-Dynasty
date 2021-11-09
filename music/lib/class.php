<?php 

session_start();

/**
 * 
 */
$ctime = time();

class Music
{

	
	function __construct()
	{
		if(isset($_GET['userLogin'])){ $this->artistLogin(); }
		elseif(isset($_GET['emailChecker'])){ $this->emailChecker(); } 
		elseif(isset($_GET['phoneNumberChecker'])){ $this->phoneNumberChecker(); }
		elseif(isset($_GET['userLogin'])){ $this->artistLogin(); }
		elseif(isset($_GET['getTalent'])){ $this->fetchArtistTalent(); }
		elseif(isset($_GET['param'])){ $this->searchArtist(); }
		elseif(isset($_GET['tagArtist'])){ $this->tagArtist(); }
		elseif(isset($_GET['unTagArtist'])){ $this->unTagArtist(); }
		elseif(isset($_GET['showArtist'])){ $this->pickShowArtist(); }
		elseif(isset($_GET['showSingleArtist'])){ $this->pickSingleShowArtist(); }
		elseif(isset($_GET['showStatus'])){ $this->showStatus(); }
		elseif(isset($_GET['showVote'])){ $this->showVote(); }
		elseif(isset($_GET['LoginUsersApiViaMusic'])){ $this->LoginUsersApiViaMusic(); }
		elseif(isset($_GET['castVote'])){ $this->castVote(); }
		elseif(isset($_GET['getAllGenre'])){ $this->getAllGenre(); }
		elseif(isset($_GET['fetchAllArtist'])){ $this->fetchAllArtist(); }
		elseif(isset($_GET['fetchNewSingles'])){ $this->fetchNewSingles(); }
		elseif(isset($_GET['fetchTopSingles'])){ $this->fetchTopSingles(); }
		elseif(isset($_GET['fetchNewAlbums'])){ $this->fetchNewAlbums(); }
		elseif(isset($_GET['fetchTopAlbums'])){ $this->fetchTopAlbums(); }
		elseif(isset($_GET['fetchShows'])){ $this->fetchShows(); }
		elseif(isset($_GET['selectFeaturedArtist'])){ $this->selectFeaturedArtist(); }
		elseif(isset($_GET['fetchMusicAlbum'])){ $this->fetchMusicAlbum(); }
		elseif(isset($_GET['markAsTop'])){ $this->markAsTop(); }
		elseif(isset($_GET['unmarkAsTop'])){ $this->unmarkAsTop(); }
		elseif(isset($_GET['fetchVideo'])){ $this->fetchVideo(); }
		elseif(isset($_GET['SignupUsersApiViaMusic'])){ $this->SignupUsersApiViaMusic(); }   
		elseif(isset($_POST['q'])){ print_r($_POST['q']);header('location: search.php?q='.$_POST['q'].''); }
		elseif(isset($_POST['manageArtist'])){ $_SESSION['manageArtist'] = $_POST['manageArtist']; }
		elseif(array_key_exists('signUpArtistApplication', $_POST)){ $this->signUpArtistApplication(); }
		elseif(array_key_exists('uploadTestSong', $_POST)){ $this->uploadTestSong(); }
		elseif(array_key_exists('artistUploadProfilePic', $_POST)){ $this->artistUploadProfilePic(); }
		elseif(array_key_exists('approveArtist', $_POST)){ $this->approveArtist(); }
		elseif(array_key_exists('createShow', $_POST)){ $this->createShow(); }
		elseif(array_key_exists('editShow', $_POST)){ $this->editShow(); }
		elseif(array_key_exists('addArtist', $_POST)){ $this->addArtist(); }
		elseif(array_key_exists('editGenre', $_POST)){ $this->editGenre(); }
		elseif(array_key_exists('addGenre', $_POST)){ $this->addGenre(); }
		elseif(array_key_exists('addArtistMusic', $_POST)){ $this->addArtistMusic(); }
		elseif(array_key_exists('updateArtistMusic', $_POST)){ $this->updateArtistMusic(); }
		elseif(array_key_exists('updateMyArtistProfile', $_POST)){ $this->updateMyArtistProfile(); }
		elseif(array_key_exists('musicWeek', $_POST)){ $this->musicWeek(); }
		elseif(array_key_exists('addMusicVideo', $_POST)){ $this->addMusicVideo(); }
		elseif(array_key_exists('forgotPassword', $_POST)){ $this->forgotPassword(); }
		elseif(array_key_exists('resetPassword', $_POST)){ $this->resetPassword(); }
		elseif(array_key_exists('changeArtistPassword', $_POST)){ $this->changeArtistPassword(); }
		elseif(array_key_exists('updateArtistProfileFromAdmin', $_POST)){ $this->updateArtistProfileFromAdmin(); }
	}



	function updateArtistProfileFromAdmin()
	{
		global $db, $report, $count;

		$email = $this->emptyy($_POST['email'], 'Email', 3); $stagename = $this->emptyy($_POST['stagename'],  'Stage Name', 3);
		$phone = $this->emptyy($_POST['phone'], "Phone", 6); $name = $this->emptyy($_POST['name'], "Name", 6); 
		$bio = $_POST['bio']; $sn = $_POST['artist_id'];

		if(!isset($count)) {
			$u = $sql = $db->query(" UPDATE artists SET name='$name', phone='$phone', bio='$bio', email='$email', stagename='$stagename' WHERE sn= '$sn' ")or die('cannt22');
			$report = 'Profile Update sucessful';
		}

		return;
	}



	function changeArtistPassword()
	{
		global $db, $report, $count;
    	$new = $_POST['newpass'];
    	$cnew = $_POST['cnewpass'];

    	if($new == $cnew) {
    		$sn = $_POST['artist_id'];
			$hnew = password_hash($new, PASSWORD_BCRYPT);
			$upuserp = $sql = $db->query(" UPDATE artists SET password='$hnew' WHERE sn= '$sn' ")or die('cannt22');
			$report = 'Password update completed'; 
    	}else {
    		$report = 'Password Mismatch';
    	}
		return;
	}



	function runMailer($email, $message, $subject)
    {
        $headers = 'From: Music Dynasty <admin@musicdynasty.ng>' . "\r\n";
        $headers .= 'Reply-To: admin@musicdynasty.ng' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $send = mail($email, $subject, $message, $headers);
        return;
    }

    function resetPassword() 
    {
    	global $db, $report, $count;

    	$order = $_POST['order'];
    	$new = $_POST['newpass'];
    	$cnew = $_POST['cnewpass'];

    	$sql = $db->query("SELECT * FROM reset_order WHERE reset_order='$order' ")or die('cannt');

    	if(mysqli_num_rows($sql) > 0) {
    		$row = mysqli_fetch_array($sql);  $t30 = time() + (60*30);
    		if($row['status'] == 0 ) {
    			if($new == $cnew) {
    				$id = $row['id'];
    				$hnew = password_hash($new, PASSWORD_BCRYPT);
    				$upuserp = $sql = $db->query(" UPDATE user SET pass='$hnew' WHERE id= '$id' ")or die('cannt22');
    				if($upuserp) {
    					$sql = $db->query("UPDATE reset_order SET status = 1 WHERE reset_order = '$order' ")or die('Cannot update order');
    					$report = 'Password reset complete proceed to login'; 
    				}else {
    					$report = 'Error updating password'; $count = 1;
    				}
    			}else {
    				$report = 'Password does not match '; $count = 1;
    			}
    		}else {
    			$report = 'reset link has been used'; $count = 1;
    		}
    	}else {
    		$report = 'Invalid Link'; $count = 1 ;
    	}

    	


    }



	function forgotPassword() 
	{
		global $db, $report, $count;

		$email = $this->emptyy($_POST['email'], 'Email', 5 );

		$sql = $db->query("SELECT * FROM user WHERE email='$email' ")or die('cannt');
		if(mysqli_num_rows($sql) > 0){
			$row = mysqli_fetch_array($sql);
			$order = $this->ran_rel(15); $id = $row['id'];  $ctime = time();
			$db->query("INSERT INTO reset_order(id, email, reset_order, ctime ) VALUES('$id', '$email','$order', '$ctime' ) ")or die('Cannot 2');
			$link = 'https://musicdynasty.ng/music/resetpassword.php?order='.$order;
			$message = '<br> Your reset link is <a href= "'.$link.'"> '.$link.' </a> <br> Link expires in 30 mins ';  
			$tun = $this->runMailer($email , $message, '<b>Password Reset Order </b>');

			$report = 'Reset Link has been sent to your email <br> if mail is not in your inbox pls check your spam mails'; 
		}else {
			$report = 'Email does not Exist';   $count = 1;
		}

		return;
	}


	function addMusicVideo()
	{
		global $db, $report ;
		$music = $_POST['music'];
		$ctime = time();
		$video = $_POST['video'];

		$db->query("UPDATE music SET video_url='$video', vctime=$ctime WHERE sn=$music  ")or die('cannot connect to Server');

		$report = 'Video Url added sucessfully';

		return ;
	}


	function getWeekSong()
	{
		global $db;
		$sql = $db->query("SELECT * FROM week_songs ORDER BY sn DESC LIMIT 1 ")or die('cannt');
		return mysqli_fetch_array($sql);
	}



	function updateMyArtistProfile()
	{
		global $db, $report, $count;
		$name = $this->emptyy($_POST['name'], 'Name', 3);
		$sname = $this->emptyy($_POST['stagename'], 'Stage Name', 3);
		$bio = $this->emptyy($_POST['bio'], 'bio', 3);
		$phone = $this->emptyy($_POST['phone'], 'Phone', 5);
		$sn = $_POST['sn'];

		if(!isset($count)) {
			$db->query("UPDATE artists SET name='$name', stagename='$sname', bio='$bio', phone='$phone' WHERE sn='$sn' ")or die('server cannot be reach pls');
			$report = 'Profile updated successful';
		}


		return;
	}


	function square_thumbnail_with_proportion($src_file,$destination_file,$square_dimensions,$jpeg_quality=300)
	{
	    // Step one: Rezise with proportion the src_file *** I found this in many places.

	    $src_img= imagecreatefromjpeg($src_file);

	    $old_x=imageSX($src_img);
	    $old_y=imageSY($src_img);

	    $ratio1=$old_x/$square_dimensions;
	    $ratio2=$old_y/$square_dimensions;

	    if($ratio1>$ratio2)
	    {
	        $thumb_w=$square_dimensions;
	        $thumb_h=$old_y/$ratio1;
	    }
	    else    
	    {
	        $thumb_h=$square_dimensions;
	        $thumb_w=$old_x/$ratio2;
	    }

	    // we create a new image with the new dimmensions
	    $smaller_image_with_proportions=ImageCreateTrueColor($thumb_w,$thumb_h);

	    // resize the big image to the new created one
	    imagecopyresampled($smaller_image_with_proportions,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 

	    // *** End of Step one ***

	    // Step Two (this is new): "Copy and Paste" the $smaller_image_with_proportions in the center of a white image of the desired square dimensions

	    // Create image of $square_dimensions x $square_dimensions in white color (white background)
	    $final_image = imagecreatetruecolor($square_dimensions, $square_dimensions);
	    $bg = imagecolorallocate ( $final_image, 255, 255, 255 );
	    imagefilledrectangle($final_image,0,0,$square_dimensions,$square_dimensions,$bg);

	    // need to center the small image in the squared new white image
	    if($thumb_w>$thumb_h)
	    {
	        // more width than height we have to center height
	        $dst_x=0;
	        $dst_y=($square_dimensions-$thumb_h)/2;
	    }
	    elseif($thumb_h>$thumb_w)
	    {
	        // more height than width we have to center width
	        $dst_x=($square_dimensions-$thumb_w)/2;
	        $dst_y=0;

	    }
	    else
	    {
	        $dst_x=0;
	        $dst_y=0;
	    }

	    $src_x=0; // we copy the src image complete
	    $src_y=0; // we copy the src image complete

	    $src_w=$thumb_w; // we copy the src image complete
	    $src_h=$thumb_h; // we copy the src image complete

	    $pct=100; // 100% over the white color ... here you can use transparency. 100 is no transparency.

	    imagecopymerge($final_image,$smaller_image_with_proportions,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct);

	    imagejpeg($final_image,$destination_file,$jpeg_quality);

	    // destroy aux images (free memory)
	    imagedestroy($src_img); 
	    imagedestroy($smaller_image_with_proportions);
	    imagedestroy($final_image);
	}



	function musicWeek()
	{
		global $db, $report, $count;

		$title = $_POST['name'];
		$song = $_FILES['song'];
		$artist = $_POST['artist'];

		$name = $artist.time().'week.mp3'; $ctime = time();
		$ext = pathinfo($song['name'],PATHINFO_EXTENSION);

		//print_r($_POST); exit();

		if (!isset($count)) {
			if($ext == 'mp3'){
				move_uploaded_file($_FILES['song']['tmp_name'], 'assets/audio/'.$name);
				$db->query("INSERT INTO week_songs (title, song, artist, ctime) 
					VALUES('$title', '$name', '$artist', '$ctime') ")or die('cannot upload');
				$report = 'Song upload sucessful';
			}else{ $report = 'Please Upload mp3 file'; }
		}

		return;
	}



	function getUser($id)
	{
		global $db;
		$sql = $db->query("SELECT * FROM user WHERE id='$id' ")or die('hello');
		return mysqli_fetch_array($sql);
	}



	function markAsTop()
	{
		global $db;
		$sn = $_GET['markAsTop'];
		$db->query("UPDATE music SET top=1 WHERE sn='$sn' ")or die('cannot');
		echo json_encode([
			'success' => true,
			'message' => 'Item marked as top',
		]);
	}

	function unmarkAsTop()
	{
		global $db;
		$sn = $_GET['unmarkAsTop'];
		$db->query("UPDATE music set top=0 WHERE sn=$sn ")or die('cannot');
		echo json_encode([
			'success' => true,
			'message' => 'Item removed from top',
		]);
	}



	function fetchNewSingles()
	{
		global $db;
		$data = []; $limit = $_GET['fetchNewSingles'];
		$sql = $db->query("SELECT * FROM music WHERE type=0 ORDER BY sn DESC LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = [
				"info" => $row,
				"time" => date('j M, y',$row['ctime']),
				"artist" => $this->getArtist($row['artist']),
			];
		}
		echo json_encode($data);
	}


	function fetchTopSingles()
	{
		global $db;
		$data = []; $limit = $_GET['fetchTopSingles'];
		$sql = $db->query("SELECT * FROM music WHERE type=0 AND top = 1  ORDER BY sn DESC LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = [
				"info" => $row,
				"time" => date('j M, y',$row['ctime']),
				"artist" => $this->getArtist($row['artist']),
			];
		}
		echo json_encode($data);

	}




	function fetchNewAlbums()
	{
		global $db;
		$data = []; $limit = $_GET['fetchNewAlbums'];
		$sql = $db->query("SELECT * FROM music WHERE type=1 ORDER BY sn DESC LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = [
				"info" => $row,
				"time" => date('j M, y',$row['ctime']),
				"artist" => $this->getArtist($row['artist']),
			];
		}
		echo json_encode($data);
	}



	function fetchVideo()
	{
		global $db;
		$data = []; $limit = $_GET['fetchVideo'];
		$sql = $db->query("SELECT * FROM music WHERE video_url != '' ORDER BY vctime DESC LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = [
				"info" => $row,
				"time" => date('j M, y',$row['ctime']),
				"artist" => $this->getArtist($row['artist']),
			];
		}
		echo json_encode($data);
	}




	function fetchTopAlbums()
	{
		global $db;
		$data = []; $limit = $_GET['fetchTopAlbums'];
		$sql = $db->query("SELECT * FROM music WHERE type=1 AND top = 1  ORDER BY sn DESC LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = [
				"info" => $row,
				"time" => date('j M, y',$row['ctime']),
				"artist" => $this->getArtist($row['artist']),
			];
		}
		echo json_encode($data);

	}


	function fetchShows()
	{
		global $db;
		$data = []; $limit = $_GET['fetchShows'];
		$sql = $db->query("SELECT * FROM live_shows ORDER BY sn DESC LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] =  $row;
		}
		echo json_encode($data);

	}




	function selectFeaturedArtist()
	{
		global $db;
		$data = []; $limit = $_GET['selectFeaturedArtist'];
		$sql = $db->query("SELECT * FROM artists WHERE status>4 ORDER BY rand() LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = $row;
		}
		echo json_encode($data);
	}

	function genre($sn)
	{
		global $db;
		$sql = $db->query("SELECT * FROM genre WHERE sn =$sn");
		$row = mysqli_fetch_array($sql);
		return $row['genre'];
	}



	function fetchMusicAlbum()
	{
		global $db;
		$data = []; $limit = $_GET['fetchMusicAlbum'];
		$sql = $db->query("SELECT * FROM music ORDER BY sn DESC LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = [
				'info' => $row,
				'genre' => $this->genre($row['genre']),
				'artist' => $this->getArtist($row['artist'])
			] ;
		}
		echo json_encode($data);
	}


	function addArtistMusic()
	{
		global $db, $report, $count;
		$artist = $this->emptyy($_POST['artist'], 'Artist', 1);
		$genre = $this->emptyy($_POST['genre'], 'Genre', 1);
		$name = $this->emptyy($_POST['name'], 'Music / Album Title' , 3);
		$link = $this->emptyy($_POST['link'], 'Link' , 10);
		$art = $_FILES['artwork'];
		$alb = $_POST['alb'] ?? 0; $rep = $this->adminId();
		$ext = strtolower(pathinfo($art['name'],PATHINFO_EXTENSION));
		$photo = 'music_cover'.$artist.time().'.'.$ext; $ctime = time();
		
		if (!isset($count)) {
			if($this->checkImg($ext)){
				if ($art['size'] < (1000*1000)) {
					move_uploaded_file($art['tmp_name'], 'assets/img/covers/'.$photo);
					$db->query("INSERT INTO music (photo, name, genre, type, artist, ctime, link, rep) 
						VALUES('$photo', '$name', '$genre', '$alb', '$artist', '$ctime', '$link','$rep') ")or die('cannot upload');
					$report = 'Upload sucessful';
				}else{ $report = 'The image should not be more than 1mb'; }
			}else{ $report = 'Please Upload an image file'; }
		}
		 
	}




	function updateArtistMusic()
	{
		global $db, $report, $count;
		$name = $this->emptyy($_POST['name'], 'Music / Album Title' , 3);
		$link = $this->emptyy($_POST['link'], 'Link' , 10);
		$sn = $_POST['sn'];
		if (!isset($count)) {
			$db->query("UPDATE music SET name='$name', link='$link' WHERE sn='$sn' ")or die('cannot upload');
			$report = 'Update sucessful';
		}
		 
	}





	function fetchAllArtist()
	{
		global $db;
		$data = []; $limit = $_GET['fetchAllArtist'];
		$sql = $db->query("SELECT * FROM artists WHERE status>4 ORDER BY stagename ASC LIMIT $limit ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = $row;
		}
		echo json_encode($data);

	}

	function getAllGenre()
	{
		global $db;
		$data = [];
		$sql = $db->query("SELECT * FROM genre ORDER BY ctime DESC ");
		while($row = mysqli_fetch_array($sql)){
			$data[] = $row;
		}

		echo json_encode($data);
	}


	function editGenre()
	{
		global $db, $report, $count;
		$gen = $this->emptyy($_POST['genre'], 'Genre', 2); $ctime = time();
		$genid = $_POST['id']; $rep = $admin;
		if(!isset($count)){
			$db->query("UPDATE genre SET genre='$gen', rep='$rep', ctime='$ctime' WHERE sn=$genid ")or die('cannot connect');
			$report = 'Operation successful';
		}
		return;
	}



	function addGenre()
	{
		global $db, $report, $count;
		$gen = $this->emptyy($_POST['genre'], 'Genre', 2); $ctime = time();
		$rep = $admin;
		if(!isset($count)){
			$db->query("INSERT INTO genre(genre, rep, ctime) VALUES('$gen', '$rep', '$ctime') ")or die('cannot connect');
			$report = 'Operation successful';
		}
		return;
	}



	function addArtist()
	{
		global $db, $report, $count;

		$phone = $this->emptyy($_POST['phone'], 'Phone', 10);
	    $email = $this->emptyy($_POST['email'], 'Email', 7);
	    $name = $this->emptyy($_POST['name'], 'Name', 5);
	    $stagename = $this->emptyy($_POST['stagename'], 'Stage Name', 3);
	    $password = $this->emptyy($_POST['password'],'Password', 3);
	    $ctime =time();
	    $pwd = password_hash($password, PASSWORD_BCRYPT);

	    if (!isset($count)) {
	    	if($this->emailExist($email) == FALSE or $this->phoneExist($phone) == FALSE ){
		        $sql = $db->query("INSERT INTO artists (name,stagename,email,phone,password,ctime,status) VALUES('$name','$stagename','$email','$phone','$pwd','$ctime', 7)") or die('Cannot Connect to Server die');
		        $report = 'SignUp Sucessful';
		        $report = 'Artist has been added sucessfuly'; 
		    }else { $report = 'This Email or phone number already exist'; $count = 1; }
	    }


	}

	function checkImg($ext)
	{
		if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
			$val = true;
		}else{$val = false;}
		return $val;
	}


	// function addArtistAlbum()
	// {
	// 	global $db, $report, $count;
	// 	$artist = $_POST['artist'];
	// 	$album = $this->emptyy($_GET['album'], 'Album', 3);
	// 	$cover = $_FILES['cover'];

	// 	if(!isset($count)){
	// 		if($this->checkImg(strtolower(pathinfo($cover['name'],PATHINFO_EXTENSION)))){
	// 			if ($cover['size'] < (1000*1000)) {
	// 				//$db->query("INSERT INTO album ");
	// 			}else{ $report = 'The image should not be more than 1mb'; $count = 1; }
	// 		}else{ $report = 'Please Upload an image file'; $count = 1; }
	// 	}
	// 	retrun;
	// }


	function checkVoteAgainstUser($user, $show, $artist){
		global $db;
		$sql = $db->query("SELECT * FROM vote WHERE voter='$user' AND show_id=$show AND artist=$artist ")or die('Cannot be select');
		return mysqli_num_rows($sql);
	}

	function fetchArtistVote($show, $artist){
		global $db;
		$sql = $db->query("SELECT * FROM vote WHERE show_id=$show AND artist=$artist ")or die('Cannot be select');
		return mysqli_num_rows($sql);
	}


	function castVote()
	{
		global $db;
		$data = json_decode($_GET['castVote']);
		$artist = $data->artist;
		$voter = $data->voter;
		$show = $data->show; $ctime = time();
		$vote = $db->query("INSERT INTO vote(show_id, artist, ctime, voter) VALUES($show, $artist, $ctime, '$voter') ")or die('cannot connect');
		echo json_encode([
			'message' => 'Vote submited',
			'success' => true,
			'votes' => $this->fetchArtistVote($show, $artist),
		]);
	}






	function tagArtist()
	{
		global $db;
		$data = json_decode($_GET['tagArtist']);
		$artist = $data->artist; $show = $data->show; $ctime = time();
		$sql = $db->query("INSERT INTO live_artist (artist, live_show, ctime) VALUES('$artist', '$show', '$ctime') ")or die('Cannot be reached');
		echo json_encode([
			'message' => 'Artist Successfully Tagged',
			'success' => TRUE,
		]);
	}


	function unTagArtist()
	{
		global $db;
		$data = json_decode($_GET['unTagArtist']);
		$artist = $data->artist; $show = $data->show;
		$sql = $db->query("DELETE FROM live_artist WHERE artist='$artist' AND live_show='$show' ")or die('Cannot be deleted');
		echo json_encode([
			'message' => 'Artist Successfully removed',
			'success' => TRUE,
		]);
	}


	function showStatus()
	{
		global $db;
		$data = json_decode($_GET['showStatus']);
		$show = $data->show; $status = $data->status;
		$new = ($status == 0) ? 1 : 0 ;
		$db->query("UPDATE live_shows SET status='$new' WHERE sn='$show' ")or die('cannot connect');
		$msg =  $status == 0 ? 'Show has been activated' : 'Show has been Deactivated' ; 
		echo json_encode([
			"success" => TRUE,
			"message" => $msg,
		]);
	}



	function showVote()
	{
		global $db;
		$data = json_decode($_GET['showVote']);
		$show = $data->show; $vote = $data->vote;
		$new = ($vote == 0) ? 1 : 0 ;
		$db->query("UPDATE live_shows SET vote='$new' WHERE sn='$show' ")or die('cannot connect');
		$msg =  $vote == 0 ? 'Vote has been Enabled' : 'vote has been Disabled' ; 
		echo json_encode([
			"success" => TRUE,
			"message" => $msg,
		]);
	}



	function pickShowArtist()
	{
		global $db;
		$uid = $_SESSION['user_id'];
		$show = $_GET['showArtist'];
		$data = [];
		$sql = $db->query("SELECT * FROM live_artist WHERE live_show='$show' ")or die('Cannot be delte');

		while ($row = mysqli_fetch_array($sql)){
			$id = $row['artist'];
			$data[] = [
				'id' => $id,
				'success' => TRUE,
				'data' => $this->getArtist($id),
				'votes' => $this->fetchArtistVote($show, $id),
				'useropt' => $this->checkVoteAgainstUser($uid, $show, $id),
			];
		}
		echo json_encode($data);
	}



	function pickSingleShowArtist()
	{
		global $db;
		$uid = $_SESSION['user_id'];
		$show = $_GET['showSingleArtist'];
		$artist = $_GET['artist'];
		$data = [];
		$sql = $db->query("SELECT * FROM live_artist WHERE live_show='$show' AND artist='$artist' ")or die('Cannot be delte');

		$row = mysqli_fetch_array($sql);
		$id = $row['artist'];
		$data = [
			'id' => $id,
			'success' => TRUE,
			'data' => $this->getArtist($id),
			'votes' => $this->fetchArtistVote($show, $id),
			'useropt' => $this->checkVoteAgainstUser($uid, $show, $id),
		];
		
		echo json_encode($data);
	}



	function searchArtist()
	{
		global $db;
		$param = $_GET['param']; $res = []; $data = [];
		$show = $_GET['show'] ?? '';
		$sql = $db->query("SELECT * FROM artists WHERE stagename LIKE '%$param%' AND status>4 ")or die('Cannot serach');
		while($res = mysqli_fetch_array($sql)){
			$data[] = [
				'id' => $res['sn'],
				'name' => $res['name'],
				'stagename' => $res['stagename'],
				'img' => $res['photo'],
				'select' => $this->checkArtistAgainstShow($res['sn'], $show),
			];
		}
		echo json_encode($data);
	}


	function checkArtistAgainstShow($artist, $show)
	{
		global $db;
		$sql = $db->query("SELECT * FROM live_artist WHERE artist='$artist' AND live_show ='$show' ")or die('Cannot sereeeach');
		return mysqli_num_rows($sql);
	}


	function createShow()
	{
		global $db, $report, $count;

		$title = $this->emptyy($_POST['show'], 'Show', 3);
		$venue = $this->emptyy($_POST['venue'], 'Venue', 3);
		$date = $this->emptyy($_POST['date'], 'Date', 3);
		$time = $this->emptyy($_POST['time'], 'Time', 3);
		$link = addslashes($this->emptyy($_POST['link'], 'Youtube video link', 3));
		$des = $_POST['description']; $rep = $this->adminId();

		$cover = $_FILES['cover'];
		$ext = strtolower(pathinfo($cover['name'],PATHINFO_EXTENSION));
		$name = 'cover'.time().rand(12321,23432343234).'.'.$ext;
		

		if(!isset($count)){
			if($this->checkImg($ext)){
				if ($cover['size'] < (1000*1000)) {
					move_uploaded_file($cover['tmp_name'], 'assets/img/covers/'.$name);
					$db->query("INSERT INTO live_shows(name, venue,  date, time, youtube, description, ctime, rep, photo) VALUES('$title', '$venue', '$date', '$time', '$link', '$des', '$ctime', '$rep', '$name') ")or die('cannot connect');
					header('location: showinfo.php');
				}else{ $report = 'The image should not be more than 1mb'; $count = 1; }
			}else{ $report = 'Please Upload an image file'; $count = 1; }
		}
		retrun;
	}




	function editShow()
	{
		global $db, $report, $count;

		$title = $this->emptyy($_POST['show'], 'Show', 3);
		$venue = $this->emptyy($_POST['venue'], 'Venue', 3);
		$date = $this->emptyy($_POST['date'], 'Date', 3);
		$time = $this->emptyy($_POST['time'], 'Time', 3);
		$link = $_POST['link'];
		$des = $_POST['description']; $rep = $this->adminId();
		$sn = $_POST['sn'];


		if(!isset($count)){
			$db->query("UPDATE live_shows SET name='$title', venue='$venue',  date='$date', time='$time', description='$des', youtube='$link' WHERE sn=$sn ")or die('cannot connect');
			$report="Show Updated Successfully";
		}
		return;
	}




	function approveArtist()
	{
		global $db, $report, $count;
		$artist = $_POST['approveArtist'];
		$sql = $db->query("UPDATE artists SET status = 5 WHERE sn = '$artist' ");
		$report = 'Operation successful ';
		return;
	}


	function reverseArtistApproval()
	{
		global $db, $report, $count;
		$artist = $_POST['reverseArtistApproval'];
		$sql = $db->query("UPDATE artists SET status = 3 WHERE sn = '$artist' ");
		$report = 'Operation successful ';
		return;
	}





    function LoginUsersApiViaMusic()
    {
        global $db;
        $data = json_decode($_GET['LoginUsersApiViaMusic']);
        $email = $data->email;
        $password = $data->password;
        $sql = $db->query("SELECT * FROM user WHERE email='$email' ");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_array($sql);
            if (password_verify($password, $row['pass'])) {
                $_SESSION['user_id'] = $row['id'];
                $data = ['message' => 'Login sucessful', 'success' => true];
            } else {  $data = ['message' => 'Invalid login details password', 'success' => false,]; }
        } else { $data = ['message' => 'Invalid login details Email', 'success' => false]; }
        echo json_encode($data);
    }


    function SignupUsersApiViaMusic()
    {
        global $db;
        $data = json_decode($_GET['SignupUsersApiViaMusic']);
        $email = $data->email;
        $phone = $data->phone;
        $firstname = $data->firstname;
        $lastname = $data->lastname;
        $password = $data->password;



        $sql = $db->query("SELECT * FROM user WHERE email='$email' OR phone='$phone'  ")or die('cannot connect');
        if (mysqli_num_rows($sql) == 0) {
	        $pwd = password_hash($password, PASSWORD_BCRYPT);
	        $id = $this->ran_rel(8); $ctime = time();
	        $db->query("INSERT INTO user (id,firstname,lastname,phone,email,pass,ctime) VALUES('$id','$firstname','$lastname','$phone','$email','$pwd','$ctime')") or die('Cannot Connect to Server');
	        $_SESSION['user_id'] = $id;
	        echo json_encode([
	        	'message' => 'SignUp Sucessful',
	        	'success' => true
	        ]);
	    }else {
	    	echo json_encode([
	        	'message' => 'Email or phone number already exist',
	        	'success' => false
	        ]);
	    }
    }



    function ran_num($length)
    {
        return substr(str_shuffle(str_repeat('123456789', $length)), 0, $length);
    }

    function ran_rel($length)
    {
        return substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
    }






	function fetchArtistTalent()
	{
		$artist = $_GET['getTalent'];
		$data = [
			"songs" => $this->getArtistTestSongs($artist),
			"info" => $this->getArtist($artist),
		];
		echo json_encode($data);
	}




	function emptyy($field,$fname, $ct){
		global $report, $count;
		$field = trim($field);
		if($field==''){$report .= "<br>".$fname." field is required! "; $count=1; return;}elseif(strlen($field)<$ct){
			$report .= "<br>".$fname." must be at least ".$ct." characters! "; $count=1; return;}else{
		return $field; }
	}





	function uploadTestSong()
	{
		global $db, $report, $count;
		$title = $this->emptyy($_POST['title'], 'Song title', 3);
		$song = $_FILES['song'];
		$artist = $this->artistId();
		$name = $artist.time().'.mp3'; $ctime = time();
		$ext = pathinfo($song['name'],PATHINFO_EXTENSION);
		if (!isset($count)) {
			if($ext == 'mp3'){
				if ($song['size'] < (1024*5*1000)) {
					move_uploaded_file($_FILES['song']['tmp_name'], 'assets/audio/'.$name);
					$db->query("INSERT INTO test_songs (title, song, artist, ctime) 
						VALUES('$title', '$name', '$artist', '$ctime') ")or die('cannot upload');
					$report = 'Song upload sucessful';
				}else{ $report = 'The file should not be more than 5mb'; }

			}else{ $report = 'Please Upload mp3 file'; }
		}

		return;
	}





	function signUpArtistApplication()
	{
		global $db, $report, $count;

	    $phone = trim($_POST['phone']);
	    $email = trim($_POST['email']);
	    $name = trim($_POST['name']);
	    $stagename = trim($_POST['stagename']);
	    $password = $_POST['password'];
	    $ctime =time();
	    $pwd = password_hash($password, PASSWORD_BCRYPT);

	    if($this->emailExist($email) == FALSE or $this->phoneExist($phone) == FALSE ){
	        $sql = $db->query("INSERT INTO artists (name,stagename,email,phone,password,ctime) VALUES('$name','$stagename','$email','$phone','$pwd','$ctime')") or die('Cannot Connect to Server die');
	        $report = 'SignUp Sucessful';
	        header('location: profile.php');
	    }else { $report = 'This Email or phone number already exist'; $count = 1; }

	  	return;
	}



	function phoneExist($phone)
    {
        global $db, $report, $count;
        $sql = $db->query("SELECT * FROM artists WHERE phone = '$phone' ") or die(mysqli_error());
        $num = mysqli_num_rows($sql);
        if ($num == 0) {
            $res = FALSE;
         } else {
            $res = TRUE;
        }
        return $res;
    }




    function emailExist($email)
    {
        global $db, $report, $count;
        $sql = $db->query("SELECT * FROM artists WHERE email = '$email' ") or die(mysqli_error());
        $num = mysqli_num_rows($sql);
        if ($num == 0) {
            $res = FALSE;
         } else {
            $res = TRUE;
        }
        return $res;
    }




	//check email

	function emailChecker(){
	    $email = $_GET['emailChecker'];
	    if($this->emailExist($email) == FALSE){
	        echo json_encode([
	            'message' => 'Email does not exist',
	            'status' => 5,
	        ]);
	    }else{ echo json_encode(['message' => 'Email already exist','status' => 0]); }
	}


	function getArtist($sn)
	{
		global $db;
		$sql = $db->query("SELECT sn,name,stagename,email,phone,photo,bio,status FROM artists WHERE sn = '$sn' ") or die('cannot select');
		return mysqli_fetch_array($sql);
	}


	function getArtistTestSongs($sn)
	{
		global $db; 
		$data = [];
		$sql = $db->query("SELECT * FROM test_songs WHERE artist = '$sn' ") or die('cannot select');
		while($row = mysqli_fetch_array($sql)){
			$data[] = $row;
		}
		return $data;
	}


	function getArtistSongs($sn, $limit=50)
	{
		global $db; 
		$data = [];
		$sql = $db->query("SELECT * FROM music WHERE artist = '$sn' ORDER BY sn DESC LIMIT $limit ") or die('cannot select');
		while($row = mysqli_fetch_array($sql)){
			$data[] = $row;
		}
		return $data;
	}



	function getArtistTaggedShows($sn, $limit=50)
	{
		global $db; 
		$data = [];
		$sql = $db->query("SELECT * FROM live_artist WHERE artist = '$sn' ORDER BY sn DESC LIMIT $limit ") or die('cannot select');
		while($row = mysqli_fetch_array($sql)){
			$data[] = $row;
		}
		return $data;
	}


	function getShow($sn)
	{
		global $db;
		$sql = $db->query("SELECT * FROM live_shows WHERE sn = '$sn' ") or die('cannot select');
		return mysqli_fetch_array($sql);
	}




	//check phone Number
	function phoneNumberChecker(){
	    $phone = $_GET['phoneNumberChecker'];
	    if($this->phoneExist($phone) == FALSE){
	        echo json_encode([
	            'message' => 'Phone Number does not exist',
	            'status' => 5,
	            'success' => TRUE,
	        ]);
	    }else{ echo json_encode(['message' => 'Phone Number already exist','status' => 0, 'success' => FALSE,]); }
	}




	function adminId()
	{
		return 1;
	}

	function artistId()
	{
		return $_SESSION['artist_sn'] ?? '';
	}



	function artistUploadProfilePic()
	{
		global $db, $report, $count;

		$artist = $this->artistId();
		$img = $_FILES['image'];
		$ext = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));
        $name =  'pp'.$artist.time().'.'.$ext;
        if ($ext == 'jpeg' OR $ext == 'png' OR $ext == 'jpg') {
        	$this->square_thumbnail_with_proportion($img['tmp_name'], 'assets/img/artists/'.$name , 150);
	        $sql = $db->query("UPDATE artists SET photo = '$name' WHERE sn = '$artist' ");
	        $report = 'User Profile Photo Successfully Update!';
        }else{ $report = 'You can only upload jpeg, png, jpg picture'; $count = 1; }

        return;
	}





	function artistLogin()
	{
		global $db;

		$log = json_decode($_GET['userLogin']);

		$email = strtolower(sanitize($log->email));
        $password = $log->password;
        $sql = $db->query("SELECT * FROM artists WHERE email='$email' ");
        if (mysqli_num_rows($sql) == 1) {
            $row = mysqli_fetch_array($sql);
            if (password_verify($password, $row['password'])) {
                $_SESSION['artist_sn'] = $row['sn'];
                $data = [
                	"id" => $row['sn'] ,
                	"message" => 'Login sucessful',
                	"success" => true
                ];
            } else {
                $data = [ "message" => 'Invalid Login details password, Try again', "success" => false ];
            }
        } else { $data = [ "message" => 'Invalid Login details "email", Try again', "success" => false ]; }


        echo json_encode($data);
	}


	function Alert()
	{
		global $report, $count;
		if ($count > 0) {
			echo '<div id="refresh" class="alert alert-danger alert-dismissible" style="position:fixed; top:10px; right:10px; z-index:10000; width: auto;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<i class="icon fa fa-ban"></i>   &nbsp;&nbsp;<b>' . $report . ' </b>&nbsp;&nbsp;&nbsp;
			</div>';
		} else {
			echo '<div id="refresh"  class="alert alert-success alert-dismissible" style="position:fixed; top:10px; right:10px; z-index:10000; width: auto;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<i class="icon fa fa-check"></i>  &nbsp;&nbsp;<b>' . $report . '</b>&nbsp;&nbsp;&nbsp;&nbsp;
			</div>';
		}
		return;
	}




	function Alert2()
	{
		global $report,$count;
		if($count>0){

			$alat = '<div id="refresh" class="alert alert-danger alert-dismissible" style="position:relative;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<i class="icon fa fa-ban"></i>   &nbsp;&nbsp;'. $report .' &nbsp;&nbsp;&nbsp;
			</div>';  


		}
		else{
			$alat = '<div id="refresh" class="alert alert-success alert-dismissible" style="position:relative;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<i class="icon fa fa-check"></i>  &nbsp;&nbsp;'. $report .'&nbsp;&nbsp;&nbsp;&nbsp;
			</div>';  
		}
		return $alat;
	}













}


$msc = new Music;

$artist = $msc->artistId();
$admin = $msc->adminId();

$uid = $_SESSION['user_id'] ?? 0;
