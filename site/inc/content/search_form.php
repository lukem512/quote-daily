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
		<p>To search for a quote, use the box below. Alternatively <a href="?needle=%&haystack=date">display them all</a>.</p>
		<form action="search.php" name="search_form" method="GET">
		<input type="text" name="needle" class="txt" value="<?php echo $needle; ?>" />
		<select name="haystack">
			<option value="author" <?php if ($haystack == "author") { echo "selected"; } ?>>Author</option>
			<option value="quote" <?php if ($haystack == "quote") { echo "selected"; } ?>>Quote</option>
			<option value="date" <?php if ($haystack == "date") { echo "selected"; } ?>>Date</option>
		</select>
		<input type="submit" class="btn" value="Search" />
		</form>
	</div>
</div>
