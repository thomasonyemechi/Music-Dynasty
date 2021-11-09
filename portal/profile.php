<?php
//session_start(); ob_start();
include('library/connect.inc.php');
//$fid = $_SESSION['fid'];
$id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php include('head.php') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php include('nav.php') ?>

    <?php echo $id;
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>

                <li class="breadcrumb-item active">profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <div class="image">
                      <img class="img-circle elevation-2 w-50" src="images/<?php echo userName($fid, 'photo'); ?>" alt="User profile picture">
                    </div>
                  </div>
                  <hr>
                  <h3 class="profile-username text-center"><?php echo userName($fid, 'user'); ?></h3>
                  <hr>
                  <h3 class="profile-username text-center"> Account Balance: ₦<?php echo number_format($max->wallet($fid), 2) ?></h3>
                  <div>
                    </form>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>

            <!-- /.col -->
            <!-- left column -->
            <div class="col-md-9">
              <!-- jquery validation -->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h2 class="card-title">User Profile Information</h2>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post">
                  <div class="card-body">
                    <table class="table table-bordered table-striped ">
                      <tr>
                        <th>Firstname</th>
                        <td><?php echo userName($fid, 'firstname'); ?></td>
                      </tr>
                      <tr>
                        <th>Lastname</th>
                        <td><?php echo userName($fid, 'lastname'); ?></td>
                      </tr>

                      <tr>
                        <th>Phone Number</th>
                        <td><?php echo userName($fid, 'phone'); ?></td>
                      </tr>
                      <!-- <tr><th>E-mail</th><td><?php //echo userName($fid,'email'); 
                                                  ?></td> </tr> -->
                      <tr>
                        <th>Gender</th>
                        <td><?php echo userName($fid, 'sex'); ?></td>
                      </tr>
                      <tr>
                        <th>State</th>
                        <td><?php echo userName($fid, 'state'); ?></td>
                      </tr>
                      <tr>
                        <th>Country</th>
                        <td><?php echo userName($fid, 'country'); ?></td>
                      </tr>
                      <tr>
                        <th>account name</th>
                        <td><?php echo userName($fid, 'accname'); ?></td>
                      </tr>
                      <tr>
                        <th>account number</th>
                        <td><?php echo userName($fid, 'accountno'); ?></td>
                      </tr>
                      <tr>
                        <th>bank</th>
                        <td><?php echo userName($fid, 'bank'); ?></td>
                      </tr>
                      </tbody>
                    </table>
                    <hr>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">Update User Profile</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#primary">Update Account Details</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#primary1">Fund Wallet</button>
                  </div>

                  <!-- /.card-body -->


                </form>
              </div>
              <!-- /.col -->
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
  <!-- modal -->
  <div class="modal fade" id="primary">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <form method="post">
              <label class="col-md-12">Account Name</label>
              <div class="col-md-12">
                <input type="text" name="accname" class="form-control" value="<?php echo userName($fid, 'accname') ?>">
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-12">Account Number</label>
            <div class="col-md-12">
              <input type="text" name="accountno" class="form-control" value="<?php echo userName($fid, 'accountno') ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-12">Bank Name</label>
            <div class="col-md-12">
              <input type="text" name="bank" class="form-control" value="<?php echo userName($fid, 'bank') ?>">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" data-dismiss="" name="EditProfile1">Save Update</button>
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
                <input type="text" name="firstname" class="form-control" value="<?php echo userName($fid, 'firstname') ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">last name</label>
              <div class="col-md-12">
                <input type="text" name="lastname" class="form-control" value="<?php echo userName($fid, 'lastname') ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Gender</label>
              <div class="col-md-12">
                <input type="text" name="sex" class="form-control" value="<?php echo userName($fid, 'sex') ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Phone Number</label>
              <div class="col-md-12">
                <input type="text" name="phone" class="form-control" value="<?php echo userName($fid, 'phone') ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">State</label>
              <div class="col-md-12">
                <input type="text" name="state" class="form-control" value="<?php echo userName($fid, 'state') ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">country</label>
              <div class="col-md-12">
                <input type="text" name="country" class="form-control" value="<?php echo userName($fid, 'country') ?>">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" data-dismiss="" name="EditProfile">Save Update</button>
            </div>
          </form>
        </div>

        <!-- <p>One fine body</p> -->
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- modal -->
  <div class="modal fade" id="primary1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Fund wallet</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <form method="post">
              <label class="col-md-12">Name</label>
              <div class="col-md-12">
                <input type="text" name="firstname" class="form-control" value="<?php echo userName($fid) ?>" disabled>
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-12">Amount</label>
            <div class="col-md-12">
              <input type="text" name="amount" class="form-control" placeholder=" Amount(local currency)" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-12">Payment Date</label>
            <div class="col-md-12">
              <input type="date" name="date" class="form-control" placeholder="Payment Date" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-12">Username</label>
            <div class="col-md-12">
              <input type="text" name="user" class="form-control" value="<?php echo userName($fid, 'user') ?>" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-12">Password</label>
            <div class="col-md-12">
              <input type="password" name="pass" class="form-control" placeholder="Depositor Password">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-success" data-dismiss="" name="FundWalletadmin">Save User Fund
            </button>

          </div>

          </form>
        </div>
      </div>

    </div>

  </div>


  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/dist/js/adminlte.js"></script>
  <script src="assets/dist/js/pages/dashboard.js"></script>
</body>

</html>