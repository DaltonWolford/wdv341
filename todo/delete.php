<?php
session_start();
if ($_SESSION['validUser'] !== "yes") {
	header('Location: finalLogin.php');
}
require_once("dbConnect.php");


$query = $conn->prepare("DELETE FROM wdv341_final WHERE todo_list_id={$_GET['num']}");
$query->execute();


	
if ($query->rowCount() == 1) { 


			
            $deletemsg = "<p>Selection Has Been Deleted</p>";

 } else { 


            $deletemsg = "<p class='error'>Deletion Failed</p>";

} 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css.css">
<title>Delete Todo Item</title>
<style>
	
	p {
		text-align: center;
		margin-top: 100px;
	}	
</style>
</head>

<body>
	
	<header>
		
		<h1>TODO LIST</h1>
			
			
			
		
	
	</header>
	<ul>
				<li class="first"><a href="todoLogin.php">Login</a></li>
				<li class="second"><a href="selectAll.php">To-Do List</a></li>
				<li class="third"><a href="todoForm.php">Add to List</a></li>
			</ul>
	<?php
		echo $deletemsg;
	?>
</body>
</html>