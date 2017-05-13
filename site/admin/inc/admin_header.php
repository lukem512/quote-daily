<?php

/*
*
* Admin panel header
* Luke Mitchell, Dec. 2010
*
*/

if(!isset($pageTitle))
{
	$pageTitle = "";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $pageTitle . " | Administration Panel"; ?></title>
<link href="<?php echo BASE_URL . APP_DIR; ?>style/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL . APP_DIR; ?>admin/style/admin.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL . APP_DIR; ?>favicon.ico">
</head>
<body>
<div id="header">
	<a href="<?php echo BASE_URL . APP_DIR; ?>admin/"><img src="<?php echo BASE_URL . APP_DIR; ?>img/logo.png" /></a>
	<div id="menu">	
		<a href="<?php echo BASE_URL . APP_DIR; ?>">Home</a><a href="index.php">Overview</a><a href="admin_quotes_page.php">Quotes</a><a href="admin_email_page.php">Emails</a><a target="_blank" href="stats.php">Stats</a>
	</div>
</div>
