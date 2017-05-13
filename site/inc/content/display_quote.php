<?php

/*
*
* Displays a quote in the form of an associate array name $quote
* Displays a default quote if this isn't set
* Luke Mitchell, Dec. 2010
*
* 02/02/11 - Added additional check that $quote array is filled; link to search for 'quotes by author'
*
*/

//Ensure the array is present and filled
if (!isset($quote) || !isset($quote['QUOTE']))
{
	require_once('inc/config/default_quote.inc.php');
}

?>
<div class="container">
	<div style="cursor: pointer;" class="content" onclick="javascript:window.location = 'quote.php?qid=<?php echo $quote['QID']; ?>'">
		<div class="quote">
			<p><a href="quote.php?qid=<?php echo $quote['QID']; ?>">&ldquo;<?php echo $quote['QUOTE']; ?>&rdquo;</a></p>
		</div>

		<div class="author">
			<p><a href="search.php?needle=<?php echo $quote['AUTHOR']; ?>&amp;haystack=author">
				<?php echo $quote['AUTHOR']; ?>
			</a></p>
		</div>
	</div>
</div>