<script src="<?php echo base_url('js/setTable/Admin/masterSubMenu.js'); ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Master Sub Menu</h1>
        <div id="msg"><?php echo $this->session->flashdata("message"); ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addSubMenu"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="tableSubMenu" data-search="true" data-height="450">
            <tbody>
                <?php 
                    $i = 1;
                    foreach($submenu as $sm){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $sm->NamaSubMenu; ?></td>
                    <td><?php echo $sm->NamaMenu; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $sm->ID_SubMenu; ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        &nbsp;
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $sm->ID_SubMenu; ?>">
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
                <form class="form-horizontal" id="formInput" action="<?php echo $path . 'doInsertSubMenu' ?>" method="POST">
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
                                    <option value="<?php echo $m->ID_Menu; ?>"><?php echo $m->NamaMenu; ?></option>
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