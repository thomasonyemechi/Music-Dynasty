<?php
include('library/connect.inc.php');
//session_start();
$id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Withdrawal</title>
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Cash Withdrawal</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Withdrawal

                </li>
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
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h2 class="card-title"></h2>
                  <i>WITHDRAWAL [BALANCE: ₦<?php echo number_format($max->wallet($uid), 2) ?>]</i>
                </div>

                <!-- /.card-header -->
                <!-- form start -->

                <div class="card-body">
                  <b>NOTE: </b> Withdrawal Charge is ₦<?php echo $max->charge ?>
                  <form method="post">
                    <div class="form-row">
                      <div class="col-md-4">
                        <div class="form-group">

                          <input type="number" name="amount" class="form-control" placeholder="amount (in naira)" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">

                          <input type="password" name="password" class="form-control" placeholder="Account Password" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <input type="submit" name="RequestWithdrawal" class="btn btn-block btn-primary" value="INITIATE WITHDRAWAL">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h2 class="card-title">My Withdrawal Transactions</h2>
                </div>
                <form method="post">
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>SN</th>
                          <th>Reference</th>

                          <th>Date</th>
                          <th>Amount</th>
                          <th>Initial Balance</th>
                          <th>New Balance</th>
                          <th>Type</th>
                          <th>Remark</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        $sql = $db->query("SELECT * FROM wallet WHERE id='$uid' AND type=1 ORDER BY sn ");
                        while ($row = $sql->fetch_assoc()) {
                          $e = $i++;
                          $type = $row['cos'] > 0 ? 'Credit' : 'Debit';

                        ?>

                          <tr>
                            <td><?php echo $e; ?></td>
                            <td><?php echo $row['trno']    ?></td>
                            <td><?php echo date('jS M, Y', $row['ctime']); ?></td>
                            <td>₦<?php echo number_format(abs($row['cos']), 2) ?></td>
                            <td>₦<?php echo number_format($row['sin'], 2) ?></td>
                            <td>₦<?php echo number_format($row['tan'], 2) ?></td>
                            <td><?php echo $type; ?></td>
                            <td><?php echo $row['remark']; ?></td>
                            <td><?php echo $max->walletStatus($row['status']); ?></td>

                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </form>

                <!-- /.card -->
              </div>

            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <!-- /.content -->

    <!-- /.content-wrapper -->
    <?php include("footer.php") ?>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/dist/js/adminlte.js"></script>
  <script src="assets/dist/js/pages/dashboard.js"></script>
  <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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