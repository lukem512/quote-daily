<?php

/*
*
* Edits or removes an email
* Luke Mitchell, Mar. 2011
*
*/

//Includes
require_once('../inc/config/config.inc.php');
require_once('../inc/config/db.inc.php');
require_once('../inc/email_db_functions.inc.php');
require_once('../inc/common_functions.inc.php');

function return_failure()
{
	Redirect("edit_email.php?message=failure");
	exit();
}

function return_success()
{
	Redirect("edit_email.php?message=success");
	exit();
}

function return_deleted_success()
{
	Redirect("edit_email.php?message=deleted");
	exit();
}

if (isset($_GET['edit_email_form_delete']) && isset($_GET['eid']))
{
	$eid = mysql_real_escape_string($_GET['eid']);
	RemoveEmail($eid);
	return_deleted_success();
}

if (isset($_GET['email']))
{
	$eid = mysql_real_escape_string($_GET['eid']);
	$email = mysql_real_escape_string($_GET['email']);
	
	if($_GET['email'] == "")
	{
		return_failure();
	}

	if (EditEmail($eid, $email))
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