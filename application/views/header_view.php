<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title_web;?> | Sistem Informasi Perpustakaan Universitas Darunnajah </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
  
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/bower_components/select2/dist/css/select2.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/bower_components/Ionicons/css/ionicons.min.css">
  <link href="<?php echo base_url();?>assets_style/assets/plugins/summernote/summernote-lite.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/dist/css/responsive.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/plugins/pace/pace.min.css">
  <script src="<?php echo base_url();?>assets_style/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <style>
    /* 1. Mengubah seluruh background headbar menjadi hitam */
    .main-header .navbar, 
    .main-header .logo {
        background-color: #122753 !important; 
        color: #ffffff !important;
    }

    .main-header .navbar .sidebar-toggle:hover, 
    .main-header .logo:hover {
        background-color: #38305c !important;
    }

    .main-header .navbar .nav > li > a,
    .main-header .navbar .sidebar-toggle {
        color: #ffffff !important;
    }

    /* 2. Pengaturan wadah Logo Besar (Saat Sidebar Terbuka) */
    .main-header .logo .logo-lg {
        height: 50px;
        padding-top: 4px; /* Memberi ruang atas agar seimbang */
        background: transparent !important;
    }
    .main-header .logo .logo-lg img {
        max-height: 42px; 
        width: auto;
        object-fit: contain;
        margin: 0 auto;   /* Menjaga posisi gambar di tengah boks */
        display: block;
    }

    /* 3. Pengaturan wadah Logo Kecil (Saat Sidebar Ciut) */
    .main-header .logo .logo-mini {
        height: 50px;
        padding-top: 7px; /* Menyesuaikan posisi tengah logo mini */
        background: transparent !important;
    }
    .main-header .logo .logo-mini img {
        max-height: 35px; 
        width: auto;
        object-fit: contain;
        margin: 0 auto;   /* Menjaga posisi gambar di tengah boks */
        display: block;
    }
  </style>

  <script type="text/javascript">
      $(document).ajaxStart(function() { Pace.restart(); });
  </script>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <a href="<?php echo base_url('index.php/dashboard');?>" class="logo">
      
      <span class="logo-mini">
        <img src="<?= base_url('assets_style/image/UDN.png'); ?>" alt="Mini">
      </span>
      
      <span class="logo-lg">
        <img src="<?= base_url('assets_style/image/LOGOUDN.png'); ?>" alt="Large">
      </span>

    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <?php
              $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login = '$idbo'")->row();
             ?>
            <a href="<?= base_url('user/edit/'.$idbo);?>">
              Welcome , <i class="fa fa-edit"> </i> <?php echo $d->nama; echo ' | ( '.$d->level.' )'; ?></a>
          </li>
          <li>
            <a href="<?php echo base_url();?>login/logout">Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>