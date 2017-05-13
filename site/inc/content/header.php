<?php

/*
*
* Website header
* Luke Mitchell, Nov. 2010
*
*/

require_once('inc/config/config.inc.php');
require_once('inc/config/meta.inc.php');

if(!isset($pageTitle))
{
	$pageTitle = "Quote Daily";
}

if(!isset($Facebook_Title))
{
	$Facebook_Title = $pageTitle;
}

$pagename = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.1//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-2.dtd">
<html
	xmlns="http://www.w3.org/1999/xhtml"
	xml:lang="en"
	lang="en"
	xmlns:addthis="http://www.addthis.com/help/api-spec"
	xmlns:og="http://ogp.me/ns#">
<head>
<title><?php echo $pageTitle; ?></title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<link href="style/adverts.css" rel="stylesheet" type="text/css" />
<link href="style/quote.css" rel="stylesheet" type="text/css" />
<link href="style/search.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="Quote Daily RSS Feed" href="rss.php" />
<meta name="title" content="<?php echo $pageTitle; ?>" />
<meta name="description" content="<?php echo WEBSITE_DESCRIPTION; ?>" />
<meta name="keywords" content="<?php echo WEBSITE_KEYWORDS; ?>" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<!-- IE standards view -->
<meta http-equiv="X-UA-Compatible" value="IE=edge" />
<!-- Facebook Open Graph tags -->
<meta property="og:site_name" content="<?php echo WEBSITE_NAME; ?>" />
<meta property="og:image" content="<?php echo BASE_URL . APP_DIR; ?>img/logo-block.png" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo BASE_URL . $_SERVER['PHP_SELF']; ?>" />
<meta property="og:title" content="<?php echo $Facebook_Title; ?>" />
<!-- End Facebook OG tags -->
<!-- AddThis parameters -->
<script type="text/javascript">
	var addthis_config =
	{
		ui_508_compliant: true;
		ui_delay: 200;
	};

	var addthis_share =
	{
		title: <?php echo WEBSITE_NAME; ?>;
		url: <?php echo BASE_URL . APP_DIR; ?>;
		description: <?php echo WEBSITE_DESCRIPTION; ?>;
	};
</script>
<!-- End AddThis parameters -->
</head>
<body>
<!-- AddThis Button BEGIN -->
<div class="content-sharing-float">
	<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
		<a class="addthis_button_compact" addthis:ui_delay="200"></a>
	</div>
	<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d7cf7eb7877d3b1"></script>
</div>
<!-- AddThis Button END -->
<div id="header">
	<a href="<?php echo BASE_URL . APP_DIR; ?>"><img src="img/logo.png" alt="Quote Daily" /></a>
	<div id="menu">	
		<a href="index.php" <?php if($pagename == "index.php"){ echo "style=\"color: black;\""; } ?>>Home</a>
		<a href="random.php" <?php if($pagename == "random.php"){ echo "style=\"color: black;\""; } ?>>Random</a>
		<a href="search.php" <?php if($pagename == "search.php"){ echo "style=\"color: black;\""; } ?>>Search</a>
		<a href="rss.php" rel="external">RSS</a>
	</div>
</div>