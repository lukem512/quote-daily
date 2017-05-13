<?php

/*
*
* Functionality provided by Delicious
* Luke Mitchell, Mar. 2011
*
*
*/

function Delicious_DisplayDeliciousUponButton($url, $title)
{
	$javascript = "window.open('http://www.delicious.com/save?v=5&noui&jump=close&url=" . urlencode($url) . "&title=" . urlencode($title) . ", 'delicious','toolbar=no,width=550,height=550'); return false;";
	echo "<img src=\"http://l.yimg.com/hr/img/delicious.small.gif\" height=\"15\" width=\"15\" alt=\"Delicious\" />";
	echo "<a href=\"http://www.delicious.com/save\" onclick=\"" . $javascript . "\" target=\"_blank\"> Delicious</a>";
}



?>