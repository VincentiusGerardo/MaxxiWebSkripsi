<script src="<?= base_url('js/setTable/tableRekap.js') ?>"></script>
<table id="tableR" data-height="325">
    <tbody>
        <?php $i = 1; foreach($hasil as $h){ ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= date("j F Y",strtotime($h->Tanggal)) ?></td>
            <td><?= $h->ClockIn ?></td>
            <td><?= $h->ClockOut==null?"-":$h->ClockOut ?></td>
            <td><?= $h->LamaKerja==null?"-":$h->LamaKerja ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
<div class="pull-right" style="font-weight: bolder; font-size: 16px; margin-right: 3px; margin-top: 3px;">
    <table>
        <td>Total Jam Kerja &nbsp;</td>
        <td>: &nbsp;</td>
        <td><?= $total==null?"00:00:00":$total ?></td>
    </table>
</div>