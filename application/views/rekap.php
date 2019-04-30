<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Rekap Jam Kerja</h1>
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
    <br>
    <div class="row" id="isiTable">
        
    </div>
</div>
<script>
    $(function(){
        $("#butSearch").click(function(){
            var a = $("#from").val();
            var b = $("#to").val();
            $.ajax({
                type: "POST",
                url : "<?php echo $path . 'getDataAbsen' ?>",
                data: {
                    a:a,
                    b:b
                },
                beforeSend:function(){
                    $("#isiTable").html('<img src="<?php echo base_url('Media/loading.gif'); ?>" class="gambarloadingajax"/>');
                },
                success:function(html){
                    $("#isiTable").html(html);
                }
            });
        });
    });
</script>