<?php
include ('library/connect.inc.php');
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MyProfile</title>
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
            <h1>My Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             
              <li class="breadcrumb-item active">My profile </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-3">
            <form method="post" enctype="multipart/form-data">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-circle elevation-2 w-50" src="images/<?php echo userName($uid,'photo'); ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo userName($uid,'user'); ?></h3>
                <div >
                  <div class="form-group">
                    <input type="file" name="photo" class="form-control">
                  </div>
                  <input  type="hidden" name="id" value="<?php echo userName($uid,'id');?>" class="form-control">
              </div>
              <div>
              <button type="submit" name="UploadPicture" class="btn btn-block btn-outline-primary btn-sm">Upload</button>
          </div>
        </div>
      </div>
    </form>
  </div>
          <!-- left column -->
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h2 class="card-title">User Profile Information</h2>
                <div style="float: right;">
                  <form method="post">
                   
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                 <table class="table table-bordered table-striped ">                   
        <tr><th>Firstname</th><td><?php echo userName($uid,'firstname'); ?></td> </tr>
        <tr><th>Lastname</th><td><?php echo userName($uid,'lastname'); ?></td> </tr>
        
        <tr><th>Phone Number</th><td><?php echo userName($uid,'phone'); ?></td> </tr>
        <tr><th>Gender</th><td><?php echo userName($uid,'sex'); ?></td> </tr>
        <tr><th>State</th><td><?php echo userName($uid,'state'); ?></td> </tr>
        <tr><th>Country</th><td><?php echo userName($uid,'country'); ?></td> </tr>
        <tr><th>account name</th><td><?php echo userName($uid,'accname'); ?></td> </tr>
        <tr><th>account number</th><td><?php echo userName($uid,'accountno'); ?></td> </tr>
        <tr><th>bank</th><td><?php echo userName($uid,'bank'); ?></td> </tr>
              </tbody>
                </table>
                </div>
               
                <!-- /.card-body -->

               <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal-primary" >Update User Profile</button>
                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#primary" >Update Account Details</button>


              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-3">
            <div class="container">
            <div class="container-fluid"> 
             <div class="card card-primary card-outline">
              <div class="card-header">
                         
              <form method="post">
                 <h5 class="m-t-30">Password Reset</h5>
                  <hr>
                                        <div class="form-group">
                                            <label class="col-md-12">Old Password</label>
                                            <div class="col-md-12">
                                                <input type="password" placeholder="" name="currentpass" class="form-control"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">New Password</label>
                                            <div class="col-md-12">
                                   <input type="password" placeholder="" class="form-control" name="newpass" id="example-email"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Confirm Password</label>
                                            <div class="col-md-12">
                                                <input type="password" name="newpass2" class="form-control"> </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" name="changePassword" class="btn btn-success">Reset Password</button>
                                            </div>
                                        </div>
                                    </form>
                                  </div>
                                 </div>
                               </div>
                              </div>
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


<?php if($max->checkAcc() == TRUE){ ?>
<!-- modal -->
   <div class="modal fade" id="primary" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true" style="z-index: 999999;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Update Profile</h4>
                <?php if($max->checkAcc() == FALSE){  ?><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button> <?php } ?>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <form method="post">
                                        <label class="col-md-12">Account Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="accname" class="form-control" value="<?php echo userName($uid,'accname') ?>"> </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="col-md-12">Account Number</label>
                                            <div class="col-md-12">
                                                <input type="text" name="accountno" class="form-control" value="<?php echo userName($uid,'accountno') ?>"> </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-md-12">Bank Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="bank" class="form-control" value="<?php echo userName($uid,'bank') ?>"> </div>
                                        </div> 
  <div class="modal-footer justify-content-between">
                <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-success float-right" data-dismiss="" name="EditProfile2"  >Save Update</button>
              </div>
                                      </form>
                                      </div>

                <!-- <p>One fine body</p> -->
              </div>
              
            </div>
            <!-- /.modal-content -->

          </div>
        </div>
  <!-- /.content-wrapper -->

<?php } ?>


<?php include("footer.php") ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

      <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form method="post">
                <div class="form-group">
                  <label class="col-md-12">first name</label>
                  <div class="col-md-12">
                    <input type="text" name="firstname" class="form-control" value="<?php echo userName($uid,'firstname') ?>"> </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">last name</label>
                    <div class="col-md-12">
                      <input type="text" name="lastname" class="form-control" value="<?php echo userName($uid,'lastname') ?>"> </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12">Gender</label>
                      <div class="col-md-12">
                        <input type="text" name="sex" class="form-control" value="<?php echo userName($uid,'sex') ?>"> </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Phone Number</label>
                        <div class="col-md-12">
                          <input type="text" name="phone" class="form-control" value="<?php echo userName($uid,'phone') ?>"> </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">State</label>
                          <div class="col-md-12">
                            <input type="text" name="state" class="form-control" value="<?php echo userName($uid,'state') ?>">
                             </div>
                           </div>
                           <div class="form-group">
                            <label class="col-md-12">country</label>
                            <div class="col-md-12">
                              <input type="text" name="country" class="form-control" value="<?php echo userName($uid,'country') ?>">
                               </div>
                            </div>
                            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" data-dismiss="" name="EditProfile3">Save Update</button>
            </div>
        </form>
      </div>

              <!-- <p>One fine body</p> -->
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
            </div>
          </div>
                <!-- <p>One fine body</p> -->
              </div>
              
            </div>

            <!-- /.modal-content -->
        <!-- /.modal-dialog -->

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
<script src="modal.js"></script>
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
