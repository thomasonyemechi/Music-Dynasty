<?php
if(!isset($_SESSION['user_id'])){header('location: login.php');}
$uri = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
// if($max->checkAcc() == TRUE){
// 	if($uri != 'myprofile'){
// 		header('location: myprofile.php');
// 	}
// }elseif (userName($_SESSION['user_id'],'active') == 0) {
// 	if($uri != 'fundwallet'){
// 		header('location: fundwallet.php');
// 	}
// }

?>