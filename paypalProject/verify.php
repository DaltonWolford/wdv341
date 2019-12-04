<?php 



	if ($_GET["verify"] == "yes") {
	
	session_start();
	$_SESSION['verify123'] = "True";
	
	}

	header("Location: success.php");

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>







<a href="success.php">Click Here to go to download page!</a>



</body>
</html>