<?
include "parts/admin.php";

$tc = SettingsController::getInstance();
$tc->clearCache();

header("Location: index.php?status=ok");

?>