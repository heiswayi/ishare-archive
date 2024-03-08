<?php

$password = 'ishareforever'; // PAGE PASSWORD. ONLY EDIT THIS!

$signature = 'iLink';
if (isset($_POST['password'])) {
  if ($_POST['password'] == $password) {
    setcookie('iLinkAccess', md5($password.$signature));
    header('Location: index.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Link Directory">
    <meta name="author" content="Heiswayi Nrird">
    <link rel="shortcut icon" href="ico/favicon.png">

    <title>iLink</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-static-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="container" style="margin-top:50px;margin-bottom:50px;">

     <div class="row">
      <div class="col-md-3">
      </div>
      
      <div class="col-md-6">
      
      <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Welcome to iLink</h3>
  </div>
  <div class="panel-body">
      
      <form class="form-horizontal" role="form" method="POST">
  <div class="form-group">
    <label for="password" class="col-lg-4 control-label">Password:</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" id="password" name="password" placeholder="Access password required" maxlength="20">
      <span class="help-block"><p class="text-danger"><small>iLink is a password-protected page. This option is to prevent the page from being accessed by outsiders. If you're a member of Komuniti Ishare, you can get the password from the <a href="http://www.facebook.com/groups/komuniti.ishare/">Komuniti Ishare Facebook Group</a>.</small></p></span>
      <span class="help-block"><p><small><strong>NOTE:</strong> We use your browser's cookies to store the encrypted password. Once you logged in, you'll never be asked the password again unless you clear your browser's cookies.</small></p></span>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
      <input type="submit" class="btn btn-primary" value="Submit">
    </div>
  </div>
</form>

 </div>
</div>

<div class="col-md-3">
      </div>


      </div>
     </div>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
