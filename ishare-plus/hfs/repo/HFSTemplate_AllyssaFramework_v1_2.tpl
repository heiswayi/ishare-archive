<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Allyssa Framework v1.2</title>
<style type="text/css">\n%style%\n</style>
</head>
<body>
<div id="wrap" align="center">
<!-- YOUR HFS TITLE. IT COULD BE HEADER TEXT, LOGO OR BANNER -->
<div style="width:1030px;margin:0 auto;"><h1>Allyssa Framework v1.2</h1></div>
<!-- /END OF TITLE -->

<div class=body>

<!-- MAIN BUTTON NAVIGATION/MENU -->
<div class=nav>
<div style="float: left; padding-right:10px;"><a href="/" class=button>Home</a></div>
<div style="float: left; padding-right:10px;"><a href="http://ishare.heiswayi.net/" class=button>Ishare USM</a></div>
%login-link%
%loggedin%
%upload-link%
<div style="float: right; padding-left:10px;"><a href="%encoded-folder%~files.lst" class=button>File Listing</a></div>
<div style="float: right; padding-left:10px;"><a href="%encoded-folder%~folder.tar?recursive" class=button>Archive (.TAR)</a></div>
</div>
<!-- /END OF MAIN BUTTON NAVIGATION/MENU -->

<!-- SOME NOTES/RULES -->
<div class=notis>
<b>DISCLAIMER:</b><br>
1. Apologize me if your downloading activity was suddenly interrupted/disconnected due to my HFS was closed or my connection or maybe something problem with my computer.<br>
2. Please don't use Internet Download Manager (IDM) or any download manager program with many connections. Set it to 1 or you will be banned from my server if it causes my computer's lagging.<br>
3. Whatever I shared here is the right of my freedom. Good or bad, the decision is in your hands. I'm not be responsible for any consequences.
</div>
<!-- /END OF SOME NOTES/RULES -->

<!-- YOUR CHATBOX CODE -->
<div class=chatbox>
<table width=100%><tr>
<td id=chatbox_sect width=50% valign=top>

<noscript>Enable Javascript to get full functionality of this <a href="http://www.freeshoutbox.net/">shoutbox</a><br />
</noscript><iframe src="http://ishare.freeshoutbox.net/" width="100%" height="300"></iframe>

</td>
<td id=chatbox_space width=5%; valign=middle align=center>
+
</td>
<td id=chatbox_rule width=45% valign=top style=color:#333;font-size:12px;>

<script type="text/javascript">
function Gsitesearch(curobj){
curobj.q.value=" "+curobj.qfront.value
}
</script>
<form action="http://www.google.com/search" method="get" onSubmit="Gsitesearch(this)" target="_blank">
<p>Search on Google:<br />
<input name="q" type="hidden" />
<input name="qfront" type="text" style="width: 350px" /> <input type="submit" value="Search" /></p>
</form>

Server Bandwidth:<br>
<img style="border: thin solid #9999AA; padding: 1px;" src="/~img_graph400x70" alt="Server Bandwidth"><br>
<br>
Current Server Outbound: <b>%speed-out%KB/s</b> | Current Server Inbound: <b>%speed-in%KB/s</b><br>
Server Uptime: <b>%uptime%</b> | Server Page Build-time: <b>%build-time% sec.</b><br>
Connection(s) Connected: <b>%connections%</b><br>
<br>
<div style="background:#f9f9f9;border:1px solid #eee;padding:3px;">Welcome, <b>%ip%</b>!<br>
<div id="browser"></div>

<script type="text/javascript">
txt = "Browser CodeName: <b>" + navigator.appCodeName + "</b> | ";
txt+= "Browser Name: <b>" + navigator.appName + "</b><br>";
txt+= "Browser Version: <b>" + navigator.appVersion + "</b><br>";
txt+= "Cookies Enabled: <b>" + navigator.cookieEnabled + "</b> | ";
txt+= "Platform: <b>" + navigator.platform + "</b><br>";
document.getElementById("browser").innerHTML=txt;
</script></div>

