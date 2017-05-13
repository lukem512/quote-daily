<?php

/*
*
* Displays the index page for the admin panel
* Luke Mitchell, Dec. 2010
*
*/

require ('../inc/config/config.inc.php');

?>
<?php

$pageTitle = "Overview";

include ('inc/admin_header.php');

?>
<div class="container">
	<?php include ('inc/admin_title.php'); ?>
	<div class="content">
		<p>Welcome to the administration panel. Use the links above to edit and administer the website.</p>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>