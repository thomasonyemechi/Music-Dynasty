  <?php 
   function VerifySponsor()
    {
        global $db, $report, $count;
        $id = $_SESSION['user_id'];
        $sponsor  = sanitize($_POST['sponsor']);
        $pin  = $_POST['epin'];
        //$pinn =$_POST['pin'];
        $sn = sqLx('user','user',$sponsor,'sn');

        $checkpinm = $db->query("SELECT * FROM pin WHERE pin='$pin' ") or die(mysqli_error());
            if($checkpinm->num_rows == 0){
                $report = "This pin is invalid ";
                $count = 1;
            }
       elseif ($this-> validateUser($sponsor) == FALSE) {
            $report = 'You have entered an invalid sponsor ID. Please Try Again';
            $count = 1;
        }
        elseif(!empty($pin)) {
             # code...
            $checkpin = $db->query("SELECT * FROM user WHERE epin='$pin' ") or die(mysqli_error());
            if($checkpin->num_rows == 1){
                $report = "This pin already been used !!!, Please buy another";
                $count = 1;

            }else{

                $updatepin = $db->query("UPDATE user SET epin ='$pin' WHERE id='$id'");
                //update current user sponsor..
                $query = $db->query("UPDATE user SET sponsor='$sn' WHERE id = '$id'");
                
                $upline = sqLx('user','user',$sponsor,'sn');
                
                $que = $db->query("SELECT * FROM user WHERE sn = '$upline' ") or die(mysqli_error());
                $ro = mysqli_fetch_array($que);
                $a1 = $ro['sn'];
                $a2 = $ro['a1'];
                $a3 = $ro['a2'];
                $a4 = $ro['a3'];
                $a5 = $ro['a4'];
                $a6 = $ro['a5'];
                $a7 = $ro['a6'];
                $a8 = $ro['a7'];
                $a9 = $ro['a8'];
                $a10 = $ro['a9'];

                $up = $db->query("UPDATE user SET a1='$a1', a2='$a2', a3='$a3', a4='$a4', a5='$a5', a6='$a6', a7='$a7', a8='$a8', a9='$a9' WHERE id='$id' ") or die('Cannot connect');

                $_SESSION['sponsverify'] = 'Sponsor successfully verified';
                header('location: .');
                
            }
 ?>