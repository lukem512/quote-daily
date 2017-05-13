<?php

/*
*
* Email functions using the DB
* Luke Mitchell, Nov. 2010
*
*/

require_once('db_functions.inc.php');

function RandomEmail()
{
	return GetRandomRowFromTable("EMAILS");
}

function GetEmailsContainingString($str)
{
	return SearchTable("EMAILS", "EMAIL", $str);
}

function GetEmailByID($eid)
{
	return GetFirstRowFromTable("EMAILS", "EID", $eid);
}

function GetEmail($email)
{
	return GetFirstRowFromTable("EMAILS", "EMAIL", $email);
}

function GetEmailsByDate($date)
{
	return GetRowsFromTable("EMAILS", "DATE", $date);
}

function GetAllEmails()
{
	return GetAllRowsFromTable("EMAILS");
}

function AddEmail($email)
{
	if ($email != "")
	{
		$fieldArray = array("EMAIL", "DATE");
		$valueArray = array($email, date("Y-m-d"));
		return AddRowToTable("EMAILS", $fieldArray, $valueArray);
	}
	
	return FALSE;
}

function EditEmail($eid, $email)
{
	$fieldArray = array("EMAIL");
	$valueArray = array($email);
	
	return EditRowFromTable("EMAILS", "EID", $eid, $fieldArray, $valueArray); 
}

function RemoveEmail($eid)
{
	return DeleteRowsFromTable("EMAILS", "EID", $eid);
}

?>