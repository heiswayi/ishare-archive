<?php

$password = 'ishareforever'; // PAGE PASSWORD. ONLY EDIT THIS!

$signature = 'iLink';
if (!isset($_COOKIE['iLinkAccess'])) {
    header('Location: login.php');
} else {
   if ($_COOKIE['iLinkAccess'] !== md5($password.$signature)) {
      header('Location: login.php');
   } else {
      renderHTML();
   }
}

function renderHTML() {
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

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">iLink</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Popular Links <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="https://campusonline.usm.my/">Campus Online / Student Portal</a></li>
                <li><a href="http://elearning.usm.my/">eLearning Portal USM</a></li>
                <li><a href="http://servisdesk.eng.usm.my/default.asp?ptj=ppkt">ServisDesk PPKT</a></li>
                <li><a href="http://mobile.eng.usm.my/">ENG-WIFI-MOBILE Registration</a></li>
                <li><a href="http://www.eng.usm.my/php/blockedIP/">Blocked Port List</a></li>
                <li><a href="http://servisdesk.eng.usm.my/default.asp?ptj=pengarah">Sistem Tempahan Dewan</a></li>
                <li><a href="http://www.tcom.usm.my/">Sistem Direktori Telefon USM</a></li>
                <li><a href="http://www.facebook.com/ppkt.eng.usm">Facebook PPKT USMKKj</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrative Links <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="http://www.ppkt.eng.usm.my/">PPKT</a></li>
                <li><a href="http://hepp.eng.usm.my/">BHEPP</a></li>
                <li><a href="http://jaya.eng.usm.my/">Desasiswa Jaya</a></li>
                <li><a href="http://mpdl.eng.usm.my/">Desasiswa Lembaran</a></li>
                <li><a href="http://utama.eng.usm.my/">Desasiswa Utama</a></li>
                <li><a href="http://dev.eng.usm.my/">Jabatan Pembangunan</a></li>
                <li><a href="http://pusatislam.eng.usm.my/">Pusat Islam</a></li>
                <li><a href="http://library.eng.usm.my/">Perpustakaan</a></li>
                <li><a href="http://registry.eng.usm.my/">Jabatan Pendaftar</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Schools &amp; Centres of Excellence <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="http://aerospace.eng.usm.my/">Aerospace Eng.</a></li>
                <li><a href="http://civil.eng.usm.my/">Civil Eng.</a></li>
                <li><a href="http://ee.eng.usm.my/">Electrical &amp; Electronic Eng.</a></li>
                <li><a href="http://material.eng.usm.my/">Materials &amp; Mineral Resources Eng.</a></li>
                <li><a href="http://chemical.eng.usm.my/">Chemical Eng.</a></li>
                <li><a href="http://mechanical.eng.usm.my/">Mechanical Eng.</a></li>
                <li><a href="http://sollat.eng.usm.my/">Pusat Bahasa</a></li>
                <li><a href="http://serc.eng.usm.my/">SERC</a></li>
                <li><a href="http://redac.eng.usm.my/">REDAC</a></li>
                <li><a href="http://www.cedec.usm.my/">CEDEC</a></li>
                <li><a href="http://www.ips.usm.my/">IPS</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://mpp.eng.usm.my/">MPP USM KKj</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">

     <div class="row">
      <div class="col-md-6" id="links">
      <!-- links -->
      </div>
      <div class="col-md-6">
      
      <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Interactive Form</h3>
  </div>
  <div class="panel-body">
      
      <div id="notifySuccess" class="alert alert-success" style="display:none">## Notify on Success ##</div>
      <div id="notifyError" class="alert alert-danger" style="display:none">## Notify on Error ##</div>
      <!-- Add/Edit/Delete Form -->
      <form class="form-horizontal" role="form">
      <div class="form-group">
    <label for="selectAction" class="col-lg-4 control-label">Select Action:</label>
    <div class="col-lg-8">
      <select id="selectAction" class="form-control">
  <option value="null">Define your action...</option>
  <option value="add">Add a new link</option>
  <option value="edit">Edit an existing link</option>
  <option value="delete">Delete an existing link</option>
  <option value="administer">Administer an existing link (admin only)</option>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="refCode" class="col-lg-4 control-label">Reference Code:</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" id="refCode" placeholder="Ref. Code" maxlength="5">
    </div>
  </div>
  <div class="form-group">
    <label for="linkName" class="col-lg-4 control-label">Link Name:</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" id="linkName" placeholder="" maxlength="40">
    </div>
  </div>
  <div class="form-group">
    <label for="linkAddr" class="col-lg-4 control-label">IP/Link Address:</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" id="linkAddr" placeholder="http://" maxlength="255">
    </div>
  </div>
  <div class="form-group">
    <label for="linkDesc" class="col-lg-4 control-label">Link Description:</label>
    <div class="col-lg-8">
      <textarea id="linkDesc" class="form-control" rows="3" maxlength="200" placeholder="Tell us what your link is sharing about.. not more than 200 characters."></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="passcode" class="col-lg-4 control-label">Passcode:</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" id="passcode" placeholder="Mind you, it's CaSE-sEnsiTivE yaww!" maxlength="20">
      <span class="help-block">
      Required for adding a new link (link's owner).<br/>
      Required for editting an existing link (link's owner).<br/>
      Required for deleting an existing link (link's owner).<br/>
      Required for administering an existing link (administrator).
      </span>
    </div>
  </div>
  <div class="form-group">
    <label for="adminAction" class="col-lg-4 control-label">Admin Action:</label>
    <div class="col-lg-8">
      <select id="adminAction" class="form-control">
      <option value="null">N/A</option>
  <option value="edit">Edit an existing link</option>
  <option value="delete">Delete an existing link</option>
</select>
<span class="help-block"><p class="text-danger">This action is for admin only.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
      <input id="spamfree" name="spamfree" type="hidden" value="" placeholder="If you are a human, leave this blank!">
      <a href="#" class="btn btn-primary" id="submit">Submit</a>
    </div>
  </div>
</form>

 </div>
</div>

<p>iLink &copy; September 2013. Powered by <a href="https://www.facebook.com/groups/komuniti.ishare/">Komuniti Ishare</a>.<br/>
<small><em>Coded by Heiswayi Nrird.</em><br/>
<script language="JavaScript" src="http://s1.freehostedscripts.net/ocount.php?site=ID2207408&name=Hits"></script></small></p>

      </div>
     </div>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/md5.js"></script>
<script>
updateLinks();
disableAll();
$('#selectAction').change(function() {
  var selectaction = $('#selectAction :selected').val();
  if (selectaction == 'add') { actionAdd(); }
  else if (selectaction == 'edit') { actionEdit(); }
  else if (selectaction == 'delete') { actionDelete(); }
  else if (selectaction == 'administer') { enableAll(); }
  else { disableAll(); }
});
$('#submit').click(function(e){
  e.preventDefault();
  $('#notifySuccess').fadeOut();
  var selectaction = $('#selectAction :selected').val();
  var refcode = $('#refCode').val();
  var linkname = $('#linkName').val();
  var linkaddr = $('#linkAddr').val();
  var linkdesc = $('#linkDesc').val();
  var passcode = $('#passcode').val();
  var adminaction = $('#adminAction :selected').val();
  var hpc = calcMD5(passcode);
  var spamfree = $('#spamfree').val();
  
  if (selectaction == 'add' && spamfree == '') {
    var postData = 'selectaction=add&linkname='+urlencode(linkname)+'&linkaddr='+urlencode(linkaddr)+'&linkdesc='+urlencode(linkdesc)+'&hpc='+urlencode(hpc);
    $.ajax({type: 'POST',url: 'process.php',data: postData,success: function(responseData){
      if (responseData !== 'OK') {
        $('#notifyError').html(responseData).fadeIn().delay(3000).fadeOut();
      } else {
        $('#notifySuccess').html('<strong>OK:</strong> Your submission is success!').fadeIn().delay(5000).fadeOut();
        resetForm();
        disableAll();
        updateLinks();
      }
    }});
  } else if (selectaction == 'edit') {
    var postData = 'selectaction=edit&refcode='+urlencode(refcode)+'&linkname='+urlencode(linkname)+'&linkaddr='+urlencode(linkaddr)+'&linkdesc='+urlencode(linkdesc)+'&hpc='+urlencode(hpc);
    $.ajax({type: 'POST',url: 'process.php',data: postData,success: function(responseData){
      if (responseData !== 'OK') {
        $('#notifyError').html(responseData).fadeIn().delay(3000).fadeOut();
      } else {
        $('#notifySuccess').html('<strong>OK:</strong> Your submission is success!').fadeIn().delay(5000).fadeOut();
        resetForm();
        disableAll();
        updateLinks();
      }
    }});
  } else if (selectaction == 'delete') {
    var postData = 'selectaction=delete&refcode='+urlencode(refcode)+'&hpc='+urlencode(hpc);
    $.ajax({type: 'POST',url: 'process.php',data: postData,success: function(responseData){
      if (responseData !== 'OK') {
        $('#notifyError').html(responseData).fadeIn().delay(3000).fadeOut();
      } else {
        $('#notifySuccess').html('<strong>OK:</strong> Your submission is success!').fadeIn().delay(5000).fadeOut();
        resetForm();
        disableAll();
        updateLinks();
      }
    }});
  } else if (selectaction == 'administer') {
    if (adminaction == 'edit') {
      var postData = 'selectaction=administer&adminaction=edit&refcode='+urlencode(refcode)+'&linkname='+urlencode(linkname)+'&linkaddr='+urlencode(linkaddr)+'&linkdesc='+urlencode(linkdesc)+'&hpc='+urlencode(hpc);
      $.ajax({type: 'POST',url: 'process.php',data: postData,success: function(responseData){
      if (responseData !== 'OK') {
        $('#notifyError').html(responseData).fadeIn().delay(3000).fadeOut();
      } else {
        $('#notifySuccess').html('<strong>OK:</strong> Your submission is success!').fadeIn().delay(5000).fadeOut();
        resetForm();
        disableAll();
        updateLinks();
      }
    }});
    } else if (adminaction == 'delete') {
      var postData = 'selectaction=administer&adminaction=delete&refcode='+urlencode(refcode)+'&hpc='+urlencode(hpc);
      $.ajax({type: 'POST',url: 'process.php',data: postData,success: function(responseData){
      if (responseData !== 'OK') {
        $('#notifyError').html(responseData).fadeIn().delay(3000).fadeOut();
      } else {
        $('#notifySuccess').html('<strong>OK:</strong> Your submission is success!').fadeIn().delay(5000).fadeOut();
        resetForm();
        disableAll();
        updateLinks();
      }
    }});
    } else {
      $('#notifyError').html('<strong>Error:</strong> Please define your admin action; edit or delete.').fadeIn().delay(3000).fadeOut();
    }
  } else {
    $('#notifyError').html('<strong>Error:</strong> Please define your action; add, edit, delete or administer.').fadeIn().delay(3000).fadeOut();
  }

});

function urlencode(a) {
  a = (a + "").toString();
  return encodeURIComponent(a).replace(/!/g, "%21").replace(/'/g, "%27").replace(/\(/g, "%28").replace(/\)/g, "%29").replace(/\*/g, "%2A").replace(/%20/g, "+")
}
function disableAll() {
  $('#refCode').prop('disabled', true);
  $('#linkName').prop('disabled', true);
  $('#linkAddr').prop('disabled', true);
  $('#linkDesc').prop('disabled', true);
  $('#passcode').prop('disabled', true);
  $('#adminAction').prop('disabled', true);
}
function actionAdd() {
  $('#refCode').prop('disabled', true);
  $('#linkName').prop('disabled', false);
  $('#linkAddr').prop('disabled', false);
  $('#linkDesc').prop('disabled', false);
  $('#passcode').prop('disabled', false);
  $('#adminAction').prop('disabled', true);
}
function actionEdit() {
  $('#refCode').prop('disabled', false);
  $('#linkName').prop('disabled', false);
  $('#linkAddr').prop('disabled', false);
  $('#linkDesc').prop('disabled', false);
  $('#passcode').prop('disabled', false);
  $('#adminAction').prop('disabled', true);
}
function actionDelete() {
  $('#refCode').prop('disabled', false);
  $('#linkName').prop('disabled', true);
  $('#linkAddr').prop('disabled', true);
  $('#linkDesc').prop('disabled', true);
  $('#passcode').prop('disabled', false);
  $('#adminAction').prop('disabled', true);
}
function enableAll() {
  $('#refCode').prop('disabled', false);
  $('#linkName').prop('disabled', false);
  $('#linkAddr').prop('disabled', false);
  $('#linkDesc').prop('disabled', false);
  $('#passcode').prop('disabled', false);
  $('#adminAction').prop('disabled', false);
}
function resetForm() {
  $('#selectAction').val('null');
  $('#refCode').val('');
  $('#linkName').val('');
  $('#linkAddr').val('');
  $('#linkDesc').val('');
  $('#passcode').val('');
  $('#adminAction').val('null');
}
function updateLinks() {
  $.get("links.php", function(data) {
    $("#links").html(data);
  });
}
</script>
  </body>
</html>

<?php

}

?>