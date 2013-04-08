<?
include_once "class/includes.php";
?>

<!DOCTYPE html> 
<html> 
	<head> 
	<meta charset="utf-8" /> 
	<title><?=$web_name?></title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"> 	 
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" rel="stylesheet" />
<? if(!$_REQUEST['noiOS']){ ?>
	<link href="<?=$url_static?>/iOS-style/ios_inspired/styles.css" rel="stylesheet" />
<? } ?>
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script>
	$(document).ready(function(){
		$(document).on("mobileinit", function(){
		  $.mobile.defaultPageTransition = "slide";
		});
		$("a[data-role=tab]").each(function () {
			var anchor = $(this);
			anchor.bind("click", function () {
				$.mobile.changePage(anchor.attr("href"), {
					transition: "none",
					changeHash: false
				});
				return false;
			});
		});

		$("div[data-role=page]").bind("pagebeforeshow", function (e, data) {
			$.mobile.silentScroll(0);
		});
	});
	</script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<style>
		#footerTabs {
			background: #FFF -webkit-radial-gradient(circle, #FFF, #dee2e4);
		}
		.ui-listview sup {
			font-size: 0.6em;
			color: #cc0000;
		}
	</style>

</head> 
<body> 
 

  
  
<div data-role="page" id="tab-1" data-theme="b">
 
	<div data-role="content"> 
		Pagina 1
	</div>
	
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="#tab-1" id="tabA" data-role="tab" data-icon="custom" class="ui-btn-active">One</a></li>
				<li><a href="#tab-2" id="tabB" data-role="tab" data-icon="custom">Two</a></li>
				<li><a href="#tab-3" id="tabC" data-role="tab" data-icon="custom">Three</a></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->
		
</div>
<div data-role="page" id="tab-2" data-theme="b">
 
	<div data-role="content"> 
		Pagina 2
	</div>
	
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="#tab-1" id="tabA" data-role="tab" data-icon="custom">One</a></li>
				<li><a href="#tab-2" id="tabB" data-role="tab" data-icon="custom" class="ui-btn-active">Two</a></li>
				<li><a href="#tab-3" id="tabC" data-role="tab" data-icon="custom">Three</a></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->
		
</div>
 <div data-role="page" id="tab-3" data-theme="b">
 
	<div data-role="content"> 
		Pagina 3
	</div>
	
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="#tab-1" id="tabA" data-role="tab" data-icon="custom">One</a></li>
				<li><a href="#tab-2" id="tabB" data-role="tab" data-icon="custom">Two</a></li>
				<li><a href="#tab-3" id="tabC" data-role="tab" data-icon="custom" class="ui-btn-active">Three</a></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->
		
</div>

</body> 
</html> 