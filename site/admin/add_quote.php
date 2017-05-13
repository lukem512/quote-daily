<?php

/*
*
* Displays the add quote form
* Luke Mitchell, Dec. 2010
*
*/

require ('../inc/config/config.inc.php');

if (isset($_POST['edit_quote_form_submit']))
{
	
}

$message = "";
if (isset($_GET['message']))
{
	switch ($_GET['message'])
	{
		case "success":
			$message = "Success! The quote has been added successfully.";
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

$pageTitle = "Add Quote";

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
		<form action="do_add_quote.php" name="add_quote_form" method="GET">
			<table>
				<tr>
					<td>Author</td>
					<td><input type="text" name="author" value="" /></td>
				</tr>
				<tr>
					<td>Quote</td>
					<td><textarea name="quote" /></textarea></td>
				</tr>
				<tr>
					<td>Comments</td>
					<td><textarea name="comments" /></textarea></td>
				</tr>
			</table>
			<input type="submit" name="add_quote_form_submit" value="Add" />
		</form>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>