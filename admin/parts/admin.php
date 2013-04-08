<?
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/class/includes.php";

if(!$_SESSION['user_loged']){
	header("Location: /login.php");
}
$GLOBALS["user"] = unserialize($_SESSION['user_loged']);
?>