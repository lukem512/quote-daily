<?php

/*
*
* Removes an email address to the database
* Luke Mitchell, Mar. 2011
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Database connection
require_once('inc/config/db.inc.php');

//Database functions
require_once('inc/db_functions.inc.php');
require_once('inc/email_db_functions.inc.php');

function DisplayForm()
{
	//Display form
	require_once('inc/content/email_unsubscribe_form.php');
}

function DisplaySuccess()
{
	//Display success
	require_once('inc/content/email_unsubscribe_success.php');
}

$pageTitle = "Unsubscribe from mailing list";

require_once('inc/content/header.php');

//Is variable set?
if (isset($_GET['email']))
{
	$email = mysql_real_escape_string($_GET['email']);
	$result = GetEmail($email);

	//Verify email
	if ($result)
	{
		RemoveEmail($result['EID']);
		DisplaySuccess();
	}
	else
	{
		DisplayForm();
	}
}
else
{
	DisplayForm();
}

require_once('inc/content/footer.php');

?>