                </section>
            </div>
        <footer class="main-footer" style="text-align: center;">
           <strong>Copyright &copy; PT. Perdana MaXXi International 2016 - <?=date('Y') ?>. All Rights Reserved</strong> 
        </footer>

        <!-- Modal Change Password -->
        <div id="changePassword" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-body">
                <form class="form-horizontal cold-lg-8" action="<?= base_url('Source/do/doChangePassword') ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-4">Old Password:</label>
                        <div class="col-sm-5">
                        <input type="password" class="form-control" name="oldPass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">New Password:</label>
                        <div class="col-sm-5">
                        <input type="password" class="form-control" name="newPass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Repeat Password:</label>
                        <div class="col-sm-5">
                        <input type="password" class="form-control" name="repPass">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
                    <input type="reset" name="btnReset" value="Cancel" class="btn btn-danger">
                </div>
                </form>
                </div>

            </div>
        </div>
    </body>
</html>