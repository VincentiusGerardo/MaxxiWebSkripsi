<script src="<?= base_url('js/setTable/tableKaryawan.js') ?>"></script>
<div class="container">
    <div clas="row">
        <h1 class="judulHalaman">Karyawan</h1>
        <div id="msg"><?= $this->session->flashdata('message') ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addKaryawan"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="tableK" data-height="400" data-search="true">
            <tbody>
                <?php 
                    foreach($kar as $k){
                ?>
                <tr>
                    <td><?= $k->ID_Karyawan ?></td>
                    <td><?= $k->NamaKaryawan ?></td>
                    <td><?= $k->NamaRole ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?= $k->ID_Karyawan ?>" data-toggle="tooltip" title="Update Karyawan">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        &nbsp;
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#upload<?= $k->ID_Karyawan ?>" data-toggle="tooltip" title="Upload Image">
                            <span class="glyphicon glyphicon-upload"></span>
                        </button>
                        &nbsp;
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $k->ID_Karyawan ?>" data-toggle="tooltip" title="Delete Karyawan">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modals -->
<!-- Add Karyawan -->
<div class="modal fade" id="addKaryawan" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Karyawan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= base_url('Source/do/Karyawan/doInsertKaryawan') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-4">Kode Karyawan:</label>
                        <div class="col-sm-7">
                        <?php
                            $q = $this->db->query("SELECT MAX(ID_Karyawan) as max FROM ms_karyawan");
                            $no = $q->row()->max + 1;
                            if($no < 10){
                                $nik = '000' . $no;
                            }else if($no > 10 && $no < 100){
                                $nik = '00' . $no;
                            }else if($no > 100 && $no < 1000){
                                $nik = '0' . $no;
                            }else{
                                $nik = $no;
                            }
                        ?>
                          <input type="text" class="form-control" name="idK" disabled value="<?= $nik ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nama Karyawan:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="namaK"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Role:</label>
                        <div class="col-sm-7">
                          <select class="selectpicker form-control" title="Select Role" name="role">
                          <?php $q = $this->db->query("SELECT * FROM ms_role WHERE FlagActive = 'Y'"); foreach($q->result() as $r){ ?>
                            <option value="<?= $r->ID_Role ?>"><?= $r->NamaRole ?></option>
                          <?php } ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Jenis Kelamin:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Jenis Kelamin" name="jk">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Agama:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Agama" name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Tempat Lahir:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="tempatLahir"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Tanggal Lahir:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control tanggalan" name="TanggalLahir"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Alamat:</label>
                        <div class="col-sm-7">
                          <textarea class="summernote" name="alt"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Kewarganegaraan:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Kewarganegaraan" name="wrg">
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Status Pernikahan:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Status Pernikahan" name="stat">
                                <option value="Nikah">Nikah</option>
                                <option value="BelumNikah">Belum Menikah</option>
                                <option value="DudaJanda">Duda/Janda</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">No HP:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control numberOnly" name="NoHP"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Foto:</label>
                        <div class="col-sm-7">
                          <input type="file" name="gambar">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php foreach($kar as $k){ ?>
<!-- Update Karyawan -->
<div class="modal fade" id="update<?= $k->ID_Karyawan ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Karyawan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= base_url('Source/do/Karyawan/doUpdateKaryawan') ?>" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" class="form-control" name="idK" value="<?= $k->ID_Karyawan ?>"/>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Kode Karyawan:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" disabled value="<?= $k->ID_Karyawan ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nama Karyawan:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="namaK" value="<?= $k->NamaKaryawan ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Role:</label>
                        <div class="col-sm-7">
                          <select class="selectpicker form-control" title="Select Role" name="role">
                          <?php $q = $this->db->query("SELECT * FROM ms_role WHERE FlagActive = 'Y'"); foreach($q->result() as $r){ ?>
                            <option value="<?= $r->ID_Role ?>" <?php if($k->ID_Role == $r->ID_Role) echo 'selected'; ?>><?= $r->NamaRole ?></option>
                          <?php } ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Jenis Kelamin:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Jenis Kelamin" name="jk">
                                <option value="L" <?php if($k->Jenis_Kelamin == "L") echo 'selected'; ?>>Laki-laki</option>
                                <option value="P" <?php if($k->Jenis_Kelamin == "P") echo 'selected'; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Agama:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Agama" name="agama">
                                <option value="Islam" <?php if($k->Agama == "Islam") echo 'selected'; ?>>Islam</option>
                                <option value="Hindu" <?php if($k->Agama == "Hindu") echo 'selected'; ?>>Hindu</option>
                                <option value="Buddha" <?php if($k->Agama == "Buddha") echo 'selected'; ?>>Buddha</option>
                                <option value="Kristen" <?php if($k->Agama == "Kristen") echo 'selected'; ?>>Kristen</option>
                                <option value="Katholik" <?php if($k->Agama == "Katholik") echo 'selected'; ?>>Katholik</option>
                                <option value="Kong Hu Cu" <?php if($k->Agama == "Kong Hu Cu") echo 'selected'; ?>>Kong Hu Cu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Tempat Lahir:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="tempatLahir" value="<?= $k->TempatLahir ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Tanggal Lahir:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control tanggalan" name="TanggalLahir" value="<?= date("m/d/Y",strtotime($k->TanggalLahir)) ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Alamat:</label>
                        <div class="col-sm-7">
                          <textarea class="summernote" name="alt"><?= $k->Alamat ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Kewarganegaraan:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Kewarganegaraan" name="wrg">
                                <option value="WNI" <?php if($k->Kewarganegaraan == "WNI") echo 'selected'; ?>>WNI</option>
                                <option value="WNA" <?php if($k->Kewarganegaraan == "WNA") echo 'selected'; ?>>WNA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Status Pernikahan:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Status Pernikahan" name="stat">
                                <option value="Nikah" <?php if($k->StatusPernikahan == "Nikah") echo 'selected'; ?>>Nikah</option>
                                <option value="BelumNikah" <?php if($k->StatusPernikahan == "BelumNikah") echo 'selected'; ?>>Belum Menikah</option>
                                <option value="DudaJanda" <?php if($k->StatusPernikahan == "DudaJanda") echo 'selected'; ?>>Duda/Janda</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">No HP:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control numberOnly" name="NoHP" value="<?= $k->NoHP ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Status Karyawan:</label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" title="Select Status" name="flag">
                                <option value="Y" <?php if($k->FlagActive == "Y") echo 'selected'; ?>>Aktif</option>
                                <option value="N" <?php if($k->FlagActive == "N") echo 'selected'; ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Karyawan -->
<div class="modal fade" id="delete<?= $k->ID_Karyawan ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Karyawan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= base_url('Source/do/Karyawan/doDeleteKaryawan') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $k->ID_Karyawan; ?>">
                    <h1 style="text-align: center;">Are you Sure?</h1>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload Image -->
<div class="modal fade" id="upload<?= $k->ID_Karyawan ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Image Karyawan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= base_url('Source/do/Karyawan/doUploadImage') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $k->ID_Karyawan; ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-4">Foto:</label>
                        <div class="col-sm-7">
                            <input type="file" name="gambar">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>