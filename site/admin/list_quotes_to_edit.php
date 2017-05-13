<?php

/*
*
* Lists the quotes in order to edit them
* Luke Mitchell, Mar. 2011
*
*/

//Includes
require_once('../inc/config/config.inc.php');
require_once('../inc/config/db.inc.php');
require_once('../inc/quote_db_functions.inc.php');

$quotes = GetAllQuotes();

$pageTitle = "Edit Quotes";

include ('inc/admin_header.php');

?>
<div class="container">
	<?php
	
	include ('inc/admin_title.php');	

	?>
	<div class="content">
		<form name="select_quote_to_edit_form" method="GET" action="edit_quote.php">
			<p>Select a quote or enter the QID to edit it.</p>
			<input type="text" name="qid" />
			<input type="submit" name="select_quote_to_edit_form_submit" value="Edit" />
		</form>
	</div>
	<div class="content">
		<?php
			
		foreach ($quotes as $quote)
		{
			$text = substr($quote['QUOTE'], 0, 32);
			
			if (strlen($quote['QUOTE']) > 32)
			{
				$text .= "...";
			}
			
			echo "<li><a href=\"edit_quote.php?qid=".$quote['QID']."\" alt=\"".$text."\">[".$quote['QID']."] ".$quote['AUTHOR']."</a></li>";
		}
			
		?>
	</div>
</div>
<?php

include ('inc/admin_footer.php');

?>