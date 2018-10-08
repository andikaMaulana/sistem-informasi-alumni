<?php
 $informasi=$this->Model->getTable('informasi');
 $informasi=$informasi[0];
 $informasi['logo'];
 ?>
<div class="jumbotron-fluid" style="margin:0; padding:0; background-color: #201E1C;">
    <div class="row" style="padding: 0; margin: 0; background-color: #201E1C;">
      <div class="col-md-6">
        <div class="card" style="background-color: #201E1C; border:0px;">
        <div class="card-body">
          <h5 class="card-title text-white">Alamat</h5>
          <h6 class="card-subtitle mb-2 text-muted text-white"><?=$informasi['nama_kampus']?></h6>
          <p class="card-text" style="color: #636B72;"><?=$informasi['alamat']?></p>          
        </div>
      </div>
      </div>
      <div class="col-md-6">
        <div class="row" style="width: 100%;">
          <div class="col-md-5"> </div>
          <div class="col-md-7"><div class="card" style="background-color: #201E1C; border:0px;">
        <div class="card-body">
          <h5 class="card-title text-white">Contact Us</h5>
          <ul class="card-subtitle mb-2 text-muted" style="list-style-type: none;">
            <li><li class="fa fa-facebook fa-lg"></li>&nbsp;: <?=$informasi['link_facebook']?></li>
            <li><li class="fa fa-instagram fa-lg"></li> : <?=$informasi['link_instagram']?></li>
            <li><li class="fa fa-twitter fa-lg"></li> : <?=$informasi['link_twitter']?></li>
                        <li><li class="fa fa-envelope fa-lg"></li> : <?=$informasi['email']?></li>
            <li><li class="fa fa-phone fa-lg"></li>&nbsp;: <?=$informasi['telepon']?></li>
          </ul>
        </div>
      </div></div>
        </div>
        
      </div>
    </div>
  </div>
        <script src="<?=base_url().'assets/template/MaterialDesign/'?>plugins/sweetalert/sweetalert.min.js"></script>
      <script src="<?=base_url().'assets/template/MaterialDesign/'?>js/pages/ui/dialogs.js"></script>
</body>
</html>