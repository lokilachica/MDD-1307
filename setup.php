<?php
	//Stands 4 Web Services - Dictionary/Synonyms API
	
	//API id
	$userid = "2930";
	//API token
	$token = "guIAkEBsOMxhWJyE";
	//Build the API call (without the word parameter)
	$queryBuild = "http://www.stands4.com/services/v2/syno.php?uid=" . $userid . "&tokenid=" . $token . "&word=";
	
	//Get the word from the URL
	$word = $_GET['word'];
?>