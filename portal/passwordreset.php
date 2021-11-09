<?php
//session_start(); ob_start();
include ('library/connect.inc.php');
if(!isset($_GET['token'])){
  header('location: assets/login.php');
}  



$_SESSION['token'] = $token = $_GET['token'];


$ck = $db->query("SELECT * FROM user WHERE token = '$token' ")or die('cannot connect');

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
  
    <div class="card-body login-card-body">
        <?php if(mysqli_num_rows($ck)>0){?>
      <p class="login-box-msg">Password Reset</p>

      <form  method="post">
        <?php if (isset($report)) { echo $max->Alert2(); } ?>
        <div class="input-group mb-3">
            <input type="hidden" class="form-control" name="token" value="<?php echo $_GET['token'] ?>" >
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirmpassword" placeholder="Confrim Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <button type="submit" name="ResetPassword" class="btn btn-primary btn-block">reset</button>
          </div>
          <!-- /.col -->
        </div>
        <?php }else{ $report= 'Invalid Reset Link'; $count=1; ?>
        <?php if (isset($report)) { echo $max->Alert2(); } ?>
         <p class="login-box-msg">Invalid password reset link</p>
         <?php  } ?>
        
      </form>     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>

</body>
</html>
