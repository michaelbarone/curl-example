<?php
// loads the config.php file with program variables
require "config.php";

// only fired when accessing this address while appending the following ?remotecheck=xxx  where xxx can be anything for your reference
// this is generally used when you want to have this page send functions without rendering a visible page, ie commands sent automatically from other programs
if(isset($_GET['remotecheck']) && $_GET['remotecheck']=='') {
	//if found but only the following is appended to the address ?remotecheck=
} elseif(isset($_GET['remotecheck'])){
	$remotecheck = $_GET['remotecheck'];
}
if(!isset($remotecheck)) {  //commented below where it ends?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $programtitle; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="height:device-height, width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, target-densitydpi=medium-dpi, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
  <script type="text/javascript" src="./js/jquery1.9.1.min.js"></script>
  <script type="text/javascript">
		if (window.navigator.standalone) {
			var a=document.getElementsByTagName("a");
			for(var i=0;i<a.length;i++) {
				if(!a[i].onclick && a[i].getAttribute("target") != "_blank") {
					a[i].onclick=function() {
							window.location=this.getAttribute("href");
							return false; 
					}
				}
			}
		}
	</script>  
</head>
<body>
	<ul class="links" style="float:left;padding: 50px 0 20px;">
		<li class='title'><h2><span class='label'><b><?php echo $programtitle; ?></b></span></h2></li>
		<br class="clear">
<?php }  // this closes the if statement for if $remotecheck is set   ?> 


<!-- this is where the buttons are created.. you can add additional <ul> elements to break them up, or add several <a href> to a <li> to group them in 1 outlined box -->
	
		<li><a href='#' onclick="sendcurl1('1','2');" class='on-off-toggle'>button1</a><img src='./img/loading.gif' style='display:none;' /></li>
		<li><a href='#' onclick="sendcurl1('variable for var1','variable for var2');" class='on-off-toggle'>button2</a><img src='./img/loading.gif' style='display:none;' /></li>	
	</ul>
	<div class='popup_box' style='overflow-y:auto;height:90%;top:4%;'> 
    <div class='ajax_content'><img src='./img/loading.gif' /></div>
     <a class='popupBoxClose' style='z-index:9999;'></a>
	</div>
<script>

//  this will show the spinner next to the button when clicked..  may want if there is a command that takes a little while to complete.
//	$("a").click(function() {
//		$(this).next('img').css({ display: "block" });
		//$(this).css({ display: "none" });
//	});


	
	function sendcurl1(var1,var2) {
		$(this).next('img').css({ display: "block" });
		var var1 = encodeURIComponent(var1);
		var var2 = encodeURIComponent(var2);
		$('.popup_box').fadeIn(500);
		$.ajax({
		   url: "./sendcurl1.php?var1="+var1+"&var2="+var2,
		   error: function(xhr, error){
				alert(error + " " + xhr);
			},
		   success: function(thehtml) {
				// these can be commented out after your done testing so there is no popup on button press
				$('.popup_box').fadeIn(500);
				$('.popup_box .ajax_content').html(thehtml);
			},
			complete: function() {
				//completed();
			}
		});
	}
	



	
	
	
//popup controls  dont really need to edit this
	function loadPopupBox(data) {
		$('.popup_box').fadeIn(500);
		$('.popup_box .ajax_content').html(data);
		//$('#wrapper').css({'opacity': '0.3'});    //div with id wrapper is page's main wrapper
	}

	function unloadPopupBox() {
		$('.popup_box').fadeOut('fast');
		//$('#wrapper').css({ 'opacity': '1' });
	}

    $('.popupBoxClose,#popupwrapper').click(function() {
        unloadPopupBox();
		//location.reload();
    });
</script>
</body>
</html>
  