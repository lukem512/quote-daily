<?php

/*
*
* Functionality provided by Digg
* Luke Mitchell, Mar. 2011
*
*
*/

define ("DIGG_DESCRIPTION_MAX_LENGTH", 350);

function Digg_DisplayDiggButton($url, $title, $description = "")
{
	//For JS users...
	
	echo "<a class=\"DiggThisButton DiggCompact\" href=\"http://digg.com/submit?url=" . urlencode($url) . "&title=" . urlencode($title) . "\">";
	
	if ($description != "")
	{
		echo "<span style=\"display:none\">" . substr($description, 0, DIGG_DESCRIPTION_MAX_LENGTH) . "</span>";
	}
	
	echo "</a>";
	
	//For non-JS users...
	
	echo "<noscript>";
	
	if ($description != "")
	{
		echo "<a href=\"http://digg.com/submit?url=" . urlencode($url) . "&bodytext=" . urlencode($description) . ">";
	}
	else
	{
		echo "<a href=\"http://digg.com/submit?url=" . urlencode($url) . ">";
	}
	
	echo "<img src=\"http://developers.diggstatic.com/sites/all/themes/about/img/digg-btn.jpg\" alt=\"Digg Button\" title=\"Digg Button\" width=\"86\" height=\"120\" class=\"thumbnail-digg-btn\" /></a>";
	echo "</noscript>";
}

?>