    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect" onclick="location.href='<?=base_url()?>';">
                        <div class="icon">
                            <i class="material-icons">account_balance</i>
                        </div>
                        <div class="content">
                            <div class="text">&nbsp;</div>
                            <div>kunjungi Halaman Utama
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">work_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">Berita Lowongan</div>
                            <div class="number count-to" data-from="0" data-to="<?=$jumlah_berita_lowongan?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <div class="content">
                            <div class="text">Berita Alumni</div>
                            <div class="number count-to" data-from="0" data-to="<?=$jumlah_berita_alumni?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Komentar</div>
                            <div class="number count-to" data-from="0" data-to="<?=$total_komentar?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
  
        </div>
    </section>
