
<script type="text/javascript">
  var komen='';
  perbaruiKomentar();
    function hapusKomentar(id_komentar){
   swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel plx!",
    closeOnConfirm: false,
    closeOnCancel: false
  }, function (isConfirm) {
    if (isConfirm) {
      $.ajax({
      url:'<?=base_url().'berita/hapus_komentar'?>',
      data:'id_komentar='+id_komentar,
      type:'POST',
      dataType:'json',
      success:function(d){
        console.log('tehapus');
      }
    });
      setTimeout(function () {
       swal("Deleted!", "Your comment has been deleted.", "success");
      }, 1000);
      perbaruiKomentar();
    } else {
      swal("Cancelled", "Your comment is safe :)", "error");
    }
  });
 }
  function tambahKomentar(){
    var komentar=$('#message').val();
    $.ajax({
      url:'<?=base_url().'berita/komentar/'.$item['id_berita']?>',
      data:'komentar='+komentar,
      type:'POST',
      dataType:'json',
      success: function(data){
        console.log('ajax tambahKomentar success');
        $('#status_login').html(data.keterangan);  
        perbaruiKomentar();
      }
    });
  }
  function hideObj(id){
    id='#'+id+'';
    $(id).hide();
    console.log('ter hide');
  }
  function showObj(id){
    id='#'+id+'';
    $(id).show();
  }
  function replyComment(no,id_textarea,id_parent_comment){
    hideObj('box_id_'+no+'');  
    var id_textarea='#'+id_textarea+'';
    var komentar=$(id_textarea).val();
    $.ajax({
      url:'<?=base_url().'berita/komentar/'.$item['id_berita']?>',
      data:'komentar='+komentar+'&id_parent_comment='+id_parent_comment,
      type:'POST',
      dataType:'json',
      success: function(data){
        console.log('ajax replyComment success');
        perbaruiKomentar();
      }
    });
  }  
  no=1;
  komen='';
  function perbaruiKomentar(){
    $('#data_komentar').html('');
    var id_berita=<?=$item['id_berita']?>;
    $.ajax({
      url:'<?=base_url()?>'+'Berita/short_comment/'+id_berita,
      type:'POST',
      dataType:'json',
      success:function(data){
        $('#jumlah_komentar').text(data.length+' Komentar');
       for (var i = 0; i < data.length; i++) {
          
          var baris='<div class="card" style="border:0; width:100%;">';
          if(data[i].id_parent_comment<1){
            baris+='<div class="card">';
          }else{
            baris+='<div class="card card-inner">';
          }
          baris+='<div class="card-body">'
                      +'<div class="row">'
                          +'<div class="col-2">'
                              +'<img src="<?=base_url().'upload/foto/';?>'+data[i].foto+'" class="img img-rounded img-fluid" style=" max-height:100px;"/>'
                          +'</div>';
          baris+='<div class="col-10">'
                              +'<a href="<?=base_url().'Alumni/detail/'?>'+data[i].author+'"><strong>'+data[i].nama+'</strong></a>'
                              +'<p>'+data[i].isi+'.</p>'
                                  +'<p>';
                           var author =data[i].author;
                           var author2='<?=$this->session->userdata('user')?>';
                            if(author==author2){
                                  baris+='<a name="hapus" class="float-right btn btn-danger text-light ml-2" onclick="hapusKomentar('+data[i].id+')" ><i class="fa fa-delete"></i>Hapus</a>'
                                }
                                  baris+='<a class="float-right btn btn-outline-primary ml-2" onclick="showObj(\'box_id_'+no+'\');" ><i class="fa fa-reply"></i> Balas</a>'
                                   +'<a class="float-left"><i class="fa fa-clock-o"></i>&nbsp;'+data[i].waktu+'</a>'
                                  +'</p>'
                          +'</div>'//
                      +'</div>'//
                    //
          +'<div class="row" style="width: 100%; padding-left:30px; padding-top:10px;" id="box_id_'+no+'" >'
          +'<a onclick="hideObj(\'box_id_'+no+'\')" class="btn float-right text-danger"><strong>Tutup</strong></a>'+
          '<textarea rows="2" class="form-control" id="id_textarea'+no+'"></textarea>'+
          '<p style="width:100%;">'+
          '<small class="text-danger">Maks. 100 huruf.</small>'+
          '<button class="float-right btn btn-outline-primary ml-2 bg-blue text-light" style="margin-top:5px;" name="Komentar" id="btnFilter'+no+'" '+
          'onclick="replyComment(\''+no+'\',\'id_textarea'+no+'\',\'';
          if(data[i].id_parent_comment<1){
          baris+=data[i].id;  
          }else{
            baris+=data[i].id_parent_comment;
          }
          baris+='\')">Komentar</button>&nbsp&nbsp;</p>'+
          '<p class="text-right"></p>'+
          '</div>';
                    //
                  +'</div>'
              +'</div>'
      +'</div>';          
           $('#data_komentar').append(baris);  
           hideObj('box_id_'+no+'');  
          no++;          
        }         
      }
    });
  }
