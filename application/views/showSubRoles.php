<script src="<?= base_url('js/setTable/Admin/showsubrole.js') ?>"></script>
<form action="<?= base_url('Administrator/doInsertAuthSubMenu') ?>" method="POST">
    <input type="hidden" name="kodeK" value="<?= $kode ?>" />
    <table class="table" id="tableSubRoles" data-height="350">
        <tbody>
        <?php foreach($menu as $m){ ?>
            <tr>
                <td><input type="checkbox" name="submenu[]" value="<?= $m->ID_SubMenu ?>"/></td>
                <td><?= $m->NamaSubMenu ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div style="margin-top: 5px;">
        <input type="submit" value="Submit" class="btn btn-success pull-right"/>
    </div>
</form>
