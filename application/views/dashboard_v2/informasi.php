
  <section class="content">
    <div class="container-fluid">
      <!-- Horizontal Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
          <?php
          $data=$informasi[0];
          ?>
             <div class="header">
              <h2>Profil Kampus</h2>
         </div>
           <form method="POST" action="<?php echo base_url().'dashboard/update_informasi';?>" id="form_advanced_validation">
         <div class="body">
           <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
             <label for="nama_kampus">Nama Kampus </label>
           </div>
           <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
             <div class="form-group">
              <div class="form-line">
               <input type="text" id="nama_kampus" name="nama_kampus" class="form-control" placeholder="Enter your campus name" required="" value="<?=$data['nama_kampus']?>">
             </div>
           </div>
         </div>
       </div>
        <div class="row clearfix">
         <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
          <label for="alamat">Alamat </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
          <div class="form-group">
           <div class="form-line">
            <textarea rows="4" class="form-control no-resize" name="alamat" placeholder="Please type what you want..." id="alamat" required=""><?=$data['alamat']?></textarea>
          </div>
        </div>
      </div>
    </div>
<div class="row clearfix">
  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
   <label for="email">Email </label>
 </div>
 <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
   <div class="form-group">
    <div class="form-line">
     <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?=$data['email']?>" required>
   </div>
 </div>
</div>
</div>
  <div class="row clearfix">
   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
    <label for="telepon">Telepon</label>
  </div>
  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
    <div class="form-group">
     <div class="form-line">
      <input type="text" id="telepon" name="telepon" class="form-control" placeholder="Enter your phone number" value="<?=$data['telepon']?>" required>
    </div>
  </div>
</div>
</div>
<div class="row clearfix">
 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
  <label for="link_facebook">Facebook</label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
  <div class="form-group">
   <div class="form-line">
    <input type="text" id="link_facebook" name="link_facebook" class="form-control" value="<?=$data['link_facebook']?>">
  </div>
</div>
</div>
</div>
<div class="row clearfix">
 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
  <label for="link_twitter">Twitter</label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
  <div class="form-group">
   <div class="form-line">
    <input type="text" id="link_twitter" name="link_twitter" class="form-control" value="<?=$data['link_twitter']?>">
  </div>
</div>
</div>
</div>
<div class="row clearfix">
 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
  <label for="link_instagram">Instagram</label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
  <div class="form-group">
   <div class="form-line">
    <input type="text" id="link_instagram" name="link_instagram" class="form-control" value="<?=$data['link_instagram']?>">
  </div>
</div>
</div>
</div>
<div class="row clearfix">
  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
   <label for="foto">Update Logo </label>
 </div>
 <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4">
   <div class="form-group">
    <div class="form-line">
     <input type="hidden" name="logo" id="foto" value="<?=$data['logo']?>">
     <input type="hidden" name="foto_lama" id="foto_lama" value="<?=$data['logo']?>">
     <input type="file" id="foto_" class="form-control"  name="foto_" accept="image/*">
   </div>
   <div class="help-info"> kosongkan jika tidak ingin di update.</div>
 </div>
</div>
<div class="col-lg-5 col-md-5 col-sm-4 col-xs-4">
 <div class="form-group">
   <button id="btn_upload" type="button" class="btn bg-indigo">Upload</button>
 </div>
</div>
</div>
<div class="row clearfix">
  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
   &nbsp;
 </div>
 <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
   <div class="form-group">
    <div class="form-line">
      <div id="uploaded_image">
        <img src="<?=base_url().'upload/foto/'.$data['logo']?>" id="img-logo"  alt="image" class="img-responsive" style="height: 200px !important;">
      </div>
    </div>
  </div>
</div>
</div>
<div class="row clearfix">
  <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
   <button type="button" onclick="konfirmasiUpdate()" id="simpan" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
 </form>
 </div>
</div>              
</div>
</div>
</div>
</div>
<!-- #END# Horizontal Layout -->
<!-- #END# Exportable Table -->
</div>
</section>
<script type="text/javascript">
 function konfirmasiUpdate(){
  swal({
   title: "Apakah anda yakin ingin mengupdate data ?",
   text: "data sebelumnya akan diperbarui!",
   type: "warning",
   showCancelButton: true,
   confirmButtonColor: "#DD6B55",
   confirmButtonText: "Ya!",
   cancelButtonText: "Tidak!",
   closeOnConfirm: false,
   closeOnCancel: false
 }, function (isConfirm) {
   if (isConfirm) {
    setTimeout(function () {
      var foto_lama=$('#foto_lama').val();
      var foto_baru=$('#foto').val();
      if(foto_lama!=foto_baru)
        hapus_foto(foto_lama);
      $('form#form_advanced_validation').submit();
   }, 2000);
    swal("Updated!", "Your information has been update.", "success");
  } else {
    swal("Cancelled", "Your information cant updated.", "error");
  }
});
}
function hideObj(id){
  id='#'+id+'';
  $(id).hide();    
}
function showObj(id){
  id='#'+id+'';
  $(id).show();
}    
$('#btn_upload').on('click', function () {
  var file_data = $('#foto_').prop('files')[0];
  var form_data = new FormData();
  form_data.append('foto_', file_data);
  console.log('upload foto');
  $.ajax({
      url: '<?=base_url().'web/upload_foto'?>', // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response) {
          console.log(response);
          console.log(response['file_name']);
          $('#uploaded_image').html(response['status_']); // display success response from the server
          $('#foto').val(response['file_name']);
                          },
          error: function (response) {
          $('#uploaded_image').html(response['status_']); // display error response from the server
                          }
                        });
});
function hapus_foto(file_name){
  console.log(file_name);
  $.ajax({
    url:'<?=base_url().'web/hapus_foto'?>',
    dataType:'text',
    data:'file_name='+file_name,
    type:'post',
    success:function(data){
      console.log(data);
      $('#uploaded_image').empty();
    }
  });
}
</script>