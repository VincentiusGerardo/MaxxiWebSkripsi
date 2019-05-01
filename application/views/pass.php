<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Change Password</h1><br/>
        <div id="msg"><?= $this->session->flashdata("message") ?></div>
        <form class="form-horizontal cold-lg-8" action="<?= base_url('Administrator/doChangePassword') ?>" method="POST">
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
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-5">
                    <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
                    <input type="reset" name="btnReset" value="Cancel" class="btn btn-danger">
                </div>
            </div>
        </form>
    </div>
</div>