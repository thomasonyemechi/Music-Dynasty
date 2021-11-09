<?php
//session_start(); ob_start();

if (isset($report)) { echo $max->Alert(); }
 if(isset($_SESSION['sponsverify'])){
    echo $_SESSION['sponsverify'];
  }

if(isset($_SESSION['user_id'])){}else{ header('location:../login.php'); }
include('library/check.php');
 ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

      </li>

    </ul>

    <!-- SEARCH FORM -->
 <!--    <form method="post">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit" name="userProfileDataSearch">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
<!--       <li>
       <a class="btn btn-primary" href="signup.php">Sign Up</a>
      </li> -->
      <li>

        <!-- </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <h5 class="float-right"><?php echo userName($uid,'user'); ?></h5>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bolder">Music Dynasty</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/<?php echo userName($uid,'photo'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo userName($uid,'firstname');?>  <?php 
           echo userName($uid,'lastname'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if ($max->adminLevel()==FALSE) {
            ?>
           <li class="nav-item has-treeview">
            <a href="userdashboard.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               <!--  <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Transactions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--<li class="nav-item">-->
              <!--  <a href="fundwallet.php" class="nav-link">-->
              <!--    <i class="far fa-circle nav-icon"></i>-->
              <!--    <p>Fund Wallet</p>-->
              <!--  </a>-->
              <!--</li>-->
              <li class="nav-item">
                <a href="fundwithdrawal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cashout</p>
                </a>
            </ul>
          </li>

         
           
         <?php }elseif($max->adminLevel()==TRUE){ ?>
          <li class="nav-item has-treeview">
            <a href="admindashboard.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               <!--  <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Clients
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php echo $max->Today();?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="registered.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registered Clients</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="myprofile.php" class="nav-link">
              <i class="nav-icon far fa-id-badge"></i>
                  <p>My Profile</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Transactions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="managewalletfund.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="fundwithdrawal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdrawals</p>
                </a>
              </li><li class="nav-item">
                <a href="managewithdrawal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Withdrawals</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="transhistory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaction History</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Team
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="referral.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Direct Referral</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="indirectref.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Indirect Referral</p>
                </a>
              </li>
              
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Account
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="myprofile.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Profile
                  </p>
                </a>
               </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Support Ticket</p>
                </a>
            </ul>
          </li>

          <li class="nav-item has-treeview">
              <p>
                <button type="submit" class="btn btn-danger btn-block" data-toggle="modal" data-target="#logout">logout</button>
              </p>
           </li>          
      </ul>
       </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


