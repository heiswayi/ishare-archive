<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

if (!isLoggedIn()) {
  header('Location: login.php');
} else {
  $session = new Session();
  $loggedInUser = $session->getItem('username');
  $loggedInLevel = $session->getItem('userlevel');
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
    <div class="col-sm-3 col-md-3">
    <a href="index.php"><img src="img/logo.png" class="logo"></a>
    </div>
    <div class="col-sm-5 col-md-5"></div>
    <div class="col-sm-4 col-md-4">
    <div class="btn-group btn-group-justified">
    <a href="index.php" class="btn btn-primary flat"><i class="fa fa-fw fa-home"></i></a>
    <div class="btn-group text-left">
    <button type="button" class="btn btn-info dropdown-toggle flat" data-toggle="dropdown">
      <i class="fa fa-fw fa-user"></i> <?php echo $loggedInUser; ?> <span class="caret"></span>
    </button>
    <ul class="dropdown-menu flat">
      <li><a href="my_chitchat.php"><i class="fa fa-fw fa-comments"></i> My ChitChat</a></li>
      <li class="divider"></li>
      <li><a href="edit_profile.php"><i class="fa fa-fw fa-edit"></i> Edit Profile</a></li>
      <li class="divider"></li>
      <li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    
  </div>
  
  <div class="panel-body chat-area">
    <div id="announcement"></div>
    
    <div class="row">
    <div class="col-sm-2 col-md-2"></div>
    <div class="col-sm-8 col-md-8">
    
    <form accept-charset="UTF-8" role="form" enctype="application/x-www-form-urlencoded" method="post" action="">
      <fieldset><legend>Delete Account</legend>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Password" name="password" type="password" id="password" title="Enter your current password">
          <p class="help-block text-red">Remember, this action cannot be undone!</p>
        </div>
      </fieldset>
    </form>
    
    </div>
    <div class="col-sm-2 col-md-2"></div>
    </div>
            
  </div>
  
  <div class="panel-footer">
    
    <div class="row">   
    <div class="col-sm-9 col-md-9"></div>
    <div class="col-sm-3 col-md-3">
      <button type="button" class="btn btn-danger btn-block flat" id="btnDelAccount"><i class="fa fa-fw fa-rocket"></i> DELETE ACCOUNT</button>
    </div>
    </div>
    
  </div>
  
</div>

</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<?php include('footer.php'); ?>