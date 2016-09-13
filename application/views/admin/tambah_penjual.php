<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Admin Page | Tambah Penjual
        </title>
         <?php $this->load->view('admin/template') ?>
              
    </head>
   <body style="background-color:darkgrey">
    
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-sm-10">
                <div class="panel panel-default panel-primary">
                <div class="panel-heading" align="center"> <h1>Tambah Penjual</h1></div>
                <div class="panel-body">
                
                  
        <?= form_open_multipart('admin/penjual/create',['class'=>'form-horizontal'])?>
           
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= set_value('nama')?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control"  name="alamat"><?= set_value('alamat')?></textarea>
                </div>
              </div>
             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username')?>">
                </div>
              </div>
                 <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password" placeholder="Password" value="<?= set_value('password')?>">
                </div>
                 </div>
                    <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Pertanyaan</label>
                <div class="col-sm-10">
                  <select name="id_pertanyaan" class="form-control" id="id_pertnyaan">
                      <option>Pilih Pertanyaan</option>
                  <?php
foreach($pertanyaan->result_array() as $d)
{
 ?>
<option value="<?php echo $d['id_pertanyaan']; ?>"><?php echo $d['nama_pertanyaan']; ?></option>
 <?php
}
?>
                      
                   </select>
                </div>
                 </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">jawaban</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jawaban" placeholder="Jawaban" value="<?= set_value('jawaban')?>">
                </div>
                 </div>
                     <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="userfile">
                </div>
              </div>
                    
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="save" value="1"/>
                  <button type="submit" class="btn btn-default btn-primary">Save</button>
             <?=anchor('admin/penjual','Cancel',['class'=>'btn btn-default'])?>     
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
