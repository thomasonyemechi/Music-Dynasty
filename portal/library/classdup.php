<?php 

<?php


if (isset($_SESSION['user_id'])) {
    $userKey = $_SESSION['user_id'];
}


class Profile
{


    var $amount = 5000;  //Registration Fee
    var $share = 4000;  // money shared
    var $spillover = 200; //in percentage
    var $ref1 = 1000; //in percentage
    var $ref2 = 400; //in percentage
    var $ref3 = 400; //in percentage
    var $minwithdraw = 2000;
    var $maxwithdraw = 200000;
    var $withdrawcharge = 0; //0.5;
    var $charge = 100;
    var $per = [50, 20, 5, 5, 3, 2, 15];


    function __construct()
    {
        global $report, $count;
        if (array_key_exists('signupUserIni', $_POST)) {
            $this->signupUserIni();
        } elseif (array_key_exists('VerifySponsor', $_POST)) {
            $this->VerifySponsor();
        } elseif (array_key_exists('FindProfile', $_POST)) {
            $this->FindProfile();
        } elseif (array_key_exists('EditProfile', $_POST)) {
            $this->EditProfile();
        } elseif (array_key_exists('EditProfile1', $_POST)) {
            $this->EditProfile1();
        } elseif (array_key_exists('EditProfile3', $_POST)) {
            $this->EditProfile3();
        } elseif (array_key_exists('EditProfile2', $_POST)) {
            $this->EditProfile2();
        } elseif (array_key_exists('ResendConfirmationLink', $_POST)) {
            $this->ResendConfirmationLink();
        } elseif (array_key_exists('FundWallet', $_POST)) {
            $this->FundWallet();
        } elseif (array_key_exists('ApproveFundOrder', $_POST)) {
            $this->ApproveFundOrder();
        } elseif (array_key_exists('FundWalletadmin', $_POST)) {
            $this->FundWalletadmin();
        } elseif (array_key_exists('LoginUsers', $_POST)) {
            $this->LoginUsers();
        } elseif (array_key_exists('ActivateAccount', $_POST)) {
            $this->ActivateAccount();
        } elseif (array_key_exists('updateSignup', $_POST)) {
            $this->updateSignup();
        } elseif (array_key_exists('resetPassConfirm', $_POST)) {
            $this->resetPassConfirm();
        } elseif (array_key_exists('signupUserIni', $_POST)) {
            $this->signupUserIni();
        }
        return;
    }



    function totalPending()
    {
    }


    function Totalwallet()
    {
    }


    function totalWithdrawAdmin()
    {
    }



    function activePins()
    {
    }


    function usedPins()
    {
    }


    function checkAcc()
    {
    }


    function totalEarn()
    {
    }


    function totalWithdrawUser()
    {
    }




    function signupMail($email, $token)
    {

        $subject = 'Confirm Your Registration';
        $m = '<h3>Confirm Your Registration</h3>
        <p>Welcome to Music Dynasty! <br> Here is your Account Activation Link:</p>
        <big><a href="https://musicdynasty.ng/portal/confirm.php?token=' . $token . '"><b style="color: orange">https://musicdynasty.ng/portal/confirm.php?token=' . $token . '</b></a></big>
        <br> <p>This is an Automated message, please do not reply</p>';
        $this->emailerAll($email, $m, $subject);
        return;
    }

    function ResendConfirmationLink()
    {
        global $db, $report;
        $uid = $_SESSION['user_id'];
        $email = $this->userName5($uid, 'email');
        $token = $this->win_hashs(100);
        $db->query("UPDATE user Set token='$token' where id='$uid' ") or die('cannot connect');
        $this->signupMail($email, $token);
        //exit($fid);
        $report = 'Email Confirmarion Link Sent';
    }




    function upline($sn)
    {
        global $db;

        $sql = $db->query("SELECT * FROM user WHERE sn=$sn ") or die('cannot connect to Server');
        $row = mysqli_fetch_array($sql);
        $upline = [$row['a1'], $row['a2'], $row['a3'], $row['a4'], 3, 2, 1];
        return $upline;
    }


    function ActivateAccount()
    {
        global  $db, $report, $count;
        $amt = $_POST['amt'];
        $id = $_SESSION['user_id'];
        $sn = $this->userName5($id, 'sn');
        $this->refferalPay($sn, $amt);
        $this->processWallet($id, $amt, 5, 3, $this->walletRemark(3));
        $sql = $db->query("UPDATE user SET active=3 where id='$id' ") or die('cannot');
        header('location:userdashboard.php');
        return;
    }


    function refferalPay($sn, $amount)
    {
        global $db;
        $upline = $this->upline($sn);
        $i = -1;
        foreach ($upline as $up) {
            $i++;

            $mper = ($this->per[$i]) / 100;
            $amt = $mper * $amount;
            $e = $i + 11;
            $remark = $this->walletRemark($e);
            if ($up == 0) {
                $up = 1;
                $remark = 'Skipped Bonus';
            } else {
                $up = $up;
            }
            $id = $this->userName($up, 'id');
            //echo $amt.'<br>'; exit();
            $this->processWallet($id, $amt, 5, $e, $remark);

            //echo ; echo '<br>';
        }

        return;
    }



