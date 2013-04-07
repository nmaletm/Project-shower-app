<?
include_once $_SERVER['DOCUMENT_ROOT']."/library/flintstone/flintstone.class.php";

$db = new Flintstone(array('dir' => $_SERVER['DOCUMENT_ROOT'].'/data/'));
$GLOBALS["database"] = $db;

$web_name = "Project";
?>