<script src="<?php echo base_url('js/setTable/Admin/tableCustomers.js'); ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Customers List</h1>
        <div id="msg"><?php echo $this->session->flashdata('message'); ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addCustomer"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="tableCustomers" data-height="450" data-search="true">
            <tbody>
                <?php
                    $i = 1;
                    foreach($customer as $c){ 
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $c->NamaCustomer; ?></td>
                        <td><button class="btn btn-success" data-toggle="modal" data-target="#view<?php echo $c->idCustomer; ?>">View Logo</button></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $c->idCustomer; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                            &nbsp;
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $c->idCustomer; ?>">
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
<!--Add-->
<div class="modal fade" id="addCustomer" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Customer</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="formInput" action="<?php echo $path . 'doInsertCustomers' ?>" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-4">Nama Customer:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="namaCustomer">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4">Image:</label>
              <div class="col-sm-7">
                <input type="file" name="gambar" class="btn btn-primary">
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
<?php foreach($customer as $c){ ?>
<!--View Image-->
<div class="modal fade" id="view<?php echo $c->idCustomer; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Fleet</h4>
            </div>
            <div class="modal-body">
                <img src="<?php echo $imageurl; ?>Media/Customer/<?php echo $c->Image; ?>" style="width: 100%;"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>