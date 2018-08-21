<script src="<?php echo base_url('js/setTable/Director/tableFleet.js'); ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Fleet List</h1>
        
        <table id="tableFleet" data-height="450" data-search="true">
            <tbody>
                <?php
                    $i = 1;
                    foreach($fleet as $f){ 
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $f->NoPolisi; ?></td>
                        <td><?php echo $f->NamaSupir; ?></td>
                        <td><?php echo $f->NickName; ?></td>
                        <td><?php echo $f->JenisArmada; ?></td>
                        <td><?php echo $f->TahunPembuatan; ?></td>
                    </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>