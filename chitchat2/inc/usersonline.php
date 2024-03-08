<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', '../hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

$session = new Session();

if (!isLoggedIn()) {
  header('Location: login.php');
} else {
  $loggedInUser = $session->getItem('username');
  $loggedInLevel = $session->getItem('userlevel');
}

if (isset($_GET['hash'])) {

$x = $_GET['hash'];

$db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);

$query1 = $db->query("SELECT `username` FROM ".$ccdb['onlineusers']." WHERE `chitchat_hash`='$x'");
$total = $db->num($query1);

$queryglobal = $db->query("SELECT `id` FROM ".$hndb['table']);
$totalglobal = $db->num($queryglobal);

function showLabel($num, $singular = 'user') {
  if ($num > 1) { return $num.' '.$singular.'s'; }
  else if ($num == 1) { return $num.' '.$singular; }
  else { return 'No '.$singular.' available'; }
}

if ($total > 0) {

echo '<div class="alert alert-warning flat"><strong><u>User Statistics</u></strong><br>Total registered users: <code>'.showLabel($totalglobal).'</code><br>Total active users for this ChitChat: <code>'.showLabel($total).'</code></div>';
echo '<table class="table table-condensed table-bordered"><thead style="background:#f3f3f3"><th>Username</th><th>Fullname</th></thead><tbody>';

while ($row1 = $db->fetch_assoc($query1)) {
  $username = $row1['username'];
  
  $query2 = $db->query("SELECT * FROM ".$hndb['table']." WHERE `username`='$username' ORDER BY `username`");
  $row2 = $db->fetch_array($query2);
  $fullname = $row2['fullname'];
  $email = $row2['email'];
  
  echo '<tr ';
  if ($username == $loggedInUser) {
    echo 'class="warning"';
  }
  echo '>';
  echo '<td>';
  if ($username == $loggedInUser) {
    echo $username.' (You)';
  } else {
    echo $username;
  }
  echo '</td>';
  echo '<td>'.$fullname.'</td>';
  echo '</tr>';
    
}

echo '</tbody></table>';

} else {
  echo '<div class="well text-center"><h1><i class="fa fa-fw fa-users"></i></h1><h3>No any active user in this ChitChat! Who the hell are you?</h3></div>';
}

} else {
  echo '<div class="loader"></div>';
}

?>