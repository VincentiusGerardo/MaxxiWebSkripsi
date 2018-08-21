<script src="<?php echo base_url('js/setTable/masterMenu.js'); ?>"></script>
<div class="container">
    <div clas="row">
        <h1 class="judulHalaman">Master Menu</h1>
        <div id="msg"><?php echo $this->session->flashdata('message'); ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addFleet"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="msMenu" data-height="450" data-search="true">
            <tbody>
                <?php 
                    $i = 1;
                    foreach($menu as $m){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $m->NamaMenu; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $m->ID_Menu; ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        &nbsp;
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $m->ID_Menu; ?>">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
                <?php 
                    $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modals -->
<!-- Add -->
<div class="modal fade" id="addFleet" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Master Menu</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formInput" action="<?php echo $path . 'doInsertMenu' ?>" method="POST">
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