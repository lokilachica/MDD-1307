//initialize function
function init() {
	//hide the error box to start
	$(".error").css("visibility","hidden");
	
	
	//if the word query is not empty
	if (word != "") {
		
		//for each definition result
		$("result").each(function(e) {
			//if this is the third or higher result
			if (e > 1) {
				//hide it
				$(this).addClass("hide");
			}
		});
		
		//array to store the image results
		var imageresults = new Array;
		
		//for each image result from Yahoo!
		$("li.ld a").each(function(e) {
			
			//if it is image result 1 through 12
			if (e < 12) {
				//grab just the image
				var inner = $(this).html();
				//add new li tag around image
				var imageresult = "<li>" + inner + "</li>";
				//push image li to array
				imageresults.push(imageresult);
			}
		});
		//remove Yahoo! html
		$("#removethis").remove();
		//write image results to container
		$("#imageresults ul").html(imageresults);
		//remove extra div insite image li's
		$("#imageresults ul li div.cont").remove();
		
		//for each image in limage li's
		$("#imageresults ul li img").each(function(e) {
			//remove any inline styles
			$(this).removeAttr("style");
			//remove any classes
			$(this).removeAttr("class");
			
			//if the image is more than 200px
			if ($(this).height() > 200) {
				
				//get percentage: we will shrink the width with this
				var percent = 200/$(this).height();
				//set the height to 200
				$(this).height(200);
				//get the new width based on the percentage
				var newwidth = $(this).width() * percent;
				//set the image to that width
				$(this).width(newwidth);
			}
		});
	}
	
	//if there is more than one definition
	if ($("result").length > 1) {
		//show the more definitions link
		$("#morelink").show();
	}
	
	//if there are no definition results
	if ($("result").length == 0 && word != "") {
		//remove the image results
		$("#imageresults").remove();
		//show the error message
		$(".error").css("visibility","visible");
		//hide the more definitions link
		$("#morelink").hide();
	}
}

//if the look up button is clicked
$("#button").click(function() {
	//get the user entered word
	var lookup = $("#wordinput").val();
	
	//check if there is more than one word
	//split at the " " (space)
	var ssplit = lookup.split(" ");
	//if there is more than one word
	if (ssplit.length > 1) {
		//one word error, its a dictionary not a search bar
	} else {
		//get new word url
		var url = window.location.pathname + "?word=" + lookup;
		//refresh page with new word
		window.location = url;
	}
});

//if the more definitions link is clicked
$("#morelink").click(function() {
	//show two more results
	//for each hidden result
	$("result:hidden").each(function(e) {
		//if the hidden result is 1 or 2
		if (e < 2) {
			//show it
			$(this).show();
		}
	});
	//if there are no more hidden results
	if ($("result:hidden").length == 0) {
		//hide the more definitions link
		$("#morelink").hide();
	}
});

//if the "Enter/Return" key is pressed
//when a key is released
$('#wordinput').keyup(function(e) {
	//if its the enter/return key
	if (e.keyCode == 13) {
		//run the button.click() function
		$("#button").click();
	}
});

function pageresize() {
	var pagewidth = $("body").width();
	$("span#tagline").css("max-width", pagewidth-150);
}

//on the window load
$(window).load(function() {
	//make the contents of the page visible. originally hidden to allow for load time.
	$("#wrapper").css("visibility", "visible");
	pageresize();
});

//on the window resize
$(window).resize(function() {
	pageresize();
});