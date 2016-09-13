<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Pertanyaan
        </title>
    <?php $this->load->view('template') ?>
         <script type="text/javascript">
			function cekform()
			{
				if(!$("#jawaban").val())
				{
					alert('Maaf jawaban tidak boleh kosong');
					$("#jawaban").focus();
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
                <div class="panel-heading" align="center"> <h1>Pertanyaan</h1></div>
                <div class="panel-body">
                
                  
        
           
               <?php 
                    foreach ($penjual as $b) {
         if($this->session->userdata('username')==$b->username )
         {
                   ?>
                    
                    <?= form_open('login_p/pertanyaan/',['class'=>'form-horizontal','onsubmit'=>'return cekform();'])?>
                    <p class="text-primary">
                        <span style="line-height:50px; font-size: 20"><strong><i><?=$b->nama_pertanyaan?></i></strong></span>
                    </p>
                    <div class="form-group">
                
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jawaban" placeholder="jawaban" id="jawaban">
                </div>
              </div>
             
                    
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="save" value="1"/>
                  <button type="submit" class="btn btn-default btn-primary">Lanjut</button>
             <?=anchor('login_p/'.$this->session->sess_destroy(),'Cancel',['class'=>'btn btn-default'])?> 
                   
               
                </div>
              </div>
                </div>
              <div class="panel-footer">
                  
                <div><?= validation_errors()?>
</div>
<div><?= $this->session->flashdata('error')?></div>
              </div>
                     <?php 
         }
                    }; ?>
        <?= form_close()?>
            
            <div class="col-md-1"></div>
        
        
        <script>
        $(document).ready(function(){
        $('#myTable').DataTable();
        });
        </script>
                </div>
              </div>
                
                
    </body>
</html>

