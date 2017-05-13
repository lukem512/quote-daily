<?php

/*
*
* Displays the previous five days quotes in RSS
* Luke Mitchell, Nov. 2010
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Database file
require_once('inc/config/db.inc.php');

//Quote functions
require_once('inc/quote_db_functions.inc.php');

$RssTitle = "QuoteDaily RSS Feed";
$RssLink = BASE_URL . APP_DIR;
$RssDescription = "Providing you with a great quote, daily!";
$RssCopyright = "2010 QuoteDaily. Quotes may be used without express permission.";
$RssLanguage = "en-gb";

function DisplayQuoteRSS($date, $link, $quote, $author)
{
	$quote_date = $date;
	$quote_link = $link;
	$quote_body = $quote;
	$quote_author = $author;
	require("inc/content/display_rss.php");
}

?>
<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>"; ?>
<?php echo "<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">"; ?>

<channel>
	<title><?php echo $RssTitle; ?></title>
	<link><?php echo $RssLink; ?></link>
	<description><?php echo $RssDescription; ?></description>
	<copyright><?php echo $RssCopyright; ?></copyright>
	<language><?php echo $RssLanguage; ?></language>
	<atom:link href="<?php echo BASE_URL . APP_DIR; ?>rss.php" rel="self" type="application/rss+xml" />

	<?php
		//Display the quotes for the last five days
		$rows = array();
		$rows = GetNDisplayedQuotes(0, 5, true);
		
		foreach ($rows as $row)
		{
			DisplayQuoteRSS($row['DISPLAY_DATE'], $RssLink . "quote.php?qid=" . $row['QID'], $row['QUOTE'], $row['AUTHOR']);
		}
	?>
</channel>
</rss>

