<?php

/*
*
* Displays the email administration options
* Luke Mitchell, Dec. 2010
*
*/

require ('../inc/config/config.inc.php');

?>
<?php

$pageTitle = "Email";

include ('inc/admin_header.php');

?>
<div class="container">
	<?php include ('inc/admin_title.php'); ?>
	<div class="content">
		<p>The mailing list can be added to, edited and pruned using the links below.</p>
		<ul>
			<li><a href="javascript:alert('Coming soon.');">Send email</a></li>
			<li><a href="add_email.php">Add email</a></li>
			<li><a href="list_emails_to_edit.php">Edit emails</a></li>
		</ul>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>