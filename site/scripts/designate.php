<?php

/*
*
* Script to designate a quote for the day
* Luke Mitchell, May 2011
*
*/

// Database files
require_once('../inc/config/db.inc.php');
require_once('../inc/quote_db_functions.inc.php');
require_once('../inc/date_db_functions.inc.php');

// Common
require_once('../inc/common_functions.inc.php');

// Ensure today doesn't already have a quote
if (GetTodaysQuote() == null)
{
	echo "Attempting to retrieve a new daily quote... ";

	// Pick a random quote that hasn't already been QOTD
	$quote = DailyLottery();	

	echo "success!<br />";

	// Designate that quote QOTD
	SpecifyQuoteOfTheDay($quote['QID']);

	echo "The quote has now been specified as the Daily Quote!";
}
else
{
	// Redirect to home page
	Redirect(BASE_URL . APP_DIR);
}

?>
