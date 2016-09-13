<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin| View all Barang</title>
    
    <?php $this->load->view('admin/template') ?>
    <!-- Bootstrap -->
     
  </head>
  <body>
      <?php $this->load->view('admin/bio') ?>
      <div><?= $this->session->flashdata('tambah')?></div>
            <div class="col-md-1"></div>
            <div class="col-sm-10">
             
      <table id="myTable" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Nama Kategori</th>
                    <th>Gambar</th>
                    <th>Kontak</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $i=0;
                    foreach ($barangs as $barang):  
                        $i++;
                    ?>
                   
                    <td><?=$i?></td>
                    <td><?= $barang->id_barang ?></td>
                    <td><?= $barang->nama_barang ?></td>
                    <td><?= $barang->nama_kategori ?></td>
                     <td><?php $barang_image=['src'=>'gambar/'.$barang->gambar
                            ,'width'=>'100'];
                    echo img( $barang_image)?></td>
                    
                    <td><?= $barang->kontak ?></td>
                    <td><?= $barang->date ?></td> 
                    <td><?php
                          if($barang->status=="Active"){ ?>
                              <?=anchor('admin/barang/nonactive/'.$barang->id_barang,$barang->status,['class'=>'btn btn-info btn-sm'])?>
                         <?php }else{?>
                              <?=anchor('admin/barang/active/'.$barang->id_barang,$barang->status,['class'=>'btn btn-warning btn-sm'])?>
                         <?php }?></td>
                    <td align="center"><?=  anchor('admin/barang/update/'.$barang->id_barang.'/'.$barang->id_kategori,'Edit',['class'=>'btn btn-warning btn-sm'])?>
                    <?=  anchor('admin/barang/delete/'.$barang->id_barang,'Delete',['class'=>'btn btn-danger  btn-sm'
                        ,'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'])?></td>
                </tr>
                
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                   <td align="right" colspan="8"></td>
                    <td align="center">
                        <div id="bottom_link">
                       <?=  anchor('admin/barang/create','Tambah',['class'=>'btn btn-default btn-success'])?></div>  
                 </div>
                    </td>
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