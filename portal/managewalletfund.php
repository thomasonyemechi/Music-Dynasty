<?php
include('library/connect.inc.php');
//session_start();
//$id=$_SESSION['user_id'];
include('library/index.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manage Fund account</title>
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
              <h1>Manage Client payment</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manage Client account

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
            <?php if (isset($_GET['transaction'])) {
              $trno = $_GET['transaction'];
              $sq = $db->query("SELECT * FROM walletorder WHERE trno = '$trno' ");
              $ro = mysqli_fetch_assoc($sq);
              $trid = $ro['id'];
              if ($ro['status'] == 0 and isset($trid)) {
            ?>
                <div class="col-md-12">
                  <!-- jquery validation -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h2 class="card-title"></h2>
                      <i>FUND PAYMENT ORDER FROM <?php echo strtoupper($max->userName5($trid, 'firstname')) ?> (<?php echo strtoupper($max->userName5($trid, 'user')) ?>): [BALANCE: ₦<?php echo number_format($max->wallet($trid), 2) ?>]</i>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <table class="table">
                            <tr>
                              <td>Amount: <?php echo $ro['amount'] ?> </td>
                              <td>Payment Date: <?php echo $ro['date'] ?></td>
                            </tr>
                            <tr>
                              <td>Reference: <?php echo $ro['ref'] ?></td>
                              <td>Type: <?php echo $ro['type'] ?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <form method="post">
                        <div class="form-row">
                          <div class="col-md-4">
                            <div class="form-group">

                              <input type="number" value="<?php echo $ro['amount'] ?>" name="amount" class="form-control" placeholder=" Amount (in naira)" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">

                              <input type="password" name="password" class="form-control" placeholder=" Authentication Code" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <button type="submit" name="ApproveFundOrder" value="<?php echo $trid ?>" class="btn btn-primary">Fund User Account: <?php echo strtoupper($max->userName5($trid, 'user')) ?></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
              <?php }
            } ?>
              <?php if (isset($_GET['Reference'])) {
                $trno = $_GET['Reference'];
                $sq = $db->query("SELECT * FROM wallet WHERE trno = '$trno' ");
                $ro = mysqli_fetch_assoc($sq);
                $trid = $ro['id'];
                if (isset($trid)) {
              ?>
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

                  <h2 class="card-title">Fund Payment</h2>
                  <i>FUND PAYMENT SUCCEESSFUL <?php echo strtoupper($max->userName($trid)) ?> (<?php echo strtoupper($max->userName($trid, 'user')) ?>): [BALANCE: ₦<?php echo number_format($max->wallet($trid), 2) ?>]</i>


                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form method="post">
                  <div class="card-body">
                    <h4>Reference: <?php echo $trno; ?> </h4>
                    <div class="form-row">

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
              <div class="card card-default">
                <div class="card-header">
                  <h2 class="card-title"></h2>
                  <i> PAYMENT FUNDING HISTORY: <?php echo strtoupper($max->userName($trid)) ?> (<?php echo strtoupper($max->userName($trid, 'user')) ?>)</i>

                  <form method="post">
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th>Reference</th>
                            <th>User</th>
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
                          $sql = $db->query("SELECT * FROM wallet WHERE type=7 AND id='$trid' ORDER BY sn ");
                          while ($row = $sql->fetch_assoc()) {
                            $e = $i++;
                            $type = $row['cos'] > 0 ? 'Credit' : 'Debit';

                            $bg = ($row['trno'] == $trno) ? 'bgcolor="#CF0"' : '';

                          ?>

                            <tr <?php echo $bg ?>>
                              <td><?php echo $e; ?></td>
                              <td><a href="?Reference=<?php echo $row['trno'] ?>"><?php echo $row['trno']    ?></a></td>
                              <td><?php echo $max->userName($row['id'], 'user'); ?></td>
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
                </div>
                <!-- /.card -->
              </div>
          <?php }
              } ?>
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
              <div class="card card-default">
                <div class="card-header">
                  <h2 class="card-title"></h2>
                  <i>Recent Payment Funding order</i>

                  <form method="post">
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th>Reference</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Status</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          $sql = $db->query("SELECT * FROM walletorder ORDER BY sn DESC LIMIT 30 ");
                          while ($row = $sql->fetch_assoc()) {
                            $e = $i++;

                            $bg = (isset($trno) and $row['trno'] == $trno) ? 'bgcolor="#CF0"' : '';

                          ?>

                            <tr <?php echo $bg ?>>
                              <td><?php echo $e; ?></td>
                              <td><a href="?transaction=<?php echo $row['trno'] ?>"><?php echo $row['trno']    ?></a></td>
                              <td><?php echo $row['ref'] ?></td>
                              <td><?php echo date('jS M, Y', $row['ctime']); ?></td>
                              <td><?php echo $row['amount'] ?></td>
                              <td><?php echo $row['date'] ?></td>
                              <!-- <td><?php //echo $max->userName($row['id'],'user'); 
                                        ?></td> -->
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