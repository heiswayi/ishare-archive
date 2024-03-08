<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', '../hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';
$db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);

if (isset($_GET['hash'])) {
  $x = $db->sanitize($_GET['hash']);
  $query = $db->query("SELECT `id` FROM ".$ccdb['chatmsg']." WHERE `chitchat_hash`='$x'");
  $total = $db->num($query);
  echo $total;
} else {
  echo '0';
}

?>