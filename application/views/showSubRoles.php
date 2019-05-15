<link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap/bootstrap-table.css') ?>"/>
<script src="<?= base_url('js/bootstrap/bootstrap-table.js') ?>"></script>
<script>
    function toggle(source){
        checkboxes = document.getElementsByTagName('input');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
<form action="<?= base_url('Module/MissionControl/doInsertAuthSubMenu') ?>" method="POST">
    <input type="hidden" name="kodeK" value="<?= $kode ?>" />
    <table data-toggle="table" data-height="350">
        <thead>
            <tr>
                <th data-align="center"><input type="checkbox" class="selectall" onClick="toggle(this)"></th>
                <th data-align="center">Nama Menu</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($menu as $m){
            $q = $this->db->query("SELECT * FROM tr_authorizesubmenu where ID_Karyawan = '$kode'");
            foreach($q->result() as $a){
        ?>
            <tr>
                <td><input type="checkbox" name="submenu[]" value="<?= $m->ID_SubMenu ?>" <?php if($a->ID_SubMenu == $m->ID_SubMenu) echo 'checked'; ?>/></td>
                <td><?= $m->NamaSubMenu ?></td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>
    <div style="margin-top: 5px;">
        <input type="submit" value="Submit" class="btn btn-success pull-right"/>
    </div>
</form>
