<?php

/*
*
* Date functions using the DB
* Luke Mitchell, May. 2011
*
*/

// Designate a QOTD
function SpecifyQuoteOfTheDay($qid)
{
	$fields = array("DISPLAY_DATE", "QID");
	$values = array(date("Y-m-d"), $qid);
	return AddRowToTable("DATES", $fields, $values);
}

?>
