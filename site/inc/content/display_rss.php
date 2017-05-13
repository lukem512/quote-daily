<?php

/*
*
* Displays an RSS quote
* Luke Mitchell, Jan. 2011
*
*/

?>
<item>
	<title><?php echo $quote_date; ?></title>
	<link><?php echo $quote_link; ?></link>
	<description>"<?php echo $quote_body; ?>"<![CDATA[ <br /> ]]><?php echo $quote_author; ?></description>
	<guid><?php echo $quote_link; ?></guid>
</item>