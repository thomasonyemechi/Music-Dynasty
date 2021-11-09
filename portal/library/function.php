<?php

function sqL($table)
{
	global $db;
	$sql = $db->query("SELECT * FROM $table");
	return mysqli_num_rows($sql);
}
function sqL1($table, $col, $val)
{
	global $db;
	$sql = $db->query("SELECT * FROM $table WHERE $col='$val' ");
	return mysqli_num_rows($sql);
}

function sqL2($table, $col, $val, $col2, $val2)
{
	global $db;
	$sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' ");
	return mysqli_num_rows($sql);
}
function sqL3($table, $col, $val, $col2, $val2, $col3, $val3)
{
	global $db;
	$sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' AND $col3='$val3' ");
	return mysqli_num_rows($sql);
}
function sqL4($table, $col, $val, $col2, $val2, $col3, $val3, $col4, $val4)
{
	global $db;
	$sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' AND $col3='$val3'  AND $col4='$val4' ");
	return mysqli_num_rows($sql);
}


function sqLz($table, $col1, $val1, $col = '')
{
	global $db;
	$sql = $db->query("SELECT * FROM $table WHERE $col1='$val1' ");
	$row = mysqli_fetch_assoc($sql);
	$val = ($col == '') ?  $row[$col] : "";
	return  $val;
}

function sqLx($table, $col, $val, $item)
{
	global $db;
	$sql = $db->query("SELECT * FROM $table WHERE $col='$val' ");
	$row = mysqli_fetch_assoc($sql);
	return mysqli_num_rows($sql) > 0 ? $row[$item] : '';
}
function sqLx2($table, $col, $val, $col2, $val2, $item)
{
	global $db;
	$sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' ");
	$row = mysqli_fetch_assoc($sql);
	return $row[$item];
}


function sqLx3($table, $col1, $val1, $col2, $val2, $col3, $val3, $item)
{
	global $db;
	$sql = $db->query("SELECT * from $table where $col1='$val1' and $col2='$val2' and $col3='$val3' ");
	$row = mysqli_fetch_assoc($sql);
	return $row[$item];
}


function sqLx4($table, $col1, $val1, $col2, $val2, $col3, $val3, $col4, $val4, $item)
{
	global $db;
	$sql = $db->query("SELECT * from $table where $col1='$val1' and $col2='$val2' and $col3='$val3' and $col4='$val4' ");
	$row = mysqli_fetch_assoc($sql);
	return $row[$item];
}

function sqLx5($table, $col1, $val1, $col2, $val2, $col3, $val3, $col4, $val4, $col5, $val5, $item)
{
	global $db;
	$sql = $db->query("SELECT * from $table where $col1='$val1' and $col2='$val2' and $col3='$val3' and $col4='$val4' and $col5='$val5' ");
	$row = mysqli_fetch_assoc($sql);
	return $row[$item];
}
function countMessage($id)
{
	global $db;

	$sql = $db->query("SELECT * FROM msg WHERE senderid='$id' AND active='1'");

	return $sql->num_rows;
}
function readMessage($uid)
{
	global $db;

	$sql = $db->query("UPDATE msg SET active=0 WHERE receiverid='$uid'");
}
function incentive1($uid, $stage, $level)
{
	global $db;

	$sql = $db->query("SELECT * FROM incentive WHERE id='$uid' AND stage='$stage' AND level='$level'");
	$row = $sql->fetch_assoc();
	if ($sql->num_rows > 0) {
		return true;
	} else {
		return false;
	}
}
function incentive($uid, $stage, $level)
{
	global $db;

	$sql = $db->query("SELECT * FROM incentive WHERE id='$uid' AND stage='$stage' AND level='$level'");
	$row = $sql->fetch_assoc();

	return $row['status'];
}


function bcrypt($pass)
{
	return password_hash($pass, PASSWORD_BCRYPT);
}


