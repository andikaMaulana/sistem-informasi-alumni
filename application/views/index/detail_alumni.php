 <div class="container" style="margin-top:30px;">
  <!-- content -->
  <div class="row">
    <br>
    <div class="col-md-9">
      <?php
      ?> 
      <div class="row" style="border-bottom: 1px solid grey; margin-right: 10px;">
        <p>
        Beranda <i class="fa fa-angle-right"></i> Alumni<hr>
      </p>
      </div>           
      <div class="row" style="margin-top:10px; padding-left: 10px;"><h4>Biodata Alumni</h4>
      </div>
      <div class="container-fluid row grey" style="text-align: left;">
        <div class="col-md-4">
          <div class="row" style="width: 100%;">
            &nbsp;
          </div>
          <div class="row">
            <p class="text-left"><img src="<?=base_url().'upload/foto/'.$item['foto']?>" alt="Slide 1" class="item_slide" style="max-height: 180px;"></p>
          </div>
           <div class="row" style="width: 100%;">
            &nbsp;
          </div>
        </div>
        <div class="col-md-8">
          <div class="row" style="width: 100%;">
            &nbsp;
          </div>
            <div class="row">
            <div class="col-md-4">
              <p class="text-left">NIM</p>
            </div>
            <div class="col-md-8">
              <p class="text-left"><?=$item['nim']?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <p class="text-left">Nama</p>
            </div>
            <div class="col-md-8">
              <p class="text-left"><?=$item['nama']?></p>
            </div>
          </div>
            <div class="row">
            <div class="col-md-4">
              <p class="text-left">Email</p>
            </div>
            <div class="col-md-8">
              <p class="text-left"><?=$item['email']?></p>
            </div>
          </div>
            <div class="row">
            <div class="col-md-4">
              <p class="text-left">Angkatan</p>
            </div>
            <div class="col-md-8">
              <p class="text-left"><?=$item['angkatan']?></p>
            </div>
          </div>
            <div class="row">
            <div class="col-md-4">
              <p class="text-left">Tahun Lulus</p>
            </div>
            <div class="col-md-8">
              <p class="text-left"><?=$item['tahun_lulus']?></p>
            </div>
          </div>
           <div class="row">
            <div class="col-md-4">
              <p class="text-left">Tempat Kerja</p>
            </div>
            <div class="col-md-8">
              <p class="text-left"><?=$item['tempat_kerja']?></p>
            </div>
          </div>
        </div>
      </div> 
      <div class="row" style="border-top:1px solid grey; width: 100%; padding: 10px;">
        <div class="row x_panel x_panel_right text-light blue" style="width: 100%; padding-top: 10px; margin-bottom: 10px; margin-top: 30px;">
      <div class="col-sm-10">
        Berita dari <?=$item['nama']?>
      </div>
      <div class="col-sm-2">
        <i class="fa fa-newspaper-o fa-lg"></i>
      </div>
    </div>
      <div class="row" style="width: 100%;">
                  <?php
          foreach ($berita as $item) {
            ?>
            <div class="row blog-item" onclick="location.href='<?=base_url().'Berita/detail/'.$item['id_berita']?>'">              
              <div class="col-md-3">
                <p class="top-align-text">
                 <?php 
                 if($item['kategori']=='Lowongan Pekerjaan'){
                  ?>
                  <span class="badge badge-pill 
                  <?php
                  $experied_=date_create($item['waktu_berakhir']);
                  $today=date("Y-m-d");
                  $experied_date=date_format($experied_,"Y-m-d");
                  $diff = abs(strtotime($experied_date) - strtotime($today));
                  $years = floor($diff / (365*60*60*24));
                  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                  $berlaku_hingga=floor($years/360)+floor($months*30)+$days;
                  if($berlaku_hingga>20)
                    echo "badge-success";
                  else if($berlaku_hingga>10)
                    echo "badge-warning";
                  else if($berlaku_hingga<=10)
                    echo "badge-danger";
                  ?>
                  ">Berlaku hingga <?=$berlaku_hingga?>&nbsp;Hari</span>
                  <?php
                }
                ?>
              </p>
              <img src="
              <?php
              $img=base_url()."upload/berita/".$item['thumbnail'];
              if(file_exists($img)==true)
                echo $img;    
              else
                echo base_url()."upload/default.jpg";
              ?>
                " class="card-img-top article-img contain" alt=" thumbnail tidak tersedia" ><!-- <div class="overlay">
                  &nbsp;
                </div> -->
              </div>
              <div class="col-md-9">
               <div class="article-title row"><strong><?php echo $item['judul'];?></strong></div>
               <div class=" row article-item"><?php
               $isi=$item['isi'];
               $domdoc = new DOMDocument();
               @$domdoc->loadHTML($isi);
               $tmp= substr($domdoc->textContent,0,100);
               echo $tmp."...&nbsp;";
               ?><br><a href="javascript:void(0);">Baca Selengkapnya</a></div>
               <div class="row article_date_comment">
                <p class="bottom-align-text-2">
                  Kategori : <?=$item['kategori']?>&nbsp;&nbsp;
                  <i class="fa fa-comments-o fa-lg"></i>&nbsp;<?php
                  $jumlah=$this->Model->getComments($item['id_berita']);
                  if(!empty($jumlah))
                    $jumlah=sizeof($jumlah);
                  else
                    $jumlah='0';
                  echo $jumlah;
                  ?>   Komentar&nbsp;
                  <i class="fa fa-clock-o"></i>
                  <?php
                  $dt=$item['waktu'];
                  $dt=new DateTime($dt);
                  $date = $dt->format('d/m/Y');
                  echo $date;
                  ?>
                </p>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      </div>         
    </div>    
    <!-- end of row-->