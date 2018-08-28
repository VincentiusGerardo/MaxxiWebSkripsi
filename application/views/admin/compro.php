<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Company Profile</h1>
        <div id="msg"><?php echo $this->session->flashdata('message'); ?></div>
         <div class="panel-group" id="accordion">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addComPro" style="margin-bottom: 1%;"><span class="glyphicon glyphicon-plus"></span> Add </button>
            <?php foreach($compro as $cp){ ?>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cp->id_compro; ?>"><?php echo $cp->header; ?></a>
                </h4>
              </div>
              <div id="<?php echo $cp->id_compro; ?>" class="panel-collapse collapse">
                  <div class="panel-body">
                      <?php echo $cp->isi; ?>
                  </div>
                  <div>
                    <button type="button" class="btn btn-primary" name="edit" data-toggle="modal" data-target="#editComPro<?php echo $cp->id_compro; ?>" style="margin-left: 1%; margin-bottom: 1%;">Edit</button>
                    &nbsp;
                    <button type="button" class="btn btn-danger" name="edit" data-toggle="modal" data-target="#deleteComPro<?php echo $cp->id_compro; ?>" style="margin-left: 1%; margin-bottom: 1%;">Delete</button>
	    	</div>
              </div>
            </div>
            <?php } ?> 
          </div> 
    </div>
</div>
<!--Modals-->
<!-- Add Company Profile -->
<div class="modal fade" id="addComPro" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Add Company Profile Menu</b></h4>
        </div>
        <div class="modal-body">	      
            <form id="formInsert" method="POST" action="<?php echo $path . 'doInsertCompanyProfile' ?>">
                <p>Menu Name: <br></p>
                <input type="text" name="namaMenu" class="form-control"> <br>
                <p>Description: <br></p>
                <textarea class="summernote form-control" name="isiText"></textarea>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Add Menu</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
            </form>
      </div>
    </div>
</div>
<?php foreach($compro as $cp){ ?>
<div class="modal fade" id="editComPro<?php echo $cp->id_compro; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Edit <?php echo $cp->header; ?></b></h4>
        </div>
        <div class="modal-body">	      
            <form action="<?php echo $path . 'doUpdateCompanyProfile' ?>" method="POST">
                <input type="hidden" name="kode" value="<?php echo $cp->id_compro; ?>">
                <textarea class="summernote" name="isiText"><?php echo $cp->isi; ?></textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save changes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade" id="deleteComPro<?php echo $cp->id_compro; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Edit <?php echo $cp->header; ?></b></h4>
        </div>
        <div class="modal-body">	      
            <form action="<?php echo $path . 'doDeleteCompanyProfile' ?>" method="POST">
                <input type="hidden" name="kode" value="<?php echo $cp->id_compro; ?>">
                <h1 style="text-align: center;">Are You Sure ?</h1>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="delete">Delete</button>
            <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
        </div>
        </form>
      </div>
    </div>
</div>
<?php } ?>
<script>
    $(function(){
        $('.collapse').first().addClass('in');
    });
</script>