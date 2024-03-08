<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', '../hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

if (!isLoggedIn()) {
  header('Location: login.php');
} else {
  $session = new Session();
  $loggedInUser = $session->getItem('username');
  $loggedInLevel = $session->getItem('userlevel');
}

$db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);

if (isset($_GET['x'])) {

$x = $db->sanitize($_GET['x']);
$cc_creator = $db->sanitize($_GET['ccc']);
$limit = $db->sanitize($_GET['num']);

$query1 = $db->query("SELECT * FROM ".$ccdb['chatmsg']." WHERE `chitchat_hash`='$x' ORDER BY `id` DESC LIMIT $limit");

$count = 0;
while ($row1 = $db->fetch_assoc($query1)) {
  $count++;
  $id = $row1['id'];
  $username = $row1['username'];
  $message = $row1['message'];
  $posted_time = $row1['posted_time'];
  $text_color = $row1['text_color'];
  
  $query2 = $db->query("SELECT * FROM ".$hndb['table']." WHERE `username`='$username'");
  $row2 = $db->fetch_array($query2);
  $fullname = $row2['fullname'];
  $email = $row2['email'];
  
  if ($username == $cc_creator) { $chat_creator = true; }
  else { $chat_creator = false; }
  
  if ($username == $loggedInUser) { $chat_direction = 'right'; }
  else { $chat_direction = 'left'; }

  echo '<li class="chat-bubble" id="chat-'.$id.'">';
  
  if ($chat_direction == 'right') {
    echo '<img src="'.getGravatar($email).'" class="avatar pull-right" onerror="this.src=\'img/default-avatar.png\';" alt="">';
    echo '<div class="bubble-right">';
  } else {
    echo '<img src="'.getGravatar($email).'" class="avatar pull-left" onerror="this.src=\'img/default-avatar.png\';" alt="">';
    echo '<div class="bubble-left">';
  }
  echo '<a href="#" class="chatter">@'.$username.'</a>  <small>'.normalize($fullname).' &middot; '.timeAgo($posted_time).'</small>';
  echo '<br/><span class="'.$text_color.'">'.bbCode(clickable(normalize($message))).'</span></div>';
  echo '</li>';
}

}

?>