<?php

require_once('db_config.php');
require_once('database.class.php');

function validateLinkName($str) { return preg_match('/^[a-zA-Z0-9_.\s]+$/', $str); }
// get passcode
function _getPasscode($refcode) {
  $initDB = new hnSQL(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false);
  $query = $initDB->query("SELECT * FROM ilink WHERE refcode='$refcode'");
  $row = $initDB->fetch_array($query);
  if ($row) { return $row['passcode']; }
  else { return ''; }
  $initDB->close();
}


$db = new hnSQL(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false);

// add
if (isset($_POST['selectaction']) && $_POST['selectaction'] == 'add') {
  $linkName = $db->sanitize($_POST['linkname']);
  $linkAddr = $db->sanitize($_POST['linkaddr']);
  $linkDesc = $db->sanitize($_POST['linkdesc']);
  $passcode = $db->sanitize($_POST['hpc']);
  
  $pre_refcode = mt_rand(1000, 9999);
  $post_refcode = strlen($linkName);
  $refcode = $pre_refcode + $post_refcode;
  
  if (strpos($linkAddr, "http://") === 0) { $OK_linkAddr = $linkAddr; }
  else { $OK_linkAddr = 'http://'.$linkAddr; }
  
  $db->query("SELECT COUNT(*) FROM ilink WHERE linkaddr='$OK_linkAddr'");
  $checkLink = implode($db->fetch_assoc());
  
  if ($checkLink == 1) { echo 'ERROR! The link already exists!'; }
  else if ($linkName == '') { echo '<strong>Error:</strong> Link Name is required.'; }
  else if ($linkAddr == '') { echo '<strong>Error:</strong> Link Address is required.'; }
  else if ($passcode == '') { echo '<strong>Error:</strong> One-time passcode is required.'; }
  else if (!validateLinkName($linkName)) { echo '<strong>Error:</strong> Only alphanumerics, underscore, dot and white space are allowed.'; }
  else {
    $db->query("INSERT INTO ilink (refcode, linkname, linkaddr, linkdesc, passcode) VALUES ('$refcode', '$linkName', '$OK_linkAddr', '$linkDesc', '$passcode')");
    echo 'OK';
  }
}

// edit
if (isset($_POST['selectaction']) && $_POST['selectaction'] == 'edit') {
  $refcode = $db->sanitize($_POST['refcode']);
  $linkName = $db->sanitize($_POST['linkname']);
  $linkAddr = $db->sanitize($_POST['linkaddr']);
  $linkDesc = $db->sanitize($_POST['linkdesc']);
  $passcode = $db->sanitize($_POST['hpc']);
  
  if (strpos($linkAddr, "http://") === 0) { $OK_linkAddr = $linkAddr; }
  else { $OK_linkAddr = 'http://'.$linkAddr; }
  
  if ($passcode !== _getPasscode($refcode)) { echo '<strong>Error:</strong> Invalid passcode!'; }
  else if ($refcode == '') { echo '<strong>Error:</strong> Please specify the reference code.'; }
  else if ($linkName == '') { echo '<strong>Error:</strong> Link Name is required.'; }
  else if ($linkAddr == '') { echo '<strong>Error:</strong> Link Address is required.'; }
  else if (!validateLinkName($linkName)) { echo '<strong>Error:</strong> Only alphanumerics, underscore, dot and white space are allowed.'; }
  else {
    $db->query("UPDATE ilink SET linkname='$linkName', linkaddr='$OK_linkAddr', linkdesc='$linkDesc' WHERE refcode='$refcode'");
    echo 'OK';
  }
}

// delete
if (isset($_POST['selectaction']) && $_POST['selectaction'] == 'delete') {
  $refcode = $db->sanitize($_POST['refcode']);
  $passcode = $db->sanitize($_POST['hpc']);
  
  if ($passcode !== _getPasscode($refcode)) { echo '<strong>Error:</strong> Invalid passcode!'; }
  else if ($refcode == '') { echo '<strong>Error:</strong> Please specify the reference code.'; }
  else {
    $db->query("DELETE FROM ilink WHERE refcode='$refcode'");
    echo 'OK';
  }
}

// administer
// edit
if (isset($_POST['selectaction']) && $_POST['selectaction'] == 'administer') {
  if ($_POST['adminaction'] == 'edit') {
  $refcode = $db->sanitize($_POST['refCode']);
  $linkName = $db->sanitize($_POST['linkName']);
  $linkAddr = $db->sanitize($_POST['linkAddr']);
  $linkDesc = $db->sanitize($_POST['linkDesc']);
  $passcode = $db->sanitize($_POST['hpc']);
  
  if (strpos($linkAddr, "http://") === 0) { $OK_linkAddr = $linkAddr; }
  else { $OK_linkAddr = 'http://'.$linkAddr; }
  
  if ($passcode !== 'iLinkWayi') { echo '<strong>Error:</strong> Invalid passcode!'; }
  else if ($refcode == '') { echo '<strong>Error:</strong> Please specify the reference code.'; }
  else if ($linkName == '') { echo '<strong>Error:</strong> Link Name is required.'; }
  else if ($linkAddr == '') { echo '<strong>Error:</strong> Link Address is required.'; }
  else if (!validateLinkName($linkName)) { echo '<strong>Error:</strong> Only alphanumerics, underscore, dot and white space are allowed.'; }
  else {
    $db->query("UPDATE ilink SET linkname='$linkName', linkaddr='$OK_linkAddr', linkdesc='$linkDesc' WHERE refcode='$refcode'");
    echo 'OK';
  }
  }
  if ($_POST['adminaction'] == 'delete') {
  $refcode = $db->sanitize($_POST['refcode']);
  $passcode = $db->sanitize($_POST['hpc']);
  
  if ($passcode !== 'iLinkWayi') { echo '<strong>Error:</strong> Invalid passcode!'; }
  else if ($refcode == '') { echo '<strong>Error:</strong> Please specify the reference code.'; }
  else {
    $db->query("DELETE FROM ilink WHERE refcode='$refcode'");
    echo 'OK';
  }
  }
}

$db->close();

?>