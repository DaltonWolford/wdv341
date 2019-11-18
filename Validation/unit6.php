<?php

$name = "";
$phone = "";
$email = "";
$register = "";
$badge = "";
$friday = "";
$saturday = "";
$sunday = "";
$other = "";

$test = "";

	$nameErr = "";
	$phoneErr = "";
	$emailErr = "";
	$regErr = "";
	$badgeErr = "";
	$mealErr = "";
	$othErr = "";

require_once('validation.php');

$validater = new FormValidation;

$flag = false;

if(isset($_POST["submit"]))
{	
	

	
	
	$name = $_POST['inname']; 
	
	if (isset($_POST['inphone'])) {
	$phone = $_POST['inphone']; }
	
	
	$email = $_POST['inemail']; 
	
	if (isset($_POST['inregister'])) {
	$register = $_POST['inregister']; }
	
	if (isset($_POST['inbadge'])) {
	$badge = $_POST['inbadge']; }
	
	if (isset($_POST['infriday'])) {
	$friday = $_POST['infriday']; }
	
	if (isset($_POST['insaturday'])) {
	$saturday = $_POST['insaturday']; }
	
	if (isset($_POST['insunday'])) {
	$sunday = $_POST['insunday']; }
	
	if (isset($_POST['inother'])) {
	$other = $_POST['inother']; }
	
	if (isset($_POST['inname2'])) {
	$test = $_POST['inname2']; }
	
	$flag = true;
	

	
	if ($validater->validateRequiredField($name) == false) {
		$flag = false;
		$nameErr = "<p>Name is required</p>";
	}
	
	if ($validater->validateSpecialCharacters($name) == false) {
		$flag = false;
		$nameErr = $nameErr . "<p>No special characters in name</p>";
	}
	
	if ($validater->validateEmail($email) == false) {
		$flag = false;
		$emailErr = "<p>Not a valid email</p>";
	}
	
	
	if ($validater->validateNumeric($phone) == false) {
		$flag = false;
		$phoneErr = "<p>Not a valid phone number</p>";
	}
	
	if ($validater->validateNumericCount($phone, 10) == false) {
		$flag = false;
		$phoneErr = $phoneErr . "<p>Phone number must be 10 digits</p>";
	}
	
	if ($validater->validateRequiredField($register) == false) {
		$flag = false;
		$regErr = "<p>Registration field is required</p>";
	}
	
	if ($validater->validateRequiredField($badge) == false) {
		$flag = false;
		$badgeErr = "<p>Badge field is required</p>";
	}
	
	if ($validater->validateSpecialCharacters($other) == false) {
		$flag = false;
		$othErr = "<p>No special characters in special requests field</p>";
	}
	
	if ($validater->validateNumericMax($other, 200) == false) {
		$flag = false;
		$othErr =   $othErr . "<p>Special requests field must be less than 200 characters</p>";
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

</style>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Unit-5 and Unit-6 Self Posting - Form Validation Assignment</h2>

<?php
	
	
  if ($flag == true and !$test == 1) {


  echo "<p>Name:  $name </p>";
  echo "<p>Phone Number:  $phone </p>";
  echo "<p>Email Address:  $email </p>";
  echo "<p>Registration:  $register </p>";
  echo "<p>Badge:  $badge </p>";

  echo "<p>Provided Meals:</p>";
  if (!$friday == "") {
    echo "<p>Friday Dinner <br></p>";
  }
  if (!$saturday == "") {
    echo "<p>Saturday Lunch <br></p>";
  }
  if (!$sunday == "") {
    echo "<p>Sunday Award Brunch</p>";
  }
  if ($sunday == "" and $saturday == "" and $friday == "") {
    echo "<p>No Meals Selected</p>";
  }

  echo "<p>Other Requests/Requrements:  $other </p>";

  echo "<p>Form Submitted!</p>";

  } else {
    
  
	

?>
	

<p>&nbsp;</p>


<div id="orderArea">
<form name="customerRegistration" method="post" action="unit6.php">
  <h3>Customer Registration Form</h3>
<?php
	  
	  if (!$nameErr == "") {
	    echo $nameErr;
	  }
	  
	  if (!$emailErr == "") {
	    echo $emailErr;
	  }
	  
	  if (!$phoneErr == "") {
	    echo $phoneErr;
	  }
	  
	  if (!$regErr == "") {
	    echo $regErr;
	  }
	  
	   if (!$badgeErr == "") {
	    echo $badgeErr;
	  }
	  
	   if (!$othErr == "") {
	    echo $othErr;
	  }
	  
	  
	  ?>
      <p>
        <label for="name">Name:</label>
        <input type="text" name="inname" id="name" value="<?php echo $name ?>">
      </p>
      <input name="inname2" type="checkbox" value="1"  
            tabindex="-1" autocomplete="false" style="display:none">
      <p>
        <label for="phone">Phone Number:</label>
        <input type="text" name="inphone" id="phone" value="<?php echo $phone ?>">
      </p>
      <p>
        <label for="email">Email Address: </label>
        <input type="text" name="inemail" id="email" value="<?php echo $email ?>">
      </p>
      <p>
        <label for="register">Registration: </label>
        <select name="inregister" id="register">
          <option value="">Choose Type</option>
          <option value="Attendee" <?php if (isset($_POST['inregister'])) { if ($_POST['inregister'] == "Attendee"){echo "selected='selected'";}} ?>>Attendee</option>
          <option value="Presenter" <?php if (isset($_POST['inregister'])) { if ($_POST['inregister'] == "Presenter"){echo "selected='selected'";}} ?>>Presenter</option>
          <option value="Volunteer" <?php if (isset($_POST['inregister'])) { if ($_POST['inregister'] == "Volunteer"){echo "selected='selected'";}} ?>>Volunteer</option>
          <option value="Guest" <?php if (isset($_POST['inregister'])) { if ($_POST['inregister'] == "Guest"){echo "selected='selected'";}} ?>>Guest</option>
        </select>
      </p>
      <p>Badge Holder:</p>
      <p>
        <input type="radio" name="inbadge" id="inclip" value="Clip" <?php if (isset($_POST['inbadge'])) { if ($_POST['inbadge'] == "Clip"){echo "checked='checked'";}} ?>>
        <label for="inclip">Clip</label> <br>
        <input type="radio" name="inbadge" id="lanyard" value="Lanyard" <?php if (isset($_POST['inbadge'])) { if ($_POST['inbadge'] == "Lanyard"){echo "checked='checked'";}} ?>>
        <label for="inlanyard">Lanyard</label> <br>
        <input type="radio" name="inbadge" id="magnet" value="Magnet" <?php if (isset($_POST['inbadge'])) { if ($_POST['inbadge'] == "Magnet"){echo "checked='checked'";}} ?>>
        <label for="inmagnet">Magnet</label>
      </p>
      <p>Provided Meals (Select all that apply):</p>
      <p>
        <input type="checkbox" name="infriday" id="friday" <?php if (isset($_POST['infriday'])) { if ($_POST['infriday'] == "on"){echo "checked='checked'";}} ?>>
        <label for="infriday">Friday Dinner</label><br>
        <input type="checkbox" name="insaturday" id="saturday" <?php if (isset($_POST['insaturday'])) { if ($_POST['insaturday'] == "on"){echo "checked='checked'";}} ?>>
        <label for="insaturday">Saturday Lunch</label><br>
        <input type="checkbox" name="insunday" id="sunday" <?php if (isset($_POST['insunday'])) { if ($_POST['insunday'] == "on"){echo "checked='checked'";}} ?>>
        <label for="insunday">Sunday Award Brunch</label>
      </p>
      <p>
        <label for="other">Special Requests/Requirements: (Limit 200 characters)<br>
        </label>
        <textarea name="inother" cols="40" rows="5" id="other"><?php echo $other ?></textarea>
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