
<?php
if($this->input->post('save')){
   $id_pertanyaan= set_value('id_pertanyaan');
   $nama_pertanyaan= set_value('nama_pertanyaan');
    
}
else{
$id_pertanyaan=$pertanyaan->id_pertanyaan;
$nama_pertanyaan=$pertanyaan->nama_pertanyaan;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Admin Page | Edit Pertanyaan
        </title>
         <?php $this->load->view('admin/template') ?>
              
    </head>
   <body style="background-color:darkgrey">
    
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-sm-10">
                <div class="panel panel-default panel-primary">
                <div class="panel-heading" align="center"> <h1>Edit Pertanyaan</h1></div>
                <div class="panel-body">
                
                  
        <?= form_open('admin/pertanyaan/update/'.$id_pertanyaan,['class'=>'form-horizontal'])?>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kode Pertanyaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_pertanyaan" placeholder="Pertanyaan" value="<?= $id_pertanyaan?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Pertanyaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pertanyaan" placeholder="Pertanyaan" value="<?= $nama_pertanyaan?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="save" value="1"/>
                  <button type="submit" class="btn btn-default btn-primary">Save</button>
             <?=anchor('admin/pertanyaan','Cancel',['class'=>'btn btn-default'])?>     
                </div>
              </div>
           
        <?= form_close()?>
              <div class="panel-footer">
                  
                <div><?=  validation_errors()?></div> 
              </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        
        <script>
        $(document).ready(function(){
        $('#myTable').DataTable();
        });
        </script>
                </div>
              </div>
                
                
    </body>
</html>
