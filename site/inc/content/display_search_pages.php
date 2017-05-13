<?php

/*
*
* Displays the number of pages for each search
* Luke Mitchell, Feb. 2011
*
*/

require_once('inc/search_page_functions.inc.php');

function DisplaySearchPages($page, $quotes_per_page, $quotes_current_page, $num_quotes, $display_numbers = false)
{

//Do we need to print anything?
if (($num_quotes <= NUM_QUOTES_PER_PAGE) && ($display_numbers == false))
{
	return;
}

//Yes...
?>
<div class="container">
	<div class="content">
		<div class="search">
			<?php
			
			if ($display_numbers)
			{
				EchoPageText($page, $quotes_per_page, $quotes_current_page, $num_quotes);
			}
			
			?>
			<br />
			<?php
			
			if ($num_quotes > NUM_QUOTES_PER_PAGE)
			{
				echo "<div class=\"search_page_numbers\">";
				EchoPageNumbers($page, $quotes_per_page, $num_quotes, NUM_SEARCH_PAGES);
				echo "</div>";			
			}
			
			?>
		</div>
	</div>
</div>
<?php
}

function EchoPageText($page, $quotes_per_page, $quotes_current_page, $num_quotes)
{
	// the +/- 1 ensures the value starts at 1
	$start = PageToStart($page, $quotes_per_page) + 1;
	$end = ($start + $quotes_current_page) - 1;
	
	echo "<div class=\"search_page_text\">";
	echo "Displaying " . $start . " to " . $end . " of " . $num_quotes . "<br />";
	echo "</div>";
}

function EchoPageNumbers($page, $quotes_per_page, $num_quotes, $num_pages_to_display = NUM_SEARCH_PAGES)
{
	global $needle, $haystack, $type;
	
	$first_page = 1;
	$last_page = ceil ($num_quotes/$quotes_per_page);
	
	$pages_either_side = ($num_pages_to_display/2);
	$start_page = $page - floor ($pages_either_side);
	
	// ensure there are always $num_pages_to_display displayed
	if (($last_page - $start_page) < $num_pages_to_display)
	{
		$start_page -= ($num_pages_to_display - ($last_page - $start_page)); 
	}
	
	// ensure we don't stray below zero
	if ($start_page < $first_page)
	{
		$start_page = $first_page;
	}
	
	for ($i=$start_page; $i<($start_page + $num_pages_to_display); $i++)
	{
		if ($i > $last_page)
		{
			break;
		}
		
		if ($i == $page)
		{
			echo "<div class=\"search_page_number\">" . $i . "</div>";
		}
		else
		{
			echo "<div class=\"search_page_number\"><a href='search.php?type=".$type."&amp;needle=".$needle."&amp;haystack=".$haystack."&amp;page=".$i."'>".$i."</a></div>";
		}
	}
}

?>