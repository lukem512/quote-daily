<?php

/*
*
* Displays a title followed by a rule
* Luke Mitchell, Dec. 2010
*
*/

if (!isset($pageTitle))
{
	$pageTitle = "Unknown page";
}

?>
<div class="content">
	<div id="admin_title">
		<?php echo $pageTitle; ?>
		<hr />
	</div>
</div>
<br />
