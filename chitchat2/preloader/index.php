<?php

session_start();

if (isset($_GET['page']) && isset($_GET['x'])) { 
  if ($_GET['page'] == 'cc' && $_GET['x'] !== 'none') {
    $redirect = '../cc.php?x='.$_GET['x'];
    $_SESSION['ChitChat'] = 'EmoticonsCached';
  } else {
    $redirect = '../userhome.php';
    $_SESSION['ChitChat'] = 'EmoticonsCached';
  }
} else {
  $redirect = '../index.php';
}

?>

<html>
<head>
<title>ChitChat</title>
<style type="text/css">
    body      { background:#fcfcfc url(../img/header-bg.png) repeat-x center 0; }
		#box			{ background:url(progress-bar-back.gif) right center no-repeat; width:220px; height:20px; float:left; }
		#perc			{ background:url(progress-bar.gif) right center no-repeat; height:20px; }
		#text			{ font-family:tahoma, arial, sans-serif; font-size:11px; float:left; padding:3px 0 0 10px;color:#666; }
		.loader   { margin:100px auto;text-align:center;width:300px;border:1px solid #ddd;padding:10px;background:#f8f8f8; }
		.caption  { font-size:14px;font-family:tahoma, arial, sans-serif;color:#666; }
</style>
<script type="text/javascript" src="moo1.2.js"></script>
<script type="text/javascript" src="dwProgressBar.js"></script>
<script type="text/javascript">
		
		window.addEvent('domready', function() {
			/* progress bar */
			var progressBar = new dwProgressBar({
				container: $('progress-bar'),
				startPercentage: 0,
				speed:750,
				boxID: 'box',
				percentageID: 'perc',
				displayID: 'text',
				displayText: true
			});
			
			/* preloading */
			var images = ['../img/tuzkiclub/t1.gif', '../img/tuzkiclub/t10.gif', '../img/tuzkiclub/t11.gif', '../img/tuzkiclub/t12.gif', '../img/tuzkiclub/t13.gif', '../img/tuzkiclub/t14.gif', '../img/tuzkiclub/t15.gif', '../img/tuzkiclub/t16.gif', '../img/tuzkiclub/t17.gif', '../img/tuzkiclub/t18.gif', '../img/tuzkiclub/t19.gif', '../img/tuzkiclub/t2.gif', '../img/tuzkiclub/t20.gif', '../img/tuzkiclub/t21.gif', '../img/tuzkiclub/t22.gif', '../img/tuzkiclub/t23.gif', '../img/tuzkiclub/t24.gif', '../img/tuzkiclub/t25.gif', '../img/tuzkiclub/t26.gif', '../img/tuzkiclub/t27.gif', '../img/tuzkiclub/t28.gif', '../img/tuzkiclub/t29.gif', '../img/tuzkiclub/t3.gif', '../img/tuzkiclub/t30.gif', '../img/tuzkiclub/t31.gif', '../img/tuzkiclub/t32.gif', '../img/tuzkiclub/t33.gif', '../img/tuzkiclub/t34.gif', '../img/tuzkiclub/t35.gif', '../img/tuzkiclub/t36.gif', '../img/tuzkiclub/t37.gif', '../img/tuzkiclub/t38.gif', '../img/tuzkiclub/t39.gif', '../img/tuzkiclub/t4.gif', '../img/tuzkiclub/t40.gif', '../img/tuzkiclub/t41.gif', '../img/tuzkiclub/t42.gif', '../img/tuzkiclub/t43.gif', '../img/tuzkiclub/t44.gif', '../img/tuzkiclub/t45.gif', '../img/tuzkiclub/t46.gif', '../img/tuzkiclub/t47.gif', '../img/tuzkiclub/t48.gif', '../img/tuzkiclub/t49.gif', '../img/tuzkiclub/t5.gif', '../img/tuzkiclub/t50.gif', '../img/tuzkiclub/t51.gif', '../img/tuzkiclub/t52.gif', '../img/tuzkiclub/t53.gif', '../img/tuzkiclub/t54.gif', '../img/tuzkiclub/t55.gif', '../img/tuzkiclub/t56.gif', '../img/tuzkiclub/t57.gif', '../img/tuzkiclub/t58.gif', '../img/tuzkiclub/t59.gif', '../img/tuzkiclub/t6.gif', '../img/tuzkiclub/t60.gif', '../img/tuzkiclub/t61.gif', '../img/tuzkiclub/t62.gif', '../img/tuzkiclub/t63.gif', '../img/tuzkiclub/t64.gif', '../img/tuzkiclub/t65.gif', '../img/tuzkiclub/t66.gif', '../img/tuzkiclub/t67.gif', '../img/tuzkiclub/t7.gif', '../img/tuzkiclub/t8.gif', '../img/tuzkiclub/t9.gif', '../img/onionclub/o0.gif', '../img/onionclub/o1.gif', '../img/onionclub/o10.gif', '../img/onionclub/o100.gif', '../img/onionclub/o101.gif', '../img/onionclub/o102.gif', '../img/onionclub/o103.gif', '../img/onionclub/o104.gif', '../img/onionclub/o105.gif', '../img/onionclub/o106.gif', '../img/onionclub/o107.gif', '../img/onionclub/o108.gif', '../img/onionclub/o109.gif', '../img/onionclub/o11.gif', '../img/onionclub/o12.gif', '../img/onionclub/o13.gif', '../img/onionclub/o14.gif', '../img/onionclub/o15.gif', '../img/onionclub/o16.gif', '../img/onionclub/o17.gif', '../img/onionclub/o18.gif', '../img/onionclub/o19.gif', '../img/onionclub/o2.gif', '../img/onionclub/o20.gif', '../img/onionclub/o21.gif', '../img/onionclub/o22.gif', '../img/onionclub/o23.gif', '../img/onionclub/o24.gif', '../img/onionclub/o25.gif', '../img/onionclub/o26.gif', '../img/onionclub/o27.gif', '../img/onionclub/o28.gif', '../img/onionclub/o29.gif', '../img/onionclub/o3.gif', '../img/onionclub/o30.gif', '../img/onionclub/o31.gif', '../img/onionclub/o32.gif', '../img/onionclub/o33.gif', '../img/onionclub/o34.gif', '../img/onionclub/o35.gif', '../img/onionclub/o36.gif', '../img/onionclub/o37.gif', '../img/onionclub/o38.gif', '../img/onionclub/o39.gif', '../img/onionclub/o4.gif', '../img/onionclub/o40.gif', '../img/onionclub/o41.gif', '../img/onionclub/o42.gif', '../img/onionclub/o43.gif', '../img/onionclub/o44.gif', '../img/onionclub/o45.gif', '../img/onionclub/o46.gif', '../img/onionclub/o47.gif', '../img/onionclub/o48.gif', '../img/onionclub/o49.gif', '../img/onionclub/o5.gif', '../img/onionclub/o51.gif', '../img/onionclub/o52.gif', '../img/onionclub/o53.gif', '../img/onionclub/o54.gif', '../img/onionclub/o55.gif', '../img/onionclub/o56.gif', '../img/onionclub/o57.gif', '../img/onionclub/o58.gif', '../img/onionclub/o59.gif', '../img/onionclub/o6.gif', '../img/onionclub/o60.gif', '../img/onionclub/o61.gif', '../img/onionclub/o62.gif', '../img/onionclub/o63.gif', '../img/onionclub/o64.gif', '../img/onionclub/o65.gif', '../img/onionclub/o66.gif', '../img/onionclub/o67.gif', '../img/onionclub/o68.gif', '../img/onionclub/o69.gif', '../img/onionclub/o7.gif', '../img/onionclub/o70.gif', '../img/onionclub/o71.gif', '../img/onionclub/o72.gif', '../img/onionclub/o73.gif', '../img/onionclub/o74.gif', '../img/onionclub/o75.gif', '../img/onionclub/o76.gif', '../img/onionclub/o77.gif', '../img/onionclub/o78.gif', '../img/onionclub/o79.gif', '../img/onionclub/o8.gif', '../img/onionclub/o80.gif', '../img/onionclub/o81.gif', '../img/onionclub/o82.gif', '../img/onionclub/o83.gif', '../img/onionclub/o84.gif', '../img/onionclub/o85.gif', '../img/onionclub/o86.gif', '../img/onionclub/o87.gif', '../img/onionclub/o88.gif', '../img/onionclub/o89.gif', '../img/onionclub/o9.gif', '../img/onionclub/o90.gif', '../img/onionclub/o91.gif', '../img/onionclub/o92.gif', '../img/onionclub/o93.gif', '../img/onionclub/o94.gif', '../img/onionclub/o95.gif', '../img/onionclub/o96.gif', '../img/onionclub/o97.gif', '../img/onionclub/o98.gif', '../img/onionclub/o99.gif', '../img/cutes/c10.gif', '../img/cutes/c11.gif', '../img/cutes/c12.gif', '../img/cutes/c13.gif', '../img/cutes/c14.gif', '../img/cutes/c15.gif', '../img/cutes/c16.gif', '../img/cutes/c17.gif', '../img/cutes/c18.gif', '../img/cutes/c19.gif', '../img/cutes/c2.gif', '../img/cutes/c20.gif', '../img/cutes/c21.gif', '../img/cutes/c22.gif', '../img/cutes/c23.gif', '../img/cutes/c24.gif', '../img/cutes/c25.gif', '../img/cutes/c26.gif', '../img/cutes/c27.gif', '../img/cutes/c28.gif', '../img/cutes/c29.gif', '../img/cutes/c3.gif', '../img/cutes/c30.gif', '../img/cutes/c31.gif', '../img/cutes/c32.gif', '../img/cutes/c33.gif', '../img/cutes/c34.gif', '../img/cutes/c35.gif', '../img/cutes/c36.gif', '../img/cutes/c37.gif', '../img/cutes/c38.gif', '../img/cutes/c39.gif', '../img/cutes/c4.gif', '../img/cutes/c40.gif', '../img/cutes/c41.gif', '../img/cutes/c42.gif', '../img/cutes/c43.gif', '../img/cutes/c44.gif', '../img/cutes/c45.gif', '../img/cutes/c46.gif', '../img/cutes/c47.gif', '../img/cutes/c48.gif', '../img/cutes/c49.gif', '../img/cutes/c5.gif', '../img/cutes/c50.gif', '../img/cutes/c51.gif', '../img/cutes/c52.gif', '../img/cutes/c53.gif', '../img/cutes/c54.gif', '../img/cutes/c55.gif', '../img/cutes/c6.gif', '../img/cutes/c7.gif', '../img/cutes/c8.gif', '../img/cutes/c9.gif', '../img/smileys/s1.png', '../img/smileys/s10.png', '../img/smileys/s11.png', '../img/smileys/s12.png', '../img/smileys/s13.png', '../img/smileys/s14.png', '../img/smileys/s15.png', '../img/smileys/s16.png', '../img/smileys/s17.png', '../img/smileys/s18.png', '../img/smileys/s19.png', '../img/smileys/s2.png', '../img/smileys/s20.png', '../img/smileys/s21.png', '../img/smileys/s22.png', '../img/smileys/s23.png', '../img/smileys/s24.png', '../img/smileys/s25.png', '../img/smileys/s26.png', '../img/smileys/s27.png', '../img/smileys/s28.png', '../img/smileys/s29.png', '../img/smileys/s3.png', '../img/smileys/s30.png', '../img/smileys/s4.png', '../img/smileys/s5.png', '../img/smileys/s6.png', '../img/smileys/s7.png', '../img/smileys/s8.png', '../img/smileys/s9.png'];
			var loader = new Asset.images(images, {
				onProgress: function(counter,index) {
					progressBar.set((counter + 1) * (100 / images.length));
				},
				onComplete: function() {
					//images.each(function(im) {
					//	new Element('img',{ src:im, style:'margin:5px;' }).inject($('images-holder'));
					//});
					window.location.replace('<?php echo $redirect; ?>');
					//window.location.href = "http://stackoverflow.com";
				}
			});
		});
		
</script>
</head>
<body>

<div class="loader">
<span class="caption"><em>Precaching all emoticons...</em></span>
<div id="progress-bar"></div><div style="clear:both;"></div>
</div>

<!--<div id="images-holder"></div>-->

</body>
</html>