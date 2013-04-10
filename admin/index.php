<?
include "parts/admin.php";
$tc = TabController::getInstance();

$tabs = $tc->getAll();

?>
<? include "parts/cap.php";?>

<h4>Pestañas actuales:</h4>
<?
foreach($tabs as $tab){
	echo "<div>";
	echo "<b>".$tab->title."</b> <a href='editTab.php?id=".$tab->id."'>[Editar]</a>";
	
	echo "<div>";
}
?>
<br>
<a href="editTab.php" class="btn">Añadir pestaña</a>
        
<? include "parts/final.php";?>