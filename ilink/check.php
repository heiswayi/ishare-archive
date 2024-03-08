<?php

require_once('db_config.php');
require_once('database.class.php');

$db = new hnSQL(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false);

if (isset($_GET['id'])) {
   
$sharerLinkID = $_GET['id'];
$db->query("SELECT * FROM ilink WHERE id='$sharerLinkID'");

if ($sls=$db->fetch_array()) {
  $url = $sls['linkaddr'];
  $removehttp = str_replace('http://', '', $url);
  $removeslash = rtrim($removehttp, '/');
  if (strpos($removeslash, ':') !== false) {
    list($ip, $port) = explode(":", $removeslash);
  } else {
    $ip = $removeslash;
    $port = 80;
  }
}

if (fsockopen($ip, $port, $errno, $errstr, 5) !== false) {
  echo '1';
} else {
  echo '0';
}

}

$db->close();

?>