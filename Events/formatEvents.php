<?php
session_start();
if ($_SESSION['validUser'] !== "yes") {
	header('Location: eventsLogin.php');
}
	//Get the Event data from the server.
	require_once("dbConnect.php");
	
	$stmt = $conn->prepare("SELECT * FROM wdv341_event ORDER BY event_id DESC");
	
	
		$stmt->execute();
		
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;	
			padding: 10px;
		}
		
	
		
		.displayEvent{
			text_align:left;
			font-size:18px;	
		}
		
		.displayDescription {
			margin-left:50px;
		}
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>   
    <h3><?php $count  ?> Events are available today.</h3>

<?php
	//Display each row as formatted output in the div below
	
		$count = 0;
		foreach($result as $row) {
			
			$date = date("Y/m/d", strtotime($row['event_date']));
						
			$inMonth = substr($row['event_date'], 5, -3);
			$inYear = substr($row['event_date'], 0, -6);
			$inDay = substr($row['event_date'], 8, 9);

	
			$date2 = date('Y/m/d', time());
			
			$currentMonth = substr($date2, 5, -3);
			$currentYear = substr($date2, 0, -6);
			$currentDay = substr($date2, 8, 9);
			
			
			
			
			?>
		

	<p>
        <div class="eventBlock">	
            <div>
            	<span class="displayEvent">Event:  <span id ="eventName<?php echo $count?>"><?=$row['event_name']?></span></span>
                <span class="displayPresenter">Presenter: <?=$row['event_presenter']?></span>
            </div>
            <div>
            	<span class="displayDescription">Description:  <?=$row['event_description']?></span>
            </div>
            <div>
            	<span class="displayTime">Time:  <?=$row['event_time']?></span>
            </div>
            <div>

            	<span class="displayDate">Date:  <?=$date?></span>
            </div>
        </div>
    </p>
		
<?php
				if ($inMonth == $currentMonth and $inYear == $currentYear){
				?>
				<script>
					document.getElementById('eventName<?php echo $count;?>').style.color = "red";
					document.getElementById('eventName<?php echo $count;?>').style.fontWeight = "bold";
					
				</script>
				<?php 
				
			} else {
				?>
				<script>
					document.getElementById("eventName<?php echo $count;?>").style.color = "black";
					document.getElementById("eventName<?php echo $count;?>").style.fontWeight = "normal";
				</script>
				<?php 
			}
			
			if ($inYear > $currentYear){
				?>
				<script>
					document.getElementById('eventName<?php echo $count;?>').style.fontStyle = "italic";
				</script>
				<?php 
				
			} else if ($inMonth > $currentMonth and $inYear = $currentYear) {
				?>
				<script>
					document.getElementById("eventName<?php echo $count;?>").style.fontStyle = "italics";
				</script>
				<?php 
			} else if ($inYear == $currentYear and $inDay > $currentDay) {
				?>
				<script>
					document.getElementById("eventName<?php echo $count;?>").style.fontStyle = "italics";
				</script>
				<?php } 
				
				
					$count++;
	 }
?>

</body>
</html>