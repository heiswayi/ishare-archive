<?php

//if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './'); }

require_once HNAUTH_DIR . 'config.php';
require_once HNAUTH_DIR . 'lang.php';
require_once HNAUTH_DIR . 'class.session.php';
require_once HNAUTH_DIR . 'class.mysql.php';
require_once HNAUTH_DIR . 'class.phpmailer.php';
require_once HNAUTH_DIR . 'class.cookie.php';
require_once HNAUTH_DIR . 'functions.php';

// CHECK IF USER ALREADY LOGGED IN
// return TRUE
function isLoggedIn() {
  global $lang;
  global $loc;
  global $responseMsg;
  $session = new Session();
  if ($session->getItem('username') !== '' && $session->getItem('userlevel') !== '') {
    if (_checkUsername($session->getItem('username'))) {
      $responseMsg['hnauth'] = $lang['hnauth'][$loc]['login_success'];
      return true;
    } else {
      $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_not_exist_in_database'];
      return false;
    }
  } else {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_not_exist_in_database'];
    return false;
  }
}

// AUTHENTICATE EXISTING USER LOGIN
// return TRUE
function justLogIn($username, $password) {
  global $hndb;
  global $lang;
  global $loc;
  global $responseMsg;
  $session = new Session();
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $username = $db->sanitize($username);
  $password = $db->sanitize($password);
  if ($username == '' || $password == '') {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['all_fields_required'];
    return false;
  } else {
    $query = $db->query("SELECT `password`,`userlevel` FROM ".$hndb['table']." WHERE `username`='$username'");
    $count = $db->num($query);
    if ($count > 0) {
      $row = $db->fetch_array($query);
      $mysql_password = $row['password'];
      $userlevel = $row['userlevel'];
      if (_hashPassword($password) !== $mysql_password) {
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['incorrect_password'];
        return false;
      } else {
        $session->setItem('username', $username);
        $session->setItem('userlevel', $userlevel);
        $session->save();
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['login_success'];
        return true;
      }
    } else {
      $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_not_exist_in_database'];
      return false;
    }
  }
}

// REGISTER USER
// return TRUE on SUCCESS
function justRegister($username, $password, $email, $fullname, $ip, $antispam = '') {
  global $hndb;
  global $lang;
  global $loc;
  global $responseMsg;
  global $hnauth;
  $session = new Session();
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $username = $db->sanitize($username);
  $email = $db->sanitize($email);
  $password = $db->sanitize($password);
  $fullname = $db->sanitize($fullname);
  $ip = $db->sanitize($ip);
  if ($antispam !== '') {
    $responseMsg['hnauth'] = 'HELLO, SPAM BOT!';
    return false;
  } else if (_checkExist($username, 'username')) {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_already_exist'];
    return false;
  } else if (strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0 || strlen($fullname) == 0) {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['all_fields_required'];
    return false;
  } else if (strlen($username) > 30) {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_too_long'];
    return false;
  } else if (strlen($username) < 3) {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_too_short'];
    return false;
  } else if (strlen($password) > 30) {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['password_too_long'];
    return false;
  } else if (strlen($password) < 5) {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['password_too_short'];
    return false;
  } else if (!_validateUsername($username)) {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_invalid'];
    return false;
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['email_invalid'];
    return false;
  } else {
    $hash_password = _hashPassword($password);
    $query = $db->query("INSERT INTO ".$hndb['table']." (`username`, `password`, `email`, `fullname`, `ip`) VALUES ('$username', '$hash_password', '$email', '$fullname', '$ip')");
    $session->setItem('username', $username);
    $session->setItem('userlevel', $hnauth['user_default_level']);
    $session->save();
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['register_success'];
    return true;
  }
}

// REQUEST RESET PASSWORD, SEND VIA EMAIL
// return TRUE if SENT
function forgotPassword($email) {
  global $hndb;
  global $lang;
  global $loc;
  global $hnmail;
  global $hnsite;
  global $responseMsg;
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $email = $db->sanitize($email);
  if ($email == '') {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['field_empty'];
    return false;
  } else {
    $query = $db->query("SELECT `username` FROM ".$hndb['table']." WHERE `email`='$email'");
    $count = $db->num($query);
    if ($count > 0) {
      $random_password = _createPassword();
      $hash_r_password = _hashPassword($random_password);
      $row = $db->fetch_array($query);
      $username = $row['username'];
    
      $mail = new PHPMailer;
      $mail->From = $hnmail['from'];
      $mail->FromName = $hnmail['from_name'];
      $mail->AddAddress($email, $username); // Add a recipient
      $mail->IsHTML(true); // Set email format to HTML
      $mail->Subject = 'Your new reset password for '.$hnmail['from_name'];
      $mail->Body    = '<span style="color:#888;text-style:italic">Hi, I\'m a Robot, please don\'t reply!</span>';
      $mail->Body    .= '<hr style="border:0;border-bottom:1px dashed #555;margin:20px auto">';
      $mail->Body    .= '<b><u>'.$hnmail['from_name'].'</u></b>';
      $mail->Body    .= '<br/><br/>Username: <b>'.$username.'</b>';
      $mail->Body    .= '<br/>New password: <b style="color:red;">'.$random_password.'</b>';
      $mail->Body    .= '<hr style="border:0;border-bottom:1px dashed #555;margin:20px auto">';
      $mail->Body    .= 'Site Name: <i>'.$hnsite['name'].'</i>';
      $mail->Body    .= '<br/>Site URL: <i><a href="'.$hnsite['url'].'">'.$hnsite['url'].'</a></i>';

      if(!$mail->Send()) {
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['sending_mail_failed'] . $mail->ErrorInfo;
        return false;
      } else {
        $query = $db->query("UPDATE ".$hndb['table']." SET `password`='$hash_r_password' WHERE `email`='$email'");
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['sending_mail_success'];
        return true;
      }
    } else {
      $responseMsg['hnauth'] = $lang['hnauth'][$loc]['email_not_exist_in_database'];
      return false;
    }
  }
}

