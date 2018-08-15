<script src="<?php echo base_url('js/setTable/tableFleet.js'); ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Fleet List</h1>
        <button class="btn btn-primary btn-sm tombolAdd" data-toggle="modal" data-target="#addFleet"><span class="glyphicon glyphicon-plus"></span> Add</button>
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
                        <td></td>
                    </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>
<!--Modals-->
<div class="modal fade" id="addFleet" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Fleet</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<!--AJAX Insert-->
<script>
    $().submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Administrator/doInsertFleet'); ?>",
            data: $().serialize(),
            beforeSend:function(){
                a
            },
            success:function(html){
                
        });
    });
</script>