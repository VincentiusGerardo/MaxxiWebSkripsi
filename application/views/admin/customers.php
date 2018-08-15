<script src="<?php echo base_url('js/setTable/tableCustomers.js'); ?>"></script>
<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Customers List</h1>
        <button class="btn btn-primary btn-sm tombolAdd">Add</button>
        <table id="tableCustomers" data-height="450" data-search="true">
            <tbody>
                <?php
                    $i = 1;
                    foreach($customer as $c){ 
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $c->NamaCustomer; ?></td>
                        <td><button class="btn btn-success">View Logo</button></td>
                        <td></td>
                    </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>