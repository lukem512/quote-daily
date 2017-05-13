<?php

/*
*
* Common functions; general-purpose utilities
* Luke Mitchell, Feb. 2011
*
* May: added SendEmail functionality
*
*/

function IsValidEmail($email)
{
	//TODO - check for valid DNS
	if(filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function Redirect($url)
{
	header("location:".$url);
}

?>