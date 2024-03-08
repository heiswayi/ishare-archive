<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

?>

<?php include('header.php'); ?>

<div class="container">
<div class="row">

<div class="col-md-2"></div>

<div class="col-md-8">


<div class="panel panel-default flat">

  <div class="panel-heading">
    
    <div class="row">
    <div class="col-md-12">
    <a href="index.php"><img src="img/logo.png" class="logo"></a>
    </div>
    </div>
    
  </div>
  
  <div class="panel-body chat-area">
    
    <div class="well">
      <h1 style="font-weight:bold;font-size:500%">Error 404</h1>
      <h2>Ops, something went wrong!</h2>
      <br>
      <p><a href="router.php" class="btn btn-danger"><i class="fa fa-fw fa-arrow-left"></i> Going Back</a></p>
    </div>
            
  </div>
  
</div>

</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<?php include('footer.php'); ?>