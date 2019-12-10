<?php
session_start();
if ($_SESSION['validUser'] !== "yes") {
	header('Location: todoLogin.php');
}

	require_once("dbConnect.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css.css">
<title>Select All</title>
<style>
		
	
	
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
	
	<table border="1px" cellpadding="5px" cellspacing="0">
	
	<tr>
		<th>#</th>
		<th>Todo</th>
		<th>Description</th>
		<th>Due Date</th>
		<th>Delete/Update</th>
	</tr>
	
	<?php
		try {
		$stmt = $conn->prepare("SELECT * FROM wdv341_final ORDER BY todo_list_id ASC");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			?><tr>
				<td><?=$row['todo_list_id']?></td>
				<td><?=$row['todo_list_item']?></td>
				<td><?=$row['todo_list_description']?></td>
				<td><?=$row['todo_due_date']?></td>
				<td><input type="button" value="Delete" onclick="location.href = 'delete.php?num=<?php echo $row['todo_list_id'] ?>'">
					<input type="button" value="Update" onclick="location.href = 'update.php?num=<?php echo $row['todo_list_id'] ?>'">
				</td>
			</tr>
		
	<?php
		}}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	?>
		</table>
</body>
</html>