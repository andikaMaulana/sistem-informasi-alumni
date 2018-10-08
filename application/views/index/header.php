<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Informasi Alumni STEBI Al-Muhsin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="<?=base_url().'assets/images/'?>logo.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bs/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bs/font-awesome.min.css">
    <!-- Sweetalert Css -->
    <link href="<?=base_url().'assets/template/MaterialDesign/'?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
  <script src="<?php echo base_url()?>assets/bs/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/bs/popper.min.js"></script>
  <script src="<?php echo base_url()?>assets/bs/bootstrap.min.js"></script>
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
</head>
<?php
$email=$this->session->flashdata('email');
if(!empty($email)){
  ?>
  <script type="text/javascript">
    alert('password baru berhasil di kirim ke : <?=$email?> \n silahkan cek email anda.');
  </script>
  <?php
}
?>
<body>
  <?php
 $informasi=$this->Model->getTable('informasi');
 $informasi=$informasi[0];
 $logo=$informasi['logo'];
 ?>
  <div class="jumbotron-fluid label-stebi" style="margin-bottom:0">
    <div class="row" style="width: 100%; padding-bottom: 10px;">
      <div class="col-6">
                <img src="<?=base_url().'upload/foto/'.$logo?>" class="contain" style="max-height: 75px;">
      </div>
      <div class="col-6">
          <?php
        $is_login=$this->session->userdata('nama');
        if(!empty($is_login)){
          ?>
          <p class="text-right" style="bottom: 0;">
        Selamat Datang, <?=$is_login?><br>     
      </p>
          <?php
        }
      ?>
      </div>
    </div>
  </div>
  