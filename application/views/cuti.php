<script src="<?= base_url('js/setTable/tableCuti.js') ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Cuti Karyawan</h1>
        <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){ ?>
        <ul class="nav nav-pills nav-justified">
          <li class="active"><a data-toggle="pill" href="#home">Approve Cuti</a></li>
          <li><a data-toggle="pill" href="#menu1">Data Cuti</a></li>
        </ul>

        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
          <div id="msg"><?= $this->session->flashdata('message') ?></div>
            <table class="tableC" data-height="400" data-search="true">
                <tbody>
                    <?php $i = 1; foreach($cutiK as $cK) {?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= date("d F Y",strtotime($cK->TanggalCuti)) ?></td>
                        <td><?= date("d F Y",strtotime($cK->TanggalKembali)) ?></td>
                        <td><?= $cK->Keterangan ?></td>
                        <td>
                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approveCuti<?= $cK->ID_Cuti ?>" data-toggle="tooltip" title="Approve Cuti"><span class="glyphicon glyphicon-check"></span></button>
                          &nbsp;
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#declineCuti<?= $cK->ID_Cuti ?>" data-toggle="tooltip" title="Decline Cuti"><span class="glyphicon glyphicon-remove-circle"></span></button>
                        </td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
          </div>
          <div id="menu1" class="tab-pane fade">
          <div id="msg"><?= $this->session->flashdata('message') ?></div>
            <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addCuti"><span class="glyphicon glyphicon-plus"></span> Add</button>
            <table class="tableC" data-height="400" data-search="true">
                <tbody>
                    <?php $i = 1; foreach($cuti as $c) {?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= date("d F Y",strtotime($c->TanggalCuti)) ?></td>
                        <td><?= date("d F Y",strtotime($c->TanggalKembali)) ?></td>
                        <td><?= $c->Keterangan ?></td>
                        <td><?php if(is_null($c->StatusCuti)) echo "Pending"; else if($c->StatusCuti === "Y") echo "Accepted"; else echo "Declined"; ?></td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
          </div>
        </div>
        <?php }else{ ?>
        <div id="msg"><?= $this->session->flashdata('message') ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addCuti"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table class="tableC" data-height="400" data-search="true">
            <tbody>
                <?php $i = 1; foreach($cuti as $c) {?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= date("d F Y",strtotime($c->TanggalCuti)) ?></td>
                    <td><?= date("d F Y",strtotime($c->TanggalKembali)) ?></td>
                    <td><?= $c->Keterangan ?></td>
                    <td><?php if(is_null($c->StatusCuti)) echo "Pending"; else if($c->StatusCuti === "Y") echo "Accepted"; else echo "Declined"; ?></td>
                </tr>
                <?php $i++;} ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</div>

<!-- Add Cuti -->
<div id="addCuti" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Cuti</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" id="formInput" action="<?= base_url('Source/do/Cuti/doInsertCuti') ?>" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2">Tanggal Cuti:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control datepicker" name="tglC"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Tanggal Kembali:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control datepicker" name="tglK"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Keterangan:</label>
                <div class="col-sm-10">
                    <textarea name="ket" class="form-control summernote"></textarea>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Cuti</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php 
if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3 ){
foreach($cutiK as $cK){ 
?>
<!-- Accept Cuti -->
<div id="approveCuti<?= $cK->ID_Cuti ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Approve Cuti</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" id="formInput" action="<?= base_url('Source/do/Cuti/doUpdateCuti') ?>" method="POST">
        <input type="hidden" name="id" class="form-control" value="<?= $cK->ID_Cuti ?>">
        <input type="hidden" name="jwb" class="form-control" value="Y">
        <h1 style="text-align:center;">Are you Sure to Approve?</h1>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Approve</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Decline Cuti -->
<div id="declineCuti<?= $cK->ID_Cuti ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Decline Cuti</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" id="formInput" action="<?= base_url('Source/do/Cuti/doUpdateCuti') ?>" method="POST">
      <input type="hidden" name="id" class="form-control" value="<?= $cK->ID_Cuti ?>">
      <input type="hidden" name="jwb" class="form-control" value="N">
      <h1 style="text-align:center;">Are you Sure to Decline ?</h1>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Decline</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php 
    } 
  }
?>