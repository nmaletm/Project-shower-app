<?
include "parts/admin.php";
$tc = TabController::getInstance();


if($_REQUEST['mode'] == "add"){
	$tab = new Tab();
	$tab->title = stripslashes($_REQUEST['title']);
	$tab->html = stripslashes($_REQUEST['html']);
	$tab->id = stripslashes($_REQUEST['id']);
	
	$tc->save($tab);
	header("Location: ?id=".$tab->id);
	exit;
}
$id = $_REQUEST['id'];
if($id){
	$tab = $tc->load($id);
}

if(!$tab){
	if($_REQUEST['mode'] == "subTabs"){
		$tab = new TabSubTabs();
	}
	else{
		$tab = new Tab();
	}
}
?>
<? include "parts/cap.php";?>

<div class="page-header">
    <h3>Edit tab</h3>
</div>
<form action="" method="post">
  <fieldset>

    <input type="hidden" name="mode" value="add"/>
	
    <h4>Página</h4>
	
<? include "parts/".$tab->getFormInclude(); ?>
	
	<h5>Identificador</h5>
	<input type="text" name="id" value="<?=$tab->id?>" style="width: 100%"/>
	
	<h5>Titulo</h5>
	<input type="text" name="title" value="<?=$tab->title?>" style="width: 100%"/>
	


    <div class="form-actions">
      <button class="btn btn-primary" name="submit">Guardar</button>
    <a href="/admin/" role="button" class="btn">Cancelar</a>
    </div>
  </fieldset>
</form>

<? include "parts/final.php";?>