<?php

/*
*
* Displays the sharing options for a quote
* Displays for a default quote if this isn't set
* Luke Mitchell, Mar. 2011
*
*/

//Ensure the array is present
if (!isset($quote))
{
	require_once('inc/config/default_quote.inc.php');
}

?>
<div class="container">
	<div class="content-sharing">
		<!-- AddThis Button BEGIN -->
		<div style="padding-left: 66px;" class="addthis_toolbox addthis_default_style addthis_32x32_style">
			<a style="width:80px" class="addthis_button_facebook"></a>
			<a style="width:80px" class="addthis_button_twitter"></a>
			<a style="width:80px" class="addthis_button_digg"></a>
			<a style="width:80px" class="addthis_button_delicious"></a>
			<a style="width:80px" class="addthis_button_stumbleupon"></a>
			<a style="width:80px" class="addthis_button_compact"></a>
		</div>
		<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d7cf7eb7877d3b1"></script>
		<!-- AddThis Button END -->
	</div>
</div>