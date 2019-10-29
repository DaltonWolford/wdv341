<?php
	
	class Emailer {	

		private $emailMessage;
		private $emailSubject;
		private $recipientAddress;
		private $senderAddress;
		

		function __construct() {
			
		}
		
		
		function setEmailMessage($inMessage) {
			$this->emailMessage = $inMessage;
		}	
		function setEmailSubject($inSubject) {
			$this->emailSubject = $inSubject;
		}		
		function setRecipientAddress($inRecipient) {
			$this->recipientAddress = $inRecipient;
		}		
		function setSenderAddress($inSender) {
			$this->senderAddress = $inSender;
		}
		

		function getEmailMessage() {
			return $this->emailMessage;
		}		
		function getEmailSubject() {
			return $this->emailSubject;
		}		
		function getSenderAddress() {
			return $this->senderAddress;
		}		
		function getRecipientAddress() {
			return $this->recipientAddress;
		}
		
		
		function sendEmail() {
			
			$fromAddress = "From: " . $this->getSenderAddress();
			
			mail($this->getRecipientAddress(),
				 $this->getEmailSubject(),
				 $this->getEmailMessage(),
				$fromAddress
				);
				
			echo "<br><br><p>Message Sent </p><br><br>";
		}
		
		
	}


?>