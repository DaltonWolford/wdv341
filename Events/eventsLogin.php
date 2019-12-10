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

			$sql = "SELECT * FROM event_user WHERE event_user_name = :username AND event_user_password = :password";				
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
<title>Events Login</title>

</head>

<body>


<h2><?php if (isset($message)) { echo $message; } ?></h2>

<?php
	if ($_SESSION['validUser'] == "yes")	
	{

?>
		<h2>Event Admin Page</h2>
		<br>
        <p><a href="eventForm.php">Add a new event</a></p>
		<br>
        <p><a href="selectAll.php">List of Events  (with update/delete)</a></p>
		<br>
        <p><a href="logout.php">Logout</a></p>	
        					
<?php
	}
	else
	{
?>
			<h2>Admin Options Login:</h2>
                <form method="post" name="loginForm" action="eventsLogin.php" >
                  <p>Username: <input name="loginUsername" type="text" /></p>
                  <p>Password: <input name="loginPassword" type="password" /></p>
                  <p><input name="submitLogin" value="Login" type="submit" /> <input name="" type="reset" />&nbsp;</p>
                </form>       
<?php
	}		
?>


</body>
</html>