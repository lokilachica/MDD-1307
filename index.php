<!DOCTYPE html>
<html>
  <head>
    <title>Stands 4 Web Services - Dictionary Synonyms API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
  </head>
  <body>
  <div id="wrapper" style="visibility: hidden;">
  	<?php
		$word = $_GET['word'];
	?>
    <h1>PicDic</h1>
    <h3>The online pictoral dictionary</h3>
    <div id="form">
    	<p>Enter a word in the text box below and click submit.</p>
    	<input id="wordinput" type="text" value="<?php echo $word ?>" />
    	<span id="button">Submit</span>
        <span class="error">Sorry, no results were found.<br>Please check your spelling and try again.</span>
	</div>
    
    <?php
		if ($word != "") {
			$userid = "2930";
			$token = "guIAkEBsOMxhWJyE";
			$url = "http://www.stands4.com/services/v2/syno.php?uid=" . $userid . "&tokenid=" . $token . "&word=" . $word;
			
			echo file_get_contents($url);
		}
    ?>
    <span id="morelink" style="display: none;">view more definitions ...</span>
    <div id="removethis">
    <?php
		if ($word != "") {
			$imageurl = 'http://images.search.yahoo.com/search/images?p=' . $word;
			$imageresults = file_get_contents($imageurl);
			echo $imageresults;
		}
	?>
    </div>
    <div id="imageresults"><ul></ul></div>
    <div class="clear"></div>
    <div id="footer">
    	<p>Special thanks to the Stands 4 Web Services Dictionary API and Yahoo! Images.<br />PicDic is not responsible for the content of the definitions or images displayed.</p>
        <p>To report misuse of this site, please <a href="mailto:lokilachica@fullsail.edu?subject=Misuse%20Report%20for%20PicDic">click here</a>.
    </div>
	
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
		$(".error").hide();
		if ("<?php echo $word ?>" != "") {
			$("result").each(function(e) {
				if (e > 2) {
					$(this).addClass("hide");
				}
			});
			var results = new Array;
			$("li.ld a").each(function(e) {
				if (e < 10) {
					var inner = $(this).html();
					var result = "<li>" + inner + "</li>";
					results.push(result);
				}
			});
			$("#removethis").remove();
			$("#imageresults ul").html(results);
			$("#imageresults ul li div.cont").remove();
			
			$("#morelink").show();
		}
		$(window).load(function() {
			$("#wrapper").css("visibility", "visible");
		});
		$("#button").click(function() {
			var word = $("#wordinput").val();
			var url = window.location.pathname + "?word=" + word;
			window.location = url;
		});
		
		if ($("result").length > 1) { $("#morelink").show(); }
		$("result").each(function(e) {
			if (e > 1) {
				$(this).hide();
			}
		});
		$("#morelink").click(function() {
			$("result:hidden").each(function(e) {
				if (e < 2) {
					$(this).show();
				}
			});
			if ($("result:hidden").length == 0) {
				$("#morelink").hide();
			}
		});
		
		$("#imageresults ul li img").each(function(e) {
			$(this).removeAttr("style");
			$(this).removeAttr("class");
			if ($(this).height() > 200) {
				var percent = 200/$(this).height();
				$(this).height(200);
				var newwidth = $(this).width() * percent;
				$(this).width(newwidth);
			}
		});
		if ($("result").length == 0 && "<?php echo $word ?>" != "") {
			$("#imageresults").remove();
			$(".error").show();
			$("#morelink").hide();
		}
		
		$('#wordinput').keyup(function(e) {
			if (e.keyCode == 13) {
  				$("#button").click();
			}
		});
	</script>
  </div>
  </body>
</html>