<?
include "parts/admin.php";
$store_path = $_SERVER['DOCUMENT_ROOT']."/data/img/";
$web_path = "/data/img/";

$ic = ImageController::getInstance();


$mode = $_REQUEST['mode'];
if($mode == "upload"){
	try{
		$res = $ic->upload();
		$msg_ok = "Se ha subido la imagen correctamente. <a href='".$res."'>Enlace a la imagen</a>";
	}
	catch (Exception $e) {
		$msg_error = $e->getMessage();
	}
}
else if($mode == "delete"){
	try{
		$res = $ic->delete($_REQUEST['image']);
		$msg_ok = "Se ha eliminado la imagen correctamente.";
	}
	catch (Exception $e) {
		$msg_error = $e->getMessage();
	}
}

$image_list = $ic->getList();

?>
<? include "parts/cap.php";?>

<div class="page-header">
    <h3>Imagenes</h3>
</div>

<?
if($msg_error)
	echo "<div class='alert alert-error'>$msg_error</div>";
if($msg_ok)
	echo "<div class='alert alert-success'>$msg_ok</div>";
?>
<form action="" method="post" enctype="multipart/form-data">

  <fieldset>
    <input type="hidden" name="mode" value="upload"/>
	Subir una imagen: <input type="file" name="file"><br><br>
	<button class="btn btn-primary" name="submit">Guardar</button> <a href="/admin/" role="button" class="btn">Cancelar</a>
  </fieldset>
</form>
<hr>
<ul class="thumbnails">
<?
foreach($image_list as $image){
	$url_image = $ic->web_path . $image;
    echo "<li class='span2'>";
    echo "<div class='thumbnail'>";
    echo "<p><a href='$url_image' target='_blank'>$image</a></p>";
    echo "<img src='$url_image' alt='$image'/><br>";
    echo "<a href='?mode=delete&image=$image' class='btn btn-small'><i class='icon-trash'></i> Borrar</a>";
    echo "</div>";
    echo "</li>";
}
?>
</ul>
<? include "parts/final.php";?>