</td>
</tr></table>
</div>
<!-- /END OF YOUR CHATBOX CODE -->

<div class=path_title><i>Current Folder:</i></div>
<div class=path>%folder%</div>
%folder-comment%
%up%
%files%

<!-- MAIN BUTTON NAVIGATION/MENU AT THE BOTTOM -->
<div class=nav>
<div style="float: left; padding-right:10px;"><a href="/" class=button>Home</a></div>
<div style="float: left; padding-right:10px;"><a href="http://ishare.heiswayi.net/" class=button>Ishare USM</a></div>
%login-link%
%loggedin%
%upload-link%
<div style="float: right; padding-left:10px;"><a href="%encoded-folder%~files.lst" class=button>File Listing</a></div>
<div style="float: right; padding-left:10px;"><a href="%encoded-folder%~folder.tar?recursive" class=button>Archive (.TAR)</a></div>
<div style="float: right; padding-left:10px;"><a href="#top" style="padding:5px; padding-top:7px; border:1px solid #999; background-color:#ccc; font-size:8pt; font-weight:bold; ">Back to #Top</a></div>
</div>
<!-- /END OF MAIN BUTTON NAVIGATION/MENU AT THE BOTTOM -->
</div>
</div>
<div align="center"><div style="background:#eee; color:#2F4F4F; border:1px solid #eee; width:1030px;"><br>
Powered by <a href="http://www.rejetto.com/hfs/">HFS</a> %version% with <a href="http://dl.heiswayi.net">Allyssa Framework</a> v1.2 | &copy; YOUR NAME 2011<br><br></div><br></div>
</body>
</html>

