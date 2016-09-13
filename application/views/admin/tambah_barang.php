<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Admin Page | Tambah Barang
        </title>
         <?php $this->load->view('admin/template') ?>
              
    </head>
   <body style="background-color:darkgrey">
    
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-sm-10">
                <div class="panel panel-default panel-primary">
                <div class="panel-heading" align="center"> <h1>Tambah Barang</h1></div>
                <div class="panel-body">
                
                  
        <?= form_open_multipart('admin/barang/create',['class'=>'form-horizontal'])?>
           
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?= set_value('nama_barang')?>">
                </div>
              </div>
             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                  <select name="id_kategori" class="form-control" id="id_pertnyaan">
                      <option>Pilih Kategori</option>
                  <?php
foreach($kategori->result_array() as $d)
{
 ?>
<option value="<?php echo $d['id_kategori']; ?>"><?php echo $d['nama_kategori']; ?></option>
 <?php
}
?>
                      
                   </select>
                </div>
                 </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="userfile">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control"  name="deskripsi"><?= set_value('deskripsi')?></textarea>
                </div>
              </div>
              
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kontak" placeholder="Kontak" value="<?= set_value('kontak')?>">
                </div>
              </div>      
                    
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="save" value="1"/>
                  <button type="submit" class="btn btn-default btn-primary">Save</button>
             <?=anchor('admin/barang','Cancel',['class'=>'btn btn-default'])?>     
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
