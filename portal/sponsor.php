<?php
include ('library/connect.inc.php');
//session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>sponsor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php include('head.php') ?>
</head>
<body>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card mt-5 mb-3 w-50 card-primary" style="margin:0 auto;">
              <div class="card-header">
                <h2 class="card-title">Verification</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"><?php if(isset($report)){echo $max->Alert();} ?>
                
                <div class="card-body">
                  <div class="form-row">
                    <div class="col-md-6">
                   <div class="form-group">
                    <h4>Verify Sponsor</h4>
                    
                    
                    <input type="text" class="form-control"  placeholder="Sponsor ID" name="sponsor"  required>
                  </div>
                </div>
                  <div class="col-md-6">
                  <div class="form-group">
                   <!--  <label for="epin">E-pin</label> -->
                   <h4>E-Pin</h4>

                    <input type="text" name="epin" class="form-control" id="epin" placeholder="Pin" required>
                  </div>
                </div>
                   <button name="VerifySponsor" class="btn btn-block btn-primary" type="submit">Verify</button>
                    Already registered?
               
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
</body>
</html>
