<script src="<?php echo base_url('js/jam.js') ?>"></script>
<div>
    <div class="pentings"><?php echo date("l, j F Y"); ?></div>
        <table class="pentings" align="center">
            <tr>
                <td id="Jam"><?php echo date("h"); ?></td>
                <td>:</td>
                <td id="Menit"><?php echo date("i"); ?></td>
                <td>:</td>
                <td id="Detik"><?php echo date("s"); ?></td>
                <td>&nbsp;</td>
                <td><?php echo date("A"); ?></td>
            </tr>
        </table>
</div>