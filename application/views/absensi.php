<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>MaXXi | Login Page</title>

        <!--jQuery 3-->
        <script src="<?php echo base_url('js/jquery/jquery.min.js'); ?>"></script>

        <!--Bootstrap 3.3.7-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap.min.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap.min.js'); ?>"></script>

        <!--Font Awesome-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>"/>

        <!--Ionicons-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/Ionicons/css/ionicons.min.css'); ?>"/>

        <!--AdminLTE Theme-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/theme/AdminLTE.min.css'); ?>"/>
        <script src="<?php echo base_url('js/theme/adminlte.min.js'); ?>"></script>

        <!--iCheck-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/iCheck/square/blue.css'); ?>"/>
        <script src="<?php echo base_url('css/iCheck/icheck.min.js'); ?>"></script>

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
        
        <script src="<?php echo base_url('js/jam.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/form.css'); ?>"/>
    </head>
    <body>
        <div class="container account-wall" style="margin-top: 25px;">
            <div class="row tengah">                
                <div class="col-lg-4-offset-4">
                    <div class="penting">Absensi</div>
                    <div class="penting"><?php echo date("l, j F Y"); ?></div>
                    <table class="penting tengah2">
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
            </div>
	<div class="col-lg-4"></div>
	<div class="col-lg-4 tengah">
            <img src="<?php echo base_url('Media/nopic.jpg'); ?>" class="img-circle img-responsive tengah" width="200px" height="200px" id="foto"><br>
            <div id="buatNama"></div><br>
            <form id="formAbsen">
                <div class="form-group">
                  <label for="kode">Kode Karyawan:</label>
                  <input type="text" class="form-control" id="KodeKaryawan" name="kdk" autofocus maxlength="6">
                </div>
                <div id="tombol">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
	</div>
	
	</div>
        <script type="text/javascript">
            $(function(){
                $("img").on("error",function(){
                    $(this).attr("src", "<?php echo base_url('Media/nopic.jpg'); ?>");
                });
            });

            $("#formAbsen").submit(function(e){
                e.preventDefault();
                var x = $("#KodeKaryawan").val();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Absensi/doAbsensi'); ?>',
                    data: {x:x},
                    beforeSend:function(){
                        $("#tombol").html("<img src = <?php echo base_url('Media/loading.gif'); ?> />");
                    },
                    success:function(html){
                        $("#tombol").remove();
                        $("#buatNama").html(html);
                        setTimeout(function(){ location.href =  window.location.href; }, 3000);
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Absensi/getGambar'); ?>',
                    data: {x:x},
                    success:function(html){
                        $("#foto").attr("src", "<?php echo base_url(); ?>Media/Karyawan/" + html);
                        setTimeout(function(){ location.href =  window.location.href; }, 3000);
                    }
                });
            });
	</script>
    </body>
</html>