[style]
.chatbox { border:1px solid #eee; background:#fff; padding:1px; margin-top:10px; }
.notis { border: 1px solid #ff0000; color: #990000;text-align:left;padding:5px;}
.sharerlist { border: 1px dotted #ccc; font-size: 11px; background: #fff;}
.sharerlist table { font-size: 14px; }
body, .row { color: #2F4F4F }
body, .button, .big, .little, th, comment { font-family:tahoma, verdana, arial, helvetica, sans; font-weight:normal; font-size:9pt; color:#2F4F4F; }
body { margin:0; background:#fff; padding-top:50px; color:#9999AA; }
p { margin:0 }
.nav { height: 30px;}
.path { margin-bottom: 10px; font-size: 9pt; color: #2f4f4f; border: 1px solid #ccc; padding: 3px;}
.big { font-size:11pt; font-weight:bold; }
.big a { color: #FA9334; }
.big a:visited { color: #FA9334; }
.little { font-size: 8pt; color:#2F4F4F; }
.path_title { color: #999;margin-top:10px; }
div.body {
  border:1px solid #eee;
  background:#fcfcfc;
  padding:15px;
  width: 1000px;
  margin: 0 auto;
  text-align:left;
}
a { text-decoration:none;  background-color:Transparent; color:#2F4F4F; font-weight:bold; }
a:visited { color:#2F4F4F; }
a:hover { color:#3B5998; }
img { border-style:none }
.row { font-size:10pt; background:#eee; border:1px solid #eee;padding:5px; }
.comment { font-size:7pt; color:#000000; background:#F5F5EE; padding:3px; border:1px solid #9ACD32; margin-top:2px; }
.column { color:#ccc; font-size:13pt; font-weight:bold; padding-bottom:0; }
.button { padding:5px; padding-top:7px; border:1px solid #ccc; background-color:#F5F5EE; font-size:8pt; font-weight:bold; }
.upload-button { padding:5px; padding-top:7px; border:1px solid #336600; background-color:#ccff00; font-size:8pt; font-weight:bold;color:#000; }
.flag { font-weight:bold; font-size:8pt; background:white; color:red; text-align:center; border:1px solid red; }
.text { color:#000000; }

[login-link]
<div style="float: right; padding-left:10px;"><a href="%encoded-folder%~login" class=button>Login (Exclusive)</a></div>

[loggedin]
<div style="float: right; padding-left:10px;"><div class=text><span class=button>Logged in as: %user%</span></div></div>

[upload-link]
<div style="float: right; padding-left:10px;"><a href="%encoded-folder%~upload" class=upload-button>Upload Files</a></div>

[up]
<span class=big><a href="%parent-folder%">&larr; Back to Parent Directory</a></span>

[nofiles]
<div class=little>This folder is empty.</div>

[files]
<div class=little>This page contains <b>%number-folders% folder(s)</b> and <b>%number-files% file(s)</b> with Total Size is <b>%total-size%</b> (for files only, not including folders).</div>
<table width="100%" style="margin-bottom:30px;">
<tr>
<th><a href="%encoded-folder%?sort=n"><span class=column>Filename</span></a>
<th><a href="%encoded-folder%?sort=s"><span class=column>Filesize</span></a>
<th><a href="%encoded-folder%?sort=t"><span class=column>Filetime</span></a>
<th><span class=column>Hits</span>
</tr>
%list%
</table>

[file]
<tr><td class=row>%new% <a href="%item-url%"><img align=top src="/~img_file"> %item-name%</a>%comment%<td align=center class=row>%item-size%<td align=center class=row>%item-modified%<td align=center class=row>%item-dl-count%

[folder]
<tr><td class=row>%new% <a href="%item-url%"><img align=top src="/~img_folder"> <b>%item-name%</b></a>%comment%<td align=center class=row>Folder<td align=center class=row>%item-modified%<td align=center class=row>%item-dl-count%

[link]
<tr><td class=row>%new% <a href="%item-url%"><img align=top src="/~img_link"> <b>%item-name%</b></a>%comment%<td colspan=3 align=center class=row>Hyperlink

[comment]
<div class=comment>%item-comment%</div>

[folder-comment]
<div style='font-size:10pt; color:#888888; background:#EEEEEE; padding:3px; border:1px solid #DDDDDD; border-bottom:3px solid #DDDDDD; margin-top:2px;'>
%item-comment%</div>

[error-page]
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Error!</title>
<style type="text/css">\n%style%\n</style>
</head>
<body>
<div id="wrap" align="center">
<div class=body>
<div class=nav>
<div style="float: right; padding-left:10px;"><a href="/" class=button>Back to Home</a></div>
</div>
%content%
</div>
</div>
</body>
</html>

[not found]
<div class=text>
<h1>HTTP 404 -  Not Found</h1>
<a href="/">Main Page - Index</a>
</div>

[overload]
<div class=text>
<h1>Server Busy</h1>
Please try again later.
</div>

[max contemporary downloads]
<h1>Download limit</h1>
On this server there is a limit on the number of <b>contemporary</b> downloads.
<br>This limit has been reached. Retry later.

[unauthorized]
<div class=text>
<h1>Unauthorized</h1>
This is a protected resource.
<br>Your username/password cannot be verified.
</div>

[deny]
<div class=text>
<h1>Unallowed</h1>
This resource is not accessible.
</div>

[ban]
<div class=text>
<h1>Banned!</h1>
You are banned from this server with the reason of: %reason%
</div>

[upload]
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Upload to: %folder%</title>
<style type="text/css">\n%style%\n</style>
</head>
<body>
<div id="wrap" align="center">
<div class=body>
<div class=nav>
%login-link%
%loggedin%
<div style="float:right; padding-left:10px;"><a target="_top" href="%encoded-folder%~upload" class=button>Close Progress Frame</a></div>
<div style="float:right; padding-left:10px;"><a target="_top" href="%encoded-folder%~upload+progress" class=button>Open Progress Frame</a></div>
<div style="float:right; padding-left:10px;"><a href="%encoded-folder%" target=_parent class=button>Cancel Upload</a></div>
<div style="float: right; padding-left:10px;"><a href="/" class=button>Back to Home</a></div>
</div>
<div class=path_title><i>Upload to:</i></div>
<div class=path>%folder%</div>
<div class=text><b>Free Space Available For Upload: %diskfree%</b></div>
<br>
<form name=frm action="%encoded-folder%" target=_parent method=post enctype="multipart/form-data" onSubmit="frm.upbtn.disabled=true; return true;">
%upload-files%
<br>
<input name=upbtn type=submit value="Upload Selected Files" style="border-style:dashed; border-width:1px; font-weight: bold; color: #000; background-color: #FFFFFF">
</form>
<div class=text><br><img src="/~img9" alt=""> Please do not open the active transfers frame while the upload is in progress or the upload will be corrupted.</div>
<div class=text><br><img src="/~img9" alt=""> WARNING: Uploading a file with a same filename will overwrite the existing file.</div>
</div>
</div>
</body>
</html>

[upload-file]
<input name=fileupload%idx% size=70 type=file><br>

[upload-results]
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Upload Results for: %folder%</title>
<style type="text/css">\n%style%\n</style>
</head>
<body>
<div id="wrap" align="center">
<div class=body>
<div class=nav>
%loggedin%
<div style="float: right; padding-left:10px;"><a href="/" class=button>Back to Home</a></div>
</div>
<div class=path_title><i>pload Results for:</i></div>
<div class=path>%folder%</div>
%uploaded-files%
<br><br>
<a href="%encoded-folder%" target=_parent class=big>Go Back</a>
</div>
</div>
</body>
</html>

[upload-success]
<li><b>SUCCESS!</b> Uploaded: %item-name% --- %item-size% (Speed: %speed% KB/s)

[upload-failed]
<li><b>FAILED!</b> Error while uploading: %item-name%: ---  %reason%

[upload+progress]
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Upload to: %folder%</title>
<frameset cols=250,*>
  <frame name=progress src="/~progress" scrolling=auto marginwidth=0>
  <frame src="%encoded-folder%~upload-no-progress" scrolling=auto>
</frameset>
</head>
<body>
</body>
</html>

[progress]
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="3;URL=/~progress">
<title>Active Transfers</title>
<style type="text/css">
%style%
.filename { font-weight:bold; font-size:8pt; }
.bytes { font-size:7pt; }
.perc { font-size:14px; vertical-align:middle; }
.out_bar { width:100px; font-size:15px; background:black; border:black 1px solid; margin-right:5px; }
.in_bar { height:16px; background:white; color:white;  }
div.body { margin-left:0; margin-right:0; }
body { padding:2px; }
</style>
</head>
<body>
<div class=big>Active Transfers</div>
<div class=text>Auto-Refresh: 3 Seconds</div>
<br><div align="center"><img src="/~img_graph190x40" style="border:white outset 2px;" alt="Bandwidth Graph"></div>
<div class=body>
%progress-files%
</div>
</body>
</html>

[progress-nofiles]
<div align="center" class=big>No Active Transfers</div>

[progress-upload-file]
<span class=flag>&nbsp;UP&nbsp;</span>
<div class=text><span class=filename>%filename%</span></div>
<div class=text><div class=bytes>%done-bytes% / %total-bytes% bytes<br>Current Upload Speed: %speed-kb% KB/s</div></div>
<div style="margin-top:5px; margin-bottom:20px;">
  <span class=out_bar><span class=in_bar style="width:%perc%px"></span></span> <div class=text><span class=perc>%perc%%</span></div>
</div>

[progress-download-file]
<span class=flag>&nbsp;DOWN&nbsp;</span>
<div class=text><span class=filename>%filename%</span></div>
<div class=text><div class=bytes>%done-bytes% / %total-bytes% bytes<br>Current Download Speed: %speed-kb% KB/s</div></div>
<div style="margin-top:5px; margin-bottom:20px;">
  <span class=out_bar><span class=in_bar style="width:%perc%px"></span></span><div class=text><span class=perc> %perc%%</span></div>
</div>

[newfile]
<span class=flag>&nbsp;NEW&nbsp;</span>