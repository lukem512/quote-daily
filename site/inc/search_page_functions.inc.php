<?php

/*
*
* Search page functions to ensure the number starts at one
* Luke Mitchell, Feb. 2011
*
*/

define("NUM_SEARCH_PAGES", 10);
define("FIRST_SEARCH_PAGE", 1);
define("NUM_QUOTES_PER_PAGE", 5);
define("NUM_RESULTS_BETWEEN_ADVERTS", 3);

function StartToPage($start, $num_quotes)
{
	$page++;
	return ($num_quotes / $page);
}

function PageToStart($page, $num_quotes)
{
	$page--;
	return ($page * $num_quotes);
}

?>
