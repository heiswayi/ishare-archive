<style>body { font-family: "Lucida Console"; font-size: 10pt; }</style>
<?php
$files = glob("*.*");
for ($i=1; $i<count($files); $i++) {
  $filename = $files[$i];
  if ($filename !== 'listing.php' && $filename !== 'index.html' && $filename !== 'preloader.php') {
    echo '\'../img/tuzkiclub/'.$filename.'\', ';
  }
}
?>