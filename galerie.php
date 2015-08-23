<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Galerie</title> 
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="stiluri/style.css"/>
<script type="text/javascript" src="include/highslide/highslide-full.js"></script> 
<link rel="stylesheet" type="text/css" href="include/highslide/highslide.css" /> 
<script type="text/javascript"> 
//<![CDATA[
hs.graphicsDir = '../highslide/graphics/';
hs.transitions = ['expand', 'crossfade'];
hs.restoreCursor = null;
hs.lang.restoreTitle = 'Click for next image';
 
// Add the slideshow providing the controlbar and the thumbstrip
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: true,
	useControls: true,
	overlayOptions: {
		position: 'bottom right',
		offsetY: 50
	},
	thumbstrip: {
		position: 'above',
		mode: 'horizontal',
		relativeTo: 'expander'
	}
});
 
// Options for the in-page items
var inPageOptions = {
	//slideshowGroup: 'group1',
	outlineType: null,
	allowSizeReduction: false,
	wrapperClassName: 'in-page controls-in-heading',
	thumbnailId: 'gallery-area',
	useBox: true,
	width: 600,
	height: 400,
	targetX: 'gallery-area 10px',
	targetY: 'gallery-area 10px',
	captionEval: 'this.a.title',
	numberPosition: 'caption'
}
 
// Open the first thumb on page load
hs.addEventListener(window, 'load', function() {
	document.getElementById('thumb1').onclick();
});
 
// Cancel the default action for image click and do next instead
hs.Expander.prototype.onImageClick = function() {
	if (/in-page/.test(this.wrapper.className))	return hs.next();
}
 
// Under no circumstances should the static popup be closed
hs.Expander.prototype.onBeforeClose = function() {
	if (/in-page/.test(this.wrapper.className))	return false;
}
// ... nor dragged
hs.Expander.prototype.onDrag = function() {
	if (/in-page/.test(this.wrapper.className))	return false;
}
 
// Keep the position after window resize
hs.addEventListener(window, 'resize', function() {
	var i, exp;
	hs.getPageSize();
 
	for (i = 0; i < hs.expanders.length; i++) {
		exp = hs.expanders[i];
		if (exp) {
			var x = exp.x,
				y = exp.y;
 
			// get new thumb positions
			exp.tpos = hs.getPosition(exp.el);
			x.calcThumb();
			y.calcThumb();
 
			// calculate new popup position
		 	x.pos = x.tpos - x.cb + x.tb;
			x.scroll = hs.page.scrollLeft;
			x.clientSize = hs.page.width;
			y.pos = y.tpos - y.cb + y.tb;
			y.scroll = hs.page.scrollTop;
			y.clientSize = hs.page.height;
			exp.justify(x, true);
			exp.justify(y, true);
 
			// set new left and top to wrapper and outline
			exp.moveTo(x.pos, y.pos);
		}
	}
});
//]]>
</script> 
<style type="text/css"> 
	.highslide-image {
		border: 1px solid black;
	}
	.highslide-controls {
		width: 90px !important;
	}
	.highslide-controls .highslide-close {
		display: none;
	}
	.highslide-caption {
		padding: .5em 0;
	}
</style> 
</head>
<body> 
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php">Tehnologii Web</a></h1>
			<?php include("include/cautare.php")?>
		</div>
		<div id="menu">
			<ul>
				<li><a href="afisare.php" accesskey="1" title="">Produse</a></li>
				<li><a href="despre.php" accesskey="1" title="">Despre</a></li>
				<li><a href="galerie.php" accesskey="2" title="">Galerie</a></li>
				<li><a href="contact.html" accesskey="3" title="">Contact</a></li>
				<li><a href="admin/index.php" accesskey="5" title="">Administrare</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="gallery-area" style="width: 620px; height: 520px; margin: 0 auto; border: 1px solid silver"> 
<div class="hidden-container"> 
 <?php
 include_once("include/config.php");
$query="SELECT * FROM imagini";
$result = mysqli_query($conectare,$query);
 $i=0;
while($row = mysqli_fetch_array($result))
  {	
  if ($i==0)
  echo('<a id="thumb1" class="highslide" href="include/imagini/'.$row['id'].'.jpg"
			onclick="return hs.expand(this, inPageOptions)" title="'.$row['descriere'].'"> <img src="include/imagini/'.$row['id'].'.thumb.jpg" alt=""/></a> ');
  
  else
  echo('<a class="highslide" href="include/imagini/'.$row['id'].'.jpg"
			onclick="return hs.expand(this, inPageOptions)" title="'.$row['descriere'].'"> 
		<img src="include/imagini/'.$row['id'].'.thumb.jpg" alt=""/></a>');
    
$i++;
  }
mysqli_close($conectare);
?> 
</div> 
</div> 
</body> 
</html>