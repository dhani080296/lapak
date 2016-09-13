<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Login
        </title>
    <?php $this->load->view('template') ?>
         <script type="text/javascript">
			function cekform()
			{
				if(!$("#username").val())
				{
					alert('Maaf Username tidak boleh kosong');
					$("#username").focus();
					return false;
				}else
				if(!$("#password").val())
				{
					alert('Maaf Password tidak boleh kosong');
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
                <div class="panel-heading" align="center"> <h1>Login</h1></div>
                <div class="panel-body">
                
                  
        <?= form_open('login_p',['class'=>'form-horizontal','onsubmit'=>'return cekform();'])?>
           
              <div class="form-group">
                
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Username" id="username">
                </div>
              </div>
             <div class="form-group">
                
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="password" id="password">
                </div>
              </div>
                    
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="save" value="1"/>
                  <button type="submit" class="btn btn-default btn-primary">Login</button>
             <?=anchor('home/','Cancel',['class'=>'btn btn-default'])?> 
                   <?=anchor('login_p/create/','Daftar Akun',['class'=>'btn btn-success'])?>
                   <?=anchor('login_p/lupa/','Lupa Password',['class'=>'btn btn-info'])?>
                </div>
              </div>
           
        <?= form_close()?>
              <div class="panel-footer">
                  
                <div><?= validation_errors()?>
</div>
<div><?= $this->session->flashdata('error')?></div>
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
