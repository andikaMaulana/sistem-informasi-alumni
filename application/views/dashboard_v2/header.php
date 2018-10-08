<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Informasi Alumni | STEBI Al-Muhsin</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url().'assets/images/'?>logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Sweetalert Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <!-- Light Gallery Plugin Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <!-- Wait Me Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/waitme/waitMe.css" rel="stylesheet" />
        <!-- Morris Chart Css-->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
  <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>css/themes/all-themes.css" rel="stylesheet" />
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<?php
        $user=$this->session->userdata('user');
        if(!isset($user))
            REDIRECT('berita');
?>
<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
        <div class="overlay"></div>