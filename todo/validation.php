<?php

class FormValidation {
	

	
	public function __construct() {
			
		}
	
		//Return true if input is not empty
	function validateRequiredField($inputValue) {
		if (trim($inputValue)==""){
			return false;
		} else {
			return true;
			}

		}
	
	
		//Return true if valid email
	function validateEmail($inputValue) {
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$inputValue))
		{
			return false;
		}	else {
			return true;
		}
}

	
		//Return true if input is numeric
	function validateNumeric($inputValue) {
		if (!is_numeric($inputValue)){
			return false;
		} else {
			return true;
		}

		}
	
	function validateNumericCount($inputValue, $number) {
		if (strlen($inputValue) !== $number) {
			return false;
		} else {
			return true;
		}
	}
	
	function validateNumericMax($inputValue, $number) {
		if (strlen($inputValue) > $number) {
			return false;
		} else {
			return true;
		}
	}
	
	
		//Return true if input is integer
	function validateInteger($inputValue) {
		if (!is_int($inputValue)){
			return false;
		}  else {
			return true;
		}

		}
	
	
		//Return true if no special characters
	function validateSpecialCharacters($inputValue) {
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $inputValue)){
			return false;
		} else {
			return true;
		}

		
	

}
}

?>