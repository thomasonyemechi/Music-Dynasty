<?php include ('lib/mconnect.php'); 


$sql = $db->query("SELECT * FROM user");

while($row = mysqli_fetch_array($sql)){
    echo $row['email'];
}
	?>