function receivedTransfer($uid)
{
	global $db;

	$sql = $db->query("SELECT SUM(amount) AS sum FROM transfer WHERE id2='$uid'");
	$row = $sql->fetch_assoc();

	return $row['sum'];
}
function shaToKey($sn, $col = 'sn')
{
	global $db;

	$sql = $db->query("SELECT * FROM user WHERE sha1(sn) = '$sn' LIMIT 1");
	$row = $sql->fetch_assoc();
	$val = $row[$col];
	return $val;
}
function get_time_ago($time)
{
	$time_difference = time() - $time;
	if ($time_difference < 1) {
		return "less than 1 second ago";
	}
	$condition = array(
		12 * 30 * 24 * 60 * 60 => 'Year',
		30 * 24 * 60 * 60 => 'Month',
		24 * 60 * 60 => 'Day',
		60 * 60 => 'Hour',
		60 => 'Second'
	);
	foreach ($condition as $secs => $str) {
		$d = $time_difference / $secs;
		if ($d >= 1) {
			$t = round($d);
			return $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
		}
	}
}
function totalTransfer($uid)
{
	global $db;

	$sql = $db->query("SELECT SUM(amount) AS sum FROM transfer WHERE id='$uid'");
	$row = $sql->fetch_assoc();

	return $row['sum'];
}
function totalBalance()
{
	global $db;

	$sql = $db->query("SELECT SUM(tan) AS sum FROM wallet");
	$row = $sql->fetch_assoc();

	return $row['sum'];
}
function totalWithdraw($uid)
{
	global $db;

	$sql = $db->query("SELECT SUM(amount) AS sum FROM withdraw WHERE id='$uid'");
	$row = $sql->fetch_assoc();

	return $row['sum'];
}
function IdToSn($id)
{
	global $db;

	$sql = $db->query("SELECT * FROM user WHERE id='$id' LIMIT 1");
	$row = $sql->fetch_assoc();
	$val = $row['sn'];
	return $val;
}
function snToName($sn, $col = '')
{
	global $db;

	$sql = $db->query("SELECT * FROM user WHERE sn='$sn' LIMIT 1");
	$row = $sql->fetch_assoc();
	$val = ($col == '') ? $row['firstname'] . ' ' . $row['lastname'] : $row[$col];
	return $val;
}
function userName($id, $col = '')
{
	global $db;
	$sql = $db->query("SELECT * FROM user WHERE id='$id'");
	$row = $sql->fetch_assoc();
	$val = ($col == '') ? $row['firstname'] . ' ' . $row['lastname'] : $row[$col];
	return $val;
}




function snToId($sn)
{
	global $db;

	$sql = $db->query("SELECT * FROM user WHERE sn='$sn' LIMIT 1");
	$row = $sql->fetch_assoc();

	return $row['id'];
}
function stageNo($stage, $level)
{
	global $db;

	$sql = $db->query("SELECT * FROM levels WHERE stg='$stage' AND level='$level' LIMIT 1");
	$row = $sql->fetch_assoc();

	return $row['sn'];
}
function stageName($stage)
{
	$name = '';
	if ($stage == 1) {
		$name = "STARTER";
	} elseif ($stage == 2) {
		$name = "SILVER";
	} elseif ($stage == 3) {
		$name = "GOLD";
	} elseif ($stage == 4) {
		$name = "EMERALD";
	} elseif ($stage == 5) {
		$name = "DIAMOND";
	} elseif ($stage == 6) {
		$name = "DOUBLE DIAMOND";
	} else {
		$name = "INFINITY";
	}

	return $name;
}


function colSum($table, $col, $format = 1)
{
	global $db;
	$sql = $db->query("SELECT SUM($col) AS value_sum FROM $table where sid = SID ");
	$row = mysqli_fetch_assoc($sql);
	if ($format == 1) {
		return number_format($row['value_sum']);
	} else {
		return $row['value_sum'];
	}
}



function colSum1($table, $col, $cola, $vala, $format = 1)
{
	global $db;
	$sql = $db->query("SELECT SUM($col) AS value_sum FROM $table WHERE $cola = '$vala' ");
	$row = mysqli_fetch_assoc($sql);
	if ($format == 1) {
		return number_format($row['value_sum']);
	} else {
		return $row['value_sum'];
	}
}




function colSum2($table, $col, $cola, $vala, $colb, $valb, $format = 1)
{
	global $db;
	$sql = $db->query("SELECT SUM($col) AS value_sum FROM $table WHERE $cola = '$vala' AND $colb = '$valb' ");
	$row = mysqli_fetch_assoc($sql);
	if ($format == 1) {
		return number_format($row['value_sum']);
	} else {
		return $row['value_sum'];
	}
}



function colSum3($table, $col, $cola, $vala, $colb, $valb, $colc, $valc, $format = 1)
{
	global $db;
	$sql = $db->query("SELECT SUM($col) AS value_sum FROM $table WHERE $cola = '$vala' AND $colb = '$valb' AND $colc = '$valc' ");
	$row = mysqli_fetch_assoc($sql);
	if ($format == 1) {
		return number_format($row['value_sum']);
	} else {
		return $row['value_sum'];
	}
}


function rangeSum($table, $col, $start, $end)
{
	global $db;
	$sql = $db->query("SELECT SUM($col) AS value_sum FROM $table WHERE today between '$start' and '$end' ");
	$row = mysqli_fetch_assoc($sql);
	return number_format($row['value_sum']);
}

function userLog()
{
	if ($_SESSION['user'] != 'admin') {
		header("location: logout.php");
	}
	return;
}


function checkLogin()
{
	if (!isset($_SESSION['login'])) {
		header("location: logout.php");
	} elseif ($_SESSION['level_id'] < 1) {
		header("location: logout.php");
	} elseif ($_SESSION['level_id'] > 9) {
		header("location: logout.php");
	}
	return;
}








function modalHead($name, $title)
{
	echo '<div class="modal modal-default fade" id="modal-class">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> &times;</span></button>
                <h4 class="modal-title">' . $title . '</h4>
              </div>
              <div class="modal-body">';
	return;
}

