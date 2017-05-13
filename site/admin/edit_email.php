<?php

/*
*
* Displays the edit email form
* Luke Mitchell, Mar. 2011
*
*/

require_once ('../inc/config/db.inc.php');
require_once ('../inc/config/config.inc.php');
require_once ('../inc/db_functions.inc.php');
require_once ('../inc/email_db_functions.inc.php');

$message = "";
if (isset($_GET['message']))
{
	switch ($_GET['message'])
	{
		case "success":
			$message = "Success! The email address has been edited successfully.";
		break;
		
		case "deleted":
			$message = "Success! The email address has been deleted successfully.";
		break;

		case "failure":
			$message = "An error has occurred.";
		break;

		default:
			$message = "";
		break;
	}
}

if (isset($_GET['eid']))
{
	$result = GetEmailByID(mysql_real_escape_string($_GET['eid']));
	
	if ($result)
	{
		$email = $result;
	}
}

?>
<?php

$pageTitle = "Edit Email";

include ('inc/admin_header.php');

?>
<div class="container">
	<?php
	
	include ('inc/admin_title.php');	

	?>
	<div class="content">
		<p><?php echo $message; ?></p>
	</div>
	<div class="content">
		<form action="do_edit_email.php" name="edit_email_form" method="GET">
			<table>
				<tr>
					<td>Email address</td>
					<td><input type="text" name="email" value="<?php if (isset($email)) { echo $email['EMAIL']; } ?>" /></td>
				</tr>
			</table>
			<?php if (isset($email)) { ?><p style="font-style: italic; font-size: 0.8em;">Added on <?php echo $email['DATE']; ?>.</p><?php } ?>
			<input type="hidden" name="eid" value="<?php if (isset($email)) { echo $email['EID']; } ?>" />
			<input type="submit" name="edit_email_form_submit" value="Edit" /><input type="submit" name="edit_email_form_delete" value="Delete" />
		</form>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>