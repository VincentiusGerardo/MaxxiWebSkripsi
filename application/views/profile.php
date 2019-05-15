<style>
    #butEdit{
        margin-right: 5px;
    }
</style>
<script>
    $(function(){
        $("#butEdit").click(function(){
            $("#view").css('display','none');
            $("#edit").css('display','');
        });

        $("#butCancel").click(function(){
            $("#edit").css('display','none');
            $("#view").css('display','');
        });

        $("#butSubmit").click(function(){
            $("#formUpdate").submit();
        });
    });
</script>
<?php foreach($kary as $k){?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div id="view">
                <div id="msg"><?= $this->session->flashdata('message') ?></div>
                    <button id="butEdit" class="btn btn-primary pull-right">Edit</button>
                        <div class="col-lg-2 col-md-4 col-sm-5">
                            <img src="<?= base_url('Media/Karyawan/' . $k->Foto) ?>" width="250" height="250" class="img-circle"/>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-7">
                        <h1>Data Diri</h1>
                            <hr>
                            <table style="font-size: 22px;">
                                <tr>
                                    <td>Kode Karyawan</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->ID_Karyawan ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Karyawan</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->NamaKaryawan ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->TempatLahir ?>, <?= date("d F Y",strtotime($k->TanggalLahir)) ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->Jenis_Kelamin ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->Agama ?></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->NamaRole ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->Alamat ?></td>
                                </tr>
                                <tr>
                                    <td>Kewarganegaraan</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->Kewarganegaraan ?></td>
                                </tr>
                                <tr>
                                    <td>Status Pernikahan</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->StatusPernikahan ?></td>
                                </tr>
                                <tr>
                                    <td>No. HP</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->NoHP ?></td>
                                </tr>

                                <tr>
                                    <td>Tahun Masuk</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->TahunMasuk ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="edit" style="display:none;">
                    <div class="pull-right">
                        <button id="butCancel" class="btn btn-primary">Cancel</button>
                        &nbsp;
                        <button id="butSubmit" class="btn btn-success">Submit</button>
                    </div>
                        <div class="col-lg-2 col-md-4 col-sm-5">
                            <img src="<?= base_url('Media/Karyawan/' . $k->Foto) ?>" width="250" height="250" class="img-circle"/>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-7">
                        <h1>Data Diri</h1>
                            <hr>
                            <table style="font-size: 22px;">
                            <form id="formUpdate" method="POST" action="<?= base_url('Module/doUpdateProfile'); ?>">
                                <tr>
                                    <td>Kode Karyawan</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->ID_Karyawan ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Karyawan</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->NamaKaryawan ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->TempatLahir ?>, <?= date("d F Y",strtotime($k->TanggalLahir)) ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->Jenis_Kelamin ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->Agama ?></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->NamaRole ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><textarea class="summernote" name="alamat"><?= $k->Alamat ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Kewarganegaraan</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->Kewarganegaraan ?></td>
                                </tr>
                                <tr>
                                    <td>Status Pernikahan</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->StatusPernikahan ?></td>
                                </tr>
                                <tr>
                                    <td>No. HP</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><input type="text" class="form-control numberOnly" name="noHP" value="<?= $k->NoHP ?>"/></td>
                                </tr>

                                <tr>
                                    <td>Tahun Masuk</td>
                                    <td>&nbsp; : &nbsp;</td>
                                    <td><?= $k->TahunMasuk ?></td>
                                </tr>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<?php } ?>