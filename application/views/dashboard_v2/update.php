  <script type="text/javascript">
    
  function hideObj(id){
    id='#'+id+'';
    $(id).hide();
    console.log('ter hide');
  }
  function showObj(id){
    id='#'+id+'';
    $(id).show();
  }
  </script>
   <script src="<?php echo base_url()?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
   <script type="text/javascript">
    tinymce.init({
      selector: "#post_content",
      plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
      automatic_uploads: true,
      image_advtab: true,
      images_upload_url: "<?php echo base_url()."dashboard/upload"?>",
      file_picker_types: 'image', 
      paste_data_images:true,
      relative_urls: false,
      remove_script_host: false,
      file_picker_callback: function(cb, value, meta) {
       var input = document.createElement('input');
       input.setAttribute('type', 'file');
       input.setAttribute('accept', 'image/*');
       input.onchange = function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
         var id = 'post-image-' + (new Date()).getTime();
         var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
         var blobInfo = blobCache.create(id, file, reader.result);
         blobCache.add(blobInfo);
         cb(blobInfo.blobUri(), { title: file.name });
       };
     };
     input.click();
   }
 });
</script>
<section class="content">
  <div class="container-fluid">
    <!-- Exportable Table -->
    <!-- Input -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              Update Berita
              <small>masukan berita sesuai degan judul, kategori, isi, dan thumbnail yang anda inginkan.</small>
            </h2>
          </div>
          <div class="body">
            <div class="row clearfix">
              <div class="col-sm-12">
                <!-- new -->
                <form id="form_advanced_validation" method="POST" action="<?php echo base_url()."dashboard/update_berita";?>" enctype="multipart/form-data">
                    <input type="hidden" name="id_berita" value="<?=$berita[0]['id_berita']?>">

                  <h2 class="card-inside-title">Judul</h2>
                  <div class="form-group form-float form-group-lg">
                    <div class="form-line">
                      <input type="text" class="form-control" minlength="10" maxlength="50" required name="judul" value="<?=$berita[0]['judul'];?>" />
                      <label class="form-label">Masukan Judul Berita</label>
                    </div>
                  </div>
                  <div class="form-group form-float">
                    <?php
                    $kategori=$berita[0]['kategori'];
                    ?>
                  <h2 class="card-inside-title">Pilih Kategori</h2>
                <div class="demo-radio-button">
                  <input name="kategori" type="radio" id="radio_1" value="Berita Alumni" <?php 
                    $cat=$kategori=='Berita Alumni'?"checked":"";
                    echo $cat;
                      ?> />
                  <label for="radio_1">Berita Alumni</label>
                  <input name="kategori" type="radio" id="radio_2" value="Lowongan Pekerjaan" <?php 
                    $cat=$kategori=='Lowongan Pekerjaan'?"checked":"";
                    echo $cat;
                      ?>/>
                  <label for="radio_2">Lowongan Pekerjaan</label>
                </div>
                  </div>
                   <?php
                   if($kategori=='Lowongan Pekerjaan'){
                    ?>
                     <div class="form-group form-float">
                    <h2 class="card-inside-title">Waktu berakhir</h2>
                    <div class="form-line">
                      <input type="date" class="form-control" name="waktu_berakhir" value="<?=$berita[0]['waktu_berakhir']?>" placeholder="Please choose a date...">
                    </div>
                  </div>
                    <?php
                   }
                   ?>
                  <div class="form-group form-float">
                    <h2 class="card-inside-title">Isi Berita</h2>
                    <div class="form-line">
                      <textarea rows="16" class="form-control no-resize" placeholder="Please type what you want..." id="post_content" name="isi"><?=$berita[0]['isi'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group form-float">
                      <h2 class="card-inside-title">Thumbnail</h2>
                   <div class="form-line">
                      <div class="row clearfix">
                        <div class="col-md-4">
                        <input type="file" name="thumbnail_" accept="image/*" id="thumbnail_">
                        <input type="hidden" name="thumbnail_lama" id="thumbnail_lama" value="<?=$berita[0]['thumbnail'];?>">
                        <input type="hidden" name="thumbnail" id="thumbnail" value="<?=$berita[0]['thumbnail'];?>">
                        </div>
                        <div class="col-md-8">
                      <input class="btn waves-effect bg-blue-grey" type="button" name="upload" value="upload" id="upload">
                    </div>
                        </div>
                      </div>
                    <div class="help-info">ukuran gambar maksimal 300 x 400, kosongkan jika tidak ingin di update.</div>
                  </div>
                  <div class="form-group form-float">
                    <div id="uploaded_image">
                      <img src="<?=base_url().'upload/berita/'.$berita[0]['thumbnail']?>">
                    </div>
                  </div>
                  <button class="btn btn-primary waves-effect" type="button" onclick="konfirmasiUpdate()">UPDATE</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Input -->
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
      var gambar_lama=$('#thumbnail_lama').val();
      var gambar_baru=$('#thumbnail').val();
      if(gambar_lama!=gambar_baru)
        hapus_gambar(gambar_lama);
      $('form#form_advanced_validation').submit();
   }, 2000);
    swal("Updated!", "Your data has been update.", "success");
  } else {
    swal("Cancelled", "Your data cant updated.", "error");
  }
});
}
      $('#upload').on('click', function () {
                    var file_data = $('#thumbnail_').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('thumbnail_', file_data);
                    $.ajax({
                        url: '<?=base_url().'Web/ajax_upload'?>', // point to server-side controller method
                        dataType: 'json', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                          console.log(response['file_name']);
                            $('#uploaded_image').html(response['status_']); // display success response from the server
                            $('#thumbnail').val(response['file_name'])
                        },
                        error: function (response) {
                            $('#uploaded_image').html(response['status_']); // display error response from the server
                        }
                    });
                });
   function hapus_gambar(file_name){
        console.log(file_name);
        $.ajax({
          url:'<?=base_url().'web/hapus_gambar'?>',
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