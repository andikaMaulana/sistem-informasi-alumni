
  <section class="content">
  	<div class="container-fluid">
  		<!-- Horizontal Layout -->
  		<div class="row clearfix">
  			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  				<div class="card">
          
             <div class="header">
              <h2>Profil</h2>
         </div>
           <form method="POST" action="<?php echo base_url().'dashboard/update_profile';?>" id="form_advanced_validation">
         <div class="body">
           <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
             <label for="nama">Nama </label>
           </div>
           <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
             <div class="form-group">
              <div class="form-line">
               <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter your name" required="" value="<?=$data['nama']?>">
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
   <label for="password">Ganti Password</label>
 </div>
 <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
   <div class="form-group">
    <div class="switch">
     <label>Tidak<input type="checkbox" id="ganti_password" onclick="showPasswordDialog()"><span class="lever"></span>Ya</label>
   </div>
 </div>
</div>
</div>
<div id="form_password">
  <div class="row clearfix">
   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
    <label for="password">Old Password</label>
  </div>
  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
    <div class="form-group">
     <div class="form-line">
      <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" onkeyup="cekPassword()">
    </div>
    <div id="password-status">

    </div>
  </div>
</div>
</div>
<div class="row clearfix">
 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
  <label for="new_password">New Password</label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
  <div class="form-group">
   <div class="form-line">
    <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Enter new password" onkeyup="cek_sama()">
  </div>
</div>
</div>
</div>
<div class="row clearfix">
 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
  <label for="confirm_password">Confirm New password</label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
  <div class="form-group">
   <div class="form-line">
    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter new password" onkeyup="cek_sama()">
  </div>
  <div id="password-sama">

  </div>
</div>
</div>
</div>
</div>
<div class="row clearfix">
  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
   <label for="foto">Update Foto </label>
 </div>
 <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4">
   <div class="form-group">
    <div class="form-line">
     <input type="hidden" name="foto" id="foto" value="<?=$data['foto']?>">
     <input type="hidden" name="foto_lama" id="foto_lama" value="<?=$data['foto']?>">
     <input type="file" id="foto_" class="form-control"  name="foto_" accept="image/*">
   </div>
   <div class="help-info">ukuran gambar maksimal 300 x 400, kosongkan jika tidak ingin di update.</div>
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
        <img src="<?=base_url().'upload/foto/'.$data['foto']?>" id="img-logo"  alt="image" class="img-responsive" style="height: 200px !important;">
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
<div class="modal fade" id="konfirmasiSimpan" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header" id="modalHeader">
    <h3>KONFIRMASI</h3>
  </div>
  <div class="modal-body" id="modalBody">
    <h5>Apakah Anda Yakin ingin menyimpan data ini ?</h5>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn bg-red waves-effect">
     <i class="material-icons">report_problem</i>
     <span>BATAL</span>
   </button>
   <button type="button" class="btn bg-cyan waves-effect">
     <i class="material-icons">save</i>
     <span>YA</span>
   </button>
 </div>
</div>
</div>
</div>
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
    swal("Updated!", "Your profile has been update.", "success");
  } else {
    swal("Cancelled", "Your profile cant updated.", "error");
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
function showModal(){
  $('#konfirmasiSimpan').modal();
}
function showPasswordDialog(){
  if ($('#ganti_password').is(':checked')) {
    showObj('form_password');   
    hideObj('password-error');
    $("#new_password").prop('disabled', true);
    $("#confirm_password").prop('disabled', true);    
  }else{
    hideObj('form_password');
    $('#password').val('');
    $('#new_password').val('');
    $('#confirm_password').val('');
    $('#password-sama').html('');
  }
}
function cekPassword(){
  var pas=$('#password').val();   
  $.ajax({
    url:'<?=base_url().'Dashboard/cek_pwd'?>',
    data:'password='+pas,
    type:'POST',
    dataType:'json',
    success:function(data){
      if(data['status']==true){         
        $("#new_password").prop('disabled', false);
        $("#confirm_password").prop('disabled', false);
        $("#password-status").html('<label id="password-error" class="error col-teal" for="password">Password anda benar.</label>');
       $("#new_password").focus();
      }           
      else{
        $("#password-status").html('<label id="password-error" class="error" for="password">Password anda salah.</label>');
        $("#new_password").prop('disabled', true);
        $("#confirm_password").prop('disabled', true);  
      }
    }
  });
}
function cek_sama(){
  var pas1=$("#new_password").val();
  var pas2=$("#confirm_password").val();
  if(pas2==''){

  }else{
  if(pas1==pas2){
    $("#password-sama").html('<label id="password-error_2" class="error col-teal" for="password">Password benar.</label>');
    $('#password').val(pas2);
  }else{
    $("#password-sama").html('<label id="password-error_2" class="error" for="password">Password tidak sama.</label>');
  }
}
}
$(document).ready(function(){
  showPasswordDialog();
});
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