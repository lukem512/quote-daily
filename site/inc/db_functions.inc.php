<?php

/*
*
* Database functions; data-access layer
* Luke Mitchell, Dec. 2010
*
*/

function GetNResultsByField($table, $start, $n, $fieldToOrder, $desc = false)
{
	return GetNResultsSearch ($table, 1, 1, $start, $n, $fieldToOrder, $desc);
}

function GetNResultsSearch($table, $field, $search, $start, $n, $fieldToOrder, $desc = false)
{
	$qry = "SELECT * FROM " . $table . " WHERE " . $field . " LIKE '%" . $search . "%' ORDER BY " . $fieldToOrder;
	
	// descending?
	if ($desc)
		$qry .= " DESC";
		
	// add limits
	$qry .= " LIMIT " . $start . "," . $n;
	
	$result = mysql_query($qry);
	
	$rows = array();

	while ($row = mysql_fetch_assoc($result))
	{
		$rows[] = $row;
	}

	mysql_free_result($result);

	return $rows;
}

function SearchTable($table, $field, $search)
{
	$qry = "SELECT * FROM " . $table . " WHERE " . $field . " LIKE '%" . $search . "%'";
	$result = mysql_query($qry);
	
	$rows = array();

	while ($row = mysql_fetch_assoc($result))
	{
		$rows[] = $row;
	}

	mysql_free_result($result);

	return $rows;
}

function CountRows($table, $field, $search)
{
	$qry = "SELECT COUNT(" . $field . ") FROM " . $table . " WHERE " . $field . "='%" . $search ."%'";
	$result = mysql_query($qry);
	$row = mysql_fetch_assoc($result);
	
	return $row['COUNT(' .$field. ')'];
}

function GetRandomRowsFromTable($table, $n)
{
	$qry = "SELECT * FROM " . $table . " ORDER BY RAND() LIMIT 0, " . $n;
	$result = mysql_query($qry);

	$rows = array();

	while ($row = mysql_fetch_assoc($result))
	{
		$rows[] = $row;
	}

	mysql_free_result($result);

	return $rows;
}

function GetRandomRowFast($table, $column) {
	$max_sql = "SELECT max(`" . $column . "`) 
               AS `max_id`
               FROM `" . $table . "`";

	$max_row = mysql_fetch_array(mysql_query($max_sql));

    $random_number = mt_rand(1, $max_row['max_id']);

    $random_sql = "SELECT * FROM `" . $table . "`
				  WHERE `" . $column . "` >= " . $random_number . " 
                  ORDER BY `" . $column . "` ASC
                  LIMIT 1";

    $random_row = mysql_fetch_assoc(mysql_query($random_sql));

    if (!is_array($random_row)) {
        $random_sql = "SELECT * FROM " . $table . "
                      WHERE " . $column . " < " . $random_number . " 
                      ORDER BY " . $column . " DESC
                      LIMIT 1";
						 
        $random_row = mysql_fetch_assoc(mysql_query($random_sql));
    }

    return $random_row;
}

function GetRandomRowsFromTableFast($table, $idcol, $n)
{
	$rows = array();

	for ($i=0; $i < $n; $i++)
	{
		$rows[] = GetRandomRowFast($table, $idcol);
	}

	return $rows;
}

function GetRandomRowFromTable($table)
{
	$rows = GetRandomRowsFromTable($table, 1);

	//Return just the assoc. array
	return $rows[0];
}

function GetRandomRowFromTableFast($table, $idcol)
{
	$rows = GetRandomRowsFromTableFast($table, $idcol, 1);

	//Return just the assoc. array
	return $rows[0];
}

function GetAllRowsFromTable($table)
{
	return GetRowsFromTable($table, 1, 1);
}

function GetRowsFromTable($table, $field, $criteria)
{
	$qry = "SELECT * FROM " . $table . " WHERE " . $field . " = '" . $criteria . "'";
	$result = mysql_query($qry) or die(mysql_error());

	//Multiple rows?
	if (mysql_num_rows($result) == 1)
	{
		$row = mysql_fetch_assoc($result);
		
		mysql_free_result($result);

		return $row;
	}
	else
	{
		$rows = array();

		while ($row = mysql_fetch_assoc($result))
		{
			$rows[] = $row;
		}

		mysql_free_result($result);

		return $rows;
	}
}

function GetFirstRowFromTable($table, $field, $criteria)
{
	$rows = GetRowsFromTable($table, $field, $criteria);
	
	return $rows;
}

function AddRowToTable($table, $fieldArray, $valueArray)
{
	$fieldString = "";
	$valueString = "";

	// Create the field string
	foreach ($fieldArray as $key => $val)
	{
		$fieldString .= $val;
		$fieldString .= ",";
	}

	// Remove the rougue final comma
	$fieldString = substr($fieldString, 0, strlen($fieldString) - 1);

	// Create the value string
	foreach ($valueArray as $key => $val)
	{
		$valueString .= "\"" . $val . "\"";
		$valueString .= ",";
	}

	// Remove the rougue final comma
	$valueString = substr($valueString, 0, strlen($valueString) - 1);

	$qry = "INSERT INTO " . $table . " (" . $fieldString . ") VALUES (" . $valueString . ")";
	$result = mysql_query($qry) or die (mysql_error());

	if ($result)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function DeleteRowsFromTable($table, $field, $criteria)
{
	$qry = "DELETE FROM " . $table . " WHERE " . $field . " = '" . $criteria . "'";
	$result = mysql_query($qry) or die (mysql_error());
}

function EditRowFromTable($table, $field, $criteria, $fieldArray, $valueArray)
{
	$fieldValueString = "";

	// Create the field string
	foreach ($fieldArray as $key => $fVal)
	{
		$vVal = $valueArray[$key];
		$fieldValueString .= $fVal . "=\"" . $vVal . "\"";
		$fieldValueString .= ",";
	}

	// Remove the rougue final comma
	$fieldValueString = substr($fieldValueString, 0, strlen($fieldValueString) - 1);
	
	// The query
	$qry = "UPDATE " . $table . " SET " . $fieldValueString . " WHERE " . $field . " = '" . $criteria . "'";
	echo $qry;
	$result = mysql_query($qry) or die (mysql_error());
	
	if ($result)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

?>