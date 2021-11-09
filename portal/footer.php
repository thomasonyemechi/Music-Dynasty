  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y'); ?> </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>


  <div id="logout" class="modal" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true" style="z-index: 999999;">
    <div class="modal-dialog">


        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vcenter">Logout Session</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <h6>Are you sure you want to logout?</h6>
                            <br><br>
                            <form method="post">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-primary">No, Cancel</button>
                                <button type="submit" class="btn btn-danger" name="LogoutUser">Yes, Logout</button>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>