</script>
<div class="container" style="margin-top:30px;">
  <!-- content -->
  <div class="row">
    <br>
    <div class="col-md-9">
      <?php
      ?> 
      <div class="row" style="border-bottom: 1px solid grey; margin-right: 10px;">
        <p>
          Beranda <i class="fa fa-angle-right"></i> <?=$item['kategori']?><hr>
        </p>
      </div>           
      <div class="row" style="margin-top:10px; padding-left: 10px;"><h4><?php echo $item['judul'];?></h4>
      </div>
      <div class="row">
        <ul>
          <li class="fa fa-bookmark" style="color: #FF971E;"></li>&nbsp;<?=$item['kategori']?> &nbsp;
          <li class="fa fa-user" style="color: #FF971E;"></li>&nbsp;<?=$nama?> &nbsp;
          <li class="fa fa-clock-o" style="color: #FF971E;"></li>&nbsp;<?php
          $dt=$item['waktu'];
                          $dt=new DateTime($dt);
                          $date = $dt->format('d/m/Y');
                          echo $date;
          ?> &nbsp;
          <li class="fa fa-comments-o" style="color: #FF971E;"></li>&nbsp;<span id="jumlah_komentar">
        </span>
        </ul>
      </div>
      <div class="container row">
        <?php
        $isi=$item['isi'];
        echo $isi;
        ?>
      </div> 
      <div class="container row" style="border-top:1px solid grey; width: 100%; padding: 0; margin: 0;">
        <?php
        if(empty($komentar)){
          echo "belum ada komentar";
        }else{
          echo '<div class="row" style="width:100%">&nbsp;</div>';
        }
        ?>        
        <div class="row" style="width: 100%;" id="data_komentar">
          <!--new -->
          <!--new-->
   </div>
        <div class="row" style="width: 100%; padding: 10px;">      
          <textarea cols="100" id="message" required="required" class="form-control" name="komentar" onkeyup="cek_panjang_komentar()"></textarea>
          <div id="status_komentar">           
          </div>
          <div id="status_login" style="width: 100%;"></div>
          <br>
          <input type="button" id="btn_komentar" name="Komentar" class="btn btn-success bg-blue" value="Komentar" onclick="tambahKomentar()" style="margin-top: 10px;">
          <br>
        </div>
      </div>           
    </div>    
    <!-- end of row-->
    <script type="text/javascript">
          function cek_panjang_komentar(){
      if($('#message').val().length>100){
        console.log('seratus');
        $("#status_komentar").html('<small class="text-danger">Maks. 100 huruf.</small>');
        hideObj('btn_komentar');
      }else{
        console.log('kurang seratus');
        $("#status_komentar").empty();
        showObj('btn_komentar');
      }
    }
    </script>