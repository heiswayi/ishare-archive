<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

if (isset($_GET['xref']) && !empty($_GET['xref'])) { $xref = $_GET['xref']; }
else { $xref = ''; }

if (isLoggedIn()) {
  header('Location: userhome.php');
}

?>

<?php include('header.php'); ?>

<div class="container">
<div class="row">

<div class="col-md-2"></div>

<div class="col-md-8">


<div class="panel panel-default flat">

  <div class="panel-heading">
    
    <div class="row">
    <div class="col-md-12">
    <a href="index.php"><img src="img/logo.png" class="logo"></a>
    </div>
    </div>
    
  </div>
  
  <div class="panel-body chat-area">
    <div id="announcement"></div>
    
    <div class="row">
    <div class="col-sm-2 col-md-2"></div>
    <div class="col-sm-8 col-md-8">
    
    <form accept-charset="UTF-8" role="form" enctype="application/x-www-form-urlencoded" method="post" action="">
      <fieldset><legend>Register</legend>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Username" name="username" type="text" id="username" title="Enter your new username">
          <p class="help-block">Please choose carefully, username is permanent and unique.</p>
        </div>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Password" name="password" type="password" id="password" title="Enter your new password">
        </div>
         <hr>
         <div class="form-group">
          <input class="form-control tip flat" placeholder="Email Address" name="email" type="email" id="email" title="Enter your email address">
          <p class="help-block">Your avatar picture is based on your email address. To use your own avatar, register your email at <a href="https://en.gravatar.com/"><i class="fa fa-fw fa-external-link"></i> Gravatar</a> and start uploading your avatar picture over there.</p>
        </div>
        <hr>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Fullname" name="fullname" type="text" id="fullname" title="Enter your fullname">
          <p class="help-block">Your fullname will be displayed beside your username.</p>
        </div>
        <input name="antispam" type="hidden" id="antispam">
      </fieldset>
    </form>
    
    </div>
    <div class="col-sm-2 col-md-2"></div>
    </div>
            
  </div>
  
  <div class="panel-footer">
    
    <div class="row">
    <div class="col-sm-5 col-md-5">
      <span class="span-btn span-block bg-gray flat">Already registered? <a href="login.php?xref=<?php echo $xref; ?>"><i class="fa fa-fw fa-sign-in"></i> Login here!</a></span>
    </div>
    <div class="col-sm-4 col-md-4"></div>
    <div class="col-sm-3 col-md-3">
      <button type="button" class="btn btn-success btn-block flat" id="btnRegister" data-xref="<?php echo $xref; ?>"><i class="fa fa-fw fa-pencil-square-o"></i> REGISTER</button>
    </div>
    </div>
    
  </div>
  
</div>

</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<?php include('footer.php'); ?>