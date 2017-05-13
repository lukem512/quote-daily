<?php

/*
*
* Main site navigation and quote display
* Luke Mitchell, Nov. 2010
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Database files
require_once('inc/config/db.inc.php');
require_once('inc/quote_db_functions.inc.php');

//Display the page header
require_once('inc/content/header.php');

//Display the quote
require_once('inc/content/quote_of_the_day.php');

//Display the daily email form
require_once('inc/content/email_form.php');

// Display the adverts
require_once('inc/content/display_adverts.php');

//Display the page footer
require_once('inc/content/footer.php');

?>