	 <div class="container-fluid"> <!-- content -->
	 	<div class="container" style="padding-top: 30px;">
	 		<div class="row">
	 			<div class="col-md-9" style="padding-left: 30px;">
	 				<div class="row">
	 					<div class="row x_panel text-light blue" >
	 						<div class="col-9">
	 							BERITA ALUMNI
	 						</div>
	 						<div class="col-3">
	 							<p class="text-right"><i class="fa fa-graduation-cap fa-lg"></i></p>
	 						</div>
	 					</div>
	 					<br>
	 					<!-- Event -->
	 					<div class="row" style="margin-right:15px; margin-top:15px;">
	 						<br>
	 						<?php
	 						foreach ($data_berita as $item) {
	 							?>
	 							<div class="col-md-6" style="padding-bottom: 5px;">
	 								<a class="blank text-dark" style="text-decoration: none;" href="<?=base_url()."berita/detail/$item->id_berita"?>" >
	 									<div class="row shadow-sm bg-white rounded article_body">
	 										<div class="row mx-auto d-block" style="width: 100%; padding :0 10px 0 10px;">
	 											<p class="text-center">
	 												<img src="<?php
	 												$img="upload/berita/".$item->thumbnail;
	 												if(file_exists($img))
	 													echo $img;	 	
	 												else
	 													echo base_url()."upload/default.jpg";
	 												?>" class="article-img contain" alt=" thumbnail tidak tersedia" ></p>
	 											</div>
	 											<div class="row article_title" >
	 												<strong><?php echo $item->judul;?></strong>
	 											</div>
	 											<div class="row article_item" >
	 												<p style="font-size: 10pt; "><?php
	 												$isi=$item->isi;
	 												$domdoc = new DOMDocument();
	 												@$domdoc->loadHTML($isi);
	 												$tmp= substr($domdoc->textContent,0,120);
	 												$dt=$item->waktu;
	 												$dt=new DateTime($dt);
	 												$date = $dt->format('d/m/Y');
	 												?><?=$tmp.'...'?></p>
	 											</div>
	 											<div class="row article_date_comment">
	 												<div class="col-6 text-left">
	 													<i class="fa fa-comments-o"></i>&nbsp;<?php
	 													$jumlah=$this->Model->getComments($item->id_berita);
	 													if(!empty($jumlah))
	 														$jumlah=sizeof($jumlah);
	 													else
	 														$jumlah='0';
	 													echo $jumlah;
	 													?>  Komentar&nbsp;
	 												</div>
	 												<div class="col-6 text-right">
	 													<i class="fa fa-clock-o"></i>
	 													<?=$date?>
	 												</div>
	 											</div>
	 										</div>
	 									</a>
	 								</div>
	 								<?php
	 							}
	 							?>
	 						</div>
	 						<div class="row" style="width: 100%;">
	 							<div class="col">
	 								<p class="">
	 									<strong>
	 										<a href="<?=base_url().'berita/alumni'?>" class="text-dark">Lihat Selengkapnya
	 											<i class="fa fa-arrow-circle-right fa-lg"></i></strong>
	 										</a>
	 									</p>
	 								</div>
	 							</div>
	 						</div>
	 						<!-- end of row-->
	 						<div class="row">
	 							<div class="row x_panel text-light orange" >
	 								<div class="col-9">
	 									LOWONGAN KERJA
	 								</div>
	 								<div class="col-3">
	 									<p class="text-right"><i class="fa fa-group fa-lg"></i></p>
	 								</div>
	 							</div>
	 							<br>
	 							<!-- Event -->
	 							<div class="row" style="width: 100%; margin-top:10px;">
	 								<?php
	 								foreach ($data_lowongan as $item) {
	 									?>
	 									<div class="col-md-6" style="padding-bottom: 5px;">
	 										<a class="blank text-dark" style="text-decoration: none;" href="<?=base_url()."berita/detail/$item->id_berita"?>" >
	 											<div class="row shadow-sm bg-white rounded article_body">

	 												<div class="row mx-auto d-block" style="width: 100%; padding :10px 10px 0 10px;">
	 													<p class="top-align-text">
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
	 														" style="margin-right: 20px;">Berlaku hingga <?=$berlaku_hingga?>&nbsp;Hari</span>
	 													</p>
	 													<p class="text-center">
	 														<img src="<?php
	 														$img="upload/berita/".$item->thumbnail;
	 														if(file_exists($img))
	 															echo $img;	 	
	 														else
	 															echo base_url()."upload/default.jpg";
	 														?>" class="article-img contain" alt=" thumbnail tidak tersedia" ></p>
	 													</div>
	 													<div class="row article_title" >
	 														<strong><?php echo $item->judul;?></strong>
	 													</div>
	 													<div class="row article_item" >
	 														<p style="font-size: 10pt; "><?php
	 														$isi=$item->isi;
	 														$domdoc = new DOMDocument();
	 														@$domdoc->loadHTML($isi);
	 														$tmp= substr($domdoc->textContent,0,120);
	 														$dt=$item->waktu;
	 														$dt=new DateTime($dt);
	 														$date = $dt->format('d/m/Y');
	 														?><?=$tmp.'...'?></p>
	 													</div>
	 													<div class="row article_date_comment">
	 														<div class="col-6 text-left">
	 															<i class="fa fa-comments-o"></i>&nbsp;<?php
	 															$jumlah=$this->Model->getComments($item->id_berita);
	 															if(!empty($jumlah))
	 																$jumlah=sizeof($jumlah);
	 															else
	 																$jumlah='0';
	 															echo $jumlah;
	 															?>  Komentar&nbsp;
	 														</div>
	 														<div class="col-6 text-right">
	 															<i class="fa fa-clock-o"></i>
	 															<?=$date?>
	 														</div>
	 													</div>
	 												</div>
	 											</a>
	 										</div>
	 										<?php
	 									}
	 									?>
	 								</div>
	 								<div class="row" style="width:100%;">
	 									<div class="col">
	 										<p class="">
	 											<strong>
	 												<a href="<?=base_url().'berita/lowongan'?>" class="text-dark">Lihat Selengkapnya
	 													<i class="fa fa-arrow-circle-right fa-lg"></i></strong>
	 												</a>
	 											</p>
	 										</div>
	 									</div>
	 								</div>
	 								<!-- end of row-->
	 							</div>
	