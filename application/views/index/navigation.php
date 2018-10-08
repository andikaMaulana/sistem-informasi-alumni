<nav class="navbar navbar-expand-lg label-navbar navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
    </span>
  </button>
  <a class="navbar-brand text-light" href="<?=base_url()?>">Beranda</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item nav_item">
        <a class="nav-link dropdown text-light" href="<?=base_url().'alumni/cari_alumni'?>">Cari Alumni</a>
      </li>
      <li class="nav-item nav_item">
        <a class="nav-link text-light" href="<?=base_url().'berita/lowongan'?>">Lowongan Pekerjaan</a>
      </li>
      <li class="nav-item nav_item">
        <a class="nav-link text-light" href="<?=base_url().'berita/alumni'?>">Berita Alumni</a>
      </li>
        <?php
        $is_login=$this->session->userdata('nama');
        if(empty($is_login)){
          ?>
          <li class="nav-item nav_item"><a class="nav-link text-light" href="<?=base_url()."web/login"?>">Login</a></li>
          <?php
        }else{
          ?>
          <li class="nav-item nav_item">
          <a class="nav-link text-light" href="<?=base_url()."dashboard"?>">Dashboard</a></li>
          <li class="nav-item nav_item">
          <a class="nav-link text-light" href="<?=base_url()."web/logout"?>">Logout</a></li>
          <?php
        }
        ?>
    </ul>
    <style type="text/css">
      
    </style>
    <form method="POST" action="<?=base_url().'Berita/cari'?>" class="col-md-5 col-sm-5 col-xs-12 form-group search-form">
      <div class="input-group">      
        <input type="text" id="cari" name="cari" class="form-control input-search" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn input-search-btn" type="submit" onclick=""><span class="fa fa-search"></span></button>
        </span>
      </div>
    </div>  
  </form>
</nav>