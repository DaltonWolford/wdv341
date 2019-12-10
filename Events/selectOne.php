<?php

	require_once("dbConnect.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Select All</title>
<style>

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
		$stmt = $conn->prepare("SELECT * FROM wdv341_event WHERE event_id=1");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		
		foreach($result as $row) {
			?><tr>
				<td><?=$row['event_id']?></td>
				<td><?=$row['event_name']?></td>
				<td><?=$row['event_presenter']?></td>
				<td><?=$row['event_date']?></td>
				<td><?=$row['event_time']?></td>
				
			</tr>
			
		
	<?php
		
		}}catch(PDOException $e)
    {
    echo "Select Failed: " . $e->getMessage();
    }
		
	?>
		</table>
</body>
</html>