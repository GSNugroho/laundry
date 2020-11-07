<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Adilaya Laundry</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/materialize.css');?>" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url('assets/css/style.css')?>" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--  Scripts-->
  <script src="<?php echo base_url('assets/js/jquery-2.1.1.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/materialize.js');?>"></script>
  <script src="<?php echo base_url('assets/js/init.js');?>"></script>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="<?php echo base_url('Laundry')?>" class="brand-logo"><img src="<?php echo base_url('assets/icon/logo_notif.png')?>"/></a>
      <ul class="right hide-on-med-and-down">
        <?php if($this->session->userdata('login') == FALSE){?>
          <li><a href="<?php echo base_url('Login');?>">Login</a></li>
        <?php ;}else{?>
          <li><a href="<?php echo base_url('Laundry');?>">Beranda</a></li>
          <li><a href="<?php echo base_url('Laundry/transaksi');?>">Transaksi</a></li>
          <li><a href="<?php echo base_url('Pakaian');?>">Pakaian</a></li>
        <?php ;}?>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <?php if($this->session->userdata('login') == FALSE){?>
          <li><a href="<?php echo base_url('Login');?>">Login</a></li>
        <?php ;}else{?>
          <li><a href="<?php echo base_url('Laundry');?>">Beranda</a></li>
          <li><a href="<?php echo base_url('Laundry/transaksi');?>">Transaksi</a></li>
          <li><a href="<?php echo base_url('Pakaian');?>">Pakaian</a></li>
        <?php ;}?>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
