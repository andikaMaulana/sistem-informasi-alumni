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
<section class="content">
    <div class="container-fluid">
        <!-- Image Gallery -->
        <div class="block-header">
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            GALERI
                            <small>Kumpulan foto seputar alumni</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            <?php
                            $data=$this->Model->getTable('galeri');
                            foreach ($data as $item) {
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?=base_url().'upload/galeri/'.$item['url']?>" data-sub-html="<?=$item['keterangan']?>">
                                        <img class="img-responsive thumbnail" src="<?=base_url().'upload/galeri/'.$item['url']?>">
                                    </a>
                                    <div class="form-group form-float"><?php
                                        $user=$this->session->userdata('status');
                                        if($user=='admin'){
                                    ?>
                                        <div class="form">
                                            <button type="button" class="btn btn-danger waves-effect" onclick="konfirmasiHapus('<?=$item['url']?>')">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </div>
                                        <?php
                                    }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                <?php
                if($user=='admin'){
                    ?>
                    <div class="form-group form-float">
                      <h2 class="card-inside-title">Tambah Foto</h2>
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
                    <div class="help-info">ukuran gambar maksimal 1000 x 700</div>
                <div class="form-group form-float">
                    <div id="uploaded_image">
                      
                    </div>
                  </div>
                  </div>
            <div class="form-group">
                <h2 class="card-inside-title">Keterangan</h2>
           <div class="form-line">
            <textarea rows="4" class="form-control no-resize" name="keterangan"  placeholder="Please type what you want..." id="keterangan" required=""></textarea>
          </div>
        </div>
                        <div class="form-group form-float form-group-lg">
                            <div class="form">
                            <button type="button" class="btn btn-info waves-effect" onclick="tambah_galeri()">
                                            <i class="material-icons">add</i>
                                        </button>
                            </div>
                        </div>
                        <?php
                }
                ?>
                    </div>                                             
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">

    function konfirmasiHapus(link_foto){
        swal({
            title: "Apakah anda yakin ingin menghapus data ?",
            text: "Jika sudah di hapus anda tidak bisa mengembalikan data sebelumnya!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                hapus_galeri(link_foto);
                location.reload();
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    }
</script>
<script type="text/javascript">
    function tambah_galeri(){
        var keterangan=$('#keterangan').val();
        var thumbnail=$('#thumbnail').val();
        $.ajax({
            url:'<?=base_url().'web/tambah_galeri'?>',
            dataType:'json',
            type:'post',
            data:'url='+thumbnail+'&keterangan='+keterangan,
            success:function(data){
                location.reload();
            }
        });
    }
      $('#upload').on('click', function () {
                    var file_data = $('#thumbnail_').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('thumbnail_', file_data);
                    $.ajax({
                        url: '<?=base_url().'Web/upload_galeri'?>', // point to server-side controller method
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
   function hapus_galeri(file_name){
        console.log(file_name);
        $.ajax({
          url:'<?=base_url().'web/hapus_galeri'?>',
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