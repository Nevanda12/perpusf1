<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title_web;?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="" />
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/Ionicons/css/ionicons.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/dist/css/AdminLTE.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/dist/css/responsivelogin.css');?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <style type="text/css">
        body.login-page {
            overflow: hidden;
            height: 100vh;
            width: 100vw;
            margin: 0;
            padding: 0;
            position: relative;
            background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #141e30, #243b55);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .magical-sparkles {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .sparkle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            animation: twinkle 3s infinite alternate;
        }

        .glow-gold { box-shadow: 0 0 8px 2px rgba(255, 255, 255, 0.5), 0 0 15px 3px rgba(200, 200, 200, 0.2); }
        .glow-cyan { box-shadow: 0 0 8px 2px rgba(255, 255, 255, 0.5), 0 0 15px 3px rgba(173, 216, 230, 0.3); }
        .glow-magenta { box-shadow: 0 0 8px 2px rgba(255, 255, 255, 0.5), 0 0 15px 3px rgba(135, 206, 250, 0.2); }

        .sparkle:nth-child(1) { left: 10%; top: 20%; width: 4px; height: 4px; animation-delay: 0s; }
        .sparkle:nth-child(2) { left: 25%; top: 80%; width: 6px; height: 6px; animation-delay: 0.5s; }
        .sparkle:nth-child(3) { left: 40%; top: 40%; width: 3px; height: 3px; animation-delay: 1s; }
        .sparkle:nth-child(4) { left: 55%; top: 10%; width: 5px; height: 5px; animation-delay: 0.2s; }
        .sparkle:nth-child(5) { left: 70%; top: 60%; width: 4px; height: 4px; animation-delay: 0.7s; }
        .sparkle:nth-child(6) { left: 85%; top: 30%; width: 6px; height: 6px; animation-delay: 1.2s; }

        .magic-item {
            position: absolute;
            font-size: 40px;
            color: rgba(255, 255, 255, 0.15);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            opacity: 0;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
        }

        .magic-book { animation: scatterRightUp 10s infinite; }
        .magic-book:nth-child(7) { left: -10%; top: 80%; animation-delay: 0s; font-size: 50px; }
        .magic-book:nth-child(8) { left: 20%; top: 110%; animation-delay: 5s; font-size: 35px; }

        .magic-pen { animation: scatterLeft 8s infinite; }
        .magic-pen:nth-child(9) { left: 110%; top: 30%; animation-delay: 2s; font-size: 45px; }
        .magic-pen:nth-child(10) { left: 110%; top: 70%; animation-delay: 6s; font-size: 30px; }

        .magic-cap { animation: scatterDown 12s infinite; }
        .magic-cap:nth-child(11) { left: 80%; top: -10%; animation-delay: 3s; font-size: 60px; }
        .magic-cap:nth-child(12) { left: 30%; top: -10%; animation-delay: 7s; font-size: 40px; }

        @keyframes scatterRightUp {
            0% { transform: translate(0, 0) rotate(0deg) scale(0.5); opacity: 0; }
            20% { opacity: 1; }
            80% { opacity: 1; }
            100% { transform: translate(80vw, -80vh) rotate(360deg) scale(1.2); opacity: 0; }
        }

        @keyframes scatterLeft {
            0% { transform: translate(0, 0) rotate(0deg) scale(0.8); opacity: 0; }
            20% { opacity: 1; }
            80% { opacity: 1; }
            100% { transform: translate(-120vw, 20vh) rotate(-720deg) scale(1.1); opacity: 0; }
        }

        @keyframes scatterDown {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); opacity: 0; }
            20% { opacity: 1; }
            80% { opacity: 1; }
            100% { transform: translate(-50vw, 120vh) rotate(360deg) scale(0.6); opacity: 0; }
        }

        @keyframes twinkle {
            0% { opacity: 0.2; transform: scale(0.8); }
            100% { opacity: 0.8; transform: scale(1.2); }
        }

        .login-box {
            position: relative;
            z-index: 10;
            margin-top: 7vh;
        }
        
        .login-box-body {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6) !important;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .login-logo a {
            color: #fff !important;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3); 
            font-weight: bold;
            animation: colorPulse 4s infinite alternate;
        }

        @keyframes colorPulse {
            0% { text-shadow: 0 0 5px rgba(255, 255, 255, 0.4); }
            100% { text-shadow: 0 0 15px rgba(255, 255, 255, 0.8), 0 0 20px rgba(173, 216, 230, 0.4); }
        }

        footer .login-box-body {
            background: rgba(0, 0, 0, 0.5) !important;
            border: none !important;
            box-shadow: none;
            backdrop-filter: blur(5px);
        }
  </style>
</head>
<body class="hold-transition login-page">

<div class="magical-sparkles">
    <div class="sparkle glow-gold"></div>
    <div class="sparkle glow-cyan"></div>
    <div class="sparkle glow-magenta"></div>
    <div class="sparkle glow-gold"></div>
    <div class="sparkle glow-cyan"></div>
    <div class="sparkle glow-magenta"></div>
    
    <i class="fa fa-book magic-item magic-book"></i>
    <i class="fa fa-book magic-item magic-book"></i>
    
    <i class="fa fa-pencil magic-item magic-pen"></i>
    <i class="fa fa-pencil magic-item magic-pen"></i>
    
    <i class="fa fa-graduation-cap magic-item magic-cap"></i>
    <i class="fa fa-graduation-cap magic-item magic-cap"></i>
</div>
<div class="login-box">
  <br/>
  <div class="login-logo">
    <a href="index.php">DARUNNAJAH<br/><b>LIBRARY PORTAL</b></a>
  </div>
  <div id="tampilalert"></div>
  <div class="login-box-body">
    <p class="login-box-msg" style="font-size:16px; font-weight:600; color:#333;">Welcome back, bookworm!</p>
    <form action="<?= base_url('login/auth');?>" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="user" name="user" required="required" autocomplete="off" style="border-radius:20px;">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required="required" autocomplete="off" style="border-radius:20px;">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <button type="submit" id="loding" class="btn btn-primary btn-block btn-flat" style="border-radius:20px; background: linear-gradient(45deg, #ff00cc, #333399); border:none; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(45deg, #00c9ff, #92fe9d)';" onmouseout="this.style.background='linear-gradient(45deg, #ff00cc, #333399)';">Sign In</button>
          <div id="loadingcuy"></div>
        </div>
      </div>
    </form>
  </div>
  <br/>
  <footer>
    <div class="login-box-body text-center bg-blue" style="border-radius:15px; padding: 10px;">
       <a style="color: #fff; text-shadow: 0 0 5px rgba(255,255,255,0.5);"> Copyright &copy; Darunnajah University Library - <?php echo date("Y");?></a>
    </div>
  </footer>
</div>

<div id="tampilkan"></div>
<script src="<?php echo base_url('assets_style/assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets_style/assets/plugins/iCheck/icheck.min.js');?>"></script>
</body>
</html>