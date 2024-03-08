<?php

session_start();

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

$session = new Session();

if (isset($_GET['xref'])) { $xref = $_GET['xref']; }
else { $xref = ''; }

if (!isLoggedIn()) {
  header('Location: login.php');
} else {
  if ($xref !== '') {
    if (!isset($_SESSION['ChitChat'])) {
      header('Location: preloader/index.php?page=cc&x='.$xref.'');
    } else {
      header('Location: cc.php?x='.$xref.'');
    }
  } else {
    if (!isset($_SESSION['ChitChat'])) {
      header('Location: preloader/index.php?page=userhome&x=none');
    } else {
      header('Location: userhome.php');
    }
  }
}

?>