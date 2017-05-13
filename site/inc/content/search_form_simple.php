<?php

/*
*
* Form for searching quotes, simple
* Luke Mitchell, Feb. 2011
*
*/

?>
<div class="container">
	<div class="content">
		<p>To search for a quote, use the box below. Alternatively <a href="?type=simple&amp;needle=%&amp;haystack=all">display them all</a>.</p>
		<p>You can also try the <a href="search.php?&amp;needle=<?php echo $needle; ?>&amp;haystack=<?php echo $haystack; ?>&amp;type=full">advanced search</a>.</p>
		<form action="search.php" method="get">
		<p>
			<input type="text" name="needle" class="txt" value="<?php echo $needle; ?>" />
			<input type="hidden" name="haystack" value="all" />
			<input type="hidden" name="type" value="simple" />
			<input type="submit" class="btn" value="Search" />
		</p>
		</form>
	</div>
</div>
