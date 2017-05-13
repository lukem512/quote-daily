<?php

/*
*
* Form for unsubscribing from daily email
* Luke Mitchell, Mar. 2011
*
*/

?>
<div class="container">
	<div class="content">
		<p>Please enter your email address below if you wish to remove it from the daily quote mailing list.</p>
		<form action="unsubscribe.php" name="email_unsubscribe_form" method="GET">
			<p>Email address:<input type="text" name="email" class="txt" value="" /></p>
			<input type="submit" class="btn" value="Go" />
		</form>
	</div>
</div>