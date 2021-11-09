<?php
include('library/connect.inc.php');
$id = $_SESSION['user_id'];
$s2 = $db->query("SELECT * FROM wallet ORDER BY sn DESC LIMIT 50 ");
include('library/index.php');
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
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                <!-- <form method="post">
              <div class="col-md-4">
                     <input type="submit" name="genpin" class="btn btn-primary" value=" PIN">
                     <input type="submit" name="autoReg" class="btn btn-primary" value=" reg">
                </div>
              </form> -->
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

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo sqL('user'); ?></h3>

                  <p>Registered Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="registered.php" class="small-box-footer">Active Users</a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>₦<?php ?></h3>

                  <p>Unapprove Fund</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="managewalletfund.php" class="small-box-footer">Funds</a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>₦</h3>

                  <p>Total Balance</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Balance</a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>₦<?php echo number_format($max->wallet($id), 2) ?></h3>

                  <p>My Balance</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">My Balance</a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-pink">
                <div class="inner">
                  <h3>₦</h3>

                  <p>Total Withdrawals</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Withdrawals</a>
              </div>
            </div>

            <div class="col-md-12">
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Referral Link</span>
                  <span class="info-box-number"><input style="border: thin solid #CCC; width: 80%; padding: 3px" type="text" value="https://www.musicdynasty.ng/portal/signup.php?ref=<?php echo userName($uid, 'sn') ?>&&<?php echo sha1(userName($uid, 'sn')) ?>" readonly id="myInput"><button onclick="myFunction()" class="js-copy">Copy</button> </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-default">
                <div class="card-header">
                  <h2 class="card-title">Recent Transactions</h2>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php
                    $head = ['Ref', 'ID', 'Status', 'Initial Balance', 'Amount', 'Final Balance', 'Remark', 'Payment Date'];
                    $body = ['trno', 'id', 'status', 'sin', 'cos', 'tan', 'remark', 'created'];
                    echo dTable($head, $body, $s2);
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">

            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include("footer.php") ?>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/dist/js/adminlte.js"></script>
  <script src="assets/dist/js/pages/dashboard.js"></script>

<script type="text/javascript">
    function myFunction() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      document.execCommand("copy");
      alert("Copied to clipboard: ");
    }
  </script>
</body>

</html>