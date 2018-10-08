 <?php
 $informasi=$this->Model->getTable('informasi');
 $informasi=$informasi[0];
 $logo=$informasi['logo'];
 ?>
  <nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?=base_url().'/dashboard'?>"><img src="<?=base_url().'upload/foto/'.$logo?>" style="max-height: 45px; padding-bottom: 5px;"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:void(0);">
                    </a>
                    <ul class="dropdown-menu">
                        &nbsp;
                    </ul>
                </li>
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">account_circle</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=base_url().'dashboard/profil'?>" class=" waves-effect waves-block"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?=base_url().'web/logout'?>" class=" waves-effect waves-block"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->
                <!-- #END# Tasks -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>