<?php

/*
*
* Form for signing up to daily email
* Luke Mitchell, Nov. 2010
*
*/

$result = "none";
if (isset($_GET['result']))
{
	if ($_GET['result'] == "success")
	{
		$result = "success";
	}
	else
	{
		$result = "failure";
	}
}

?>
<div class="container">
	<div class="content">
		<p>Want to receive the quote of the day by email? Simply fill in the box below.</p>
		<?php
		
		switch ($result)
		{
			case "success":
				echo "<p style=\"font-weight: bold; color: green;\">Email was added successfully!</p>";
				break;
		
			case "failure":
				echo "<p style=\"font-weight: bold; color: red;\">The email address specified could not be added. Is it correct?</p>";
				break;
		}
		
		?>
		<form action="add_email.php" method="post">
		<p>
			<input type="text" name="email" class="txt" value="" />
			<input type="submit" name="email_form_submit" class="btn" value="Go" />
		</p>
		</form>
	</div>
</div>
