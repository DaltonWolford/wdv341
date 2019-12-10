<?php 
session_start();

	if (!isset($_SESSION['validUser'])) {
		$_SESSION['validUser'] = "";
	}

	if ($_SESSION['validUser'] == "yes")			
	{
		$message = "Welcome Back " . $_SESSION['userName'] . "!";	
	}
	else
	{
		if (isset($_POST['submitLogin']) )	
		{
			$inUsername = $_POST['loginUsername'];	
			$inPassword = $_POST['loginPassword'];
			
			include 'dbConnect.php';

			$sql = "SELECT * FROM final_user WHERE todo_user_name = :username AND todo_user_password = :password";				
			$query = $conn->prepare($sql) or die("<p>SQL String: $sql</p>");
			$query->execute(
				array (
						'username' => $inUsername,
						'password' => $inPassword
				)
			);
			
			$_SESSION['userName'] = $inUsername;
			
			$count = $query->rowCount();
			
			if ($count == 1 )		
			{
				$_SESSION['validUser'] = "yes";	
				$message = "Welcome Back " . $_SESSION['userName'] . "!";
			}
			else
			{
				$_SESSION['validUser'] = "no";					
				$message = "Sorry, there was a problem with your username or password. Please try again.";
			}			
			
		}
	
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css">
<title>Final Login</title>

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
	

<h2><?php if (isset($message)) { echo $message; } ?></h2>

<?php
	if ($_SESSION['validUser'] == "yes")	
	{

?>
		<h2>To-Do Admin Page</h2>
		<br>
        <p class="adminlist"><a href="todoForm.php">Add a Task</a></p>
		<br>
        <p class="adminlist"><a href="selectAll.php">To-Do List</a></p>
		<br>
        <p class="adminlist"><a href="logout.php">Logout</a></p>	
        					
<?php
	}
	else
	{
?>
	<div id="loginArea">
			<h2>Admin Options Login:</h2>
                <form method="post" name="loginForm" action="todoLogin.php" >
                  <p>Username: <input name="loginUsername" type="text" /></p>
                  <p>Password: <input name="loginPassword" type="password" class="pass" /></p>
                  <p><input name="submitLogin" value="Login" type="submit" /> <input name="" type="reset" />&nbsp;</p>
                </form>  
	</div>
<?php
	}		
?>


</body>
</html>