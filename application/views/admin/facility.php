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