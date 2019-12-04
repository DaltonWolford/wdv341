<?php
session_start();
	if (!$_SESSION["verify123"] == "True") {
		header("Location: cancel.html");
		
	} else {
		echo "<h1>SUCCESS</h1>";
		
	}
?>
<!doctype html>
<html>
<head>
<title></title>
<meta name="" content="">
<meta name="" content="">
<link href="css.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">

<style>




</style>

</head>
<body>
<header>
<h1>Wallpapers and Images</h1>
<div class="headercontainer">

<nav>
<ul>

<li><a href="products.php">Products</a></li><img src="div.png" alt="div">
<li><a href="about.html">About</a></li><img src="div.png" alt="div">

</ul>
</nav>
</div>
	
	


</header>
	
	<h4>Download Files Here</h4>
	<a href="img/img.png" download><h2 style="color:black">PNG Download</h2></a>
	<a href="img/img.pdf" download><h2 style="color:black">PDF Download</h2></a>
	<a href="img/img.zip" download><h2 style="color:black">ZIP Download</h2></a>
	<a href="img/img.gif" download><h2 style="color:black">GIF Download</h2></a>
	<a href="img/img.mp4" download><h2 style="color:black">MP4 Download</h2></a>
	
	</body>
</html>