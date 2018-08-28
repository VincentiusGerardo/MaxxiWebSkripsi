<script src="<?php echo base_url('js/setTable/Admin/showrole.js'); ?>"></script>
<form action="<?php echo base_url('Administrator/doInsertAuthMenu'); ?>" method="POST">
    <input type="hidden" name="kodeK" value="<?php echo $kode; ?>" />
    <table class="table" id="tableRoles" data-height="350">
        <tbody>
        <?php foreach($menu as $m){ ?>
            <tr>
                <td><input type="checkbox" name="menu[]" value="<?php echo $m->ID_Menu; ?>"/></td>
                <td><?php echo $m->NamaMenu; ?></td>
            </tr>
        <?php } ?>   
        </tbody>
    </table>
    <div style="margin-top: 5px;">
        <input type="submit" value="Submit" class="btn btn-success pull-right"/>
    </div>
</form>