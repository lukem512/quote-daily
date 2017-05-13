<?php

/*
*
* Adds an email address to the database
* Luke Mitchell, Jan. 2011
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Database connection
require_once('inc/config/db.inc.php');

//Database functions
require_once('inc/db_functions.inc.php');
require_once('inc/email_db_functions.inc.php');

//Utilities
require_once('inc/common_functions.inc.php');

//Is variable set?
if (isset($_POST['email']))
{
	//Check for valid email
	if(IsValidEmail($_POST['email']))
	{
		$email = mysql_real_escape_string($_POST['email']);

		if (AddEmail($email))
		{
			Redirect(BASE_URL . APP_DIR . "index.php?result=success");
			exit();
		}
	}
}

Redirect(BASE_URL . APP_DIR . "index.php?result=failure");

?>