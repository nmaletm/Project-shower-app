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

$ic = ImageController::getInstance();
$image_list = $ic->getList();
$options_image = "";
foreach($image_list as $image){
	$options_image .= "<option value='".$ic->web_path.$image."'>".$image."</option>";
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
	<input type="hidden" name="order" value="<?=$tab->order?>"/>
    <input type="hidden" name="mode" value="add"/>
	<input type="hidden" name="class" value="<?=get_class($tab)?>" />
	<input type="text" name="title" value="<?=$tab->title?>"  placeholder="Titulo" class="input-block-level"/>
	<h5>Icono de la pestaña</h5>
	<select name="icon" value="<?=$tab->icon?>" class="input-block-level"/>
		<?if($tab->icon) echo "<option value='".$tab->icon."'>".$tab->icon."</option>";?>
		<?=$options_image?>
	</select>
	<h5>Background</h5>
	<select name="background" value="<?=$tab->background?>" class="input-block-level"/>
		<?if($tab->background) echo "<option value='".$tab->background."'>".$tab->background."</option>";?>
		<?=$options_image?>
	</select>
	
	
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
<? } ?>
<? include "parts/final.php";?>