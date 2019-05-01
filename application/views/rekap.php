<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Rekap Absensi</h1>
        <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){ ?>
            <div class="row" style="margin:0 auto;">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <select class="selectpicker form-control" id="idk" name="kdk" data-size="5" data-live-search="true" title="Select Employee">
                        <?php foreach($karyawan as $k){ ?>
                            <option value="<?= $k->ID_Karyawan ?>"><?= $k->NamaKaryawan ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row" id="jangka" style="display: none;">
                <table style="margin: 0 auto;">
                    <tr>
                        <td><label>From: </label></td>
                        <td>&emsp;</td>
                        <td><input type="text" class="form-control datepicker" id="from"/></td>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                        <td><label>To: </label></td>
                        <td>&emsp;</td>
                        <td><input type="text" class="form-control datepicker" id="to"/></td>
                        <td>&emsp;&emsp;</td>
                        <td><button class="btn btn-success" id="butSearch">Search</button></td>
                    </tr>
                </table>
            </div>
        <?php }else{  ?>
            <table style="margin: 0 auto;">
                <tr>
                    <td><label>From: </label></td>
                    <td>&emsp;</td>
                    <td><input type="text" class="form-control datepicker" id="from"/></td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    <td><label>To: </label></td>
                    <td>&emsp;</td>
                    <td><input type="text" class="form-control datepicker" id="to"/></td>
                    <td>&emsp;&emsp;</td>
                    <td><button class="btn btn-success" id="butSearch">Search</button></td>
                </tr>
            </table>
        <?php } ?>
    </div>
    <br>
    <div class="row" id="isiTable">
        
    </div>
</div>
<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){ ?>
<script>
    $(function(){
        $("#idk").change(function(){
            $("#jangka").css('display','');
        });
        $("#butSearch").click(function(){
            var a = $("#from").val();
            var b = $("#to").val();
            var c = $("#idk").val();
            $.ajax({
                type: "POST",
                url : "<?= base_url('Source/do/getAbsensi') ?>",
                data: {
                    a:a,
                    b:b,
                    c:c
                },
                beforeSend:function(){
                    $("#isiTable").html('<img src="<?= base_url('Media/loading.gif') ?>" class="gambarloadingajax"/>');
                },
                success:function(html){
                    $("#isiTable").html(html);
                }
            });
        });
    });
</script>
<?php }else{ ?>
<script>
    $(function(){
        $("#butSearch").click(function(){
            var a = $("#from").val();
            var b = $("#to").val();
            $.ajax({
                type: "POST",
                url : "<?= base_url('Source/do/getAbsensi') ?>",
                data: {
                    a:a,
                    b:b
                },
                beforeSend:function(){
                    $("#isiTable").html('<img src="<?= base_url('Media/loading.gif') ?>" class="gambarloadingajax"/>');
                },
                success:function(html){
                    $("#isiTable").html(html);
                }
            });
        });
    });
</script>
<?php } ?>