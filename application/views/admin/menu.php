

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
   

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <?php if($this->session->userdata('username')):?>  
        <ul class="nav navbar-nav">
         
        <li><?= anchor('admin/penjual','Penjual')?></li>
        <li><?= anchor('admin/barang','Barang')?></a></li>
        <li><?= anchor('admin/kategori','Kategori')?></li>
        <li><?= anchor('admin/pertanyaan','Pertanyaan')?></li>
         <li><?= anchor('admin/komentar','Komentar')?></li>
        
      </ul>
        <ul class="nav navbar-nav navbar-right">
        <li>
            <span style="line-height:50px;"><?php echo '<b>you are:</b> '. $this->session->userdata('username'); ?></span>
        </li>
        <li>
            <?php echo anchor('login_p/logout','Logout'); ?>
        </li>
      </ul>
     <?php endif; ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
     

   