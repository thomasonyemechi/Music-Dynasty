<?php include ('library/connect.inc.php');
$id=$_SESSION['user_id'];
include ('library/index2.php');
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php include('head.php') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('nav.php') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>₦<?php echo number_format($max->totalEarn()) ?></h3>
                <p>Total Earnings</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Earnings</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>₦<?php echo number_format($max->wallet($id),2) ?></h3>

                <p>Balance</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Balance</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>₦<?php echo number_format($max->totalWithdrawUser($id),2) ?></h3>

                <p>Total Withdrawn</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="profile.php" class="small-box-footer">Withdrawals</a>
            </div>
          </div>

       <div class="col-md-12">
       <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Referral Link</span>
                <span class="info-box-number"><input style="border: thin solid #CCC; width: 80%; padding: 3px" type="text" value="https://www.musicdynasty.ng/portal/signup.php?ref=<?php echo userName($uid,'sn')?>&&<?php echo sha1(userName($uid,'sn')) ?>" readonly id="myInput"><button onclick="myFunction()" class="js-copy">Copy</button> </span>
                
                <span class="info-box-text">Referral Code</span>
                <span class="info-box-number"><input style="border: thin solid #CCC; width: 80%; padding: 3px" type="text" value="<?php echo userName($uid,'sn')?>" readonly id="myInput2"><button onclick="myFunction2()" class="js-copy">Copy</button> </span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
        <!-- /.row (main row) -->
<marquee behavior="scroll" direction="left">1. Do not share your username and password whatsoever. 2.Activate before 5 days of signup  3.Administration cost is half  4.There are different polls to each username on a royalty referral. 5.Pay 5k and get four royalty referral for your polling  6.When you sell your 4 royalty referral to serious investor you earn 2k immediately 7Amount invested= 5k Target cashout= 100k. 8.Share your referral code on social media and get attractive extra bonus.9.Artist assigned to you will be revealed after your cashout.</marquee>


        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
  <!--          <div class="card card-default">-->
  <!--            <div class="card-header">-->
  <!--              <h2 class="card-title">Recent Transactions</h2>-->
  <!--            </div>-->
  <!--            <div class="card-body">-->
  <!--              <div class="table-responsive">-->
  <!--                <?php
    //               $s2 = $db->query("SELECT * FROM wallet WHERE id='$id' ORDER BY sn DESC LIMIT 50 ");
    //               $head = ['Ref','Status','Initial Balance','Amount','Final Balance','Remark','Payment Date'];
    //   $body = ['trno','status','sin','cos','tan','remark','created'];

  // echo dTable($head,$body,$s2); 
  ?>
  <!--              </div>-->
  <!--            </div>-->

              <!-- /.card-header -->
              <!-- form start -->

  <!--          </div>-->
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



      <section class="content">
      <div class="container-fluid">
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


  </div>
  <!-- /.content-wrapper -->
<?php include("footer.php") ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!--  -copy script -->
<script type="text/javascript">
  
  
  function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
 // alert("Copied to clipboard: ");
}


  function myFunction2() {
  /* Get the text field */
  var copyText = document.getElementById("myInput2");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
 // alert("Copied to clipboard: ");
}
</script>
</body>
</html>
