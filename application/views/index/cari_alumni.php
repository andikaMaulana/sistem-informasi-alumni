   <script type="text/javascript">
    /*mengambil data dari php menggunakan fungsi POST*/

    function load_alumni_data(page){
      var nim=$("[name='nim']").val();
      var nama=$("[name='nama']").val();
      var program_studi=$("[name='program_studi']").val();
      var fakultas=$("[name='fakultas']").val();
      var angkatan=$("[name='angkatan']").val();
      $.ajax({
        url:'<?=base_url()."Alumni/pagination/"?>'+page,
        method:'POST',
        dataType:'json',
        data:'nim='+nim+'&nama='+nama+'&program_studi='+program_studi+'&fakultas='+fakultas+'&angkatan='+angkatan,
        success:function(data){
          $('#info').html('<p>Hasil Pencarian Alumni <hr></p>');
          $('#alumni_table').html(data.alumni_table);
          $('#pagination_link').html(data.pagination_link);
        }
      });
    }
    $(document).on("click", ".pagination li a", function(event){
      event.preventDefault();
      var page = $(this).data("ci-pagination-page");
      load_alumni_data(page);
    });
  </script>
  <div class="container-fluid">
    <!-- content -->
    <div class="container" style="padding-top: 30px;">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="row x_panel x_panel_right text-light blue" style="width: 90%;">
              <div class="col-11">
                Cari Alumni
              </div>
              <div class="col-1">
                <i class="fa fa-search fa-lg"></i>
              </div>
            </div>
            <div class="row" style="width: 100%; padding-top: 10px;">
              <!--Cari-->
              <div class="container-fluid">
                <br>
                <div class="row bg-light" style="width: 90%; margin-left: 10px;">
                  <div class="col-md-8 bg-light" style="margin-left: 20px;">
                    <div class="row" style="width: 100%; padding-top: 10px;">
                      <div class="col-md-6"><label for="nim">NIM</label></div>
                      <div class="col-md-6"><input type="text" class="form-control input_panel" style="border-color: #CED4DA;" id="nim" name="nim" placeholder="NIM alumni" value="" required=""></div>
                    </div>
                    <div class="row" style="width: 100%; padding-top: 10px;">
                      <div class="col-md-6"><label for="nama">Nama</label></div>
                      <div class="col-md-6"><input type="text" class="form-control input_panel" style="border-color: #CED4DA;" id="nama" name="nama" placeholder="Enter the name" value="" required=""></div>
                    </div>
                    <div class="row" style="width: 100%; padding-top: 10px;">
                      <div class="col-md-6">
                        <label>Jurusan / Program Studi</label>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="program_studi" id="program_studi">
                          <option value="">Semua Jurusan</option>
                          <?php
                          foreach ($program_studi as $data) {
                            ?>
                            <option value="<?=$data['id']?>"><?=$data['nama']?></option>
                            <?php
                          }
                          ?>
                        </select>                      
                      </div>
                    </div>
                    <div class="row" style="width: 100%; padding-top: 10px;">
                      <div class="col-md-6">
                        <label>Fakultas</label>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="fakultas" id="fakultas">
                          <option value="">Semua Fakultas</option>
                          <?php
                          foreach ($fakultas as $data) {
                            ?>
                            <option value="<?=$data['id']?>"><?=$data['nama']?></option>
                            <?php
                          }
                          ?>
                        </select>              
                      </div>        
                    </div>
                    <div class="row" style="width: 100%; padding-top: 10px;">
                      <div class="col-md-6">
                        <label>Angkatan</label>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="angkatan" id="angkatan">
                          <option value="">Semua Angkatan</option>
                          <?php
                          for($i=2011;$i<2019;$i++){
                            ?>
                            <option value="<?=$i?>"> <?=$i?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row" style="width: 90%; padding-top: 10px; margin:10px">
                      <?php
                      $log=$this->session->flashdata('status_log');
                      if($log){
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>Error : </strong><?=$log;?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <?php
                      }
                      ?>
                      <button type="submit" class="btn pull-right" style="width: 100%;" onclick="load_alumni_data(1)">Cari</button>
                    </div>
                  </div>
                  <div class="col-md-4 bg-light">
                    &nbsp;
                    
                  </div>
                </div>
                <br><br>

              </div>
              <!--end-of-Cari-->
            </div>
            
          </div>
          <div class="row">
            <div id="daftarNama">
              <div id="info">

              </div>
              <div align="right" id="pagination_link"></div>
              <div class="table-responsive" id="alumni_table"></div>
            </div>

          </div>
        </div>
       