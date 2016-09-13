<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
           Kirim Pesan
        </title>
         <?php $this->load->view('template') ?>
     <script type="text/javascript">
			function cekform()
			{
				if(!$("#komentar").val())
				{
					alert('Maaf Pesan tidak boleh kosong');
					$("#komentar").focus();
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
                <div class="panel-heading" align="center"> <h1>Kirim Pesan</h1></div>
                <div class="panel-body">
                
                  
        <?= form_open('home/kirim/'.$id=$this->uri->segment(3),['class'=>'form-horizontal','onsubmit'=>'return cekform();'])?>
           
              <div class="form-group">
                <div class="col-sm-10">
                    <textarea class="form-control"  name="komentar" placeholder="Pesan" id="komentar"><?= set_value('komentar')?></textarea>
                    
                </div>
              </div>
            
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="kirim" value="1"/>
                  <button type="submit" class="btn btn-default btn-primary">Kirim</button>
             <?=anchor('home/detail/'.$id=$this->uri->segment(3),'Cancel',['class'=>'btn btn-default'])?>     
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
