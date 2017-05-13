<?php

/*
*
* Displays the add email form
* Luke Mitchell, Feb. 2011
*
*/

require ('../inc/config/config.inc.php');

if (isset($_POST['add_quote_form_submit']))
{
	
}

$message = "";
if (isset($_GET['message']))
{
	switch ($_GET['message'])
	{
		case "success":
			$message = "Success! The email has been added successfully.";
		break;

		case "failure":
			$message = "An error has occurred.";
		break;

		default:
			$message = "";
		break;
	}
}

?>
<?php

$pageTitle = "Add Email";

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
		<form action="do_add_email.php" name="add_email_form" method="GET">
			<table>
				<tr>
					<td>Email address</td>
					<td><input type="text" name="email" value="" /></td>
				</tr>
			</table>
			<input type="submit" name="add_email_form_submit" value="Add" />
		</form>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>