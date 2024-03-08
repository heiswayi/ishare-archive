<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

if (!isLoggedIn()) {
  header('Location: login.php');
} else {
  $session = new Session();
  $loggedInUser = $session->getItem('username');
  $loggedInLevel = $session->getItem('userlevel');
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $query = $db->query("SELECT `email`,`fullname` FROM ".$hndb['table']." WHERE `username`='$loggedInUser'");
  $row = $db->fetch_array($query);
  $email = $row['email'];
  $fullname = $row['fullname'];
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
      <fieldset><legend>Edit Profile</legend>
        <div class="form-group">
          <input class="form-control flat" placeholder="Username" name="username" id="username" type="text" disabled="disabled" value="<?php echo $loggedInUser; ?>">
        </div>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Fullname" name="fullname" id="fullname" type="text" value="<?php echo normalize($fullname); ?>" title="Fullname">
        </div>
        <hr>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Email Address" name="email" id="email" type="email" value="<?php echo $email; ?>" title="Email address">
          <p class="help-block">Your avatar picture is based on your email address. To use your own avatar, register your email at <a href="https://en.gravatar.com/"><i class="fa fa-fw fa-external-link"></i> Gravatar</a> and start uploading your avatar picture there.</p>
        </div>
        <hr>
        <p class="help-block"><strong>Just leave it blank if you have no intention to change your password.</strong></p>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Current Password" name="password" id="old_password" type="password" title="Current password">
        </div>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="New Password" name="new_password" id="new_password" type="password" title="New password">
        </div>
        <div class="form-group">
          <input class="form-control tip flat" placeholder="Confirm New Password" name="new_password2" id="new_password2" type="password" title="Confirm new password">
         </div>
      </fieldset>
    </form>
    
    </div>
    <div class="col-sm-2 col-md-2"></div>
    </div>
            
  </div>
  
  <div class="panel-footer">
    
    <div class="row">
    <div class="col-sm-3 col-md-3">
      <span class="span-btn span-block"><a href="delete_account.php" class="text-red"><i class="fa fa-fw fa-sign-in"></i> Delete Account</a></span>
    </div>
    <div class="col-sm-6 col-md-6"></div>
    <div class="col-sm-3 col-md-3">
      <button type="button" class="btn btn-success btn-block flat" id="btnSaveChanges"><i class="fa fa-fw fa-pencil-square-o"></i> SAVE CHANGES</button>
    </div>
    </div>
    
  </div>
  
</div>

</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<?php include('footer.php'); ?>