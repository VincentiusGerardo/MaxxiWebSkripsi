<script src="<?php echo base_url('js/setTable/Admin/tableFleet.js'); ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Fleet List</h1>
        <div id="msg"><?php echo $this->session->flashdata('message'); ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addFleet"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="tableFleet" data-height="450" data-search="true">
            <tbody>
                <?php
                    $i = 1;
                    foreach($fleet as $f){ 
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $f->NoPolisi; ?></td>
                        <td><?php echo $f->NamaSupir; ?></td>
                        <td><?php echo $f->NickName; ?></td>
                        <td><?php echo $f->JenisArmada; ?></td>
                        <td><?php echo $f->TahunPembuatan; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $f->No; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                            &nbsp;
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $f->No; ?>">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>

<!--Modals-->
<!-- Add -->
<div class="modal fade" id="addFleet" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Fleet</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formInput" action="<?php echo $path . 'doInsertFleet' ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-4">No. Polisi:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="nopol" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nama Supir:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="namaS">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nick Name:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="nickN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Jenis Armada:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="JenisA">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Tahun Pembuatan:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control numberOnly" name="tahunP" maxlength="4">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php foreach($fleet as $f){ ?>
<!-- Edit -->
<div class="modal fade" id="update<?php echo $f->No ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Fleet</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo $path . 'doUpdateFleet' ?>" method="POST">
                    <input type="hidden" name="nomor" value="<?php echo $f->No; ?>"/>
                    <div class="form-group">
                        <label class="control-label col-sm-4">No. Polisi:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nopol" style="text-transform:uppercase" value="<?php echo $f->NoPolisi; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nama Supir:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="namaS" value="<?php echo $f->NamaSupir; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nick Name:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="nickN" value="<?php echo $f->NickName; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Jenis Armada:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="JenisA" value="<?php echo $f->JenisArmada; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Tahun Pembuatan:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control numberOnly" name="tahunP" maxlength="4" value="<?php echo $f->TahunPembuatan; ?>">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save changes</button>
    		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="delete<?php echo $f->No ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Fleet</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo $path . 'doDeleteFleet' ?>" method="POST">
                    <input type="hidden" name="nomor" value="<?php echo $f->No; ?>"/>
                    <h1 style="text-align: center;">Are You Sure ?</h1>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="delete">Delete</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>