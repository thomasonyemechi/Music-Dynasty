<?php
include('library/connect.inc.php');
//session_start();
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  $sql = $db->query("SELECT * FROM user WHERE token='$token' ") or die('cannot');
  if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_array($sql);
    $ntoken  = $max->win_hashs(100);
    $ctime = time();
    $db->query("UPDATE user SET email_verified_at=$ctime, token='$ntoken' WHERE token='$token' ") or die('serve not reached');
    $_SESSION['report'] = 'Email Verification Successful';
    $_SESSION['user_id'] = $row['id'];
    header('location: ../login.php');
  } else {
    $report = 'invalid link';
    $count = 1;
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Confrim Email</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php include('head.php') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


  <?php if(isset($report)) { echo $max->Alert(); } ?>



    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Confirm Email</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Confirm Email</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <div class="callout callout-info ">
                <?php if (!isset($_GET['token'])) { //if(!isset($_POST['ResendConfirmationLink'])){ 
                ?>
                  <form method="post" class="pt-5 pb-5">
                    <center>
                      <h5> A verificatin mail wiil be sent to you <br>
                        <button type="submit" name="ResendConfirmationLink" class="btn btn-primary mt-2"><i>Get Verification Mail</i></button>
                      </h5>
                    </center>
                  </form>
                <?php } else { ?>

                <?php } ?>

              </div>
              <marquee behavior="scroll" direction="left">1. Do not share your username and password whatsoever. 2.Activate before 5 days of signup  3.Administration cost is half  4.There are different polls to each username on a royalty referral. 5.Pay 5k and get four royalty referral for your polling  6.When you sell your 4 royalty referral to serious investor you earn 2k immediately 7Amount invested= 5k Target cashout= 100k. 8.Share your referral code on social media and get attractive extra bonus.9.Artist assigned to you will be revealed after your cashout.</marquee>

            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    </div>
  </div>
  </div>
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

  <script type="text/javascript">
    document.getElementById('options').onchange = function() {
      var i = 1;
      var myDiv = document.getElementById(i);
      while (myDiv) {
        myDiv.style.display = 'none';
        myDiv = document.getElementById(++i);
      }
      document.getElementById(this.value).style.display = 'block';
    };
  </script>
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/dist/js/adminlte.js"></script>
  <script src="assets/dist/js/pages/dashboard.js"></script>


  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>