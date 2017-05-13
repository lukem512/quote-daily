<?php

/*
*
* Displays results for the search page
* Luke Mitchell, Jan. 2011
*
*/

//Display pages and numbers
require_once('inc/content/display_search_pages.php');
require_once('inc/search_page_functions.inc.php');

$quote_count = count($quotes);

if ($count >= NUM_QUOTES_PER_PAGE)
{
		DisplaySearchPages($page, $num_quotes, $quote_count, $count, true);
}

//Display all quotes in $quotes
//we're starting at 1 so that the modulo operation works correctly
for ($i = 1; $i <= $quote_count; $i++)
{
	$quote = $quotes[$i - 1];
	require('inc/content/display_quote.php');
	
	// Display an advert if the correct number of results have been displayed
	if (($i % NUM_RESULTS_BETWEEN_ADVERTS) == 0)
	{
		// Display an advert
		require('inc/content/display_adverts.php');
	}	
}

//Display error?
if ($needle != "")
{
	if ($quote_count <= 0)
	{
		require_once('inc/content/no_results.php');
	}
}

//Display pages
if ($count >= NUM_QUOTES_PER_PAGE)
{
	DisplaySearchPages($page, $num_quotes, $quote_count, $count);
}

?>
