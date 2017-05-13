<?php

/*
*
* Script for emailing everyone on the list
* Luke Mitchell, Mar. 2011
*
*/

// Includes
require_once('../../inc/config/db.inc.php');
require_once('inc/db_functions.inc.php');
require_once('inc/email_functions.inc.php');

// Format email headers
$headers = 'From: "Quote Daily" <quote@quote-daily.com>' . PHP_EOL .
           'X-Mailer: PHP-' . phpversion() . PHP_EOL;
		   
// Format email message
$subject = "Your quote, daily!";
$message = "";

// Send to everyone on list
$to = ""; //CSV

// Send
mail ($to, $subject, $message, $headers)
	or die ("Email was not successfully sent. Please check the mail server logs.");

?>