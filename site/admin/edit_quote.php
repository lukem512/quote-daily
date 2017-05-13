<?php

/*
*
* Displays the edit quote form
* Luke Mitchell, Mar. 2011
*
*/

require_once ('../inc/config/db.inc.php');
require_once ('../inc/config/config.inc.php');
require_once ('../inc/db_functions.inc.php');
require_once ('../inc/quote_db_functions.inc.php');

$message = "";
if (isset($_GET['message']))
{
	switch ($_GET['message'])
	{
		case "success":
			$message = "Success! The quote has been edited successfully.";
		break;
		
		case "deleted":
			$message = "Success! The quote has been deleted successfully.";
		break;

		case "failure":
			$message = "An error has occurred.";
		break;

		default:
			$message = "";
		break;
	}
}

if (isset($_GET['qid']))
{
	$result = GetQuoteByID(mysql_real_escape_string($_GET['qid']));
	
	if ($result)
	{
		$quote = $result;
	}
}

?>
<?php

$pageTitle = "Edit Quote";

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
		<form action="do_edit_quote.php" name="edit_quote_form" method="GET">
			<table>
				<tr>
					<td>Author</td>
					<td><input type="text" name="author" value="<?php if (isset($quote)) { echo $quote['AUTHOR']; } ?>" /></td>
				</tr>
				<tr>
					<td>Quote</td>
					<td><textarea name="quote" /><?php if (isset($quote)) { echo $quote['QUOTE']; } ?></textarea></td>
				</tr>
				<tr>
					<td>Comments</td>
					<td><textarea name="comments" /><?php if (isset($quote)) { echo $quote['COMMENTS']; } ?></textarea></td>
				</tr>
			</table>
			<input type="hidden" name="qid" value="<?php if (isset($quote)) { echo $quote['QID']; } ?>" />
			<input type="submit" name="edit_quote_form_submit" value="Edit" /><input type="submit" name="edit_quote_form_delete" value="Delete" />
		</form>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>