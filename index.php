<?
include_once $_SERVER['DOCUMENT_ROOT']."/class/includes.php";
$tc = TabController::getInstance();

$tabs = $tc->getAll();
$settings = $GLOBALS['settings'];

$preload_images = array();

?>
<!DOCTYPE html> 
 <html manifest="default.manifest">
	<head> 
	<meta charset="utf-8" /> 
	<title><?=$web_name?></title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"> 	 
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" rel="stylesheet" />
<? if($settings->iOS){ ?>
	<link href="<?=$url_static?>/iOS-style/ios_inspired/styles.css" rel="stylesheet" />
<? } ?>
	<link href="<?=$url_static?>/css/style.css" rel="stylesheet" />
<? if($settings->cssInclude){ ?>
	<link href="<?=$settings->cssInclude?>" rel="stylesheet" />
<? } ?>
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="<?=$url_static?>/js/webApp.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script src="<?=$url_static?>/js/tabs.js"></script>

	<meta name="apple-mobile-web-app-capable" content="yes"/>

	<link rel="apple-touch-startup-image" href="<?=$settings->splashscreen?>" />
	<link rel="apple-touch-icon<?if($settings->iconPrecomposed){echo "-precomposed";}?>" href="<?=$settings->icon?>">
    <link rel="shortcut icon" href="<?=$settings->icon?>">
	<meta property="og:image" content="<?=$settings->url?>/<?=$settings->icon?>" itemprop="image"/>
    <meta property="fb:page_id" content="193732837407253" />
	<meta property="og:url" content="<?=$settings->url?>"/>
	<meta property="og:title" content="<?=$settings->name?>"/>
	<meta property="og:type" content="website"/>
</head> 
<body>
<?

function getTabs($tabs, $actualId){
	$res = "<div data-role='footer' data-position='fixed' data-tap-toggle='false'><div data-role='navbar'>";
	$res .= "<ul>";
	foreach($tabs as $tab){
		if ($tab instanceof Tab) {
			$res .= "<li><a href='#".$tab->id."' id='btn-".$tab->id."' data-role='tab' data-icon='custom'  class=' ";
			if($tab->id == $actualId){
				$res .= "ui-btn-active";
			}
			$res .= "'>".$tab->title."</a></li>";
		}
	}
	$res .= "</ul>";
	$res .= "</div></div>";
	return $res;
}

foreach($tabs as $tab){
	if ($tab instanceof Tab) {
		echo "<div data-role='page' id='".$tab->id."' data-theme='b' class='".get_class($tab)."'>";
			echo $tab->getHTML();
			echo getTabs($tabs, $tab->id);
		echo "</div>\n";
		
		$css_icons .= "#btn-".$tab->id." .ui-icon {background: url('".$tab->icon."') transparent;}";
		$css_background .= "#".$tab->id."{background: url('".$tab->background."') transparent;}";

		array_push($preload_images, $tab->background);
	}
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
<? if(count($preload_images)){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(['<?=implode("','",$preload_images)?>']).preload();
		});
	</script>
<? } ?>
</body> 
</html> 
