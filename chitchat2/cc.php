<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

$session = new Session();

if (!isLoggedIn()) {
  if (isset($_GET['x']) && !empty($_GET['x'])) {
    header('Location: login.php?xref='.$_GET['x'].'');
  } else {
    header('Location: login.php');
  }
} else {
  $loggedInUser = $session->getItem('username');
  $loggedInLevel = $session->getItem('userlevel');
  $user_ip = _getIP();
  
  if (isset($_GET['x']) && !empty($_GET['x'])) {
    $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
    $x = $db->sanitize($_GET['x']);
    $query1 = $db->query("SELECT * FROM ".$ccdb['chitchat']." WHERE `chitchat_hash`='$x'");
    $check1 = $db->num($query1);
    $row = $db->fetch_array($query1);
    $cc_name = $row['chitchat_name'];
    $cc_creator = $row['creator'];
    
    $query2 = $db->query("SELECT * FROM ".$ccdb['bookmark']." WHERE `chitchat_hash`='$x' AND `username`='$loggedInUser'");
    $check2 = $db->num($query2);
    if ($check2 > 0) { $bookmark = true; }
    else { $bookmark = false; }
    
    if ($check1 == 0) {
      header('Location: 404.php');
    }
    
  } else {
    header('Location: 404.php');
  }
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
    
    <div class="col-sm-9 col-md-9 text-right">
    <div class="btn-group">
    <?php
    if ($bookmark == false && $loggedInUser !== $cc_creator) {
      echo '<button class="btn btn-danger flat" data-toggle="tooltip" title="Bookmark this ChitChat" id="bookmarkCC" data-chitchat="'.$x.'" data-bookmarker="'.$loggedInUser.'"><i class="fa fa-fw fa-square-o"></i> Bookmark</button>';
    } else if ($loggedInUser == $cc_creator) {
      echo '<button class="btn btn-danger flat" data-toggle="tooltip" title="You are the creator of this ChitChat."><i class="fa fa-fw fa-bookmark"></i> Creator</button>';
    } else {
      echo '<button class="btn btn-danger flat" data-toggle="tooltip" title="This ChitChat already in your bookmark list."><i class="fa fa-fw fa-check-square-o"></i> Bookmark</button>';
    }
    ?>
    <a href="<?php echo _getCurrentPageURL(); ?>" class="btn btn-primary flat" data-toggle="tooltip" title="ChitChat created by <?php echo $cc_creator; ?>"><?php echo normalize($cc_name); ?></a>
    
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
    <textarea id="msgbox" class="form-control focus flat" rows="3" placeholder="Type your message here..." onkeydown="countChar(this)" onkeyup="countChar(this)"></textarea>
    <input type="hidden" id="chat_hash" value="<?php echo $x; ?>">
    <input type="hidden" id="chat_creator" value="<?php echo $cc_creator; ?>">
    <input type="hidden" id="username" value="<?php echo $loggedInUser; ?>">
    <input type="hidden" id="userip" value="<?php echo $user_ip; ?>">
    <div id="emoticons"></div>
  </div>
  
  <div class="panel-footer">
    
    <div class="row">
    <div class="col-sm-3 col-md-3">
    <div class="span-group">
      <span class="span-btn bg-gray flat" id="charNum" title="Characters Limit"><i class="fa fa-fw fa-text-width"></i> 500</span>
      <button class="span-btn bg-gray pointer flat" id="userOnline" title="Active Users for this ChitChat" data-aulh="<?php echo $x; ?>"><i class="fa fa-fw fa-users"></i> <span id="onlineUsers">0</span></button>
    </div>
    </div>
    
    <div class="col-sm-9 col-md-9 text-right">
    <div class="btn-group text-left">
      <button class="btn btn-default flat" data-toggle="modal" data-target="#textColor" id="chooseTextColor" title="Text Color"><span class="text-default" id="currentColor"><i class="fa fa-fw fa-square"></i> <span id="currentColorText">Default</span></span></button>
      <button type="button" class="btn btn-default flat" id="trigger-tuzki" title="Tuzki Club"><img src="img/tuzki-club.gif"></button>
      <button type="button" class="btn btn-default flat" id="trigger-onion" title="Onion Club"><img src="img/onion-club.gif"></button>
      <button type="button" class="btn btn-default flat" id="trigger-smileys" title="Common Smileys"><img src="img/default-smileys.gif"></button>
      <button type="button" class="btn btn-success flat" id="btnPost" data-loading-text="<i class='fa fa-fw fa-edit'></i> POSTING..."><i class="fa fa-fw fa-pencil"></i> POST</button>
      <button type="button" class="btn btn-warning flat" id="btnClear" title="CLEAR"><i class="fa fa-fw fa-eraser"></i></button>
    </div>
    </div>
    </div>
    
  </div>
  
</div>


<div class="panel flat panel-default">

  <div class="panel-heading flat">
    <div class="input-group">
      <span class="input-group-addon flat"><i class="fa fa-fw fa-comments"></i> ChitChat URI</span>
      <input type="text" class="form-control text-blue flat" id="CCURI" title="ChitChat URI" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="This is the unique URL for this ChitChat. You can copy and paste this URL to your friends for inviting them joining you here." value="<?php echo _getCurrentPageURL(); ?>">
    </div>
  </div>

  
  <div class="panel-body chat-area" id="chitchat">
    <div class="loader"></div>
  </div>
  
  <div class="panel-footer flat text-center"><i class="fa fa-fw fa-comment"></i> Chat bubbles will be displayed up to 50 messages only.</div>
  
</div>


</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<!-- Text color modal -->
<div class="modal fade" id="textColor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content flat">
      <div class="modal-body color-selection-body">
      <h4>Select Your Text Color</h4>
        <div class="color-selection">
          <a href="#" class="display-color bg-red flat" onclick="insertColor('text-red','Red')"><i class="fa fa-fw fa-square"></i> Red</a>
          <a href="#" class="display-color bg-yellow flat" onclick="insertColor('text-yellow','Yellow')"><i class="fa fa-fw fa-square"></i> Yellow</a>
          <a href="#" class="display-color bg-aqua flat" onclick="insertColor('text-aqua','Aqua')"><i class="fa fa-fw fa-square"></i> Aqua</a>
          <a href="#" class="display-color bg-blue flat" onclick="insertColor('text-blue','Blue')"><i class="fa fa-fw fa-square"></i> Blue</a>
          <a href="#" class="display-color bg-light-blue flat" onclick="insertColor('text-light-blue','Light Blue')"><i class="fa fa-fw fa-square"></i> Light Blue</a>
          <a href="#" class="display-color bg-green flat" onclick="insertColor('text-green','Green')"><i class="fa fa-fw fa-square"></i> Green</a>
          <a href="#" class="display-color bg-navy flat" onclick="insertColor('text-navy','Navy')"><i class="fa fa-fw fa-square"></i> Navy</a>
          <a href="#" class="display-color bg-teal flat" onclick="insertColor('text-teal','Teal')"><i class="fa fa-fw fa-square"></i> Teal</a>
          <a href="#" class="display-color bg-olive flat" onclick="insertColor('text-olive','Olive')"><i class="fa fa-fw fa-square"></i> Olive</a>
          <a href="#" class="display-color bg-lime flat" onclick="insertColor('text-lime','Lime')"><i class="fa fa-fw fa-square"></i> Lime</a>
          <a href="#" class="display-color bg-orange flat" onclick="insertColor('text-orange','Orange')"><i class="fa fa-fw fa-square"></i> Orange</a>
          <a href="#" class="display-color bg-fuchsia flat" onclick="insertColor('text-fuchsia','Fuchsia')"><i class="fa fa-fw fa-square"></i> Fuchsia</a>
          <a href="#" class="display-color bg-purple flat" onclick="insertColor('text-purple','Purple')"><i class="fa fa-fw fa-square"></i> Purple</a>
          <a href="#" class="display-color bg-maroon flat" onclick="insertColor('text-maroon','Maroon')"><i class="fa fa-fw fa-square"></i> Maroon</a>
          <a href="#" class="display-color bg-default flat" onclick="insertColor('text-default', 'Default')"><i class="fa fa-fw fa-square"></i> Default</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="activeUsersList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content flat">
        <div class="modal-header" style="background:#f5f5f5;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-users"></i> List of Active Users Online</h4>
        </div>
        <div class="modal-body" id="aul">

        </div>
        <div class="modal-footer" style="background:#f5f5f5;">
          <button type="button" class="btn btn-primary flat" data-dismiss="modal"><i class="fa fa-fw fa-check"></i> OK</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<?php include('footer.php'); ?>