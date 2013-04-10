<?
include "parts/admin.php";
$tc = TabController::getInstance();

$class = $_REQUEST['class'];

if($_REQUEST['mode'] == "add" && $class){
	$tab = new $class();
	$tab->fillDataFromRequest($_REQUEST);

	$tc->save($tab);
	header("Location: ?id=".$tab->id);
	exit;
}

$isEditing = false;
$selectClass = false;

$id = $_REQUEST['id'];
if($id){
	$tab = $tc->load($id);
	$isEditing = true;
}
else if($class){
	$tab = new $class();
	$tab->generateRandomId();
}
else{
	$selectClass = true;
}


?>
<? include "parts/cap.php";?>

<div class="page-header">
    <h3><?=($isEditing)?"Editar pestaña":"Añadir pestaña";?></h3>
</div>
<? if($selectClass){ ?>
    <ul class="nav nav-tabs nav-stacked">
		<li><a href="?class=TabHTML">Pestaña HTML</a></li>
		<li><a href="?class=TabSubTabs">Pestaña con sub-pestañas</a></li>
    </ul>
<? } else{ ?>
<form action="" method="post" class="editTab">
  <fieldset>
	<input type="hidden" name="id" value="<?=$tab->id?>"/>
    <input type="hidden" name="mode" value="add"/>
	<input type="hidden" name="class" value="<?=get_class($tab)?>" />
	<input type="text" name="title" value="<?=$tab->title?>"  placeholder="Titulo" class="input-block-level"/>
	<input type="text" name="icon" value="<?=$tab->icon?>"  placeholder="Icono de la pestaña" class="input-block-level"/>
	<input type="text" name="background" value="<?=$tab->background?>"  placeholder="Background image" class="input-block-level"/>
	
	
<? 
//To have the $tab inside the include we put it in the GLOBALS
$GLOBALS['tab'] = $tab;
$GLOBALS['isEditing'] = $isEditing;
include "parts/".$tab->getFormInclude(); 
?>



    <div class="form-actions">
      <button class="btn btn-primary" name="submit">Guardar</button>
    <a href="/admin/" role="button" class="btn">Cancelar</a>
    </div>
  </fieldset>
</form>
<script type="text/javascript">
$(document).ready(function(){
	$(".uneditable-input").keydown(function(){return false;});
});
function cleanString(s){
	return s.toLowerCase().replace(/[^a-z]+/g, '');;
}
</script>
<? } ?>
<? include "parts/final.php";?>