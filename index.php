<!DOCTYPE html>
<html>
  <head>
    <title>Stands 4 Web Services - Dictionary Synonyms API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link href="css/mobile-to-399.css" rel="stylesheet" media="only screen and (max-width: 399px)" />
    <link href="css/mobile-400-to-600.css" rel="stylesheet" media="only screen and (min-width: 400px) and (max-width: 600px)" />
    <link href="css/mobile-601-to-970.css" rel="stylesheet" media="only screen and (min-width: 601px) and (max-width: 969px)" />
  </head>
  <body>
  <div id="wrapper" style="visibility: hidden;">
  	<?php include 'setup.php' ?>
    <div id="header">
    	<div id="banner">
        	<div id="form">
	            <span id="right"></span>
            	<span id="left"></span>
                <span id="logo">PicDic</span>
                <div id="fields">
                	<span id="directions">Type a word into the search box and click GO!</span><br />
    				<input id="wordinput" type="text" value="<?php echo $word ?>" />
	    			<span id="button">GO</span>
                </div>
        	</div>
            <span id="tagline">The online dictionary with picture results.</span>
        </div>
        <span class="error">Sorry, no results were found.<br>Please check your spelling and try again.</span>
        <hr />
    </div>
    <div class="clear"></div>
    <div id="definitions">
    <hr />
    	<?php include 'definitions.php' ?>
    </div>
    <span id="morelink" style="display: none;">view more definitions ...</span>
    <div id="removethis">
    <?php include 'images.php' ?>
    </div>
    <hr />
    <div id="imageresults"><ul></ul></div>
    <div class="clear"></div>
    <hr />
    <div id="footer">
    	<p>Special thanks to the Stands 4 Web Services Dictionary API and Yahoo! Images.<br />PicDic is not responsible for the content of the definitions or images displayed.</p>
        <p>To report misuse of this site, please <a href="mailto:lokilachica@fullsail.edu?subject=Misuse%20Report%20for%20PicDic">click here</a>.
    </div>
	
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script>
		var word = "<?php echo $word ?>";
		
		init();
	</script>
  </div>
  </body>
</html>