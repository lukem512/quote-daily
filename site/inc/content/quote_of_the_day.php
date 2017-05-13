<?php

/*
*
* Displays the quote for the day
* Luke Mitchell, Nov. 2010
*
*/

$quote = GetTodaysQuote();

if (!isset($quote['QUOTE']))
{
	unset($quote);
}

//Display the quote
require_once('inc/content/display_quote.php');
?>