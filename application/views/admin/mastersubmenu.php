<script src="<?php echo base_url('js/setTable/masterSubMenu.js'); ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Master Sub Menu</h1>
        <table id="tableSubMenu" data-search="true" data-height="450">
            <tbody>
                <?php 
                    $i = 1;
                    foreach($submenu as $sm){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $sm->NamaSubMenu; ?></td>
                    <td><?php echo $sm->NamaMenu; ?></td>
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