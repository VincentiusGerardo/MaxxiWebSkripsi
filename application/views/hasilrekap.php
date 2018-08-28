<script src="<?php echo base_url('js/setTable/tableRekap.js'); ?>"></script>
<table id="tableR" data-height="325">
    <tbody>
        <?php $i = 1; foreach($hasil as $h){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo date("j F Y",strtotime($h->Tanggal)); ?></td>
            <td><?php echo $h->ClockIn; ?></td>
            <td><?php echo $h->ClockOut==null?"-":$h->ClockOut; ?></td>
            <td><?php echo $h->LamaKerja==null?"-":$h->LamaKerja; ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
<div class="pull-right" style="font-weight: bolder; font-size: 16px; margin-right: 3px; margin-top: 3px;">
    <table>
        <td>Total Jam Kerja &nbsp;</td>
        <td>: &nbsp;</td>
        <td><?php echo $total==null?"00:00:00":$total; ?></td>
    </table>
</div>