<?php

if (!defined('HNAUTH_DIR')) {	define('HNAUTH_DIR', './hnauth/'); }
require_once HNAUTH_DIR . 'hnauth.php';

if (!isLoggedIn()) {
  header('Location: login.php');
} else {
  $session = new Session();
  $loggedInUser = $session->getItem('username');
  $loggedInLevel = $session->getItem('userlevel');
}

?>

<?php include('header.php'); ?>

<div class="container">
<div class="row">

<div class="col-md-2"></div>

<div class="col-md-8">


<div class="panel panel-default flat">

  <div class="panel-heading">
    
    <div class="row">
    <div class="col-sm-3 col-md-3">
    <a href="index.php"><img src="img/logo.png" class="logo"></a>
    </div>
    <div class="col-sm-5 col-md-5"></div>
    <div class="col-sm-4 col-md-4">
    <div class="btn-group btn-group-justified">
    <a href="index.php" class="btn btn-primary flat"><i class="fa fa-fw fa-home"></i></a>
    <div class="btn-group text-left">
    <button type="button" class="btn btn-info dropdown-toggle flat" data-toggle="dropdown">
      <i class="fa fa-fw fa-user"></i> <?php echo $loggedInUser; ?> <span class="caret"></span>
    </button>
    <ul class="dropdown-menu flat">
      <li><a href="my_chitchat.php"><i class="fa fa-fw fa-comments"></i> My ChitChat</a></li>
      <li class="divider"></li>
      <li><a href="edit_profile.php"><i class="fa fa-fw fa-edit"></i> Edit Profile</a></li>
      <li class="divider"></li>
      <li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    
  </div>
  
  <div class="panel-body chat-area">
    <div id="announcement"></div>
    
    <div class="row">
    <div class="col-sm-4 col-md-4">
    <a class="btn btn-primary btn-block flat" data-toggle="modal" href="#newChitChat"><i class="fa fa-fw fa-plus"></i> New ChitChat Hash</a>
    </div>
    <div class="col-sm-8 cold-md-8"></div>
    </div>
    
    <h3><i class="fa fa-fw fa-comments-o"></i> Your ChitChat</h3>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-responsive">
      <thead style="background:#f0f7fd;color:#3A87AD;">
        <th>ChitChat Hash</th>
        <th>ChitChat Name</th>
        <th class="text-center">Created On</th>
        <th></th>
      </thead>
      <tbody>
      
<?php

$db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
$query1 = $db->query("SELECT * FROM ".$ccdb['chitchat']." WHERE `creator`='$loggedInUser' ORDER BY `id` DESC");
$total1 = $db->num($query1);

if ($total1 > 0) {

$count = 0;
while ($row = $db->fetch_assoc($query1)) {
  $id = $row['id'];
  $cch = $row['chitchat_hash'];
  $cch6 = $row['chitchat_hash6'];
  $ccn = $row['chitchat_name'];
  $creator = $row['creator'];
  $created = $row['created_time'];

  echo '<tr id="cc-'.$id.'">';
  echo '<td><a href="cc.php?x='.$cch.'" title="'.$cch.'">'.$cch6.'<i class="fa fa-fw  fa-ellipsis-h"></i></a></td>';
  echo '<td>'.normalize($ccn).'</td>';
  echo '<td class="text-center">'.date("d-m-Y",$created).'</td>';
  echo '<td class="text-center"><a href="#" class="label label-danger" onclick="deleteCC(\''.$id.'\',\''.$cch.'\')"><i class="fa fa-fw fa-trash-o"></i></a></td>';
  echo '</tr>';

}

} else {

?>

        <tr>
          <td>N/A</td>
          <td>N/A</td>
          <td class="text-center">N/A</td>
          <td class="text-center"><a href="#" class="label label-default"><i class="fa fa-fw fa-trash-o"></i></a></td>
        </tr>

<?php

}