    function RegisterFromWallet($userid)
    {
        global $db, $report, $count;
        $sponsorid = $this->assignSponsor($userid);

        $b1 = $this->idToKey($sponsorid);
        $b2 = $this->idToKey($sponsorid, 'b1');
        $b3 = $this->idToKey($sponsorid, 'b2');
        $b4 = $this->idToKey($sponsorid, 'b3');

        $user = userName($userid, 'user');

        $upline = $this->findUpline($b1);
        $que = $db->query("SELECT * FROM user WHERE sn = '$upline' ");
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
        $ctime = time();

        $reg = $db->query("INSERT INTO user (id,user,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,b1,b2,b3,b4,ctime)
VALUES('$userid','$user','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$b1','$b2','$b3','$b4','$ctime')") or die('Cannot Connect to Server');

        //Update Active and Sponsors//
        $this->updateActiveAndRef($upline, $b1);

        //Send Email to Registered User
        $email = $this->idToUser($userid, 'email');
        $this->emailer($email);
        //Promote Uplines
        if ($this->stage1($a2) == 10) {
            $this->stageUpdate($a2);
        }

        $_SESSION['report'] = 'Account Activation successful';

        return; //
    }





    function findUpline($key)
    {
        global $db;

        $sql = $db->query("SELECT * FROM user WHERE (sn='$key' OR a1='$key' OR a2='$key' OR a3='$key' OR a4='$key' OR a5='$key' OR a6='$key' OR a7='$key' OR a8='$key' OR a9='$key' OR a10='$key') AND active < 3 ORDER BY a1 ASC LIMIT 1");
        $row = mysqli_fetch_assoc($sql);
        return $row['sn'];
    }





    function Today()
    {
        global $db;
        $time = time() - 86400;
        $sql = $db->query("SELECT * FROM user WHERE ctime>=$time ORDER BY sn DESC ");
        $row = mysqli_num_rows($sql);
        return $row;
    }


    function wallet($id, $opt = 0)
    {
        global $db;
        $amt = 0;
        $sql = ($opt == 0) ? $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' ") : $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' AND type='$opt' ");
        $row = mysqli_fetch_assoc($sql);
        $amt = $row['value_sum'];

        return abs($amt);
    }

    function processWallet($id, $amt, $status, $type, $remark, $opt = '')
    {
        global $db, $userKey;
        $ctime = time();
        $sin = $this->wallet($id);
        $amt = ($type > 5) ? $amt : '-' . $amt;
        $tan = $sin + $amt;
        $trno = $this->win_hash(12);
        $sql = $db->query("INSERT INTO wallet (id,trno,sin,cos,tan,status,type,remark,ctime,rep,opt) VALUES ('$id','$trno','$sin','$amt','$tan','$status','$type','$remark','$ctime','$userKey','$opt') ");

        return;
    }

    function walletRemark($code)
    {
        $r = '';
        //Debits all types
        if ($code == 1) {
            $r = 'Cash Withdrawal';
        } elseif ($code == 2) {
            $r = 'Fund Transfered';
        } elseif ($code == 3) {
            $r = 'Account Activation';
        } elseif ($code == 4) {
            $r = '';
        } elseif ($code == 5) {
            $r = '';
        }

        //credits
        elseif ($code == 6) {
            $r = 'Membership Fee';
        } elseif ($code == 7) {
            $r = 'Topup purchase';
        } elseif ($code == 8) {
            $r = 'Referral Bonus 1st Gen.';
        } elseif ($code == 9) {
            $r = 'Referral Bonus 2nd Gen.';
        } elseif ($code == 10) {
            $r = 'Referral Bonus 3rd Gen.';
        }
        //Credit: Leadership Bonuses
        elseif ($code == 11) {
            $r = 'Refferal Bonus.';
        } elseif ($code == 12) {
            $r = 'Spillover Bonus.';
        } elseif ($code == 13) {
            $r = 'Spillover Bonus.';
        } elseif ($code == 14) {
            $r = 'Spillover Bonus.';
        } elseif ($code == 15) {
            $r = 'Commit.';
        } elseif ($code == 16) {
            $r = 'Commit.';
        } elseif ($code == 17) {
            $r = 'Company.';
        } elseif ($code == 18) {
            $r = 'Spillover Bonus 8th Gen.';
        } elseif ($code == 19) {
            $r = 'Spillover Bonus 9th Gen.';
        } elseif ($code == 20) {
            $r = 'Spillover Bonus 10th Gen.';
        }
        //Credit: Wallet Funding
        elseif ($code == 21) {
            $r = 'Wallet Funding by Admin';
        } elseif ($code == 22) {
            $r = 'Wallet funding by bank deposit';
        } elseif ($code == 23) {
            $r = 'Personal Sales Bonus';
        } elseif ($code == 24) {
            $r = 'Referral Sales Bonus';
        } elseif ($code == 25) {
            $r = 'Indirect Referral Sales Bonus';
        } elseif ($code == 26) {
            $r = '1st 7 days smart offer';
        } elseif ($code == 27) {
            $r = 'Promotional Offers';
        } elseif ($code == 28) {
            $r = 'Top 10 Leaders Bonus';
        } elseif ($code == 29) {
            $r = 'Top 10 Sales people bonus';
        } elseif ($code == 30) {
            $r = 'Job Wages';
        } elseif ($code == 31) {
            $r = 'Investment Capital Retrieval';
        } elseif ($code == 32) {
            $r = 'Return on Investment';
        }

        //Staff Credit
        elseif ($code == 41) {
            $r = 'Basic Salary';
        } elseif ($code == 42) {
            $r = 'Supprise Bonus';
        } elseif ($code == 43) {
            $r = 'Transport Allowance';
        } elseif ($code == 44) {
            $r = 'Accommodation Subsidy';
        } elseif ($code == 45) {
            $r = 'Performance Bonus';
        } elseif ($code == 46) {
            $r = 'Health Support';
        } elseif ($code == 47) {
            $r = 'Expense Reinbursement';
        } elseif ($code == 48) {
            $r = 'Training Allowance';
        } elseif ($code == 49) {
            $r = 'Personal Project Support';
        } elseif ($code == 50) {
            $r = '';
        }

        return $r;
    }

    function FundWallet()
    {
        global $db, $report, $count;
        $id = $this->Uid();
        //$rep=$this->Uid();
        $ctime = time();
        $amount = sanitize($_POST['amount']);
        //$date = $this->valEmpty(sanitize($_POST['date']),'date');
        $ref = $this->valEmpty(sanitize($_POST['ref']), 'Reference');
        $trno = $this->win_hash(12);
        $type = 'Online Payment';


        if (!isset($count)) {
            $sql = $db->query("INSERT INTO walletorder(id,trno,amount,date,ref,ctime,type) VALUES ('$id','$trno','$amount','$ctime','$ref','$ctime','$type') ");
            $report = 'Fund walled order submitted';
        }

        return;
    }




    function FundWalletLOW($id, $amount, $ref, $trno)
    {
        global $db, $report, $count;
        //$rep=$this->Uid();
        $ctime = time();
        $type = 'Online Payment';


        if (!isset($count)) {
            $sql = $db->query("INSERT INTO walletorder(id,trno,amount,date,ref,ctime,type) VALUES ('$id','$trno','$amount','$ctime','$ref','$ctime','$type') ");
            $report = 'Fund walled order submitted';
        }

        return;
    }





    function FundWalletadmin()
    {
        global $db, $report, $count;
        $id = $this->Fid();
        $rep = $this->Uid();
        $reppass = sqLx('user', 'id', $rep, 'pass');
        $ctime = time();
        $amount = sanitize($_POST['amount']);
        $date = sanitize($_POST['date']);
        //$user = sanitize($_POST['user']);
        $ref = userName($id, 'user');
        $trno = $this->win_hash(12);
        $password = $_POST['pass'];
        $sq = $db->query("SELECT * FROM user WHERE id='$id'");
        $row = mysqli_fetch_assoc($sq);
        $username = $row['user'];

        if (password_verify($password, $reppass)) {

            if ($ref == $username) {

                $sql = $db->query("INSERT INTO walletorder (id,trno,amount,date,ref,ctime) VALUES ('$id','$trno','$amount','$date','$ref','$ctime') ") or die('cannot connect');

                if ($sql) {
                    $report = 'Fund wallet order submitted';
                }
            } else {
                $report = "Invalid user";
                $count = 1;
            }
        } else {
            $count = 1;
            $report = 'Wrong Password';
        }
        return;
    }


    function walletStatus($status)
    {
        if ($status == 9) {
            $r = '<font color="green">Transaction Complete</font>';
        } elseif ($status == 1 or $status == 0) {
            $r = '<font color="red">Awaiting Confirmation</font>';
        } elseif ($status == 2) {
            $r = '<font color="blue">Transaction Processing</font>';
        } elseif ($status == 3) {
            $r = '<font color="#036">Ready for Delivery</font>';
        } else {
            $r = 'Pending';
        }

        return $r;
    }

    function ApproveFundOrder()
    {
        global $db, $report, $count;
        $userKey = $_POST['ApproveFundOrder'];

        $trno = $_GET['transaction'];
        $id = sqLx('walletorder', 'trno', $trno, 'id');
        $amount2 = sqLx('walletorder', 'trno', $trno, 'amount');
        $balance = $this->wallet($id);
        $amount = $_POST['amount'];
        $pass = $_POST['password'];
        $password = $this->userName4('pass');
        $remark = 'Wallet Funding by Admin';
        $type = 20;
        $status = 9;
        $balance =  number_format($this->wallet($id), 2);
        if (password_verify($pass, $password)) {
            if ($amount <= $amount2) {
                $this->processWallet($userKey, $amount, $status, $type, $remark);
                $db->query("UPDATE walletorder SET amount2='$amount',status='$status' WHERE trno='$trno' ");
                $report = "Wallet Funding successful";
            } else {
                $count = 1;
                $report = 'Transaction cannot be processed';
            }
        } else {
            $report = "Authentication failed. try again";
            $count = 1;
        }
        return;
    }



    function refLink()
    {
        $this->VerifySponsor();
        return;
    }



    function FindProfile()
    {
        global $db, $report, $count;

        $_SESSION['fid'] = $_POST['FindProfile'];
        header('location:profile.php');
        return;
    }

    function Fid()
    {
        $fid = isset($_SESSION['fid']) ? $_SESSION['fid'] : 0;
        return $fid;
        //return  $_SESSION['fid'];
    }


    function Uid()
    {
        $uid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        return $uid;
    }

    function changePassword()
    {
        global $db, $report, $count;
        $uid = $this->Uid();
        $fid = $this->Fid();
        $pa = $this->userName4('pass');
        $currentpass = $_POST['currentpass'];
        $newpass = $_POST['newpass'];
        $newpass2 = $_POST['newpass2'];


        if ($newpass != $newpass2) {
            $report = 'New Password Mismatch, Try Again';
            $count = 1;
        } elseif (password_verify($currentpass, $pa)) {
            $newpass3 = password_hash($newpass, PASSWORD_BCRYPT);
            $db->query("UPDATE user SET pass='$newpass3' WHERE id = '$uid' ");
            $report = 'User Password Successfully Changed!';
        } else {
            $report = ' incorrect password ';
            $count = 1;
        }
        return;
    }


    function changePassword2()
    {
        global $db, $report, $count;
        $keys = $_GET['u-ref'];
        $pa = $this->userName('pass');
        $currentpass = md5($_POST['currentpass']);
        $newpass = md5($_POST['newpass']);
        $newpass2 = md5($_POST['newpass2']);

        if ($pa == $currentpass) {
            if ($newpass == $newpass2) {
                $db->query("UPDATE user SET pass='$newpass' WHERE sha1(sn) = '$keys' ");
                $report = 'User Password Successfully Changed!';
            } else {
                $report = 'New Password Mismatch, Try Again';
                $count = 1;
            }
        } else {
            $report = 'Password Mismatch, Try Again';
            $count = 1;
        }

        return;
    }

    function VerifySponsor()
    {
        global $db, $report, $count;
        if (isset($_GET['ref'])) {
            $sponsorkey  = sanitize($_GET['ref']);
            if (sqL1('user', 'sn', $sponsorkey) == 1) {
                $_SESSION['sponsorkey'] = $sponsorkey;
                $_SESSION['signup'] = 2;
                $report = 'Sponsor successfully verified';
            } else {
                $report = 'Invalid Referral Link';
                $count = 1;
                $_SESSION['signup'] = 1;
            }
        } else {
            $sponsorkey  = sanitize($_POST['sponsorkey']);
            if (sqL1('user', 'sn', $sponsorkey) == 1) {
                $_SESSION['sponsorkey'] = $sponsorkey;
                $_SESSION['signup'] = 2;
                $report = 'Sponsor successfully verified';
            } else {
                $report = 'You have entered an invalid sponsor ID. Confirm and try again';
                $count = 1;
            }
        }

        return;
    }

    function findSponsorx()
    {
        global $db, $report, $count;

        $user = strtolower($_GET['reff']);
        if ($this->validateUser($user) == FALSE) {
            $report = 'You have entered an invalid sponsor ID. Please Try Again';
            $count = 1;
        } else {
            $_SESSION['signup'] = 2;
            $_SESSION['sponsorUsername'] = $user;
            $_SESSION['reff'] = $user;

            $_SESSION['sponsor'] = $this->validateUser($user, 1);
            $_SESSION['sponsorId'] = $this->validateUser($user, 2);
            $report = 'Sponsor Successfully Validated';

            header('location: ?');
            //$count=''; 

        }

        return;
    }

    function EditProfile()
    {
        global $db, $report, $count;

        $id = $this->Fid();
        $firstname = sanitize($_POST['firstname']);
        $lastname = sanitize($_POST['lastname']);
        //$email = sanitize($_POST['email']);
        $phone = sanitize($_POST['phone']);
        //$username = sanitize($_POST['user']);
        $sex = sanitize($_POST['sex']);
        $state = sanitize($_POST['state']);
        $country = sanitize($_POST['country']);
        $sql = $db->query("UPDATE user SET firstname='$firstname', lastname='$lastname', phone='$phone',
            sex='$sex', state='$state',country='$country'WHERE id='$id'");
        if ($sql) {
            $report = "Updated Successfully";
        } else {
            $count = 1;
            $report = "Error Updating Profile";
        }
    }

    function EditProfile3()
    {
        global $db, $report, $count;

        $id = $this->Uid();
        $firstname = sanitize($_POST['firstname']);
        $lastname = sanitize($_POST['lastname']);
        $phone = sanitize($_POST['phone']);
        $sex = sanitize($_POST['sex']);
        $state = sanitize($_POST['state']);
        $country = sanitize($_POST['country']);

        $sql = $db->query("UPDATE user SET firstname ='$firstname', lastname ='$lastname', phone ='$phone',
            sex ='$sex', state ='$state', country ='$country' WHERE id ='$id' ");
        if ($sql) {
            $report = "Updated Successfully";
        } else {
            $count = 1;
            $report = "Error Updating Profile";
        }
    }





    ///////////////1222112


    function EditProfile1()
    {
        global $db, $report, $count;

        $id = $this->Fid();
        $accname = sanitize($_POST['accname']);
        $accountno = sanitize($_POST['accountno']);
        $bank = sanitize($_POST['bank']);
        $sql = $db->query("UPDATE user SET accname='$accname',accountno='$accountno', bank='$bank' WHERE id='$id'");
        if ($sql) {
            $report = "Updated Successfully";
        } else {
            $count = 1;
            $report = "Error Updating Profile";
        }
    }
    function EditProfile2()
    {
        global $db, $report, $count;

        $id = $this->Uid();
        $accname = sanitize($_POST['accname']);
        $accountno = sanitize($_POST['accountno']);
        $bank = sanitize($_POST['bank']);
        $sql = $db->query("UPDATE user SET accname='$accname',accountno='$accountno', bank='$bank' WHERE id='$id'");
        if ($sql) {
            $report = "Updated Successfully";
        } else {
            $count = 1;
            $report = "Error Updating Profile";
        }
    }


    function wildSponsored($key)
    {
        global $db, $user;
        $qu = $db->query("select * FROM user WHERE sponsor = '$key' ");
        $nu = mysqli_num_rows($qu);
        return $nu;
    }






    function PaySpillover($paylist)
    {
        global $db;
        $i = 0;
        while ($i < 10) {
            $e = $i++;
            $a = $paylist[$e];
            if ($a > 0) {
                $id = $this->keyToId($a);
                $amount = $this->spillover;
                $type = $e + 11;

                $this->processWallet($id, $amount, 5, $type, 'Spillover Bonus');
            }
        }
    }




    function PayReferral($paylist2)
    {
        global $db;
        $i = 0;
        while ($i < 3) {
            $e = $i++;
            $b = $paylist2[$e];
            if ($b > 0) {
                $id = $this->keyToId($b);
                if ($e = 0) {
                    $amount = $this->ref1;
                } elseif ($e = 1) {
                    $amount = $this->ref2;
                } else {
                    $amount = $this->ref3;
                }
                $type = $e + 8;

                $this->processWallet($id, $amount, 5, $type, 'Referral Bonus');
            }
        }
    }


    function userExist($username, $email)
    {
        global $db, $report, $count;
        $sql = $db->query("SELECT * FROM user WHERE user = '$username' or email='$email' ");
        $num = mysqli_num_rows($sql);
        if ($num == 0) {
            $res = FALSE;
        } else {
            $res = TRUE;
        }
        return $res;
    }






    function signupUserIni()
    {
        global $report, $db, $count;
        $report = '';
        $firstname = ucwords(strtolower($this->valEmpty($_POST['firstname'], 'Firstname')));
        $lastname = ucwords(strtolower($this->valEmpty($_POST['lastname'], 'Lastname')));
        $phone = $this->valPhone($_POST['phone']);
        $email = strtolower($this->valEmpty(sanitize($_POST['email']), 'E-mail'));
        $sex = $_POST['sex'];
        $state = sanitize($_POST['state']);
        $country = sanitize($_POST['country']);
        $username = str_replace("'", "", strtolower($this->valEmpty($_POST['user'], 'Username')));
        $password = $this->valPass($_POST['pass']);
        $password2 = $_POST['password2'];
        $ctime = time();
        $pwd = password_hash($password, PASSWORD_BCRYPT);



        if ($password != $password2) {
            $report = "<br>Password confirmation failed, Try again";
            $count = 1; //
        } elseif ($this->userExist($username, $email) == TRUE) {
            $report = "<br>A user with this username/email already exist. Try again.";
            $count = 1;
        } elseif (!isset($count)) {
            $report = "<br>Login Information successfully submitted, proceed to Pin Payment";



            $sponsorkey = $_SESSION['sponsorkey'];
            $b1 = $sponsorkey;
            $b2 = $this->b1Tob2($b1);
            $b3 = $this->b1Tob2($b2);
            //

            $upline = $this->findUpline($sponsorkey);


            $que = $db->query("SELECT * FROM user WHERE sn = '$sponsorkey' ");
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

            // $paylist = [$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10];
            // $paylist2 = [$b1,$b2,$b3];

            $id = $this->win_hashs(8);

            // if(empty($sponsorkey) OR empty($username)){
            //     unset($_SESSION['signup']); $report='Sorry, Registration failed. Please repeat your registration '; $count=1;
            // }else{

            $reg = $db->query("INSERT INTO user (id,sponsor,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,b1,b2,b3,firstname,lastname,phone,email,sex, state,country,user,pass,pin,ctime) VALUES('$id','$sponsorkey','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$b1','$b2','$b3','$firstname','$lastname','$phone','$email','$gender','$state',',$country','$username','$pwd','$pin','$ctime')") or die('Cannot Connect to Server');


            $nd = sqL1('user', 'a1', $upline);
            $upd = $db->query("UPDATE user SET active='$nd' WHERE sn = '$upline' ");

            //$this->PaySpillover($paylist);//
            //$this->PayReferral($paylist2);

            $_SESSION['user_id'] = $id;
            header('location: userdashboard.php');

            //}

        }

        return;
    }




    function Register($sponsorkey)
    {
        global $db, $report, $count;
        $ctime = time();
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];

        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];
        $username = str_replace(" ", "", $_SESSION['username']);
        $gender = $_SESSION['sex'];
        $state = $_SESSION['state'];
        $country = $_SESSION['country'];
        $password = $_SESSION['password'];
        $password2 = $_SESSION['password2'];
        $pwd = password_hash($password, PASSWORD_BCRYPT);
        $pin = $_SESSION['pin'];


        $b1 = $sponsorkey;
        $b2 = $this->b1Tob2($b1);
        $b3 = $this->b1Tob2($b2);
        //

        $upline = $this->findUpline($sponsorkey);


        $que = $db->query("SELECT * FROM user WHERE sn = '$upline' ");
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

        $paylist = [$a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10];
        $paylist2 = [$b1, $b2, $b3];

        $id = $this->win_hashs(8);

        if (empty($sponsorkey) or empty($username)) {
            unset($_SESSION['signup']);
            $report = 'Sorry, Registration failed. Please repeat your registration ';
            $count = 1;
        } else {

            $reg = $db->query("INSERT INTO user (id,sponsor,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,b1,b2,b3,firstname,lastname,phone,email,sex,state,country,user,pass,pin,ctime)
VALUES('$id','$sponsorkey','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$b1','$b2','$b3','$firstname','$lastname','$phone','$email','$gender','$state',',$country','$username','$pwd','$pin','$ctime')") or die('Cannot Connect to Server');

            if ($reg) {
                $sql = $db->query("UPDATE pin SET status = 1, id = '$username' WHERE pin = '$pin' ");
            }
            $nd = sqL1('user', 'a1', $upline);
            $upd = $db->query("UPDATE user SET active='$nd' WHERE sn = '$upline' ");

            $this->PaySpillover($paylist);
            $this->PayReferral($paylist2);

            $_SESSION['signup'] = 4;

            //   $this->emailer($email);
        }
        return;
    }






    function valEmpty($field, $fname)
    {
        global $report, $count;
        $field = sanitize(trim($field));
        if ($field == '') {
            $report .= "<br>" . $fname . " field is required! ";
            $count = 1;
            return;
        } elseif (strlen($field) < 3) {
            $report .= "<br>" . $fname . " entered is too short! ";
            $count = 1;
            return;
        } else {
            return $field;
        }
    }

    function valPhone($field)
    {
        global $report, $count;
        $field = sanitize(trim($field));
        if ($field == '') {
            $report .= "<br>Phone Number field is required! ";
            $count = 1;
            return;
        } elseif (strlen($field) < 11) {
            $report .= "<br>Phone Number entered is invalid! ";
            $count = 1;
            return;
        } else {
            return $field;
        }
    }

    function valPass($field)
    {
        global $report, $count;
        if ($field == '') {
            $report .= "<br>Password field is required! ";
            $count = 1;
            return;
        } elseif (strlen($field) < 4) {
            $report .= "<br>Password cannot be less than 6 characters! ";
            $count = 1;
            return;
        } else {
            return sanitize($field);
        }
    }




    function verifySpUp($sponsorkey, $upline)
    {
        global $db;
        $num = 0;
        $que = $db->query("SELECT * FROM user WHERE sn = '$sponsorkey' ");
        $num += mysqli_num_rows($que);
        $que2 = $db->query("SELECT * FROM user WHERE sn = '$upline' ");
        $num += mysqli_num_rows($que2);

        return $num;
    }



    function userToKey($user, $col = 'sn')
    {
        global $db;
        $que = $db->query("SELECT * FROM user WHERE user = '$user' ");
        $ro = mysqli_fetch_array($que);
        return $ro[$col];
    }

    function idToKey($id, $col = 'sn')
    {
        global $db;
        $que = $db->query("SELECT * FROM user WHERE id = '$id' ");
        $ro = mysqli_fetch_array($que);
        if (empty($ro)) {
            echo "";
        } else {
            return $ro[$col];
        }
    }
    function b1Tob2($sn)
    {
        global $db;
        $que = $db->query("SELECT * FROM user WHERE sn = '$sn' ");
        $ro = mysqli_fetch_array($que);
        if (empty($ro)) {
            echo "";
        } else {
            return $ro['b1'];
        }
    }


    function findUser($user)
    {
        global $db;
        $sql = $db->query("select * FROM user WHERE sn = '$user' ");
        $num = mysqli_num_rows($sql);
        if ($num == 0) {
            $res = FALSE;
        } else {
            $res = TRUE;
        }
        return $res;
    }


    function userExist2($id)
    {
        global $db, $report, $count;
        $sql = $db->query("SELECT * FROM user WHERE id = '$id' ");
        $num = mysqli_num_rows($sql);
        if ($num == 1) {
            $res = TRUE;
        } else {
            $res = FALSE;
        }
        return $res;
    }







    ///////1236214365542536236352436435236463423


    function win_hash($length)
    {
        return substr(str_shuffle(str_repeat('123456789', $length)), 0, $length);
    }

    function win_hashs($length)
    {
        return substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
    }

    function resetPass()
    {
        global $db, $report, $count;
        $email = strtolower(trim(sanitize($_POST['emailreset'])));
        $sql = $db->query("SELECT * FROM user WHERE email = '$email' ") or die('Could not initiate password reset');
        $row = mysqli_fetch_array($sql);
        $reset_order = $this->win_hash(41);
        $find = mysqli_num_rows($sql);
        if ($find == 0) {
            $report = 'This email does not exist in our system, check and try again';
            $count = 1;
        } elseif ($find == 1) {
            $sql = $db->query("UPDATE user SET code='$reset_order' WHERE email = '$email' ") or die('Could not initiate password reset');
            $message = 'You have requested for a password reset. Follow the link below to reset your password:<br>';
            $message .= 'https://www.covisclubinternational.com/accountreset.php?request-index=' . $reset_order;
            $subject = 'Smile We-care Password Recovery';
            $this->emailerAll($email, $message, $subject);
            $report = 'We have sent you an e-mail containing your password reset link. Follow the link to reset your password';
        }

        return;
    }


    function updateSignup()
    {
        global $db, $report, $count;
        $username = $_SESSION['username'];
        $firstname = ucwords(strtolower($this->valEmpty($_POST['firstname'], 'Surname')));
        $lastname = ucwords(strtolower($this->valEmpty($_POST['lastname'], 'Other Names')));

        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = ucwords(strtolower($this->valEmpty($_POST['city'], 'City')));
        $address = addslashes(ucwords(strtolower($this->valEmpty($_POST['address'], 'Address'))));
        $phone = $this->valPhone($_POST['phone']);
        $bank = ucwords(strtolower($this->valEmpty($_POST['bank'], 'Bank')));
        $accountno = $this->valEmpty($_POST['accountno'], 'Account Number');
        $course = $_POST['course'];

        $dob = $this->valEmpty($_POST['dob'], 'Date of Birth');
        $sex = $_POST['sex'];
        $accname = ucwords(strtolower($this->valEmpty($_POST['accname'], 'Account Name')));
        //$officeaddress=addslashes(ucwords(strtolower($_POST['officeaddress'])));

        $photo = isset($_FILES['image']) ? str_replace(' ', '-', $username) . $_FILES['image']['name'] : 'user.png';
        if (isset($_SESSION['user_id'])) {
            define('upload', 'photo/');
        } else {
            define('upload', 'dashboard/photo/');
        }
        $success = move_uploaded_file($_FILES['image']['tmp_name'], upload . $photo);


        $db->query("UPDATE user SET country='$country', state='$state', city='$city', phone='$phone', address='$address', bank='$bank', accountno='$accountno', firstname='$firstname', lastname='$lastname', sex='$sex', dob='$dob', accname='$accname', photo='$photo' WHERE user = '$username' ");
        $id = $this->userName3($username);
        $this->courseOrder2($id, $course); //submit required course
        $report = 'User Registration Information Successfully Updated!';
        $count = 0;
        $_SESSION['signup'] = 6;

        return;
    }

    function resetPassConfirm()
    {
        global $db, $report, $count, $reset;
        $pwd1 = md5($_POST['pass']);
        $pwd2 = md5($_POST['password2']);
        $reset_order = $this->win_hash(41);
        $code = $this->resetPassOrder() ? $_GET['request-index'] : 0;
        if ($pwd1 == $pwd2) {
            $db->query("UPDATE user SET pass='$pwd1', code='$reset_order' WHERE code = '$code' ");
            $report = 'User Password Successfully Changed! You can now login to your account';
            //header('location: ./login.php'); 
            $reset = 2;
        } else {
            $report = 'New Password Mismatch, Try Again';
            $count = 1;
        }


        return;
    }


    function Alert()
    {
        global $report, $count;
        if ($count > 0) {

            echo '<div class="alert alert-danger alert-dismissible" style="position:fixed; top:10px; right:10px; z-index:10000">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i>   &nbsp;&nbsp;<b>' . $report . ' </b>&nbsp;&nbsp;&nbsp;
              </div>';
        } else {
            echo '<div class="alert alert-success alert-dismissible" style="position:fixed; top:10px; right:10px; z-index:10000">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>  &nbsp;&nbsp;<b>' . $report . '</b>&nbsp;&nbsp;&nbsp;&nbsp;
              </div>';
        }

        //if(isset($report)){   unset($_SESSION['report']);  }
        return;
    }




    function Alert2()
    {
        global $report, $count;
        if ($count > 0) {

            $alat = '<div class="alert alert-danger alert-dismissible" style="position:relative;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i>   &nbsp;&nbsp;' . $report . ' &nbsp;&nbsp;&nbsp;
              </div>';
        } else {
            $alat = '<div class="alert alert-success alert-dismissible" style="position:relative;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>  &nbsp;&nbsp;' . $report . '&nbsp;&nbsp;&nbsp;&nbsp;
              </div>';
        }
        //if(isset($report)){   unset($_SESSION['report']);  }
        return $alat;
    }





    function emailerAll($email, $message, $subject)
    {
        global $firstname;
        $headers = 'From: Music Dynasty <admin@musicdynasty.ng>' . "\r\n";
        $headers .= 'Reply-To: admin@musicdynasty.ng' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $send = mail($email, $subject, $message, $headers);
        return;
    }


    function emailer($email)
    {

        $headers = 'From: Music Dynasty <admin@musicdynasty.ng>' . "\r\n";
        $headers .= 'Reply-To: admin@musicdynasty.ng' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


        $subject = 'WELCOME TO MUSIC DYNASTY';
        $mailmessage = "<p>Welcome " . ucwords(userName5($_SESSION['user_id']), 'username') . '<br>Congratulation! You have successfully signed up with</p>';


        $send = mail($email, $subject, $mailmessage, $headers);
        return;
    }





    function LoginUsers()
    {
        global $db, $report, $count;
        $email = strtolower(sanitize($_POST['user']));
        $password = $_POST['pass'];
        $sql = $db->query("SELECT * FROM user WHERE email='$email' ") or die('server cannot be reacheed');
        
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_array($sql);
            $adminsn = $row['level'];
            if (password_verify($password, $row['pass'])) {
                if ($adminsn > 5) {
                    $_SESSION['user_id'] = $row['id'];
                    $report = 'you are logged in';
                    header('location:portal/admindashboard.php');
                } else {
                    $_SESSION['user_id'] = $row['id'];
                    header('location:portal/userdashboard.php');
                }
            } else {
                $report = 'Invalid Login details';
                $count = 1;
            }
        } else {
            $report = 'Invalid Login details';
            $count = 1;
        }
        return;
    }



    function updateUser()
    {
        global $db, $report;
        $id = $this->Uid();


        $bank = sanitize($_POST['bank']);
        $accountno = sanitize($_POST['accountno']);
        $accountname = sanitize($_POST['accname']);


        $db->query("UPDATE user SET  accountno='$accountno', accountname='$accname',bank='$bank' WHERE uid = '$id' ");
        $report = 'User Information Successfully Updated!';

        return;
    }


    function updateUser2()
    {
        global $db, $report;
        $keys = $_GET['u-ref'];
        $state = sanitize($_POST['state']);
        $email = sanitize($_POST['email']);
        $lastname = sanitize($_POST['lastname']);
        $city = sanitize($_POST['city']);
        $address = addslashes(sanitize($_POST['address']));
        $phone = sanitize($_POST['phone']);
        $bank = sanitize($_POST['bank']);
        $accountno = sanitize($_POST['accountno']);


        $db->query("UPDATE user SET lastname='$lastname', state='$state', city='$city', phone='$phone', address='$address', bank='$bank', email='$email', accountno='$accountno' WHERE sha1(sn) = '$keys' ");
        $report = 'User Information Successfully Updated!';

        return;
    }

    function updatePhoto()
    {
        global $db, $report;
        $userKey = $this->Uid();

        $name = $this->userName('user') . $_FILES['image']['name'];
        define('upload', 'photo/');
        $success = move_uploaded_file($_FILES['image']['tmp_name'], upload . $name);

        $sqlw = $db->query("UPDATE user SET photo = '$name' WHERE id = '$userKey' ");
        $report = 'User Profile Photo Successfully Update!';
        return;
    }

    function updatePhoto2()
    {
        global $db, $report;
        $keys = $_GET['u-ref'];
        $name = 'a' . date('ymdhis') . $_FILES['image']['name'];
        define('upload', 'photo/');
        $success = move_uploaded_file($_FILES['image']['tmp_name'], upload . $name);

        $sqlw = $db->query("UPDATE user SET photo = '$name' WHERE sha1(sn) = '$keys' ");
        $report = 'User Profile Photo Successfully Update!';
        return;
    }



    function ChangeUserPassword()
    {
        global $db, $report, $count;

        $id = $this->Uid();
        $pass = userName($id, 'pass');
        $password = sanitize($_POST['pwd']);
        $new_pass = sanitize($_POST['newpwd']);
        $retype = sanitize($_POST['retype']);

        if ($new_pass != $retype) {
            $report = "Confirm Password Must Be the Same With New Password";
            $count = 1;
        } elseif (!password_verify($password, $pass)) {
            $report = "Wrong Password";
            $count = 1;
        } elseif (strlen($new_pass) <= 3) {
            $report = "Sorry Password Must Be More Than 3 Characters";
            $count = 1;
        } else {
            $original = bcrypt($new_pass);
            $sql = $db->query("UPDATE user SET pass='$original' WHERE id='$id'");
            $report = "Password Changed Successfully";
        }
    }


    function ResetPassword()
    {
        global $db, $report, $count;
        $password = $_POST['password'];
        $password2 = $_POST['confirmpassword'];
        $token = $_POST['token'];


        if ($password == $password2) {
            $pwd = password_hash($password, PASSWORD_DEFAULT);
            $nt = $this->win_hashs(45);
            //print_r($nt); exit();
            $up = $db->query("UPDATE user SET token='$nt' , pass = '$pwd' WHERE token='$token' ") or die("cannot update");
            $report = 'Password reset successfull, login';
        } else {
            $report = 'Password Mismatch, Please try again';
            $count = 1;
        }
    }

    function ForgertPassword()
    {
        global $db, $report, $count;

        $email = sanitize($_POST['email']);

        $sql = $db->query("SELECT * FROM user WHERE email='$email'");

        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_array($sql);
            $token = $this->win_hashs(45);

            $db->query("UPDATE user SET token='$token' WHERE  email='$email'");

            $subject = 'Music Dynasty Password Reset';
            $message = '<h4>You have requested for a password reset. Follow the link below to reset your password:</h4><br>
            <p><span class="mb-2">Hello, ' . $this->userName2($row['id']) . '<span><br>
            You are receiving this E-mail because we received a request for restoration of Your password.
            In case this request was not sent by You, just delete this E-mail from your mailbox.<br>
            If it was You who sent the request, please click on the link below.<br>
            You will be able to create a new password after clicking the link.<br>
            To activate new password follow the link below:<br>
            <a href="https://www.musicdynasty.ng/portal/passwordreset.php?token=' . $token . '" >https://www.musicdynasty.ng/portal/passwordreset.php?token=' . $token . '</a>
            .</p>
            Yours faithfully,<br>
            Technical Department<br>
            Music Dynasty';

            $this->emailerAll($email, $message, $subject);
            $report = "Password reset link sent to your email, follow link to reset pasword";
        } else {
            $count = 1;
            $report = "Invalid email address";
        }
    }


