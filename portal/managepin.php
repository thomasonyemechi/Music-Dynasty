<?php

include('library/connect.inc.php');
//session_start();
//$id=$_SESSION['user_id'];
if (isset($report)) {
  echo $max->Alert();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pin Purchase</title>
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
              <h1>Pin Purchase Transaction</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pin purchase

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
                  <i>PURCHASE REGISTRATION PINS [BALANCE: ₦<?php echo number_format($max->wallet($uid), 2) ?>]</i>
                </div>

                <!-- /.card-header -->
                <!-- form start -->

                <div class="card-body">
                  <b>NOTE: </b> Each pin cost ₦<?php echo $max->amount ?>
                  <form method="post">
                    <div class="form-row">
                      <div class="col-md-4">
                        <div class="form-group">

                          <input type="number" name="pins" min="1" max="<?php echo (int)($max->wallet($uid) / $max->amount) ?>" class="form-control" placeholder="No of PINs" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">

                          <input type="password" name="pass" class="form-control" placeholder="Account Password" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <input type="submit" name="buyEpins" class="btn btn-primary" value="PURCHASE REGISTRATION PIN">
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
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h2 class="card-title"></h2>
                  <i>PURCHASED REGISTRATION PINS </i>

                  <form method="post">
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th>E-PIN</th>
                            <th>PIN Date</th>
                            <th>Status</th>

                            <th>Used By</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          $i = 1;
                          $sql = $db->query("SELECT * FROM pin WHERE tm = 3 AND rep='$uid' ORDER BY created DESC ");
                          while ($row = mysqli_fetch_assoc($sql)) {
                            $e = $i++;
                            $rep = userName($row['rep'], 'user');
                            $user = $row['id'];
                            if ($row['status'] == 1) {
                              $st = 'used';
                            } else {
                              $st = 'active';
                            }
                            $uname = ($row['status'] == 1) ? $user : '';
                            echo '<tr>
                <td >' . $e . '</td>
                <td  >' . $row['pin'] . '</th>
                <td >' . $row['created'] . '</td>
                <td >' . $st . '</td>
             
                <td >' . $uname . '</td>
              </tr>';
                          } ?>
                        </tbody>
                        <tfoot>
                          <tr>

                            <th>SN</th>
                            <th>E-PIN</th>
                            <th>PIN Date</th>
                            <th>Status</th>

                            <th>Used By</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </form>
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
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h2 class="card-title"></h2>
                  <i>My PIN Purchase Transactions</i>

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
                          $sql = $db->query("SELECT * FROM wallet WHERE id='$uid' AND type=2 ORDER BY sn ");
                          while ($row = $sql->fetch_assoc()) {
                            $e = $i++;
                            $type = $row['cos'] > 0 ? 'Credit' : 'Debit';

                          ?>

                            <tr>
                              <td><?php echo $e; ?></td>
                              <td><?php echo $row['trno']    ?></td>
                              <td><?php echo date('jS M, Y', $row['ctime']); ?></td>
                              <td>$<?php echo number_format(abs($row['cos']), 2) ?></td>
                              <td>$<?php echo number_format($row['sin'], 2) ?></td>
                              <td>$<?php echo number_format($row['tan'], 2) ?></td>
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
    </div>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
  <!-- /.content -->
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

  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/dist/js/adminlte.js"></script>
  <script src="assets/dist/js/pages/dashboard.js"></script>
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