<?php/*** Functionality provided by Facebook* Luke Mitchell, Mar. 2011***/function Facebook_DisplayLikeButton($url){	echo "<fb:like href=\"" . urlencode($url) . "\" layout=\"button_count\" show_faces=\"true\" width=\"86\" font=\"arial\"></fb:like>";	echo "<noscript><iframe src=\"http://www.facebook.com/plugins/like.php?href=" . urlencode($url) . "&amp;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:450px; height:21px;\" allowTransparency=\"true\"></iframe></noscript>";}function Facebook_DisplayShareButton($url, $text){	$javascript = "javascript:window.open('http://www.facebook.com/sharer.php?u=" . urlencode($url) . "&t=" . urlencode($text) . "','" . urlencode($text) . "','menubar=0,resizable=0,width=450,height=450')";	echo "<a rel=\"nofollow\" href=\"javascript:void(0)\" onClick=\"" . $javascript . "\">Share on Facebook</a>";	echo "<noscript><a rel=\"nofollow\" href=\"" . urlencode($url) . "&t=" . urlencode($text) . "\" target=\"_blank\">Share on Facebook</a></noscript>";}?>