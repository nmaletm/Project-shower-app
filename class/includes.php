<?
include_once $_SERVER['DOCUMENT_ROOT']."/library/flintstone/flintstone.class.php";
include_once "DBClass.php"; /* The file can't be DB.php because there is another one with that name, and include_once don't work correctly*/

include_once "User.php";

include_once "Tab.php";
include_once "TabHTML.php";
include_once "TabSubTabs.php";
include_once "TabController.php";

include_once "Settings.php";
include_once "SettingsController.php";

include_once "ImageController.php";

$tc = SettingsController::getInstance();
$settings = $tc->load();
$GLOBALS["settings"] = $settings;

$web_name = $settings->name;
$url_static = "/static/";
?>