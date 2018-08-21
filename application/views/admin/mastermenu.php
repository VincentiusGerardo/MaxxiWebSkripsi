<script src="<?php echo base_url('js/setTable/masterMenu.js'); ?>"></script>
<div class="container">
    <div clas="row">
        <h1 class="judulHalaman">Master Menu</h1>
        <table id="msMenu" data-height="450" data-search="true">
            <tbody>
                <?php 
                    $i = 1;
                    foreach($menu as $m){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $m->NamaMenu; ?></td>
                    <td></td>
                </tr>
                <?php 
                    $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>