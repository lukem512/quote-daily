<?php

/*
*
* Main site navigation and quote display
* Luke Mitchell, Nov. 2010
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Database files
require_once('inc/config/db.inc.php');
require_once('inc/quote_db_functions.inc.php');

//Functionality
require_once('inc/search_page_functions.inc.php');

//Get the search queries
$needle = "";
$haystack = "date";
if (isset($_GET['needle']) && isset($_GET['haystack']))
{
	$needle = mysql_real_escape_string($_GET['needle']);
	$haystack = mysql_real_escape_string($_GET['haystack']);
}

//Get the search type
$type = "simple";
if (isset($_GET['type']))
{
	if ($_GET['type'] == "full")
	{
		$type = "full";
	}
}

//and the current page
$page = FIRST_SEARCH_PAGE;

if (isset($_GET['page']))
{
	$page = mysql_real_escape_string($_GET['page']);
}

if ($page < FIRST_SEARCH_PAGE)
{
	$page = FIRST_SEARCH_PAGE;
}

//Get the result(s)
$num_quotes = NUM_QUOTES_PER_PAGE;

require_once('inc/content/get_search_results.php');
$quotes = SearchQuotes($needle, $haystack, $page, $num_quotes);
$count = CountQuotes($needle, $haystack);

//Display the page header
$pageTitle = "Quote Daily >> Search Quotes";
require_once('inc/content/header.php');

//Show the search bar

if (isset($_GET['type']))
{
	switch ($_GET['type'])
	{
		case "simple":
			require_once('inc/content/search_form_simple.php');
		break;
		
		case "full":
			require_once('inc/content/search_form_full.php');
		break;
		
		default:
			require_once('inc/content/search_form_simple.php');
		break;
	}
}
else
{
	require_once('inc/content/search_form_simple.php');
}

//Display the results, if any
require_once('inc/content/display_search_results.php');

// Display the adverts
require('inc/content/display_adverts.php');

//Display the page footer
require_once('inc/content/footer.php');

?>
