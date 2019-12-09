<?php

	require_once("dbConnect.php");
	
	try {
		
	$eventName = "Event 4";
	$eventDescription = "This is the fourth event.";
	$eventPresenter = "Sarah Miller";
	$eventDate = "12/3/2019";
	$eventTime = "2:00";
		
	$sql = "INSERT INTO wdv341_events (event_id, event_name, event_description, event_presenter, event_date, event_time)
		VALUES (NULL, :eName, :eDescription, :ePresenter, :eDate, :eTime);";
	
	echo $sql;
	$statement = $conn->prepare($sql);
	
	$statement->bindParam(':eName', $eventName);
	$statement->bindParam(':eDescription', $eventDescription);
	$statement->bindParam(':ePresenter', $eventPresenter);
	$statement->bindParam(':eDate', $eventDate);
	$statement->bindParam(':eTime', $eventTime);
	
	$statement->execute();
	}
	catch(PDOException $e){

		echo "Process failed: " . $e->getMessage();
	}
	
?>