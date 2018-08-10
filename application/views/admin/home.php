<?php echo $namaKaryawan; ?>
<?php
    foreach($menu as $m){
?>
<a href="<?php echo base_url($m->URL); ?>"><?php echo $m->NamaMenu; ?></a>
    <?php } ?>
<a class="btn btn-primary" href="<?php echo base_url('Login/doLogOut'); ?>">Log Out</a>