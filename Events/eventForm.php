<?php
session_start();
if ($_SESSION['validUser'] !== "yes") {
	header('Location: eventsLogin.php');
}

$eventName = "";
$eventDescription = "";
$eventPresenter = "";
$eventDate = "";
$eventTime = "";


$test = "";

	$eventNameErr = "";
	$eventDescriptionErr = "";
	$eventPresenterErr = "";
	$eventDateErr = "";
	$eventTimeErr = "";

require_once('validation.php');

$validater = new FormValidation;

$flag = false;

if(isset($_POST["submit"]))
{	
	
	$eventName = $_POST['event_name']; 
	
	if (isset($_POST['event_description'])) {
	$eventDescription = $_POST['event_description']; }
	
	
	$eventPresenter = $_POST['event_presenter']; 
	
	if (isset($_POST['event_date'])) {
	$eventDate = $_POST['event_date']; }
	
	if (isset($_POST['event_time'])) {
	$eventTime = $_POST['event_time']; }
	
	
	$flag = true;
	

	
	if ($validater->validateRequiredField($eventName) == false) {
		$flag = false;
		$eventNameErr = "<span class = 'error'> Not a valid name</span>";
	}
	
	if ($validater->validateSpecialCharacters($eventName) == false) {
		$flag = false;
		$eventNameErr = $eventNameErr . "<span class = 'error'> No special characters in name</span>";
	}
	
	if ($validater->validateRequiredField($eventDescription) == false) {
		$flag = false;
		$eventDescriptionErr = "<span class = 'error'> Not a valid description</span>";
	}
	
	
	if ($validater->validateRequiredField($eventPresenter) == false) {
		$flag = false;
		$eventPresenterErr = "<span class = 'error'> Not a valid presenter</span>";
	}

	
	if ($validater->validateRequiredField($eventDate) == false) {
		$flag = false;
		$eventDateErr = "<span class = 'error'> Not a valid date</span>";
	}
	
	if ($validater->validateRequiredField($eventTime) == false) {
		$flag = false;
		$eventTimeErr = "<span class = 'error'> Not a valid time</span>";
	}

	
	
	
	
  	if ($flag == false) {
		echo "<p>Form not accepted, please try again.</p>";
	}
  
}
?>


<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Self Posting Form</title>
<style>

#orderArea	{
	width:600px;
	border:thin solid black;
	margin: auto auto;
	padding-left: 20px;
}

#orderArea h3	{
	text-align:center;	
}
.error	{
	color:red;
	font-style:italic;	
}
	
	h2 {
		text-align: center;
	}
	


</style>
</head>

<body>
<h2>WDV341 Intro PHP - Event Form</h2>

<?php
	
	
  if ($flag == true and !$test == 1) {


  echo "<p>Event Name:  $eventName </p>";
  echo "<p>Description:  $eventDescription </p>";
  echo "<p>Presenter:  $eventPresenter </p>";
  echo "<p>Date:  $eventDate </p>";
  echo "<p>Time:  $eventTime </p>";
  
require_once("dbConnect.php");
	
	try {
		
		
	$sql = "INSERT INTO wdv341_event (event_id, event_name, event_description, event_presenter, event_date, event_time)
		VALUES (NULL, :eName, :eDescription, :ePresenter, :eDate, :eTime);";
	
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
	  
	  
 

  echo "<p>Form Submitted!</p>";

  } else {
    
  
	

?>
	

<p>&nbsp;</p>


<div id="orderArea">
<form name="customerRegistration" method="post" action="eventForm.php">
  <h3>Event Form</h3>
      <p>
        <label for="name">Event Name:</label>  
        <input type="text" name="event_name" id="name" value="<?php echo $eventName ?>"> <?php echo $eventNameErr;?>
      </p>
      <input name="inname2" type="checkbox" value="1"  
            tabindex="-1" autocomplete="false" style="display:none">
      <p>
        <label for="description">Event Description:</label>
        <input type="text" name="event_description" id="description" value="<?php echo $eventDescription ?>"><?php echo $eventDescriptionErr;?>
      </p>
      <p>
        <label for="presenter">Event Presenter: </label>
        <input type="text" name="event_presenter" id="presenter" value="<?php echo $eventPresenter ?>"> <?php echo $eventPresenterErr;?>
      </p>
	
	  <p>
        <label for="date">Event Date: </label>
        <input type="text" name="event_date" id="date" value="<?php echo $eventDate ?>"> <?php echo $eventDateErr;?>
      </p>
	  <p>
        <label for="time">Event Time: </label>
        <input type="text" name="event_time" id="time" value="<?php echo $eventTime ?>"> <?php echo $eventTimeErr;?>
      </p>
	
     
   
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
    <input type="reset" name="reset" id="reset" value="Reset">
  </p>
</form>
</div>
	
<?php
  }
?>

</body>
</html>