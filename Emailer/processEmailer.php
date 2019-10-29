<?php

	include 'Emailer.php'; //get the class file
	
	$customerMail = new Emailer(); //instantiate a new object from Emailer class
	
	$customerMail->setRecipientAddress("dkwolford@dmacc.edu");
	
	$customerMail->setSenderAddress("contact@daltonwolford.com");
	
	$customerMail->setEmailMessage("Message");
	
	$customerMail->setEmailSubject("Subject");
	
	$customerMail->sendEmail(); //Send the email
	
	
?>
<!DOCTYPE html>
<head>
<title></title>
</head>

<body>

	<h1>WDV341 Intro PHP</h1>
	<h2>Test Emailer Class</h2>

	<p>Recipient Address: <?php echo $customerMail->getRecipientAddress(); ?></p>
	<p>Sender Address: <?php echo $customerMail->getSenderAddress(); ?></p>
	<p>Email Message: <?php echo $customerMail->getEmailMessage(); ?></p>
	<p>Email Subject: <?php echo $customerMail->getEmailSubject(); ?></p>
	
</body>
</html>