<ul class="nav nav-pills nav-stacked">
      <?php if($this->session->userdata('username')) {?>
  <li role="presentation" class="active"><?=anchor('barang_penjual/create/','Tambah Barang')?></li>
   <li role="presentation" class="active"><?=anchor('barang_penjual/update_penjual/'.$this->session->userdata('id_penjual'),'Edit Profile')?></li>
    <li>
       <?= anchor('barang_penjual/','Home')?>
   </li>
   <?php foreach ($kategori as $k) {
    
         
     
     $this->load->model('model_barang_penjual');
      if($this->model_barang_penjual->find3($id=$k->id_kategori)==null){
      ?>
   
      <?php }else { ?>
   <li>
       <?= anchor('barang_penjual/kategori_barang/'.$k->nama_kategori,$k->nama_kategori)?>
   </li>
   <?php   } } ?>
   <?php }else { ?>
   <li>
       <?= anchor('home/','Home')?>
   </li>
  <?php foreach ($kategori as $k) {
     $this->load->model('model_web');
      if($this->model_web->find3($id=$k->id_kategori)==null){
      ?>
   
      <?php }else { ?>
   <li>
       <?= anchor('home/kategori_barang/'.$k->nama_kategori,$k->nama_kategori)?>
   </li>
      <?php  } }
   }?>
   
</ul>