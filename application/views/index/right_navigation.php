 <script type="text/javascript">
 	function show_berita(waktu){
 		var str = waktu;
		var res = str.replace(" ", "_");
		var id_arsip='#'+res+'';
		$(id_arsip).toggle();
 	}
 	function push_berita(waktu){
 		var str = waktu;
		var res = str.replace(" ", "_");
		var id_arsip='#'+res+'';
 		$.ajax({
 			url:'<?=base_url().'Berita/arsip_berita'?>',
 			data:'waktu='+waktu,
 			type:'POST', 			
 			dataType:'json',
 			success:function(data){
				var col=" ";
				for(var i=0;i<data.length;i++){
				col+="<div class=\"row\" style=\"width:100%\">";
				col+="<div class=\"col-4\"></div>";
				var judul=data[i].judul;
				var sub_judul = judul.substring(0, 25)+"...";
				col+="<div class=\"col-8\" style=\"font-size:9pt;\">";
				col+="<i class=\"fa fa-caret-right \" style=\"color: #343A40;\"></i><a class=\"text-dark\" href=\"<?=base_url().'Berita/detail/'?>"+data[i].id+"\" >"+"&nbsp;";
				col+=sub_judul+"</a></div>";
				col+="</div>";
				}
 				$(id_arsip).html(col);
 			}
 		});
 		$(id_arsip).toggle();
 	}
 </script>
 <div class="col-md-3" >
 	<div class="row">
 		<div class="row x_panel x_panel_right text-light orange" style="margin-bottom: 10px;">
 			<div class="col-10">
 				Arsip Berita
 			</div>
 			<div class="col-2">
 				<i class="fa fa-angle-double-down fa-lg"></i>
 			</div>
 		</div>
  		<div id="item_berita" style="width: 100%;">
 		
 	</div>
 	<div style="margin-top: 10px; margin-left: 10px;" id="pagination_">		
 		</div> 		
 	</div>
 	<div class="row"> 
 		<div class="row x_panel x_panel_right text-light blue" style="width: 100%; padding-top: 10px; margin-bottom: 10px; margin-top: 30px;">
 			<div class="col-10">
 				Galeri Alumni
 			</div>
 			<div class="col-2">
 				<i class="fa fa-photo fa-lg"></i>
 			</div>
 		</div>
 		<?php
 		$data=$this->Model->getTable('galeri');
 		?>
 		<div id="slide_gallery" class="carousel slide" data-ride="carousel" style="width: 100%; margin-bottom: 20px;">

 			<!-- Indicators -->
 			<ul class="carousel-indicators">
 				<li data-target="#slide_gallery" data-slide-to="0" class="active"></li>
 				<?php
 					for($i=1; $i<sizeof($data);$i++){
 				?>
 				<li data-target="#slide_gallery" data-slide-to="<?=$i?>"></li>
 				<?php
 			}
 				?>
 			</ul>

 			<!-- The slideshow -->
 			<div class="carousel-inner">
 				<?php
 					$i=1;
 					foreach ($data as $item) { 						
 				?>
 				<div class="carousel-item <?=$i==1?"active":" "?> ">
 					<img src="<?=base_url().'upload/galeri/'.$item['url']?>" alt="Slide <?=$i?>" class="item_slide">
 				</div>
 				<?php
 				$i++;
 					}
 				?>
 			</div>

 			<!-- Left and right controls -->
 			<a class="carousel-control-prev" href="#slide_gallery" data-slide="prev">
 				<span class="carousel-control-prev-icon"></span>
 			</a>
 			<a class="carousel-control-next" href="#slide_gallery" data-slide="next">
 				<span class="carousel-control-next-icon"></span>
 			</a>
 		</div>
 	</div>
 	<!-- end of content -->
 </div>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pagination_').on('click','a',function(e){
		e.preventDefault();
		var pagno = $(this).attr('data-ci-pagination-page');
		loadPagination(pagno);
	});
		loadPagination(0);
	function loadPagination(pagno){
				$.ajax({
					url:'<?=base_url().'Berita/loadRecord/'?>'+pagno,
					type:'get',
					dataType:'json',
					success:function(response){
						pushItem(response.result);
						$('#pagination_').html(response.pagination);
					}
				});
		}
		function pushItem(data){
			$('#item_berita').empty();
			var item='';
			for(var i=0; i<data.length;i++){
					item+='<div class="row x_panel_item" style="width: 100%; padding-left: 10px;">'
					+'<div class="col-2">'
 					+'<i class="fa fa-caret-right fa-lg" style="color: #343A40;"></i>'
 				+'</div>'
 				+'<div class="col-10" onclick="push_berita(\''+data[i]['waktu_']+'\')">'
 				+'<a href="javascript:void(0);" class="text-dark" style="text-decoration: none;">'
 				+data[i]['waktu_']+' ('+data[i]['jumlah_post']+')'
 				+'</a>'
 				+'</div></div><div class="row" style="width: 100%;" id="';
 				var waktu=data[i]['waktu_'];
 				var waktu=waktu.replace(" ","_");
 				item+=waktu;
 				item+='"></div>';
 				// push_berita('\''+data[i]['waktu_']+'\'');
			}
			$('#item_berita').html(item);
		}
	});
</script>