<?php

include ('library/connect.inc.php');

$amt = $_GET['amt']; $trno = $_GET['trno'];
$_SESSION['user_id'] = $id=$_GET['id'];


$me = file_get_contents('https://webpay.interswitchng.com/collections/api/v1/gettransaction.json?merchantcode=MX20060&transactionreference='.$trno.'&amount='.$amt.'');


$res = json_decode($me,TRUE);

$ck = $db->query("SELECT * FROM wallet WHERE opt = '$trno'  ");
if(mysqli_num_rows($ck) > 0){
	header('location: fundwallet.php');
}else{
	if($res['ResponseCode'] == 00){
		$amt = $res['Amount']/100;
		$max->processWallet($id,$amt,9,20,'Sponsor artist',$trno);
		$_SESSION['report'] = 'Subscription Sucessful... Proceed to activate account';
		header('location: fundwallet.php');
	}
}



 


 ?>