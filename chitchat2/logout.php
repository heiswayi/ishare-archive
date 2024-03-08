<?php

session_start();
if (isset($_SESSION['ChitChat'])) { unset($_SESSION['ChitChat']); }

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

$session = new Session();

if ($session->getItem('username') !== '' && $session->getItem('userlevel') !== '') {
  $username = $session->getItem('username');
  $db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
  $db->query("DELETE FROM ".$ccdb['onlineusers']." WHERE `username`='$username'");
  $session->destroy();
  header('Location: router.php');
} else {
  header('Location: router.php');
}

?>