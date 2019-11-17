<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Validation Test</title>
<style>
	.
	
</style>
</head>

<body>
<h1>Form Validation Test</h1>
<p>False = ""  True = "1"</p>
<p></p>
<?php

$blank = "";
$name = "Jack";
$email = "adsf@zxcv.com";
$email2 = "wolford@gmail.com";
$spaces = "  ";
$numbers = 254;
$null = null;
$symbols  = "$%@";

require_once('validation.php');

$validater = new FormValidation;
	
	

echo "<h4>Required Field Function Test</h4>";
echo "Input : '' = " . $validater->validateRequiredField($blank) . "<br>";
echo "Input : 'Jack' = " . $validater->validateRequiredField($name) . "<br>";
echo "Input : 'adsf@zxcv.com' = " . $validater->validateRequiredField($email) . "<br>";
echo "Input : '  ' = " . $validater->validateRequiredField($spaces) . "<br>";
echo "Input : 254 = " . $validater->validateRequiredField($numbers) . "<br>";
echo "Input : null = " . $validater->validateRequiredField($null) . "<br>";
echo "Input : '$%@' = " . $validater->validateRequiredField($symbols) . "<br>";
	
echo "<h4>Email Function Test</h4>";
echo "Input : 'adsf@zxcv.com' = " . $validater->validateEmail($email) . "<br>";
echo "Input : 'wolford@gmail.com' = " . $validater->validateEmail($email2) . "<br>";
echo "Input : '$%@' = " . $validater->validateEmail($symbols) . "<br>";
echo "Input : '  ' = " . $validater->validateEmail($spaces) . "<br>";
echo "Input : 254 = " . $validater->validateEmail($numbers) . "<br>";
echo "Input : null = " . $validater->validateEmail($null) . "<br>";
	
echo "<h4>Numeric Function Test</h4>";
echo "Input : 'adsf@zxcv.com' = " . $validater->validateNumeric($email) . "<br>";
echo "Input : -52 = " . $validater->validateNumeric(-52) . "<br>";
echo "Input : '$%@' = " . $validater->validateNumeric($symbols) . "<br>";
echo "Input : 15.2 = " . $validater->validateNumeric(15.2) . "<br>";
echo "Input : 254 = " . $validater->validateNumeric($numbers) . "<br>";
echo "Input : null = " . $validater->validateNumeric($null) . "<br>";
	
echo "<h4>Integer Function Test</h4>";
echo "Input : '22.512' = " . $validater->validateInteger(22.512) . "<br>";
echo "Input : -52 = " . $validater->validateInteger(-52) . "<br>";
echo "Input : '$%@' = " . $validater->validateInteger($symbols) . "<br>";
echo "Input : 15.2 = " . $validater->validateInteger(15.2) . "<br>";
echo "Input : 254 = " . $validater->validateInteger($numbers) . "<br>";
echo "Input : 72 = " . $validater->validateInteger(72) . "<br>";
	
echo "<h4>Special Character Function Test</h4>";
echo "Input : '*af1@32' = " . $validater->validateSpecialCharacters("*af1@32") . "<br>";
echo "Input : -52 = " . $validater->validateSpecialCharacters(-52) . "<br>";
echo "Input : '$%@' = " . $validater->validateSpecialCharacters($symbols) . "<br>";
echo "Input : 'Jack' = " . $validater->validateSpecialCharacters($name) . "<br>";
echo "Input : 254 = " . $validater->validateSpecialCharacters($numbers) . "<br>";
echo "Input : 72 = " . $validater->validateSpecialCharacters(72) . "<br>";
	

	
	
?>
</body>
</html>