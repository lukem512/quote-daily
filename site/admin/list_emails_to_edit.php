<?php

/*
*
* Lists the emails in order to edit them
* Luke Mitchell, Mar. 2011
*
*/

//Includes
require_once('../inc/config/config.inc.php');
require_once('../inc/config/db.inc.php');
require_once('../inc/email_db_functions.inc.php');

$emails = GetAllEmails();

$pageTitle = "Edit Emails";

include ('inc/admin_header.php');

?>
<div class="container">
	<?php
	
	include ('inc/admin_title.php');	

	?>
	<div class="content">
		<form name="select_email_to_edit_form" method="GET" action="edit_email.php">
			<p>Select an email address or enter the email ID to edit or remove it.</p>
			<input type="text" name="eid" />
			<input type="submit" name="select_email_to_edit_form_submit" value="Edit" />
		</form>
	</div>
	<div class="content">
		<?php
			
		foreach ($emails as $email)
		{			
			echo "<li><a href=\"edit_email.php?eid=".$email['EID']."\" alt=\"".$email['EMAIL']."\">".$email['EMAIL']."</a></li>";
		}
			
		?>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>