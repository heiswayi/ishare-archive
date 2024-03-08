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
    <div class="col-md-6">
    <a href="index.php"><img src="img/logo.png" class="logo"></a>
    </div>
    
    <div class="col-md-6 text-right">
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
  
  <div class="panel-body chat-area">
    <div id="announcement">
      <div class="callout callout-info">
        <h4>Hello, <strong><?php echo $loggedInUser; ?></strong>!</h4>
        Welcome to ChitChat, a special chatbox for TuzkiClub and OnionClub fans. Any special announcement will be displayed here in future.
      </div>
      <p>
        There are <u>two things</u> you can do with ChitChat:-
        <ol>
          <li>
            <strong>CREATE</strong><br>
            You can create your own private ChitChat with unique URI and paste the URL to your friends to invite them for joining you. To start, just go to your <a href="my_chitchat.php">My ChitChat</a> page and click "New ChitChat Hash".
          </li>
          <li>
            <strong>BOOKMARK</strong><br>
            You can bookmark any ChitChat URI that has been created by your friends after you joined their ChitChat pages. These bookmarks will be saved and displayed in your <a href="my_chitchat.php">My ChitChat</a> page.
          </li>
        </ol>
      </p>
      
      <hr>
      <span class="label label-info">Improvement Program</span>
      <p>If you found any technical problem or bug with this application, please report to <a href="mailto:support@lifeinteger.com">support@lifeinteger.com</a> and we will fix as soon as possible. Besides, any suggestion or ideas are welcome. :)</p>
      <p><strong>Current Version:</strong> 1.0</p>
    </div>
    
    
            
  </div>
  
  <div class="panel-footer">
    
    <div class="row">
    <div class="col-md-6">
    <div class="span-group">
      <span class="span-btn"><a href="delete_account.php" class="text-red"><i class="fa fa-fw fa-sign-in"></i> Delete Account</a></span>
    </div>
    </div>
    
  </div>
  
</div>

</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<?php include('footer.php'); ?>