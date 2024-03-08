<?php
error_reporting(0);

require_once('db_config.php');
require_once('database.class.php');

//echo '<div class="panel panel-default">
//  <div class="panel-heading">
//    <h3 class="panel-title">Panel title</h3>
//  </div>
//  <div class="panel-body">';
echo '<table class="table table-hover">
      <thead>
      <tr>
      <th>Ref. Code</th><th>Shared Links <small style="font-weight:normal;font-style:italic;">Auto-check links every 15 minutes</small></th><th>Status</th>
      </tr>
      </thead>
      <tbody>';

$db = new hnSQL(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false);
$querydb = $db->query("SELECT * FROM ilink ORDER BY id");
if ($db->num($querydb) == 0) {
  echo '<tr><td>N/A</td><td>N/A<br/>No link added yet.</td><td>N/A</td></tr>';
} else {
  while ($row=$db->fetch_assoc()) {
  $linkID = $row['id'];
  $linkName = $row['linkname'];
  $linkAddr = $row['linkaddr'];
  $linkDesc = $row['linkdesc'];
  $passcode = $row['passcode'];
  $refcode = $row['refcode'];
  echo '<tr>';
  echo '<td>'.$refcode.'</td><td><a href="'.$linkAddr.'">'.$linkName.'</a><br/>';
  echo stripslashes(rtrim($linkDesc)).'</td><td id="indicator-'.$linkID.'"></td>';
  echo '</tr>';
  }
}
$db->close();

echo '</tbody>
</table>';

//echo '</div>
//</div>';

$db2 = new hnSQL(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false);
$querydb2 = $db2->query("SELECT * FROM ilink ORDER BY id");
while ($row2=$db2->fetch_assoc($querydb2)) {
  $linkID2 = $row2['id'];  
  echo '
  <script>
  $(document).ready(function () {

  checkStatus'.$linkID2.'('.$linkID2.');
  setInterval(function(){checkStatus'.$linkID2.'('.$linkID2.');}, 900000);
  
  });

  function checkStatus'.$linkID2.'(sharerID) {
    $("#indicator-'.$linkID2.'").html("<span class=\"label label-warning\">Checking</span>");
    $.ajax({
      type: "GET", url: "check.php?id=" + sharerID + "&i=" + Math.random(),
      success: function(data){
        if (data == 1) {
          $("#indicator-'.$linkID2.'").html("<span class=\"label label-success\">Online</span>");
        } else {
          $("#indicator-'.$linkID2.'").html("<span class=\"label label-danger\">Offline</span>");
        }
      }
    });
  }
  </script>
  ';
}
$db2->close();

?>