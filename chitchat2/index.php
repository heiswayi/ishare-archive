<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

if (isLoggedIn()) {
  header('Location: userhome.php');
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>ChitChat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  
  <meta name="description" content="Fun ChitChat with Tuzki and Onion Club Emotions">
  <meta name="keywords" content="ChitChat, Chatbox, Shoutbox, Tuzki, TuzkiClub, Onion, OnionClub, Cute Emoticons, Ajax Chat, Colorful">
  <meta name="author" content="Heiswayi Nrird">
  <meta name="copyright" content="LifeInteger Technology">
  <meta name="application-name" content="ChitChat">
  
  <meta property="og:title" content="ChitChat">
  <meta property="og:type" content="application">
  <meta property="og:image" content="http://chitchat.lifeinteger.com/img/meta.png">
  <meta property="og:url" content="http://chitchat.lifeinteger.com">
  <meta property="og:description" content="Fun ChitChat with Tuzki and Onion Club Emotions">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="ChitChat">
  <meta name="twitter:description" content="Fun ChitChat with Tuzki and Onion Club Emotions">
  <meta name="twitter:image" content="http://chitchat.lifeinteger.com/img/meta.png">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/offline-theme-chrome.css">
  <link rel="stylesheet" href="css/offline-language-english.css">
  <link rel="stylesheet" href="css/custom.css">
  
  <style>
  html,body { background: url(img/bg.png); }
  </style>

  <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>

<div class="container">
<div class="row">

<div class="col-md-2"></div>

<div class="col-md-8">


<div class="panel panel-default">
  
  <div class="panel-body">
    <div id="announcement"></div>
   
<!-- ######################################################################## -->

<div style="padding:20px;text-align:center;">
<img src="welcome/welcome2.png">
<h3>
<a href="login.php" type="button" class="btn btn-success flat"><i class="fa fa-fw fa-sign-in"></i> LOGIN</a> <a href="register.php" type="button" class="btn btn-danger flat"><i class="fa fa-fw fa-pencil-square-o"></i> REGISTER</a>
</h3>
</div>

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_floating_style addthis_32x32_style" style="left:0;top:50px;">
<a class="addthis_button_facebook"></a>
<a class="addthis_button_twitter"></a>
<a class="addthis_button_pinterest_share"></a>
<a class="addthis_button_google_plusone_share"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4de86f2a2ee6d82f"></script>
<!-- AddThis Button END -->
   
<!-- ######################################################################## -->
            
  </div>

  
</div>

</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<footer class="text-center">
<p><a href="index.php">ChitChat</a> V1 &copy; 2014
<br>Powered by <a href="http://lifeinteger.com">LifeInteger Technology</a></p>
</footer>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/placeholders.min.js"></script>
<script src="js/idle-timer.min.js"></script>
<script src="js/chitchat.js"></script>

</body>
</html>