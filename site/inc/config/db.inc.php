<?php

/*
*
* Database access and connection
* This should be placed in a protected folder
* Luke Mitchell, Nov. 2010
*
*/

//VARS
$DBNAME = "QUOTES";
$DBUSER = "root";
$DBPASS = "";
$DBHOST = "localhost";

//Open a persistent connection
$DBC = mysql_pconnect($DBHOST,$DBUSER,$DBPASS);

if (!$DBC) {
    die('Could not connect: ' . mysql_error());
}

//Select the QUOTES DB
mysql_select_db($DBNAME,$DBC);
?>