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
      <fieldset><legend>Login</legend>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Username" name="username" type="text" id="username" title="Enter your username">
        </div>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Password" name="password" type="password" id="password" title="Enter your password">
        </div>
      </fieldset>
    </form>
    
    <p>Don't have account yet? <a href="register.php?xref=<?php echo $xref; ?>"><i class="fa fa-fw fa-pencil-square-o"></i> Register here!</a></p>
    
    </div>
    <div class="col-sm-2 col-md-2"></div>
    </div>
            
  </div>
  
  <div class="panel-footer">
    
    <div class="row">
    <div class="col-sm-3 col-md-3">
      <span class="span-btn span-block bg-gray flat"><a href="forgot_password.php"><i class="fa fa-fw fa-key"></i> Forgot Password?</a></span>
    </div>
    <div class="col-sm-6 col-md-6"></div>
    <div class="col-sm-3 col-md-3">
      <button type="button" class="btn btn-success btn-block flat" id="btnLogin" data-xref="<?php echo $xref; ?>"><i class="fa fa-fw fa-sign-in"></i> LOGIN</button>
    </div>
    </div>
    
  </div>
  
</div>

</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<?php include('footer.php'); ?>