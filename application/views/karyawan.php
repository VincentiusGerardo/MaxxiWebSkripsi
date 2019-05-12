<script src="<?= base_url('js/setTable/tableKaryawan.js') ?>"></script>
<div class="container">
    <div clas="row">
        <h1 class="judulHalaman">Karyawan</h1>
        <div id="msg"><?= $this->session->flashdata('message') ?></div>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addMenu"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <table id="tableK" data-height="400" data-search="true">
            <tbody>
                <?php 
                    $i = 1;
                    foreach($menu as $m){
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $m->NamaMenu ?></td>
                    <td><?= $m->URL ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?= $m->ID_Menu ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        &nbsp;
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $m->ID_Menu ?>">
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