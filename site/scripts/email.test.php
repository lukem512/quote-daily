<?php

/*
*
* Test for email.php
* May 2011
*
*/

// Config
require_once('../inc/config/config.inc.php');

// Email
require_once("../inc/email/smtp.php");
require_once("../inc/email/sasl.php");
require_once('../inc/send_email.inc.php');

// Database
require_once('../inc/config/db.inc.php');
require_once('../inc/db_functions.inc.php');
require_once('../inc/email_db_functions.inc.php');
require_once('../inc/quote_db_functions.inc.php');

define ("EMAIL_SENDER", '"Quote Daily" <quote@quote-daily.com>');
define ("EMAIL_SUBJECT", 'The daily quote');

//$emails = GetAllEmails();
$emails = array("test@quote-daily.com", "lukem95@gmail.com", "luke.mitchell@cambridgeconsultants.com");
$quote = GetTodaysQuote();
	
// Construct the email
// The format is HTML
$content .= "<html>";
$content .= "<body>";
$content .= "<div>";
$content .= "<p>";
$content .= "<span>\"" . $quote['QUOTE'] . "\"</span><br /><br />";
$content .= " - <span style=\"font-weight: bold;\">" . $quote['AUTHOR'] . "</span><br />";
$content .= "</p>";
$content .= "<p style=\"font-size: 0.7em; text-align: center; width: 100%; margin-left: auto; margin-right: auto;\">This quote was brought to you by <a href=\"" . BASE_URL . APP_DIR . "\" style=\"text-decoration: none; font-weight: bold; color: black;\">Quote-Daily.com</a><br />";
$content .= "<a href=\"" . BASE_URL . APP_DIR . "quote.php?qid=" . $quote['QID'] . "\" style=\"text-decoration: none; font-weight: bold; color: black;\">View in browser</a> | ";
$content .= "<a href=\"" . BASE_URL . APP_DIR . "unsubscribe.php\" style=\"text-decoration: none; font-weight: bold; color: black;\">Unsubscribe</a></p>";
$content .= "</div>";
$content .= "</body>";
$content .= "</html>";
	
foreach ($emails as $email)
{	
	// Send the email
	SendEmail($email, EMAIL_SENDER, EMAIL_SUBJECT, $content);
}