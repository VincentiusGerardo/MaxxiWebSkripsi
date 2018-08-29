<script src="<?php echo base_url('js/setTable/Admin/setFacility.js'); ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Facility List</h1>
        <div id="msg"><?php echo $this->session->flashdata('message'); ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addFacility"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="tableFacility" data-height="400" data-search="true">
            <tbody>
                <?php $i = 1; foreach($facility as $f){ ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $f->header; ?></td>
                    <td><?php echo $f->keterangan; ?></td>
                    <td><button class="btn btn-success" data-toggle="modal" data-target="#view<?php echo $f->id_facility; ?>">View Logo</button></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $f->id_facility; ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        &nbsp;
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $f->id_facility; ?>">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="addFacility" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Facility</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="formInput" action="<?php echo $path . 'doInsertFacility' ?>" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-4">Header:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="header">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4">Keterangan:</label>
              <div class="col-sm-7">
                  <textarea class="summernote form-control" name="isiKet"></textarea>
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
<?php foreach($facility as $f){ ?>
<div class="modal fade" id="update<?php echo $f->id_facility; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Facility</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="formInput" action="<?php echo $path . 'doUpdateFacility' ?>" method="POST">
                <input type="hidden" value="<?php echo $f->id_facility; ?>" name="nomor"/>
            <div class="form-group">
              <label class="control-label col-sm-4">Header:</label>
              <div class="col-sm-7">
                  <input type="text" class="form-control" name="header" value="<?php echo $f->header; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4">Keterangan:</label>
              <div class="col-sm-7">
                  <textarea class="summernote form-control" name="isiKet"><?php echo $f->keterangan; ?></textarea>
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
            <button type="submit" class="btn btn-success">Save changes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
</div>
<!--Delete-->
<div class="modal fade" id="delete<?php echo $f->id_facility; ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Facility</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="formInput" action="<?php echo $path . 'doDeleteFacility' ?>" method="POST">
                <input type="hidden" value="<?php echo $f->id_facility; ?>" name="nomor"/>
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
<!--View Image-->
<div class="modal fade" id="view<?php echo $f->id_facility; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $f->header; ?></h4>
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url('Media/Facility/' . $f->gambar ); ?>" style="width: 100%;"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
