<?php

/*
*
* Script to email the quote of the day
* Luke Mitchell, May 2011
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

// ---------- Script functionality ---------

define ("EMAIL_DATE_FILE", "email.date");

define ("EMAIL_SENDER", '"Quote Daily" <quote@quote-daily.com>');
define ("EMAIL_SUBJECT", 'The daily quote');

function GetTodaysDate()
{
	return date("Y-m-d");
}

function HasEmailBeenSent()
{
	// Return value
	$sent = false;

	// Check email date file exists
	if (file_exists(EMAIL_DATE_FILE))
	{
		// Open it
		$handle = fopen(EMAIL_DATE_FILE, "r");
	
		// Compare contents with todays date
		$contents = fread($handle, filesize(EMAIL_DATE_FILE));

		if ($contents == GetTodaysDate())
		{
			$sent = true;
		}
		else
		{
			$sent = false;
		}

		// Close it
		fclose($handle);
	}

	return $sent;
}

function UpdateEmailDateFile()
{
	// Write the date into the email date file
	
	// Open the file, or create it if it doesn't exist
	$handle = fopen(EMAIL_DATE_FILE, "w");

	// Write the date
	fwrite($handle, GetTodaysDate());

	// Close the file
	fclose ($handle);
}

function SendEmails()
{
	$emails = GetAllEmails();
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
	$content .= "<br />";
	$content .= "<p style=\"font-size: 0.7em; text-align: center; width: 100%; margin-left: auto; margin-right: auto;\">This quote was brought to you by <a href=\"" . BASE_URL . APP_DIR . "\" style=\"text-decoration: none; font-weight: bold; color: black;\">Quote-Daily.com</a><br />";
	$content .= "<a href=\"" . BASE_URL . APP_DIR . "quote.php?qid=" . $quote['QID'] . "\" style=\"text-decoration: none; font-weight: bold; color: black;\">View in browser</a> | ";
	$content .= "<a href=\"" . BASE_URL . APP_DIR . "unsubscribe.php\" style=\"text-decoration: none; font-weight: bold; color: black;\">Unsubscribe</a></p>";
	$content .= "</div>";
	$content .= "</body>";
	$content .= "</html>";
	
	foreach ($emails as $email)
	{	
		// Send the email
		SendEmail($email['EMAIL'], EMAIL_SENDER, EMAIL_SUBJECT, $content);
	}
}

/* ---------- Script body ---------- */

// Ensure todays email hasnt already been sent
if (HasEmailBeenSent())
{
	// If so, do nothing
	Redirect(BASE_URL . APP_DIR);
}
else
{
	// If not, send it!
	SendEmails();
	echo "Emails sent!<br />";

	// Update the date file
	UpdateEmailDateFile();
	echo "Logged!";
}

?>
