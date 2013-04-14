<?
include "parts/admin.php";
$tc = SettingsController::getInstance();

if($_REQUEST['mode'] == "save"){
	$set = new Settings();
	$set->fillDataFromRequest($_REQUEST);
	$tc->save($set);
	header("Location: ?status=ok");
	exit;
}


$settings = $tc->load();

$ic = ImageController::getInstance();
$options_image = $ic->getHTMLList($url_static);

?>
<? include "parts/cap.php";?>

<div class="page-header">
    <h3>Configurar:</h3>
</div>
<form action="" method="post" class="editTab">
  <fieldset>
    <input type="hidden" name="mode" value="save"/>
	<h5>Nombre de la app</h5>
	<input type="text" name="name" value="<?=$settings->name?>"  placeholder="Nombre de la app" class="input-block-level"/>
	<h5>Icono de la app</h5>
	<label class="checkbox">
		<input type="checkbox" value="1" name="iconPrecomposed" <?if($settings->iconPrecomposed){echo "checked='checked'";}?>>
		Icono pre-procesado (si no se marca iOS añadirá un bisel al icono)
	</label>
	<select name="icon" value="<?=$settings->icon?>" class="input-block-level"/>
		<?if($settings->icon) echo "<option value='".$settings->icon."'>".$settings->icon."</option>";?>
		<?=$options_image?>
	</select>
	<span class="help-inline">El icono debe ser de uno de estos formatos: 57x57, 72x72, 114x114, 144x144</span>
	
	<h5>Splashscreen</h5>
	<select name="splashscreen" value="<?=$settings->splashscreen?>" class="input-block-level"/>
		<?if($settings->splashscreen) echo "<option value='".$settings->splashscreen."'>".$settings->splashscreen."</option>";?>
		<?=$options_image?>
	</select>
	<span class="help-inline">El splashscreen debe tener uno de estos formatos: iPhone: 320x460, iPhone retina: 640x960, iPad portrait: 768x1004, iPad landscape: 1024x748</span>
	<h5>Estilo iOS</h5>
	<label class="checkbox">
		<input type="checkbox" value="1" name="iOS" <?if($settings->iOS){echo "checked='checked'";}?>>
		Estilo iOS activado
	</label>


    <div class="form-actions">
      <button class="btn btn-primary" name="submit">Guardar</button>
    <a href="/admin/" role="button" class="btn">Cancelar</a>
    </div>
  </fieldset>
</form>
<? include "parts/final.php";?>
