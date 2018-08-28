<table border="1">
    <thead>
        <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Clock In</td>
        <td>Clock Out</td>
        <td>Lama Kerja</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($hasil as $h){ ?>
        <tr>
            <td><?php echo $h->ID_Absensi; ?></td>
            <td><?php echo date("d-m-Y",strtotime($h->Tanggal)); ?></td>
            <td><?php echo $h->ClockIn; ?></td>
            <td><?php echo $h->ClockOut; ?></td>
            <td><?php echo $h->LamaKerja; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>