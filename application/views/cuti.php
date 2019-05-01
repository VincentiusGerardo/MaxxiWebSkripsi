<script src="<?= base_url('js/setTable/tableCuti.js') ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Cuti Karyawan</h1>
        <div id="msg"><?= $this->session->flashdata('message') ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addCuti"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="tableC" data-height="400" data-search="true">
            <tbody>
                <?php $i = 1; foreach($cuti as $c) {?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= date("d F Y",strtotime($c->TanggalCuti)) ?></td>
                    <td><?= date("d F Y",strtotime($c->TanggalKembali)) ?></td>
                    <td><?= $c->Keterangan ?></td>
                    <td><?= $c->StatusCuti=="N"?"Pending":"Accepted" ?></td>
                </tr>
                <?php $i++;} ?>
            </tbody>
        </table>
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


<!-- 
        <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div> -->