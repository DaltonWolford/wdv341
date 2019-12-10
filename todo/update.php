<?php
session_start();

if ($_SESSION['validUser'] !== "yes") {
	header('Location: todoLogin.php');
}
		

		$todo_list_item = "";
		$todo_list_description = "";
		$todo_due_date = "";


		$listErrMsg = "";
		$descriptionErrMsg = "";
		$dateErrMsg = "";
		
		$validForm = false;
		
		$updateRecID = $_GET['recId'];

				
	if(isset($_POST["submit"]))
	{	

		$todo_list_item = $_POST['todo_list_item'];
		$todo_list_description = $_POST['todo_list_description'];
		$todo_due_date = $_POST['todo_due_date'];

			function validateTitle($inValue)
			{
				global $validForm, $listErrMsg;	
				$listErrMsg = "";
				
				if($inValue == "")
				{
					$validForm = false;
					$listErrMsg = "<br>Todo Item is Required";
				}
			}
			
			function validateDescription($inValue)
			{
				global $validForm, $descriptionErrMsg;
				$descriptionErrMsg = "";
				
				if($inValue == "")
				{
					$validForm = false;
					$descriptionErrMsg = "<br>Todo Description is Required";
				}
			}
		
			function validateDate($inValue)
			{
				global $validForm, $dateErrMsg;	
				$dateErrMsg = "";
				
				if($inValue == "")
				{
					$validForm = false;
					$dateErrMsg = "<br>Due Date is Required";
				}
			}	
			
		$validForm = true;
		
		validateTitle($todo_list_item);
		validateDescription($todo_list_description);
		
		if($validForm)
		{
			$message = "Working";	
			
			try {
				
				require 'dbConnect.php';	
				
				$sql = "UPDATE wdv341_final SET ";
				$sql .= "todo_list_item='$todo_list_item', ";
				$sql .= "todo_list_description='$todo_list_description', ";
				$sql .= "event_city='$todo_due_date' ";

				$sql .= "WHERE event_id='$updateRecID'";
				
	
				$stmt = $conn->prepare($sql);
				

				$stmt->execute();	
				
				$message = "The Todo Item has been Updated.";
			}
			
			catch(PDOException $e)
			{
				$message = "There has been a problem. Please try again later.";
	
				error_log($e->getMessage());			
				error_log(var_dump(debug_backtrace()));
						
			}

		}
		else
		{
			$message = "Something went wrong";
		}		

	}
	else
	{
	
		try {
		  
		  require 'dbConnect.php';
		  
		
		  $sql = "SELECT ";
		  $sql .= "todo_list_item, ";
		  $sql .= "todo_list_description, ";
		  $sql .= "todo_due_date "; 
		  $sql .= "FROM wdv341_final ";
		  $sql .= "WHERE event_id=$updateRecID";
		  
		  $stmt = $conn->prepare($sql);
		  
		  $stmt->execute();		
		  
		
		  $stmt->setFetchMode(PDO::FETCH_ASSOC);	
		  
		  $row=$stmt->fetch(PDO::FETCH_ASSOC);	 
				
			$todo_list_item=$row['todo_list_item'];
			$todo_list_description=$row['todo_list_description'];
			$event_city=$row['todo_due_date'];				
				 
	  }
	  
	  catch(PDOException $e)
	  {
		  $message = "There has been a problem. Please try again later.";
	
		  error_log($e->getMessage());			
		  
		 
	  				
	  }	
		
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>Todo Update</title>
   

    <script>
		function clearForm() {
			
			$('.errMsg').html("");					 		
			$('input:text').removeAttr('value');	
			$('textarea').html("");					
		}
	</script>

	<style>
		main {
			width: 40%;
			margin: auto;
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
	
    

    
    <main>
    
		<?php
            //If the form was submitted and valid and properly put into database display the INSERT result message
			if($validForm)
			{
        ?>
      <h1><?php echo $message ?></h1>
        
        <?php
			}
			else
			{
        ?>
		<div class="mid">
        <form id="updateEventForm" name="updateEventForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?recId=$updateRecID"; ?>">
        	<fieldset>
              <h2>Update Event</h2>
              <p>
                <label for="todo_list_item">Todo Item: </label>
                <input type="text" name="todo_list_item" id="todo_list_item" value="<?php echo $todo_list_item;  ?>" /> 
                <span class="errMsg"> <?php echo $listErrMsg; ?></span>
              </p>
              <p>
                <label for="todo_list_description">Description:</label>
                  <textarea name="todo_list_description" id="todo_list_description"><?php echo $todo_list_description; ?></textarea>
                <span class="errMsg"><?php echo $descriptionErrMsg; ?></span>                
              </p>
              <p>
                <label for="event_city">Due Date:</label>
                <input type="text" name="event_city" id="event_city" value="<?php echo $todo_due_date;  ?>" />
                <span class="errMsg"><?php echo $dateErrMsg; ?></span>                      
              </p>
              
              
          </fieldset>
         	<p>
            	<input type="submit" name="submit" id="submit" value="Update Todo" />
            	<input type="reset" name="button2" id="button2" value="Clear Form" onClick="clearForm()" />
        	</p>  
      </form>
		</div>
        <?php
			}
        ?>    	
	</main>
    




</body>
</html>
