  <script type="text/javascript">
    function tampil_dataBerita(id_berita) {
      $.ajax({
        method:'POST',
        url:'<?=base_url().'Berita/detail_berita/'?>',
        data:'id_berita='+id_berita,
        dataType:'json',
        success:function(data){
          console.log(data);
          $('#modalHeader').html('&nbsp;Judul : <h4 class="modal-title" id="modalTitle">'+data['data'].judul+'</h4>');
          var author='<p class="text-left"> :  '+data['author']+'</p>';
          var waktu='<p class="text-left"> :  '+data['data'].waktu+'</p>';
          var jumlah='<p class="text-left"> :  '+data['jumlah_komentar']+'</p>';
          $('#_author').html(author);
          $('#_waktu').html(waktu);
          $('#_jumlah_komentar').html(jumlah);
          var isi=data['data'].isi;
          $('#_isi').html(isi);
          var link='<a class="btn btn-link waves-effect" href="<?=base_url().'Berita/detail/'?>'+id_berita+'">Kunjungi Halaman Asli</a>';
          $('#_selengkapnya').html(link);
          $('#modalBerita').modal();
        }
      });
    }
  </script>
  <?php
  $status=$this->session->userdata('status');
  ?>
  <section class="content">
    <div class="container-fluid">
      <!-- Exportable Table -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
                Berita Anda
              </h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table id="DataTables_Table_0"  class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                   <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>jumlah Komentar</th>
                    <th>Aksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  foreach ($data_table as $berita) {
                    ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=$berita['judul']?></td>
                      <td><?=$berita['kategori'];?></td>
                      <td><?=$berita['waktu']?></td>
                      <td>
                        <?php
                  $jumlah=$this->Model->getComments($berita['id_berita']);
                  if(!empty($jumlah))
                    $jumlah=sizeof($jumlah);
                  else
                    $jumlah='0';
                  echo $jumlah;?>
                      </td>
                      <td>
                        <div>
                          <a href="javascript:void(0);" title="View" aria-label="View" class="btn-line" onclick="tampil_dataBerita('<?=$berita['id_berita']?>')"><span class="glyphicon glyphicon-eye-open"></span></a>
                          <a href="<?=base_url().'dashboard/update/?id='.$berita['id_berita']?>" title="Update" aria-label="Update" class="btn-line"><span class="glyphicon glyphicon-pencil"></span></a>
                          <!-- new -->
                          <a href="javascript:void(0);" class="user-profile btn-line" onclick="konfirmasiDelete('<?=$berita['id_berita']?>')" >
                            <span class="glyphicon glyphicon-trash"></span>
                          </a>
                          <!-- new -->
                        </div>
                      </td>
                    </tr>
                    <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Exportable Table -->
  </div>
</section>
<!-- Default Size -->
<div class="modal fade" id="modalBerita" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modalHeader">
      </div>
      <div class="modal-body" id="modalBody">
       <table>
         <tr>
          <td><p>Author</p></td>
          <td><div id="_author">

          </div></td>
        </tr>
        <tr>
          <td><p>Waktu Post</p></td>
          <td><div id="_waktu">

          </div></td>
        </tr>
        <tr>
          <td><p>Jumlah Komentar</p></td>
          <td><div id="_jumlah_komentar">

          </div></td>
        </tr>
        <tr>
         <td colspan="2">
           <div id="_isi">

           </div>
         </td>
       </tr>
     </table>
   </div>
   <div class="modal-footer">
    <span id="_selengkapnya"></span>
    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
  function konfirmasiDelete(id_berita){
    console.log(id_berita);
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
      setTimeout(function () {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
          method:'POST',
          url:'<?php echo base_url().'dashboard/delete/'?>',
          dataType:'json',
          data:'id_berita='+id_berita,
          success:function(data){  
           window.location='<?php //echo $base_url().'Dashboard/berita'?>';
           console.log('hello');
         }
       });
      }, 2000);
    } else {
      swal("Cancelled", "Your imaginary file is safe :)", "error");
    }
  });
 }
</script>
