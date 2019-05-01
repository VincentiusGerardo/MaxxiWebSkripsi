<script src="<?= base_url('js/setTable/masterSubMenu.js') ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Master Sub Menu</h1>
        <div id="msg"><?= $this->session->flashdata("message") ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addSubMenu"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="tableSubMenu" data-search="true" data-height="400">
            <tbody>
                <?php 
                    $i = 1;
                    foreach($submenu as $sm){
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $sm->NamaSubMenu ?></td>
                    <td><?= $sm->NamaMenu ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?= $sm->ID_SubMenu ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        &nbsp;
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $sm->ID_SubMenu ?>">
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
<!--Modals-->
<div class="modal fade" id="addSubMenu" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Master Sub Menu</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formInput" action="<?= base_url('Module/MissionControl/doInsertSubMenu') ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-4">Sub Menu Name:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="namaSubMenu"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Parent Menu:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Parent Menu" name="menu">
                                <?php foreach($men as $m){ ?>
                                    <option value="<?= $m->ID_Menu ?>"><?= $m->NamaMenu ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">URL:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="url"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <div class="col-sm-7">
                            <p style="color: red;">Kosongkan Jika URL sama dengan Nama Menu</p>
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
<?php foreach($submenu as $sm){ ?>
<!--Update-->
<div class="modal fade" id="update<?= $sm->ID_SubMenu ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Master Sub Menu</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formInput" action="<?= base_url('Module/MissionControl/doUpdateSubMenu') ?>" method="POST">
                    <input type="hidden" name="no" value="<?= $sm->ID_SubMenu ?>"/>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Sub Menu Name:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="namaSubMenu" value="<?= $sm->NamaSubMenu ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Parent Menu:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Parent Menu" name="menu">
                                <?php foreach($men as $m){ ?>
                                    <option value="<?= $m->ID_Menu ?>" <?php if($sm->ID_Menu === $m->ID_Menu){ echo "selected";} ?>><?= $m->NamaMenu ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">URL:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="url" value="<?= $sm->URL ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <div class="col-sm-7">
                            <p style="color: red;">Kosongkan Jika URL sama dengan Nama Menu</p>
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
<!--Delete-->
<div class="modal fade" id="delete<?= $sm->ID_SubMenu ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Master Sub Menu</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formInput" action="<?= base_url('Module/MissionControl/doDeleteSubMenu') ?>" method="POST">
                    <input type="hidden" name="no" value="<?= $sm->ID_SubMenu ?>"/>
                    <h1 style="text-align: center;">Are You Sure?</h1>
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
