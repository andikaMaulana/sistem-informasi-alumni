<script type="text/javascript">
  function tampil_dataMhs(nim){
    var nama='';
    var program_studi='';
    var fakultas='';
    var angkatan='';
    $.ajax({
      method:'POST',
      url:'<?=base_url().'Alumni/cari'?>',
      dataType:'json',
      data:'nim='+nim+'&nama='+nama+'&program_studi='+program_studi+'&fakultas='+fakultas+'&angkatan='+angkatan,
      success:function(data){                    
        $("#modalHeader").html('<h4 class="modal-title" id="modalTitle">'+data[0].nama+'</h4>');
        $("#fotoAlumni").html('<img class="profileImg" alt="gambar tidak tersedia" src="<?=base_url().'upload/foto/'?>'+data[0].foto+'">');
        var dataAlumni='<p class="text-left"> : '+data[0].nim+'</p>';
        dataAlumni+='<p class="text-left"> : '+data[0].telepon+'</p>';
        dataAlumni+='<p class="text-left"> : '+data[0].alamat+'</p>';
        dataAlumni+='<p class="text-left"> : '+data[0].email+'</p>';
        dataAlumni+='<p class="text-left"> : '+data[0].tempat_kerja+'</p>';
        $("#dataAlumni").html(dataAlumni);
        $("#modalAlumni").modal();     
      }
    });
  }
  function update_password(nim){
    $('#nim_update').val(nim);
    $('#modalUpdatePassword').modal();
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
function konfirmasiUpdatePassword(){
  var nim=$('#nim_update').val();
  var password=$('#confirm_password').val();
  $.ajax({
    url:'<?=base_url().'Dashboard/update_password'?>',
    type:'POST',
    data:'nim='+nim+'&password='+password,
    dataType:'json',
    success:function(data){
      alert('password berhasil di perbarui');
    }
  });
}
</script>
<style type="text/css">
.profileImg{
  object-fit: contain;
  max-height: 150px;
  padding-left: 20px;
}
.dataAlumni{
  padding-left: 20px;
}
</style>
<?php
$user=$this->session->userdata('status');
?>
<section class="content">
  <div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 id="Daftar_alumni">
              Daftar alumni <?php 
              if($user=='alumni')
                echo "Satu Angkatan";                    
              ?>
            </h2>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table id="DataTables_Table_0" class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th><?php 
                    if($user=='alumni')
                      echo "Email";
                    else
                      echo "angkatan";
                    ?></th>
                    <th><?php 
                    if($user=='alumni')
                      echo "Tempat Kerja";
                    else
                      echo "Prodi";
                    ?></th>
                    <th>Tahun Lulus</th>
                    <th>Aksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  foreach ($data_table as $data) {
                    ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=$data['nim']?></td>
                      <td><?=$data['nama']?></td>
                      <td><?php 
                      if($user=='alumni')
                        echo $data['email'];
                      else
                        echo $data['angkatan'];
                      ?></td>
                      <td>
                       <?php 
                       if($user=='alumni')
                        echo $data['tempat_kerja'];
                      else
                        echo $data['program_studi'];
                      ?>
                    </td>
                    <td>
                      <p class="text-center"><?=$data['tahun_lulus']?></p>
                    </td>
                    <td>
                     <div>
                      <p class="text-center">
                        <a href="javascript:void(0);" onclick="tampil_dataMhs('<?=$data['nim']?>')" title="View" aria-label="View" class="btn-line" id="modal_<?=$no?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <?php 
                        if($user=='admin'){
                          ?>
                          <a href="javascript:void(0);" title="Update" aria-label="Update" class="btn-line" onclick="update_password('<?=$data['nim']?>')"><span class="glyphicon glyphicon-pencil"></span></a>
                          <?php
                        }                  
                        ?>
                      </p>
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
<div class="modal fade" id="modalAlumni" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modalHeader">
      </div>
      <div class="modal-body" id="modalBody">
        <table>
          <tr>
            <td>
              <div id="fotoAlumni">

              </div>
            </td>
            <td>
              <div class="dataAlumni">
                <p class="text-left">NIM</p>
                <p class="text-left">Telepon</p>
                <p class="text-left">Alamat</p>
                <p class="text-left">Email</p>
                <p class="text-left">Tempat Kerja</p>
              </div>
            </td>
            <td>
              <div id="dataAlumni" class="dataAlumni">

              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>
<!--Tabel Update Pwd-->
<div class="modal fade" id="modalUpdatePassword" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modalHeader">
        <h3>Perbarui Password Alumni</h3>
      </div>
      <div class="modal-body" id="modalBody">
        <input type="hidden" name="nim_update" id="nim_update">
        <div class="row clearfix">
         <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
          <label for="new_password">Password Baru</label>
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
      <label for="confirm_password">Konfirmasi password</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
       <div class="form-line">
        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter new password" onkeyup="cek_sama()">
      </div>
      <div id="password-sama">

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="konfirmasiUpdatePassword()">SAVE</button>
      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    </div>
  </div>
</div>
</div>
