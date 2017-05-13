<?php

/*
*
* Adds a quote to the database
* Luke Mitchell, Dec. 2010
*
*/

//TODO: VALIDATION

//Includes
require_once('../inc/config/config.inc.php');
require_once('../inc/config/db.inc.php');
require_once('../inc/quote_db_functions.inc.php');
require_once('../inc/common_functions.inc.php');

function return_failure()
{
	Redirect("add_quote.php?message=failure");
	exit();
}

function return_success()
{
	Redirect("add_quote.php?message=success");
	exit();
}

if (isset($_GET['quote']) && isset($_GET['author']) && isset($_GET['comments']))
{
	$quote = mysql_real_escape_string($_GET['quote']);
	$author = mysql_real_escape_string($_GET['author']);
	$comments = mysql_real_escape_string($_GET['comments']);

	if(($_GET['quote'] == "") || ($_GET['author'] == ""))
	{
		return_failure();
	}

	if (AddQuote($author, $quote, $comments))
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