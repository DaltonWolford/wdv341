<?php
session_start();
if ($_SESSION['validUser'] !== "yes") {
	header('Location: eventsLogin.php');
}
require_once("dbConnect.php");


$query = $conn->prepare("DELETE FROM wdv341_event WHERE event_id={$_GET['num']}");
$query->execute();


	
if ($query->rowCount() == 1) { 

?>
			<br />
            <strong>Event Has Been Deleted</strong><br /><br />
<?php
 } else { 

?>
            <strong>Deletion Failed</strong><br /><br />
<?php
} 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>