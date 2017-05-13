<?php

/*
*
* Displays a quote's comments in the form of an associate array name $quote
* Displays a default quote if this isn't set
* Luke Mitchell, Jan. 2011
*
*/

//Ensure the array is present
if (!isset($quote))
{
	require_once('inc/config/default_quote.inc.php');
}

if ($quote['COMMENTS'] != "")
{
?>
<div class="container">
	<div class="content">
		<p><?php echo $quote['COMMENTS']; ?></p>
	</div>
</div>
<?php
}
?>