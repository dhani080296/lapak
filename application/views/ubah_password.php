<?php
if($this->input->post('save')){
    $id_penjual= set_value('id_penjual');
   
    $password=set_value('password');
    
   
}
else{
$id_penjual=$penjual->id_penjual;

$password=$penjual->password;


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Ubah Password
        </title>
         <?php $this->load->view('template') ?>
    <script type="text/javascript">
			function cekform()
			{
				 if(!$("#password").val())
				{
					alert('Maaf password tidak boleh kosong');
					$("#password").focus();
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
                <div class="panel-heading" align="center"> <h1>Ubah Password</h1></div>
                <div class="panel-body">
                
                  
        <?= form_open('login_p/update_password/'.$id_penjual,['class'=>'form-horizontal','onsubmit'=>'return cekform();'])?>
               
                  <p class="text-primary">
        <span style="line-height:50px; font-size: 20"><strong><i><?= $password?></i></strong></span></p>   
              
                 <div class="form-group">
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" placeholder="Password" id="password" value="<?= $password?>">
                </div>
                 </div>
                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="save" value="1"/>
                  <button type="submit" class="btn btn-default btn-primary">Save</button>
             <?=anchor('login_p','Cancel',['class'=>'btn btn-default'])?>     
                </div>
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
