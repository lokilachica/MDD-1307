<?php
	if ($word != "") {
		$imageurl = 'http://images.search.yahoo.com/search/images?p=' . $word;
		$imageresults = file_get_contents($imageurl);
		echo $imageresults;
	}
?>