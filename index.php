<?
include_once $_SERVER['DOCUMENT_ROOT']."/class/includes.php";
$tc = TabController::getInstance();

$tabs = $tc->getAll();

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
	<link href="<?=$url_static?>/css/style.css" rel="stylesheet" />
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
		$(".background-change").click(function(){
			if($(this).attr("data-background")){
				$(".ui-page.TabSubTabs").css("background-image","url('"+$(this).attr("data-background")+"')");
				$(".ui-page.TabSubTabs").css("background-position","center center");
			}
			//alert("canvi background a: "+$(this).attr("data-background"));
		});
	});
	</script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script src="<?=$url_static?>/js/tabs.js"></script>

</head> 
<body>
<?

function getTabs($tabs, $actualId){
	$res = "<div data-role='footer' data-position='fixed'><div data-role='navbar'>";
	$res .= "<ul>";
	foreach($tabs as $tab){
		$res .= "<li><a href='#".$tab->id."' id='btn-".$tab->id."' data-role='tab' data-icon='custom'  class=' ";
		if($tab->id == $actualId){
			$res .= "ui-btn-active";
		}
		$res .= "'>".$tab->title."</a></li>";
	}
	$res .= "</ul>";
	$res .= "</div></div>";
	return $res;
}

foreach($tabs as $tab){
	echo "<div data-role='page' id='".$tab->id."' data-theme='b' class='".get_class($tab)."'>";
		echo $tab->getHTML();
		echo getTabs($tabs, $tab->id);
	echo "</div>\n";
	
	$css_icons .= "#btn-".$tab->id." .ui-icon {background: url('".$tab->icon."') transparent;}";
	$css_background .= "#".$tab->id."{background: url('".$tab->background."') transparent;}";
}
?>

<style type="text/css">
	#footerTabs {
		background: #FFF -webkit-radial-gradient(circle, #FFF, #dee2e4);
	}
	.ui-listview sup {
		font-size: 0.6em;
		color: #cc0000;
	}
	<?=$css_icons?>
	
	<?=$css_background?>
	
</style>

</body> 
</html> 