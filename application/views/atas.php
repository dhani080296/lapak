

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
        <a class="navbar-brand"><span style="color: #666666;"><b>Lapak</b> </span><span style="color: burlywood"><strong><i>Hp Online</i></strong></span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
      </ul>
       
      <ul class="nav navbar-nav navbar-right">
          <?php if($this->session->userdata('username')){?>
        <li><?php echo anchor('login_p/logout','<strong>Logout</strong>'); ?></li>
        <?php }else{ ?>
        <li> <?php echo anchor('login_p','<strong>Sign in</strong>');?></li>
        <?php }?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
     

   