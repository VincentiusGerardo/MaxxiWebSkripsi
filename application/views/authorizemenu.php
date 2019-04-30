<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Authorize Menu</h1>
        <div id="msg"><?php echo $this->session->flashdata('message'); ?></div>
        <select class="selectpicker" name="karyawan" data-size="5" id="namaKaryawan" title="Select Karyawan">
            <?php foreach($karyawan as $k){ ?>
            <option value="<?php echo $k->KodeKaryawan; ?>"><?php echo $k->NamaKaryawan; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <div id="forRoles">
            
        </div>
    </div>
</div>
<script>
    $("#namaKaryawan").change(function(){
        var kode = $(this).val();
        $.ajax({
           type: "POST",
           url: "<?php echo base_url('Administrator/getMenuByID'); ?>",
           data:{ kode: kode },
           beforeSend:function(){
               $("#forRoles").html('<img src="<?php echo base_url('Media/loading.gif'); ?>" class="gambarloadingajax"/>');
           },
           success:function(a){
               $("#forRoles").html(a);
           }
        });
    });
</script>