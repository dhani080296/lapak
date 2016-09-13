<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Penjual| Home</title>
    
    <?php $this->load->view('template') ?>
    <!-- Bootstrap -->
     
  </head>
  <body>
     <div id="navigation">
        <?php $this->load->view('atas'); ?>
         
     </div>
      <?php $this->load->view('bio') ?>
      <div><?= $this->session->flashdata('penjual'),$this->session->flashdata('tambah')?></div>
      <div class="row">      
      <div class="col-sm-2">
                <br>
                <br>
                <br>
              
                <?php $this->load->view('menu') ?>
            </div>
          
            <div class="col-sm-8">
             
      <table id="myTable" class="table table-striped table-bordered table-hover">
            <thead>
              
                    <th>#</th>
                    
                    <th>Nama Barang</th>
                    <th>Nama Kategori</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Action</th>
               
            </thead>
              <?php 
                    $i=0;
                    foreach ($barangs as $barang):  
                        $i++;
                    if($this->session->userdata('id_penjual')==$barang->id_penjual ){
                    ?>
            <tbody>
                
                <tr>
                   
                   
                    <td><?=$i?></td>
                    
                    <td><?= $barang->nama_barang ?></td>
                    <td><?= $barang->nama_kategori ?></td>
                     <td><?php $barang_image=['src'=>'gambar/'.$barang->gambar
                            ,'width'=>'100','height'=>'100'];
                    echo img( $barang_image)?></td>
                    
                   
                    <td><?= $barang->date ?></td> 
                    <td align="center"> 
                             <?php if($this->session->userdata('username')){?>
                            <?=anchor('barang_penjual/detail/'.$barang->id_barang,'Detail',['class'=>'btn btn-info btn-sm'])?>
                         <?=  anchor('barang_penjual/update/'.$barang->id_barang,'Edit',['class'=>'btn btn-warning btn-sm'])?>
                          <?php }else{ ?>
                         <?=anchor(''.$barang->id_barang,'Detail',['class'=>'btn btn-info btn-sm'])?>
                        <?php }?>
                    
                    </td>
                     <?php }else if($this->session->userdata('id_penjual')!=$barang->id_penjual ){ ?>
                    
                         <?php }else if($this->session->userdata('username')){ ?>
                    <td><?=$i?></td>
                    
                    <td><?= $barang->nama_barang ?></td>
                    <td><?= $barang->nama_kategori ?></td>
                     <td><?php $barang_image=['src'=>'gambar/'.$barang->gambar
                            ,'width'=>'100','height'=>'100'];
                    echo img( $barang_image)?></td>
                    
                   
                    <td><?= $barang->date ?></td> 
                    <td align="center"> 
                             <?php if($this->session->userdata('username')){?>
                            <?=anchor('barang_penjual/detail/'.$barang['id_barang'],'Detail',['class'=>'btn btn-info btn-sm'])?>
                         <?=  anchor('barang_penjual/update/'.$barang->id_barang,'Edit',['class'=>'btn btn-warning btn-sm'])?>
                          <?php }else{ ?>
                         <?=anchor(''.$barang->id_barang,'Detail',['class'=>'btn btn-info btn-sm'])?>
                        <?php }?>
                    
                    </td>
                    
                    <?php }?> 
                       
                </tr>
                
               <?php endforeach;?>
            </tbody>
            
             
            
            <tfoot>
                <tr>
                   
                 
                </tr>
            </tfoot>
      </table>
                
            <div class="col-md-1"></div>
        
   <script>
        $(document).ready(function(){
        $('#myTable').DataTable();
        });
        
        </script>
        
        
            </div>
  </body>
</html>