?>
        
      </tbody>
    </table>
    </div>
    
    <hr>
    
    <h3><i class="fa fa-fw fa-bookmark-o"></i> Your Bookmarked ChitChat</h3>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-responsive">
      <thead style="background:#fcf2f2;color:#B94A48">
        <th>ChitChat Hash</th>
        <th>ChitChat Name</th>
        <th class="text-center">Created By</th>
        <th></th>
      </thead>
      <tbody>
      
<?php

$db = new hnSQL($hndb['host'], $hndb['user'], $hndb['pass'], $hndb['name'], false);
$query2 = $db->query("SELECT * FROM ".$ccdb['bookmark']." WHERE `username`='$loggedInUser' ORDER BY `id` DESC");
$total2 = $db->num($query2);

if ($total2 > 0) {

$count = 0;
while ($row = $db->fetch_assoc($query2)) {
  $id = $row['id'];
  $cch = $row['chitchat_hash'];
  
  $query2 = $db->query("SELECT * FROM ".$ccdb['chitchat']." WHERE `chitchat_hash`='$cch'");
  $row = $db->fetch_array($query2);
  $cch6 = $row['chitchat_hash6'];
  $ccn = $row['chitchat_name'];
  $creator = $row['creator'];
  $created = $row['created_time'];
  
  echo '<tr id="bcc-'.$id.'">';
  echo '<td><a href="cc.php?x='.$cch.'" title="'.$cch.'">'.$cch6.'<i class="fa fa-fw  fa-ellipsis-h"></i></a></td>';
  echo '<td>'.normalize($ccn).'</td>';
  echo '<td class="text-center">'.normalize($creator).'</td>';
  echo '<td class="text-center"><a href="#" class="label label-danger" onclick="deleteBCC(\''.$id.'\',\''.$cch.'\')"><i class="fa fa-fw fa-trash-o"></i></a></td>';
  echo '</tr>';

}

} else {

?>

        <tr>
          <td>N/A</td>
          <td>N/A</td>
          <td class="text-center">N/A</td>
          <td class="text-center"><a href="#" class="label label-default"><i class="fa fa-fw fa-trash-o"></i></a></td>
        </tr>

<?php

}

?>
        
      </tbody>
    </table>
    </div>
            
  </div>
  
  <div class="panel-footer">
    
    <div class="row">
    <div class="col-md-12">
    <div class="span-group">
      <span class="label label-info flat">NOTE</span> ChitChat Hash is an unique link for your ChitChat. That is your ChitChat URI. To invite your friends for joining you in your ChitChat, copy and paste your ChitChat URL to them.
    </div>
    </div>
    </div>
    
  </div>
  
</div>

</div><!-- /.col-md-6 -->

<div class="col-md-2"></div>

</div>
</div>

<!-- Modal -->
  <div class="modal fade" id="newChitChat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content flat">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Create new ChitChat</h4>
        </div>
        <div class="modal-body">
          <div id="ccError"></div>
          <form accept-charset="UTF-8" role="form" enctype="application/x-www-form-urlencoded" method="post" action="">
            <fieldset style="max-width:50%;margin:0 auto">
              <div class="form-group">
                <label>Your Generated ChitChat Hash:</label>
                <input class="form-control tip flat" name="chitchathash" type="text" id="chitchathash" disabled="disabled" value="Generating...">
              </div>
              <div class="form-group">
                <label>Your ChitChat Name:</label>
                <input class="form-control tip flat" placeholder="Enter your ChitChat name" name="chitchatname" type="text" id="chitchatname" title="Maximum characters = 30" maxlength="30">
                <input type="hidden" id="creator" value="<?php echo $loggedInUser; ?>">
              </div>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default flat" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cancel</button>
          <button type="button" class="btn btn-success flat" id="btnCreateCC"><i class="fa fa-fw fa-cogs"></i> CREATE</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<?php include('footer.php'); ?>