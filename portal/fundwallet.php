<?php
include('library/connect.inc.php');
$id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Fund wallet</title>
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
                <li class="breadcrumb-item active">Moneyback Guaranteed</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <?php $sql = $db->query("SELECT * FROM user WHERE id='$uid' "); $data = mysqli_fetch_array($sql);
        ?>

      <input type="hidden" name="userInfo" value='<?php  echo json_encode($data); ?>' >

      <?php
      $_SESSION['amt'] = $amt = 100;
      $_SESSION['trno'] = $trno = $max->win_hash(10);  ?>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="callout callout-info">
              <h5>How it works</h5>
              <p>T&Cs<br>
                1. Do not share your username and password<br>
                <br>
                2. Activate subscription plan within 5 days or forfiet your 50% discount<br>
                <br>
                3. A "sponsor ID" referral code is generated after subscription payment of N5000 is made<br>
                <br>
                4. Share your personal sponsor ID referral with friends, family and social media (Sponsor ID will be linked to an artiste’s project)<br>
                <br>
                5. You can make as much as N10,000 per week within a month based on the number of people that register through your subscription referral link
                <br>
                <br>
                <br>
                Please Note:<br>

                The more your referral line, the more money you make<br>
                <br>
                Also the linked artiste's project streaming increases to your advantage!

              </p>
              <?php
              if (!$max->wallet($uid) >= ($amt / 100)) {
                if (userName($id, 'active') == 0) {
              ?>


              

                  <form method='post' action='https://webpay.interswitchng.com/collections/w/pay'>
                    <input type="hidden" name='site_redirect_url' class="form-control" value='https://musicdynasty.ng/portal/credit.php?<?php echo 'amt=' . $amt . '&&trno=' . $trno . '&&id=' . $id . ''; ?>' />
                    <input type="hidden" name='pay_item_id' class="form-control" value='Default_Payable_MX20060' />
                    <!-- <strong>Transaction Reference</strong>  -->
                    <input type="hidden" name='txn_ref' class="form-control" value='<?php echo $trno ?>' />
                    <strong>Next Step> </strong>
                    <input type="hidden" name='amount' value='<?php echo $amt ?>' class="form-control" />
                    <!-- <strong>Currency:</strong>  -->
                    <input type="hidden" name='currency' value='566' class="form-control" />
                    <!-- <strong>Customer Name</strong>  -->
                    <input type="hidden" name='cust_name' value='<?php echo userName($id) ?>' class="form-control" />
                    <!-- <strong>Payment Item Name</strong>  -->
                    <input type="hidden" name='pay_item_name' value='Account Activation' class="form-control" />
                    <!-- <strong>Display Mode:</strong>  -->
                    <input type="hidden" name='display_mode' value='PAGE' class="form-control" />
                    <!-- <strong>Merchant Code</strong>  -->
                    <input type="hidden" name='merchant_code' value='MX20060' class="form-control" />
                    <strong>Hit "Subscribe Now" to invest and sponsor a music project</strong> 
                    <div class="row">
                      <!-- <input type='submit' class="btn btn-primary btn-block" value='Subscribe Now' class="form-control" /> -->
                      <div class="col-6">
                        <button type="submit" disabled class="btn btn-primary btn-block">Pay With Interswitch</button>
                      </div>
                      <div class="col-6">
                        <button type="submit" disabled class="btn btn-primary btn-block payWithFlutter">Pay With Flutter Wave</button>
                      </div>

                    </div>
                  </form>
              <?php
               }
              } 
              ?>




              <?php if (userName($id, 'active') == 0) {
                if ($max->wallet($uid) >= ($amt / 100)) { ?>
                  <form method="post">
                    <input type="hidden" name="amt" value="<?php echo $amt / 100 ?>">
                    <button name="ActivateAccount" value="<?php echo $amt; ?>" class="btn btn-success btn-block btn-lg mt-2">Activate Account</button>
                  </form>
                <?php } else { ?>
                  <!--  <em>Sponsor Artist with the sum of NGN<?php echo $amt ?> to activate account;</em>-->
              <?php }
              } ?>
              <marquee behavior="scroll" direction="left">Online music promoters, for enquires email: Admin@musicDynasty.ng</marquee>

            </div>

          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h2 class="card-title">Transactions</h2>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>SN </th>
                              <th>Reference</th>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Depositor/Ref</th>
                              <th>Type</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 1;
                            $sql = $db->query("SELECT * FROM walletorder WHERE id='$id'  ORDER BY sn ");
                            while ($row = $sql->fetch_assoc()) {
                              $e = $i++;
                            ?>
                              <tr>
                                <td><?php echo $e; ?></td>
                                <td><?php echo $row['trno']    ?></td>
                                <td><?php echo date('jS M, Y', $row['ctime']); ?></td>
                                <td><?php echo $row['amount'] ?></td>
                                <td><?php echo $row['ref'] ?></td>
                                <td><?php echo $row['type'] ?></td>
                                <td><?php echo $max->walletStatus($row['status']); ?></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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

<!--   <script type="text/javascript">
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
 -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/dist/js/adminlte.js"></script>
  <script src="assets/dist/js/pages/dashboard.js"></script>

  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <script src="assets/js/flutter.js"></script>

  <script type="text/javascript">
      $( document ).ready(function() {
        $('button').removeAttr('disabled');
        // console.log( "ready!" );
      });

        $(function() {


            $('.payWithFlutter').on('click', function(e) {
                e.preventDefault();
                payWithFlutter();
            });
        })
    </script>


</body>

</html>