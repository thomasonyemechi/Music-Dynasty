<?php
include('library/connect.inc.php');
//session_start();
$id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Sponsor Artist</title>
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
              <h1>Sponsor Artist</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sponsor Artist</li>
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

              <form method='post' action='https://webpay.interswitchng.com/collections/w/pay' style="margin-left: 28px">
                <!-- <strong>Redirect URL:</strong>  -->
                <input type="hidden" name='site_redirect_url' class="form-control" value='https:://musicdynasty.ng/portal/fundwallet.php' />
                <!-- <strong>Pay Item ID:</strong>  -->
                <input type="hidden" name='pay_item_id' class="form-control" value='Default_Payable_MX20060' />
                <!-- <strong>Transaction Reference</strong>  -->
                <input type="hidden" name='txn_ref' class="form-control" value='<?php echo $max->win_hash(10) ?>' />
                <strong>Amount:</strong>
                <input name='amount' value='1000' class="form-control" />
                <!-- <strong>Currency:</strong>  -->
                <input type="hidden" name='currency' value='566' class="form-control" />
                <!-- <strong>Customer Name</strong>  -->
                <input type="hidden" name='cust_name' value='<?php echo $id ?>' class="form-control" />
                <!-- <strong>Payment Item Name</strong>  -->
                <input type="hidden" name='pay_item_name' value='Account Activation' class="form-control" />
                <!-- <strong>Display Mode:</strong>  -->
                <input type="hidden" name='display_mode' value='PAGE' class="form-control" />
                <!-- <strong>Merchant Code</strong>  -->
                <input type="hidden" name='merchant_code' value='MX20060' class="form-control" />
                <strong>Hit submit and complete the transaction</strong> <input type='submit' value='Submit Form' class="form-control" />
              </form>


              <p><em><small><a id="95101" class="quickteller-checkout-anchor" style="text-align: left;"></a></small></em></p>
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
</body>

</html>