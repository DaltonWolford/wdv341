<?php
session_start();
if ($_SESSION['validUser'] !== "yes") {
	header('Location: todoLogin.php');
}

$todoItem = "";
$todoDescription = "";
$todoDue = "";
$eventDate = "";
$eventTime = "";


$test = "";

	$todoItemErr = "";
	$todoDescriptionErr = "";
	$todoDueErr = "";


require_once('validation.php');

$validater = new FormValidation;

$flag = false;

if(isset($_POST["submit"]))
{	
	
	$todoItem = $_POST['todo_list_item']; 
	
	if (isset($_POST['event_description'])) {
	$todoDescription = $_POST['event_description']; }
	
	
	$todoDue = $_POST['event_presenter']; 
	
	if (isset($_POST['event_date'])) {
	$eventDate = $_POST['event_date']; }
	
	if (isset($_POST['event_time'])) {
	$eventTime = $_POST['event_time']; }
	
	
	$flag = true;
	

	
	if ($validater->validateRequiredField($todoItem) == false) {
		$flag = false;
		$todoItemErr = "<span class = 'error'> Not a valid name</span>";
	}
	
	if ($validater->validateSpecialCharacters($todoItem) == false) {
		$flag = false;
		$todoItemErr = $todoItemErr . "<span class = 'error'> No special characters in name</span>";
	}
	
	if ($validater->validateRequiredField($todoDescription) == false) {
		$flag = false;
		$todoDescriptionErr = "<span class = 'error'> Not a valid description</span>";
	}
	
	
	if ($validater->validateRequiredField($todoDue) == false) {
		$flag = false;
		$todoDueErr = "<span class = 'error'> Not a valid presenter</span>";
	}

  	if ($flag == false) {
		$mainmsg = "<p class='error'>Form not accepted, please try again.</p>";
	}
  
}
?>


<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css">
<title>WDV341 Intro PHP - Final</title>
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
	
<?php
	
	
  if ($flag == true and !$test == 1) {


  echo "<p>Event Name:  $todoItem </p>";
  echo "<p>Description:  $todoDescription </p>";
  echo "<p>Presenter:  $todoDue </p>";
  
require_once("dbConnect.php");
	
	try {
		
		
	$sql = "INSERT INTO wdv341_final (todo_list_id, todo_list_item, todo_list_description, todo_due_date)
		VALUES (NULL, :eItem, :eDescription, :eDate);";
	
	$statement = $conn->prepare($sql);
	
	$statement->bindParam(':eItem', $todoItem);
	$statement->bindParam(':eDescription', $todoDescription);
	$statement->bindParam(':eDate', $todoDue);
	
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
<form name="todo" method="post" action="todoForm.php">
  <h3>Todo Form</h3>
		<?php  if (isset($mainmsg)) { echo $mainmsg; }       ?>
      <p>
        <label for="item">Todo Item:</label>  
        <input type="text" name="todo_list_item" id="item" value="<?php echo $todoItem ?>"> <?php echo $todoItemErr;?>
      </p>
      <input name="inname2" type="checkbox" value="1"  
            tabindex="-1" autocomplete="false" style="display:none">
      <p>
        <label for="description">Description:</label>
        <input type="text" name="event_description" id="description" value="<?php echo $todoDescription ?>"><?php echo $todoDescriptionErr;?>
      </p>
      <p>
        <label for="due">Date: </label>
        <input type="text" name="event_presenter" id="due" value="<?php echo $todoDue ?>"> <?php echo $todoDueErr;?>
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