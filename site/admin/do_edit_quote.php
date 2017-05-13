<?php

/*
*
* Edits or removes a quote
* Luke Mitchell, Mar. 2011
*
*/

//Includes
require_once('../inc/config/config.inc.php');
require_once('../inc/config/db.inc.php');
require_once('../inc/quote_db_functions.inc.php');
require_once('../inc/common_functions.inc.php');

function return_failure()
{
	Redirect("edit_quote.php?message=failure");
	exit();
}

function return_success()
{
	Redirect("edit_quote.php?message=success");
	exit();
}

function return_deleted_success()
{
	Redirect("edit_quote.php?message=deleted");
	exit();
}

if (isset($_GET['edit_quote_form_delete']) && isset($_GET['qid']))
{
	$qid = mysql_real_escape_string($_GET['qid']);
	RemoveQuote($qid);
	return_deleted_success();
}

if (isset($_GET['quote']) && isset($_GET['author']) && isset($_GET['comments']) && isset($_GET['qid']))
{
	$qid = mysql_real_escape_string($_GET['qid']);
	$quote = mysql_real_escape_string($_GET['quote']);
	$author = mysql_real_escape_string($_GET['author']);
	$comments = mysql_real_escape_string($_GET['comments']);
	
	if(($_GET['quote'] == "") || ($_GET['author'] == ""))
	{
		return_failure();
	}

	if (EditQuote($qid, $author, $quote, $comments))
	{
		//Success!
		echo "Added.";
	}
	else
	{
		//Failure
		echo "Error: " . mysql_error();
		exit();	
	}
}
else
{
	return_failure();
}

return_success();

?>