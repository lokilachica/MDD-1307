<?php
	if ($word != "") {
		$query = $queryBuild . $word;
		
		echo file_get_contents($query);
	}
?>