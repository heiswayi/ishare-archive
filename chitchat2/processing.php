<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

$db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);

if (isset($_POST['action']) && $_POST['action'] == 'add') {
  $chathash = $db->sanitize($_POST['chat_hash']);
  $username = $db->sanitize($_POST['username']);
  $message = $db->sanitize($_POST['message']);
  $textcolor = $db->sanitize($_POST['text_color']);
  $postedon = time();
  if ($chathash == '' || $username == '' || $message == '' || $textcolor == '') {
    echo 'Incomplete required information.';
  } else {
    $db->query("INSERT INTO ".$ccdb['chatmsg']." (`chitchat_hash`, `username`, `message`, `posted_time`, `text_color`) VALUES ('$chathash', '$username', '$message', '$postedon', '$textcolor')");
    echo 'OK';
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'register') {
  if (justRegister($_POST['username'],$_POST['password'],$_POST['email'],$_POST['fullname'],_getIP(),$_POST['antispam'])) {
    echo 'OK';
  } else {
    echo $responseMsg['hnauth'];
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'login') {
  if (justLogin($_POST['username'],$_POST['password'])) {
    echo 'OK';
  } else {
    echo $responseMsg['hnauth'];
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'forgot_password') {
  if (forgotPassword($_POST['email'])) {
    echo 'OK';
  } else {
    echo $responseMsg['hnauth'];
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'delete_account') {
  $session = new Session();
  if ($session->getItem('username') == '') {
    $username = 'N/A';
  } else {
    $username = $session->getItem('username');
  }
  if (deleteAccount($username,$_POST['password'])) {
    echo 'OK';
  } else {
    echo $responseMsg['hnauth'];
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'update') {
  $username = $db->sanitize($_POST['username']);
  $fullname = $db->sanitize($_POST['fullname']);
  $email = $db->sanitize($_POST['email']);
  $oldpass = $db->sanitize($_POST['oldpassword']);
  $newpass = $db->sanitize($_POST['newpassword']);
  $newpass2 = $db->sanitize($_POST['newpassword2']);
  if ($fullname == '') {
    echo 'Fullname cannot be empty.';
  } else if ($email == '') {
    echo 'Email address cannot be empty.';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email address format.';
  } else {
    if ($newpass !== '') {
      $query = $db->query("SELECT `password` FROM ".$hndb['table']." WHERE `username`='$username'");
      $row = $db->fetch_array($query);
      $mysql_password = $row['password'];
      if ($oldpass == '') {
        echo 'Current password is required.';
      } else if ($newpass2 !== $newpass) {
        echo 'New password confirmation does not match.';
      } else if ($mysql_password !== _hashPassword($oldpass)) {
        echo 'Incorrect current password.';
      } else {
        $hash_new_password = _hashPassword($newpass);
        $query = $db->query("UPDATE ".$hndb['table']." SET `fullname`='$fullname', `email`='$email', `password`='$hash_new_password' WHERE `username`='$username'");
        echo 'OK';
      }
    } else {
      $query = $db->query("UPDATE ".$hndb['table']." SET `fullname`='$fullname', `email`='$email' WHERE `username`='$username'");
      echo 'OK';
    }
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'create_chitchat') {
  $cchash = $db->sanitize($_POST['hash']);
  $ccname = $db->sanitize($_POST['name']);
  $username = $db->sanitize($_POST['creator']);
  $cchash6 = substr($cchash,0,6);
  $created = time();
  if ($ccname == '') {
    echo 'ChitChat Name cannot be empty.';
  } else {
    $db->query("INSERT INTO ".$ccdb['chitchat']." (`chitchat_hash`, `chitchat_hash6`, `chitchat_name`, `creator`, `created_time`) VALUES ('$cchash', '$cchash6', '$ccname', '$username', '$created')");
    echo 'OK';
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'delete_chitchat') {
  $id = $db->sanitize($_POST['id']);
  $hash = $db->sanitize($_POST['hash']);
  $db->query("DELETE FROM ".$ccdb['chitchat']." WHERE `id`='$id'");
  $db->query("DELETE FROM ".$ccdb['chatmsg']." WHERE `chitchat_hash`='$hash'");
  $db->query("DELETE FROM ".$ccdb['onlineusers']." WHERE `chitchat_hash`='$hash'");
  echo 'OK';
}

if (isset($_POST['idle'])) {
  $action = $db->sanitize($_POST['idle']);
  $username = $db->sanitize($_POST['username']);
  $chathash = $db->sanitize($_POST['chathash']);
  
  $query = $db->query("SELECT `id` FROM ".$ccdb['onlineusers']." WHERE `username`='$username' AND `chitchat_hash`='$chathash'");
  $check = $db->num($query);
  
  if ($action == 'active' || $action == 'init') {
    if ($check == 0) {
      $db->query("INSERT INTO ".$ccdb['onlineusers']." (`username`,`chitchat_hash`) VALUES ('$username','$chathash')");
    }
    $query = $db->query("SELECT `id` FROM ".$ccdb['onlineusers']." WHERE `chitchat_hash`='$chathash'");
    $count = $db->num($query);
    echo $count;
    
  } else if ($action == 'idle') {
    if ($check > 0) {
      $db->query("DELETE FROM ".$ccdb['onlineusers']." WHERE `username`='$username' AND `chitchat_hash`='$chathash'");
    }
    $query = $db->query("SELECT `id` FROM ".$ccdb['onlineusers']." WHERE `chitchat_hash`='$chathash'");
    $count = $db->num($query);
    echo $count;
    
  } else {
    $query = $db->query("SELECT `id` FROM ".$ccdb['onlineusers']." WHERE `chitchat_hash`='$chathash'");
    $count = $db->num($query);
    echo $count;
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'delete_bookmarked_chitchat') {
  $hash = $db->sanitize($_POST['hash']);
  $db->query("DELETE FROM ".$ccdb['bookmark']." WHERE `chitchat_hash`='$hash'");
  echo 'OK';
}

if (isset($_POST['action']) && $_POST['action'] == 'bookmark_chitchat') {
  $hash = $db->sanitize($_POST['hash']);
  $user = $db->sanitize($_POST['user']);
  $db->query("INSERT INTO ".$ccdb['bookmark']." (`chitchat_hash`,`username`) VALUES ('$hash','$user')");
  echo 'OK';
}

?>