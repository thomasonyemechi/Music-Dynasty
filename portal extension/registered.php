<?php
//session_start(); ob_start();
include ('library/connect.inc.php');
include ('library/index.php');
  $sql = $db->query("SELECT * FROM user ORDER BY sn DESC ");
  if (isset($_POST['q'])) {
    $q=$_POST['q'];
    $filter=$_POST['filter'];
    $sql = $db->query("SELECT * FROM user WHERE $filter LIKE '%$q%' ORDER BY sn DESC LIMIT 50 ");
    $report=mysqli_num_rows($sql)==0 ? 'search not found' : 'Result found for '. $q;
  }

$time = time()-86400; 
$time2 = mktime(0,0,0, date("m")-1,date("d"), date("Y"));
$time3 = time()-(24*60*60*7);  //mktime(0,0,0, date("w")-1,date("d"), date("Y"));
 if(array_key_exists('today', $_POST)) {
    
   $sql = $db->query("SELECT * FROM user WHERE ctime>=$time ORDER BY sn DESC LIMIT 50 ");

  }elseif(array_key_exists('week', $_POST)) {
     $sql = $db->query("SELECT * FROM user WHERE ctime>=$time3 ORDER BY sn DESC LIMIT 50 ");

     
  }elseif(array_key_exists('month', $_POST)) {
     $sql = $db->query("SELECT * FROM user WHERE ctime>=$time2 ORDER BY sn DESC LIMIT 50 ");
}


  if(array_key_exists('referral', $_POST)) {$_SESSION['sn'] = $_POST['referral']; 
     header('location: referral.php');}
 

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registered User</title>
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
            <h1>Registered User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered User</li>
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
            <div class="card card-default">
              <div class="card-header">
                <h2 class="card-title">Registered Users</h2>

                <div style="float: right;">
                  <form method="post">

                    <table >
                      <tr>

                        <td><input type="text" name="q" class="form-control" placeholder="search keyword"></td>
                        <td><select name="filter" class="form-control" required>
                          <option value="">filter by</option>
                          <option value="firstname">Firstname</option>
                          <option value="lastname">Lastname</option>
                          <option value="user">Username</option>
                          <option value="email">E-mail</option>
                          <option value="phone">Phone Number</option>
                        </select></td><td><button type="submit" class="btn btn-block btn-outline-primary btn-sm">Search</button></td>
                      </tr>
                    </table>
                  </form>
                </div>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div>
                <button type="submit" name="" class="btn  btn-outline-primary btn-xs">All</button>
                 <button type="submit" name="month" class="btn  btn-outline-primary btn-xs">month</button>
                    <button type="submit" name="week" class="btn btn-outline-primary btn-xs">week</button>
                    <button type="submit" name="today" class="btn  btn-outline-primary btn-xs">today</button>
                  </div>
                 <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN </th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Phone Number</th>
                    <!-- <th>Package</th> -->
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;
                       while ($row = mysqli_fetch_assoc($sql)) {$e=$i++;
                     ?>
                  <tr>
                    <td><?php echo $e; ?></td>
                    <td><?php echo userName($row['id']); ?></td>
                   
                    <td><?php echo $row['user']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <!-- <td><?php //echo sqLx('pack','id',$row['package'],'title'); ?></td> -->
                    <td><form method="post">
                      <button type="submit" name="FindProfile"style="font-size: 10px;" value="<?php echo $row['id']; ?>" class="btn btn-block btn-outline-primary btn-sm ">Profile</button>
                     </td>
                       </form>
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
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {
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