function modalFoot($name, $butt)
{
	echo '</div>
              <div class="modal-footer">
              <button type="button" class="btn btn-' . $name . '" data-dismiss="modal">Close</button>' . $butt . ' 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>';
	return;
}



////FORMS


function myInput($name, $place, $width = 6, $required)
{
	//name is name of form
	//place refers to placeholder

	$fm = '<div class="col-xs-12 col-sm-12 col-md-' . $width . '" style="padding-bottom:10px" ><input name="' . $name . '" class="form-control"  placeholder="' . $place . '" ' . $required . ' /></div>';
	return $fm;
}


function myInputV($name, $place, $width = 6, $value)
{

	//name is name of form
	//place refers to placeholder

	$fm = '<div class="col-xs-12 col-sm-12 col-md-' . $width . '" style="padding-bottom:10px" >' . $place . '
<input name="' . $name . '" id="' . $name . '" class="form-control js-calc" value="' . $value . '"  placeholder="' . $place . '" /></div>';
	return $fm;
}


function myBtn($bname, $bvalue, $width = 12)
{
	//bname refers to botton name
	//bvalue refers to botton value
	$btn = '<div class="col-xs-12 col-sm-12 col-md-' . $width . '" style="padding-bottom:10px" ><button style="text-align:center; width:100%" type="submit" class="btn btn-primary" name="' . $bname . '">' . $bvalue . '</button></div>';
	return $btn;
}

function myBtn2($bname, $bvalue, $width = 12)
{
	//bname refers to botton name
	//bvalue refers to botton value
	$btn = '<div class="col-xs-12 col-sm-12 col-md-' . $width . '" style="padding-bottom:10px" ><button style="text-align:center; width:100%" type="submit" class="btn btn-success" name="' . $bname . '">' . $bvalue . '</button></div>';
	return $btn;
}




function myForm($content)
{
	//content is an array of form contents
	$postfm = '<form method="post">' . $content . '</form>';
	return $postfm;
}







function chkLogin()
{
	global $db, $userPhoto, $userLevel;
	if ($_SERVER['SCRIPT_NAME'] == '../login.php') {
	} else {
		if (!isset($_SESSION['admin']) or !isset($_SESSION['rep'])) {
			header('location: ../');
			exit;
		} else {
			$user = $_SESSION['rep'];
			$sql = $db->query("SELECT * FROM user WHERE sn = '$user' ");
			$row = mysqli_fetch_assoc($sql);
			$userPhoto = $row['photo'];
			$userLevel = $row['usertype'];

			if ($userLevel < 1) {
				header('location: ../');
			} elseif ($userLevel > 2) {
				header('location: ../');
			} else {
			}
		}
	}

	return;
}

function adminAccess()
{
	if ($_SESSION['userLevel'] != 2) {
		session_destroy();
	}
	return;
}

function checkExtension($end)
{
	$array = array('jpg', 'jpeg', 'gif', 'png');

	if (in_array($end, $array)) {
		return true;
	} else {
		return false;
	}
}
function checkSize($image_size)
{
	if ($image_size <= 1048576) {
		return true;
	} else {
		return false;
	}
}


function sanitize($str)
{
	global $db;
	return mysqli_real_escape_string($db, $str);
}


function sendMail($mail_to, $subject, $message)
{

	$email = "admin@musucdynasty.ng";

	# email headers.
	$headers = "From: Music Dynasty <$email>";

	# Send the email.
	$success = mail($mail_to, $subject, $message, $headers);

	return;
}

function dTable($head, $body, $sql, $action = 0)
{
	$action1 = $action;
	$i = 0;
	$x = 0;
	$n = count($head);
	$m = count($body);

	$act = $action == 0 ? '' : '<th>Action</th>';




	$table = '<table id="example1" class="table table-bordered table-striped sm">
                  <thead>
                  <tr>';
	while ($i < $n) {
		$a = $i++;

		$table .= '<th>' . $head[$a] . '</th>';
	}
	$table .= $act . '</tr>
                  </thead>
                  <tbody>';
	while ($row = mysqli_fetch_assoc($sql)) {
		$action = $action1 == 0 ? '' : '<td><form method="POST"><button type="submit" name="' . $action1[0] . '" class="btn btn-xs btn-primary" value="' . $row[$action1[2]] . '">' . $action1[1] . '</button></form></td>';

		$table .= ' <tr>';
		$x = 0;
		while ($x < $m) {
			$y = $x++;
			$b = $row[$body[$y]];
			$table .= '<td>' . $b . '</td>';
		}

		$table .= $action . '</tr>';
	}

	$table .= '</tbody>
                  <tfoot>
                  <tr>';

	$i = 0;
	while ($i < $n) {
		$a = $i++;

		$table .= '<th>' . $head[$a] . '</th>';
	}
	$table .= $act . '</tr>
                  </tfoot>
                </table>';

	return $table;
}
