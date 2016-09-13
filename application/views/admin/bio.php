
 <?php if($this->session->userdata('username')){?>
    <p class="text-primary">
        <b>Selamat Datang </b><span style="line-height:50px; font-size: 20"><strong><i><?=$this->session->userdata('username')?></i></strong></span><b>, Anda login sebagai </b><span style="line-height:50px; font-size: 20"><strong><i><?=$this->session->userdata('status')?></i></strong></span>
    </p>
    <?php }else{ ?>
        <p class="text-info">
            <b>Selamat Datang Di</b> <span style="line-height:50px; font-size: 20"><strong><i>Lapak Hp Online</i></strong></p>
<?php } ?>

    