// CHANGE PASSWORD
// return TRUE
function changePassword($username, $old_password, $new_password, $confirm_new_password) {
  global $hndb;
  global $lang;
  global $loc;
  global $responseMsg;
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $username = $db->sanitize($username);
  $old_password = $db->sanitize($old_password);
  $new_password = $db->sanitize($new_password);
  $confirm_new_password = $db->sanitize($confirm_new_password);
  if ($old_password == '' || $new_password == '' || $confirm_new_password == '') {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['all_fields_required'];
    return false;
  } else {
    $query = $db->query("SELECT `password` FROM ".$hndb['table']." WHERE `username`='$username'");
    $count = $db->num($query);
    if ($count > 0) {
      $row = $db->fetch_array($query);
      $mysql_password = $row['password'];
      if ($confirm_new_password !== $new_password) {
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['password_not_match'];
        return false;
      } else if ($mysql_password !== _hashPassword($old_password)) {
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['incorrect_password'];
        return false;
      } else {
        $hash_new_password = _hashPassword($new_password);
        $query = $db->query("UPDATE ".$hndb['table']." SET `password`='$hash_new_password' WHERE `username`='$username'");
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['change_password_success'];
        return true;
      }
    } else {
      $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_not_exist_in_database'];
      return false;
    }
  }
}

// CHANGE EMAIL
// return TRUE
function changeEmail($username, $current_password, $new_email) {
  global $hndb;
  global $lang;
  global $loc;
  global $responseMsg;
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $username = $db->sanitize($username);
  $current_password = $db->sanitize($current_password);
  $new_email = $db->sanitize($new_email);
  if ($current_password == '' || $new_email == '') {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['all_fields_required'];
    return false;
  } else {
    $query = $db->query("SELECT `password` FROM ".$hndb['table']." WHERE `username`='$username'");
    $count = $db->num($query);
    if ($count > 0) {
      $row = $db->fetch_array($query);
      $mysql_password = $row['password'];
      if (_hashPassword($current_password) !== $mysql_password) {
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['incorrect_password'];
        return false;
      } else if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['email_invalid'];
        return false;
      } else {
        $query = $db->query("UPDATE ".$hndb['table']." SET `email`='$new_email' WHERE `username`='$username'");
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['change_email_success'];
        return true;
      }
    } else {
      $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_not_exist_in_database'];
      return false;
    }
  }
}

// DELETE ACCOUNT
// return TRUE
function deleteAccount($username, $current_password) {
  global $hndb;
  global $lang;
  global $loc;
  global $responseMsg;
  $session = new Session();
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $username = $db->sanitize($username);
  $current_password = $db->sanitize($current_password);
  if ($current_password == '') {
    $responseMsg['hnauth'] = $lang['hnauth'][$loc]['field_empty'];
    return false;
  } else {
    $query = $db->query("SELECT `password` FROM ".$hndb['table']." WHERE `username`='$username'");
    $count = $db->num($query);
    if ($count > 0) {
      $row = $db->fetch_array($query);
      $mysql_password = $row['password'];
      if (_hashPassword($current_password) !== $mysql_password) {
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['incorrect_password'];
        return false;
      } else {
        $query = $db->query("DELETE FROM ".$hndb['table']." WHERE `username`='$username'");
        if ($session->getItem('username') !== '' && $session->getItem('userlevel')) {
          $session->destroy();
        }
        $responseMsg['hnauth'] = $lang['hnauth'][$loc]['account_deleted'];
        return true;
      }
    } else {
      $responseMsg['hnauth'] = $lang['hnauth'][$loc]['username_not_exist_in_database'];
      return false;
    }
  }
}

// LOGOUT when receiving ?logout parameter
// Ex.: index.php?logout
if (isset($_GET['logout'])) {
  $session = new Session();
  if ($session->getItem('username') !== '' && $session->getItem('userlevel') !== '') {
    $session->destroy();
    header('Location: index.php');
  } else {
    header('Location: index.php');
  }
}

?>