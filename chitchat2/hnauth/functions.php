<?php

function _checkUsername($username) {
  global $hndb;
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $query = $db->query("SELECT `id` FROM ".$hndb['table']." WHERE `username`='$username'");
  $count = $db->num($query);
  if ($count > 0) { return true; }
  else { return false; }
  $db->close();
}

function _checkExist($item, $column) {
  global $hndb;
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $query = $db->query("SELECT `id` FROM ".$hndb['table']." WHERE ".$column."='$item'");
  $count = $db->num($query);
  if ($count > 0) { return true; }
  else { return false; }
  $db->close();
}

function _hashPassword($password) {
  global $hnauth;
  $hash_password = hash("SHA512", base64_encode(str_rot13(hash("SHA512", str_rot13($hnauth['salt'] . $password)))));
	return $hash_password;
}

function _validateUsername($username) {
  return preg_match('/^[a-zA-Z0-9_]+$/', $username);
}

function _createPassword() {
  $chars = "abcdefghijkmnopqrstuvwxyz023456789";
  srand((double)microtime()*1000000);
  $i = 0;
  $pass = '' ;
  while ($i <= 7) {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;
  }
  return $pass;
}

function _getIP() {
  $ipaddress = '';
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else if($_SERVER['REMOTE_ADDR']) {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  } else {
    $ipaddress = 'UNKNOWN';
  }
  return $ipaddress;
}

function _getCurrentPageURL() {
  $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
	return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}

function normalize($str) { return stripslashes(rtrim($str)); }

function timeAgo($timestamp) {
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
    if ($diff == 0)
    {
        return 'just now';
    }    
    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }        
    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }        
    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }    
    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }    
    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }    
    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }    
    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}

function getGravatar($email, $default = 'retro', $size = '50') {
  $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
  return $grav_url;
}

// URL, @mention, #hashtag
function clickable($input){
  $output = preg_replace(
  array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), 
  array('<a href="$1" target="_blank" rel="nofollow"><i class="fa fa-fw fa-link"></i>$1</a>', 
' <a href="#" rel="nofollow" onclick="insertUsername(\'$2\')">@$2</a>', 
' <a href="#" rel="nofollow">#$2</a>'), 
$input);
  return $output;
}

// Emoticons conversion
function bbCode($var) {
  $search = array(  
    '/\[\:s(.*?)\:\]/is',
    '/\[\:t(.*?)\:\]/is',
    '/\[\:o(.*?)\:\]/is',
    '/\[\:c(.*?)\:\]/is'
  ); 

  $replace = array(
    '<img src="img/smileys/s$1.png">',
    '<img src="img/tuzkiclub/t$1.gif">',
    '<img src="img/onionclub/o$1.gif">',
    '<img src="img/cutes/c$1.gif">'
  ); 

  $result= preg_replace ($search, $replace, $var); 
  return $result; 
}

?>