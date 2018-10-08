  <script type="text/javascript">
  function hideObj(id){
    id='#'+id+'';
    $(id).hide();    
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
              Tambah Berita Baru
              <small>masukan berita sesuai degan judul, kategori, isi, dan thumbnail yang anda inginkan.</small>
            </h2>
          </div>
          <div class="body">
            <div class="row clearfix">
              <div class="col-sm-12">
                <!-- new -->
             <form id="form_advanced_validation" method="POST" action="<?php echo base_url()."dashboard/tambah_berita";?>" enctype="multipart/form-data">
                  <h2 class="card-inside-title">Judul</h2>
                  <div class="form-group form-float form-group-lg">
                    <div class="form-line">
                      <input type="text" class="form-control" minlength="10" maxlength="50" required name="judul" id="judul" />
                      <label class="form-label">Masukan Judul Berita</label>
                    </div>
                  </div>
                  <div class="form-group form-float">
                  <h2 class="card-inside-title">Pilih Kategori</h2>
                <div class="demo-radio-button">
                   <input name="kategori" type="radio" id="kategori2" value="Lowongan Pekerjaan" checked onclick="showObj('waktu_berakhir')" />
                  <label for="kategori2">Lowongan Pekerjaan</label>
                  <input name="kategori" type="radio" id="kategori1" value="Berita Alumni" onclick="hideObj('waktu_berakhir')"  />
                  <label for="kategori1">Berita Alumni</label>
                </div>
                  </div>
                  <div class="form-group form-float" id="waktu_berakhir">
                    <h2 class="card-inside-title">Waktu berakhir</h2>
                    <div class="form-line">
                      <input type="text" class="datepicker form-control" name="waktu_berakhir" id="waktu_berakhir" placeholder="Please choose a date...">
                    </div>
                  </div>
                  <div class="form-group form-float">
                    <h2 class="card-inside-title">Isi Berita</h2>
                    <div class="form-line">
                      <textarea rows="16" class="form-control no-resize" placeholder="Please type what you want..." id="post_content" name="isi" id="isi"></textarea>
                    </div>
                  </div>
                  <div class="form-group form-float">
                      <h2 class="card-inside-title">Thumbnail</h2>
                      <div class="form-line">
                      <div class="row clearfix">
                        <div class="col-md-4">
                        <input type="file" name="thumbnail_" accept="image/*" required="" id="thumbnail_">
                        <input type="hidden" name="thumbnail" id="thumbnail">
                        </div>
                        <div class="col-md-8">
                      <input class="btn waves-effect bg-blue-grey" type="button" name="upload" value="upload" id="upload">
                    </div>
                        </div>
                      </div>
                    <div class="help-info">ukuran gambar maksimal 300 x 400</div>
                  </div>
                  <div class="form-group form-float">
                    <div id="uploaded_image">
                      
                    </div>
                  </div>
                  <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
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
<div class="modal fade" id="konfirmasiSimpan" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" id="modalHeader">
                          <h3>KONFIRMASI</h3>
                        </div>
                        <div class="modal-body" id="modalBody">
                          <h5>Apakah Anda Yakin ingin menambah berita ini ?</h5>
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