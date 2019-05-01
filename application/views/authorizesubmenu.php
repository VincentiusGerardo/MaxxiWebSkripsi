<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Authorize Sub Menu</h1>
        <div id="msg"><?= $this->session->flashdata('message') ?></div>
        <select class="selectpicker" title="Select Karyawan" data-size="5" name="kodeK" data-live-search="true" id="selectKaryawan">
            <?php foreach($karyawan as $k){ ?>
            <option value="<?= $k->ID_Karyawan ?>"><?= $k->NamaKaryawan ?></option>
            <?php } ?>
        </select>
        <br><br>
        <div id="forRoles">

        </div>
    </div>
</div>
<script>
    $("#selectKaryawan").change(function(){
        var kd = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Module/MissionControl/getSubMenuByID') ?>",
            data: { kd: kd },
            beforeSend:function(){
                $("#forRoles").html('<img src="<?= base_url('Media/loading.gif') ?>" class="gambarloadingajax"/>');
            },
            success:function(as){
                $("#forRoles").html(as);
            }
        });
    });
</script>
