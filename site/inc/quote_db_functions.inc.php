<?php

/*
*
* Quote functions using the DB
* Luke Mitchell, Nov. 2010
*
*/

require_once('db_functions.inc.php');

function RandomQuote()
{
	return GetRandomRowFromTableFast("QUOTES", "QID");
}

function GetAllQuotesByAuthor($author)
{
	return SearchTable("QUOTES", "AUTHOR", $author);
}

function GetQuotesByAuthor($author, $start, $n)
{
	return GetNResultsByField("QUOTES", "AUTHOR", $start, $n, "QID");
}

function SearchQuotesByAuthor($author, $start, $n)
{
	return GetNResultsSearch("QUOTES", "AUTHOR", $author, $start, $n, "QID");
}

function GetAllQuotesContainingString($str)
{
	return SearchTable("QUOTES", "QUOTE", $str);
}

function GetQuotesContainingString($str, $start, $n)
{
	return GetNResultsSearch("QUOTES", "QUOTE", $str, $start, $n, "QID");
}

function CountQuotesContainingString($str)
{
	$count = count(GetAllQuotesContainingString($str));
}

function GetQuoteByID($qid)
{
	return GetFirstRowFromTable("QUOTES", "QID", $qid);
}

function GetQuoteByDate($date)
{
	$dateArray = GetFirstRowFromTable("DATES", "DISPLAY_DATE", $date);
	
	if (count($dateArray) == 0)
	{
		$qid = "0";
	}
	else
	{
		$qid = $dateArray['QID'];
	}

	return GetFirstRowFromTable("QUOTES", "QID", $qid);
}

function GetTodaysQuote()
{
	$date = date("Y-m-d");
	return GetQuoteByDate($date);
}

// Searches ALL the fields
function SearchQuotesAllFields($str, $start, $n)
{
	$date_quote = GetQuoteByDate($str);
	
	if ($date_quote)
	{
		return array_merge(array($date_quote),
						SearchQuotesByAuthor($str, $start, $n),
						GetQuotesContainingString($str, $start, $n));
	}
	else
	{
		return array_merge(SearchQuotesByAuthor($str, $start, $n),
						GetQuotesContainingString($str, $start, $n));
	}
}

function GetQuotesAllFields($str)
{
	$date_quote = GetQuoteByDate($str);
	
	if ($date_quote)
	{
		return array_merge(array($date_quote),
						GetAllQuotesByAuthor($str),
						GetAllQuotesContainingString($str));
	}
	else
	{
		return array_merge(GetAllQuotesByAuthor($str),
						GetAllQuotesContainingString($str));
	}
}


function CountQuotesAllFields($str)
{
	$count = count(GetQuotesAllFields($str));
	return $count;
}

function GetAllQuotes()
{
	return GetAllRowsFromTable("QUOTES");
}

function GetQuotes($start, $n)
{
	return GetNResultsByField("QUOTES", $start, $n, "QID");
}

function AddQuote($author, $quote, $comments = "")
{
	if ($comments != "")
	{
		$fieldArray = array("QUOTE", "AUTHOR", "COMMENTS");
		$valueArray = array($quote, $author, $comments);
	}
	else
	{
		$fieldArray = array("QUOTE", "AUTHOR");
		$valueArray = array($quote, $author);
	}

	return AddRowToTable("QUOTES", $fieldArray, $valueArray);
}

function EditQuote($qid, $author, $quote, $comments = "")
{
	$fieldArray = array("QUOTE", "AUTHOR", "COMMENTS");
	$valueArray = array($quote, $author, $comments);
	
	return EditRowFromTable("QUOTES", "QID", $qid, $fieldArray, $valueArray); 
}

function RemoveQuote($qid)
{
	return DeleteRowsFromTable("QUOTES", "QID", $qid);
}

function GetNDisplayedQuotes($start, $end, $desc = false)
{
	$rows = array();
	
	$qry = "SELECT QUOTES.*, DATES.DISPLAY_DATE FROM QUOTES, DATES WHERE QUOTES.QID = DATES.QID ORDER BY DATES.DISPLAY_DATE ";
	
	if ($desc)
		$qry .= "DESC ";
		
	$qry .= "LIMIT " . $start . "," . $end;
	
	$result = mysql_query($qry);
	
	while ($row = mysql_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	
	return $rows;
}

function GetAllDisplayedQuotes($desc = false)
{
	$rows = array();
	
	$qry = "SELECT QUOTES.*, DATES.DISPLAY_DATE FROM QUOTES, DATES WHERE QUOTES.QID = DATES.QID ORDER BY DATES.DISPLAY_DATE ";
	
	if ($desc)
		$qry .= "DESC ";
	
	$result = mysql_query($qry);
	
	while ($row = mysql_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	
	return $rows;
}

// Randomly selects a quote that hasn't been displayed
function DailyLottery()
{
	$qry = "SELECT * FROM `QUOTES` WHERE `QID` NOT IN(SELECT `QID` FROM `DATES`) ORDER BY RAND() LIMIT 1";
	
	$result = mysql_query($qry);

	return mysql_fetch_assoc($result);
}

?>
