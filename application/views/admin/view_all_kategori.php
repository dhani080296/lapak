<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin| View all Kategori</title>
    
    <?php $this->load->view('admin/template') ?>
    <!-- Bootstrap -->
     
  </head>
  <body>
      <?php $this->load->view('admin/bio') ?>
      <div><?= $this->session->flashdata('tambah')?></div>
      <div class="row">
            <div class="col-md-1"></div>
            <div class="col-sm-10">
             
      <table id="myTable" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Kategori</th>
                    <th>Kategori</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $i=0;
                    foreach ($kategoris as $kategori):  
                        $i++;
                    ?>
                   
                    <td><?=$i?></td>
                    <td><?= $kategori->id_kategori ?></td>
                    <td><?= $kategori->nama_kategori ?></td>
                     
                    
                    <td align="center"><?=  anchor('admin/kategori/update/'.$kategori->id_kategori,'Edit',['class'=>'btn btn-warning btn-sm'])?>
                    <?=  anchor('admin/kategori/delete/'.$kategori->id_kategori,'Delete',['class'=>'btn btn-danger btn-sm'
                        ,'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'])?></td>
                </tr>
                
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                   <td align="right" colspan="3"></td>
                    <td align="center">
                        <div id="bottom_link">
                       <?=  anchor('admin/kategori/create','Tambah',['class'=>'btn btn-default btn-success'])?></div>  
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