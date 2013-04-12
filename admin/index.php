<?
include "parts/admin.php";
$tc = TabController::getInstance();

if($_REQUEST['mode']){
	$order_id = explode(",",$_REQUEST['order_id']);
	$i = 1;
	foreach($order_id as $id){
		$tab = $tc->load($id);
		$tab->order = $i;
		$tc->save($tab);
		$i++;
	}
	exit();
}

$tabs = $tc->getAll();

?>
<? include "parts/cap.php";?>

<h4>Pestañas actuales:</h4>
<div class="sortable">
<?
foreach($tabs as $tab){
	echo "<div class='navbar order-nav' id='".$tab->id."'><div class='navbar-inner'>";
	echo "<span class='brand'><i class='icon-resize-vertical'></i> ".$tab->title."</span>";
	echo "<a href='editTab.php?id=".$tab->id."&mode=delete' class='btn pull-right'><i class='icon-trash'></i> Borrar</a> ";
	echo "<a href='editTab.php?id=".$tab->id."' class='btn pull-right'><i class='icon-pencil'></i> Editar</a>";
	echo "</div></div>";
}
?>
</div>
<br>
<a href="editTab.php" class="btn">Añadir pestaña</a>

<script type="text/javascript">
$(document).ready(function(){
	$(".sortable").sortable({ 
			cursor: "move",
			helper : "clone",
			placeholder: "state-highlight",
			stop: function(event, ui) {
				var query = "mode=order&order_id="+getJSON();
				$.ajax({
					url: "index.php",
					type: "post",
					data: query,
					error: function() {
						console.log("theres an error with AJAX");
					},
					success: function() {
						console.log("Saved.");
					}
				});
			}
	});
	$(".sortable .navbar-inner").disableSelection();
	$(".editTab").submit(function(){
		$("#subTabJSON").val(getJSON());
	});
});


function getJSON(){
	var sorted = $( ".sortable" ).sortable('toArray').toString();
	return sorted;
}

</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/css/lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet" />

<? include "parts/final.php";?>