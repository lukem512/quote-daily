<?php

/*
*
* Displays a particular quote, in detail
* Luke Mitchell, Dec. 2010
*
* 02/02/11 - No longer returns a blank $quote array if $qid isn't set
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Database connection
require_once('inc/config/db.inc.php');

//Database functions
require_once('inc/db_functions.inc.php');
require_once('inc/quote_db_functions.inc.php');

//Quote to display
if (isset($_GET['qid']))
{
	$qid = mysql_real_escape_string($_GET['qid']);
	$quote = GetQuoteByID($qid);
}

//Display the page header
if (isset($quote))
{
	if ($quote)
	{
		$pageTitle = "Quote Daily >> " . $quote['QUOTE'] . " - ". $quote['AUTHOR'];
		$Facebook_Title = $quote['QUOTE'] . " - ". $quote['AUTHOR'];
	}
	else
	{
		$pageTitle = "Quote Daily >> Detailed view";
	}
}

require_once('inc/content/header.php');

//TODO - possible display when the quote was added and if it has been displayed?

//TODO - link to author's google search?

require('inc/content/display_quote.php');
require('inc/content/display_quote_comments.php');
require('inc/content/display_quote_sharing.php');

// Display the adverts
require_once('inc/content/display_adverts.php');

//Display the page footer
require_once('inc/content/footer.php');

?>