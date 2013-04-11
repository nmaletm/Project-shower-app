<?
include "parts/admin.php";
$tc = TabController::getInstance();

$tabs = $tc->getAll();

?>
<? include "parts/cap.php";?>

<h4>Pestañas actuales:</h4>
<div class="sortable">
<?
foreach($tabs as $tab){
	echo "<div class='navbar order-nav'><div class='navbar-inner '>";
	echo "<span class='brand'>".$tab->title."</span> <a href='editTab.php?id=".$tab->id."' class='btn pull-right'>Editar</a>";
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
			placeholder: "state-highlight"
	});
	$(".sortable .navbar-inner").disableSelection();
	$(".editTab").submit(function(){
		$("#subTabJSON").val(getJSON());
	});
});


function getJSON(){
	var res = [];
	$("#placer").children().each(function(){
		var el = $(this).closest(".subTab").find(".box");
		var subTab = {};
		subTab.id = el.find("input[name=SubTab_id]").val();
		subTab.title = el.find("input[name=SubTab_title]").val();
		subTab.background = el.find("input[name=SubTab_background]").val();
		subTab.text = el.find("textarea[name=SubTab_text]").val();
		res.push(subTab); 
	});
	return JSON.stringify(res);
}

</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/css/lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet" />

<? include "parts/final.php";?>