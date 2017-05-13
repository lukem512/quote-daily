<?php

/*
*
* Displays the about us section
* Luke Mitchell, Feb. 2011
*
*
*/

//Configuration file
require_once('inc/config/config.inc.php');

//Display the page header
$pageTitle = "Quote Daily >> About us";

require_once('inc/content/header.php');

?>
<div class="container">
	<div class="content">
		<p>Quote Daily is a project devoted to providing a unique, insightful quote every single day. These are available on the website, straight to your email or via RSS.
The website has also been designed in such a manner that accessing our quotes programatically should be trivial.</p>
		<p>Quote Daily was designed and created by Luke Mitchell, Peregrine Enterprises. Care was taken to ensure that the website is aesthetically identical, or as close as is reasonable,
regardless of browser or platform choice. The website aims to conform to <a href="http://validator.w3.org/check?uri=referer">strict XHTML</a> and <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> standards.</p>
		<p>If you wish to support Quote Daily you can do so by sharing a link to us, or your favourite quote. All support is greatly appreciated.</p>
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
