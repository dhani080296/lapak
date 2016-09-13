
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
             Detail barang
        </title>
         <?php $this->load->view('template') ?>
              
    </head>
    
   <body style="background-color:darkgrey">
    <?php $this->load->view('atas') ?>
        <?php foreach ($barang as $value) {
        
            ?>
      
       <div class="col-md-2"></div>
           <div class="col-md-8">
               <div class="panel panel-info">
                   <div class="panel-heading" ><h1><?= $value->nama_barang ?></h1>
                      
                       <h5><?= $value->alamat ?></h5>
                       
                   </div>
  <div class="panel-body">
   <table class="table table-bordered">
       <tr>
           <td>
                <?= img(['src'=> 'gambar/'.$value->gambar,
                  'style'=>'max-width:100%; max-height:100%;height:150px'])
                    ?>
           </td>
           <td ><h1><span class="label label-info"><?= $value->nama ?></span></h1>
               <h2><span class="label label-primary"><?= $value->kontak ?></span></h2>
               
</td>
       </tr>
       <tr>
           <td>
               <?= $value->deskripsi ?></td>
            <?php if($this->session->userdata('username')){?>  
           <td align='center'> <?= img(['src'=> 'gambar/'.$value->foto,
                  'style'=>'max-width:100%; max-height:100%;height:90px','class'=>'img-thumbnail'])
                    ?></td>
           <?php }else{ ?>
           <td align='center'>
         <?= img(['src'=> 'gambar/'.$value->foto,
                  'style'=>'max-width:100%; max-height:100%;height:90px','class'=>'img-thumbnail'])
                    ?><br>
         <?=  anchor('home/kirim/'.$id=$this->uri->segment(3),'Kirim Pesan',['class'=>'btn btn-default btn-success'])?>     
           </td>
           <?php }?>
       </tr>
       
</table>
      <?php if($this->session->userdata('username')){?>  
           <div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td align='center'><p class="text-primary"><span><h4>Komentar</h4></span></p></td>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($pesan as $b) :
                if($b->id_barang==$value->id_barang){
                ?>
                                    
                                
        <tr>
                       <td>
                         <?=$b->komentar ?>  
                       </td>
                <?php }?>
                   </tr>
                   <?php endforeach; ?>
      
        </tbody>
               </table>
           </div>
      <?php }?>
  </div>
                   <div class="panel-footer">
                        <?php if($this->session->userdata('username')){?>  
                       <?=  anchor('barang_penjual','Kembali',['class'=>'btn btn-default btn-success'])?>
                       <?php }else{ ?>
                         <?=  anchor('home','Kembali',['class'=>'btn btn-default btn-success'])?>
                           <?php }?>
                   </div>                
</div>
            
           </div>
 
        <?php }?>    
       
        
        <script>
        $(document).ready(function(){
        $('#myTable').DataTable();
        });
        </script>
                </div>
              </div>
                
                
    </body>
</html>

