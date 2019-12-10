<?php
session_start();
if ($_SESSION['validUser'] !== "yes") {
	header('Location: eventsLogin.php');
}

	require_once("dbConnect.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Select All</title>
<style>
	td, th {
		width: 10%;
	}
</style>
</head>

<body>
	<table border="1px" cellpadding="5px" cellspacing="0">
	
	<tr>
		<th>Event ID</th>
		<th>Event Name</th>
		<th>Presenter</th>
		<th>Date</th>
		<th>Time</th>
	</tr>
	
	<?php
		try {
		$stmt = $conn->prepare("SELECT * FROM wdv341_event ORDER BY event_id ASC");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			?><tr>
				<td><?=$row['event_id']?></td>
				<td><?=$row['event_name']?></td>
				<td><?=$row['event_presenter']?></td>
				<td><?=$row['event_date']?></td>
				<td><?=$row['event_time']?></td>
				<td><input type="button" value="Delete" onclick="location.href = 'delete.php?num=<?php echo $row['event_id'] ?>'">
					<input type="button" value="Update" onclick="location.href = 'update.php?num=<?php echo $row['event_id'] ?>'">
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