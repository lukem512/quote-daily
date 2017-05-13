<?php

/*
*
* Displays the TOS section
* Luke Mitchell, Mar. 2011
*
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Display the page header
$pageTitle = "Quote Daily >> Terms of service";

require_once('inc/content/header.php');

?>
<div class="container">
	<div class="content">
		<p>When access Quote Daily ("the website") you should be confident that any information collected will be used solely for visitor analytics and demographic purposes. Quote Daily will never sell this information to a third party.</p>
		<p>The website is copyright Luke Mitchell along with all graphics, unless otherwise stated. All rights to the website included these resources are reserved unless written permission is requested.</p>
		<p>All quotes, by their very definition, are copyright free. This is often subject to a word limit (usually 300, see <a href="http://en.wikipedia.org/wiki/Fair_use">the Wikipedia article on fair use</a>). Feel free to use, abuse and redistribute the quotations on this website to you're hearts content.</p>
	</div>
</div>

<div class="container">
	<div class="content">
		<p>If you wish to get in contact with us please email <a href="mailto:contact@quote-daily.com">contact@quote-daily.com</a></p>
	</div>
</div>
<?php

//Display the page footer
require_once('inc/content/footer.php');

?>
