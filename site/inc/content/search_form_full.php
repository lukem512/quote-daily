<?php

/*
*
* Form for searching quotes
* Luke Mitchell, Dec. 2010
*
*/

?>
<div class="container">
	<div class="content">
		<p>To search for a quote, use the box below. Alternatively <a href="?&amp;type=full&amp;needle=%&amp;haystack=quote">display them all</a>.</p>
		<p>You can also try the <a href="search.php?&amp;needle=<?php echo $needle; ?>&amp;haystack=<?php echo $haystack; ?>&amp;type=simple">simple search</a>.</p>
		<form action="search.php" method="get">
		<p>
			<input type="text" name="needle" class="txt" value="<?php echo $needle; ?>" />
			<select name="haystack">
				<option value="author" <?php if ($haystack == "author") { echo "selected"; } ?>>Author</option>
				<option value="quote" <?php if ($haystack == "quote") { echo "selected"; } ?>>Quote</option>
				<option value="date" <?php if ($haystack == "date") { echo "selected"; } ?>>Date</option>
			</select>
			<input type="hidden" name="type" value="full" />
			<input type="submit" class="btn" value="Search" />
		</p>
		</form>
	</div>
</div>
