<style>body { font-family: "Lucida Console"; font-size: 10pt; }</style>
<?php
$files = glob("*.*");
for ($i=1; $i<count($files); $i++) {
  $filename = $files[$i];
  if ($filename !== 'listing.php' && $filename !== 'index.html') {
  $onlyname = str_replace(".gif", "", $filename);
  echo '&lt;img src="assets/img/cutes/' . $filename . '" onclick="insertEmoticon(\'[:' . $onlyname . ':]\')" title="[:' . $onlyname . ':]" /&gt;';
  echo '<br />';
  //$protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
  //$root = $protocol.'://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
  //echo '\'' . $root . '/' . $onlyname .'.gif\', ';
  }
}
?>