    function withdrawProcess($withdrawAmount, $accountBalance, $type, $status)
    {
        global $db, $report, $count;

        $userKey = $this->Uid();
        $tno = substr(str_shuffle(str_repeat('1234567890', 10)), 0, 10);


        $finalbalance = $accountBalance - $withdrawAmount;
        $sql = $db->query("INSERT INTO withdraw (id,inibalance,amount,finalbalance,status,type,tno) VALUES ('$userKey','$accountBalance','$withdrawAmount','$finalbalance','$status','$type','$tno')");

        if ($sql) {
            $report = 'Your withdrawal request has been successfully submitted';
            $this->logdraw($tno);
        }

        return;
    }

    function withdrawProcess2($userKey, $withdrawAmount, $accountBalance, $type, $status)
    {
        global $db, $report, $count;

        $tno = substr(str_shuffle(str_repeat('1234567890', 10)), 0, 10);


        $finalbalance = $accountBalance - $withdrawAmount;
        $sql = $db->query("INSERT INTO withdraw (id,inibalance,amount,finalbalance,status,type,tno) VALUES ('$userKey','$accountBalance','$withdrawAmount','$finalbalance','$status','$type','$tno')");

        if ($sql) {
            $report = 'Your withdrawal request has been successfully submitted';
            $this->logdraw($tno);
        }

        return;
    }




    function adminLevel()
    {
        global $db;
        $id = $this->Uid();
        $sql = $db->query("SELECT * FROM user WHERE id='$id' ");
        $row = mysqli_fetch_array($sql);
        if ($row['level'] == 10) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function Rid()
    {
        $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        return $id;
    }
}


$max = new Profile;
$uid = $max->Uid();
$fid = $max->Fid();
