<!DOCTYPE html>
<html>
  <head>
    <title>Stands 4 Web Services - Dictionary Synonyms API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/apitest.css" rel="stylesheet" media="screen">
  </head>
  <body>
  	<?php
		$userid = "2930";
		$token = "guIAkEBsOMxhWJyE";
		$word = $_GET['word'];
		
		if ($word == "") {
			$word = "test";
		}
		
    	$url = "http://www.stands4.com/services/v2/syno.php?uid=" . $userid . "&tokenid=" . $token . "&word=" . $word;
	?>
    <h1>Stands 4 Web Services - Dictionary Synonyms API</h1>
    <h3>Word: <?php echo $word ?></h3>
    <p>To view a different word, add the "word" parameter to the end of the URL. For example: apitest.php?word=test</p>
	
    <?php
		echo file_get_contents($url);
    ?>
    
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>