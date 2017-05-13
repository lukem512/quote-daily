<?php

/*
*
* Displays the quotes administration options
* Luke Mitchell, Dec. 2010
*
*/

require ('../inc/config/config.inc.php');

?>
<?php

$pageTitle = "Quotes";

include ('inc/admin_header.php');

?>
<div class="container">
	<?php include ('inc/admin_title.php'); ?>
	<div class="content">
		<p>Website quotes can be added, edited and removed using the links below.</p>
		<ul>
			<li><a href="add_quote.php">Add quote</a></li>
			<li><a href="list_quotes_to_edit.php">Edit quotes</a></li>
		</ul>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>