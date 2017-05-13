<?php

/*
*
* Adds an email to the database
* Luke Mitchell, Feb. 2011
*
*/

//Includes
require_once('../inc/config/config.inc.php');
require_once('../inc/config/db.inc.php');
require_once('../inc/email_db_functions.inc.php');
require_once('../inc/common_functions.inc.php');

function return_failure()
{
	Redirect("add_email.php?message=failure");
	exit();
}

function return_success()
{
	Redirect("add_email.php?message=success");
	exit();
}

if (isset($_GET['email']))
{
	if (IsValidEmail($_GET['email']))
	{
		$email = mysql_real_escape_string($_GET['email']);
		if (!AddEmail($email))
		{
			return_failure();
		}
	}
	else
	{
		return_failure();
	}
}
else
{
	return_failure();
}

return_success();

?>