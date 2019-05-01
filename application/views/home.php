<script src="<?= base_url('js/jam.js') ?>"></script>
<div>
    
    <div class="pentings">
        Welcome <?= $namaKaryawan;?> 
        <br> 
        <?= date("l, j F Y") ?>
    </div>
        <table class="pentings" align="center">
            <tr>
                <td id="Jam"><?= date("h") ?></td>
                <td>:</td>
                <td id="Menit"><?= date("i") ?></td>
                <td>:</td>
                <td id="Detik"><?= date("s") ?></td>
                <td>&nbsp;</td>
                <td><?= date("A") ?></td>
            </tr>
        </table>
</div>
