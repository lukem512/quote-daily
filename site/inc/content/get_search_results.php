<?php

/*
*
* Retrieves results for the search page
* Luke Mitchell, Jan. 2011
*
*/

require_once('inc/search_page_functions.inc.php');

function SearchQuotes($needle, $haystack, $page, $num_quotes)
{
	$quotes = null;

	if ($needle == "%")
	{
		$quotes = GetQuotes(PageToStart($page, $num_quotes), $num_quotes);
	}
	else
	{	
		switch ($haystack)
		{
			case "date":
				$date_quote = GetQuoteByDate($needle);
				
				if ($date_quote)
				{
					$quotes = array($date_quote);
				}
			break;
			
			case "author":
				$quotes = SearchQuotesByAuthor($needle, PageToStart($page, $num_quotes), $num_quotes);
			break;
			
			case "quote":
				$quotes = GetQuotesContainingString($needle, PageToStart($page, $num_quotes), $num_quotes);
			break;
			
			case "all":
			default: // fall through to default				
				$quotes = SearchQuotesAllFields($needle, PageToStart($page, $num_quotes), $num_quotes);
			break;
		}
	}
	
	return $quotes;
}

function CountQuotes($needle, $haystack)
{
	$count = 0;
	
	if ($needle == "%")
	{
		$count = count(GetAllQuotes());
	}
	else
	{	
		switch ($haystack)
		{
			case "date":
				$count = count(GetQuoteByDate($needle));
			break;
			
			case "author":
				$count = count(GetAllQuotesByAuthor($needle));
			break;
			
			case "quote":
				$count = CountQuotesContainingString($needle);
			break;
			
			case "all":
			default: // fall through to default	
				$count = CountQuotesAllFields($needle);
			break;
		}
	}
	
	return $count;
}

?>