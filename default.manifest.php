<?
header('Content-Type:text/plain');

include_once $_SERVER['DOCUMENT_ROOT']."/class/includes.php";
$tc = TabController::getInstance();

$tabs = $tc->getAll();
$settings = $GLOBALS['settings'];

$preload_images = array();


?>
CACHE MANIFEST
#ver2<?=$settings->cacheRand?>

CACHE:

index.php

http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css

<? if($settings->iOS){ ?><?=$url_static?>/iOS-style/ios_inspired/styles.css<? } ?>

<?=$url_static?>/css/style.css

<? if($settings->cssInclude){ ?><?=$settings->cssInclude?><? } ?>

http://code.jquery.com/jquery-1.7.1.min.js

<?=$url_static?>/js/webApp.js

http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js

<?=$url_static?>/js/tabs.js

<?

foreach($tabs as $tab){
	if ($tab instanceof Tab) {
		//echo getTabs($tabs, $tab->id);

		$tab->getCacheURLFiles($preload_images);
		array_push($preload_images, $tab->icon);
		array_push($preload_images, $tab->background);
	}
}

$preload_images = array_unique($preload_images);

foreach($preload_images as $img){
	echo str_replace(" ","%20",$img)."\n";
}
?>
NETWORK:
*