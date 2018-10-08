 <div class="container-fluid">
  <!-- content -->
  <div class="container" style="padding-top: 30px;">
    <div class="row">
      <div class="col-md-9">
        <!-- end of row-->
        <div class="row x_panel text-light blue" >
          <div class="col-11">
            <?=$jenis?>
          </div>
          <div class="col-1">
            <p class="text-right"><i class="fa fa-ellipsis-v fa-lg"></i></p>
          </div>
        </div>
        <br>
        <!-- Event -->
        <div class="row" style="margin-right:10px;">
          <?php
          foreach ($data as $item) {
            ?>
            <div class="row blog-item" onclick="location.href='<?=base_url().'Berita/detail/'.$item->id_berita?>'">              
              <div class="col-md-3">
                <p class="top-align-text">
                 <?php 
                 if($item->kategori=='Lowongan Pekerjaan'){
                  ?>
                  <span class="badge badge-pill 
                  <?php
                  $experied_=date_create($item->waktu_berakhir);
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
              $img="upload/berita/".$item->thumbnail;
              if(file_exists($img)==true)
                echo base_url().$img;    
              else
                echo base_url()."upload/default.jpg";
              ?>
                " class="card-img-top article-img contain" alt=" thumbnail tidak tersedia" ><!-- <div class="overlay">
                  &nbsp;
                </div> -->
              </div>
              <div class="col-md-9">
               <div class="article-title row"><strong><?php echo $item->judul;?></strong></div>
               <div class=" row article-item"><?php
               $isi=$item->isi;
               $domdoc = new DOMDocument();
               @$domdoc->loadHTML($isi);
               $tmp= substr($domdoc->textContent,0,100);
               echo $tmp."...&nbsp;";
               ?><br><a href="javascript:void(0);">Baca Selengkapnya</a></div>
               <div class="row article_date_comment">
                <p class="bottom-align-text-2">
                  <i class="fa fa-comments-o fa-lg"></i>&nbsp;<?php
                  $jumlah=$this->Model->getComments($item->id_berita);
                  if(!empty($jumlah))
                    $jumlah=sizeof($jumlah);
                  else
                    $jumlah='0';
                  echo $jumlah;
                  ?>   Komentar&nbsp;
                  <i class="fa fa-clock-o"></i>
                  <?php
                  $dt=$item->waktu;
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
      <div class="row">
        <div class="col">
          <?=$pagination?>
        </div>
      </div>
    </div>