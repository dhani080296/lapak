<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin| View all Komentar</title>
    
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
                    <th>Kode Pesan</th>
                    <th>Nama</th>
                    <th>Nama Barang</th>
                    <th>Komentar</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $i=0;
                    foreach ($komentars as $komentar):  
                        $i++;
                    ?>
                   
                    <td><?=$i?></td>
                    <td><?= $komentar->id_pesan ?></td>
                    <td><?= $komentar->nama ?></td>
                    <td><?= $komentar->nama_barang ?></td>
                    <td><?= $komentar->komentar ?></td>
                    <td><?= $komentar->date ?></td>
                    <td align="center">
                    <?=  anchor('admin/komentar/delete/'.$komentar->id_pesan,'Delete',['class'=>'btn btn-danger btn-sm'
                        ,'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'])?></td>
                </tr>
                
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                   <td align="right" colspan="6"></td>
                    <td align="center">
                       
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