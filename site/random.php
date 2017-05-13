<?php

/*
*
* Main site navigation and quote display
* Luke Mitchell, Nov. 2010
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Database file
require_once('inc/config/db.inc.php');

//Quote functions
require_once('inc/quote_db_functions.inc.php');

//Display the page header
$pageTitle = "Quote Daily >> Random Quote";
require_once('inc/content/header.php');

//Display the quote
require_once('inc/content/random_quote.php');

// Display the adverts
require_once('inc/content/display_adverts.php');

//Display the page footer
require_once('inc/content/footer.php');

?>