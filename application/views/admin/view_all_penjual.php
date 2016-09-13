<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin| View all Penjual</title>
    
    <?php $this->load->view('admin/template') ?>
    <!-- Bootstrap -->
     
  </head>
  <body>
       <?php $this->load->view('admin/bio') ?>
      <div><?= $this->session->flashdata('tambah')?></div>
     
            <div class="col-sm-11">
             
      <table id="myTable" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Penjual</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $i=0;
                    foreach ($penjuals as $penjual):  
                        $i++;
                    ?>
                   
                    <td><?=$i?></td>
                    <td><?=$penjual->id_penjual?></td>
                    <td><?=$penjual->nama?></td>
                    <td><?=$penjual->alamat?></td>
                    <td><?=$penjual->username?></td>
                    <td><?=$penjual->password?></td>
                    <td><?=$penjual->nama_pertanyaan?></td>
                    <td><?=$penjual->jawaban?></td>
                    <td><?php $barang_image=['src'=>'gambar/'.$penjual->foto
                            ,'width'=>'100'];
                    echo img( $barang_image)?></td>
                    <td align="center"><?=  anchor('admin/penjual/update/'.$penjual->id_penjual,'Edit',['class'=>'btn btn-warning btn-sm'])?>
                    <?=  anchor('admin/penjual/delete/'.$penjual->id_penjual,'Delete',['class'=>'btn btn-danger btn-sm'
                        ,'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'])?></td>
                </tr>
                
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                   <td align="right" colspan="9"></td>
                    <td align="center">
                        <div id="bottom_link">
                       <?=  anchor('admin/penjual/create','Tambah',['class'=>'btn btn-default btn-success'])?></div>  
                 </div>
                    </td>
                </tr>
            </tfoot>
      </table>
                
            <div class="col-md-1"></div>
        </div>
   <script>
        $(document).ready(function(){
        $('#myTable').DataTable();
        });
        </script>
  </body>
</html>