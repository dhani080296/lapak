<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Tambah Barang
        </title>
         <?php $this->load->view('template') ?>
    
    <script type="text/javascript">
			function cekform()
			{
				if(!$("#nama_barang").val())
				{
					alert('Maaf Nama Barang tidak boleh kosong');
					$("#nama_barang").focus();
					return false;
				}else
				if(!$("#nama_kategori").val())
				{
					alert('Maaf Kategori harus dipilih');
					$("#nama_kategori").focus();
					return false;
				}else
				if(!$("#image").val())
				{
					alert('Maaf Gambar tidak boleh kosong');
					$("#image").focus();
					return false;
				}else if(!$("#deskripsi").val())
				{
					alert('Maaf deskripsi tidak boleh kosong');
					$("#deskripsi").focus();
					return false;
				}else if(!$("#kontak").val())
				{
					alert('Maaf Kontak tidak boleh kosong');
					$("#kontak").focus();
					return false;
				}
			}
		</script>
              
    </head>
   <body style="background-color:darkgrey">
    
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-sm-10">
                <div class="panel panel-default panel-primary">
                <div class="panel-heading" align="center"> <h1>Tambah Barang</h1></div>
                <div class="panel-body">
                
                  
        <?= form_open_multipart('barang_penjual/create',['class'=>'form-horizontal','onsubmit'=>'return cekform();'])?>
           
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?= set_value('nama_barang')?>">
                </div>
              </div>
             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                  <select name="id_kategori" class="form-control" id="nama_kategori">
                      <option >Pilih Kategori</option>
                  <?php
foreach($kategori->result_array() as $d)
{
 ?>
<option id="id_kategori" value="<?php echo $d['id_kategori']; ?>"><?php echo $d['nama_kategori']; ?></option>
 <?php
}
?>
                      
                   </select>
                </div>
                 </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="userfile" id="image">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label" >Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control"  name="deskripsi" id="deskripsi"><?= set_value('deskripsi')?></textarea>
                </div>
              </div>
              
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Kontak" value="<?= set_value('kontak')?>">
                </div>
              </div>      
                    
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="save" value="1"/>
                  <button type="submit" class="btn btn-default btn-primary">Save</button>
             <?=anchor('barang_penjual','Cancel',['class'=>'btn btn-default'])?>     
                </div>
              </div>
           
        <?= form_close()?>
              <div class="panel-footer">
                  
                <div><?php echo validation_errors()?></div> 
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
