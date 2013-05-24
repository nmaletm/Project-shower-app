<?
// This page can be only loaded included from /admin/editTab.php

$tab = $GLOBALS['tab'];
$isEditing = $GLOBALS['isEditing'];
?>
	<input type="hidden" name="subTabs" id="subTabJSON"/>
	<h5>Sub-pestañas</h5>
	<div id="placer" class="sortable"></div>
    <br/>
	<a href="#" onclick="addTab(); return false;" class="btn"><i class="icon-plus"></i> Añadir sub-pestaña</a>
	<div class="repository">
		<div class="subTab navbar">
			<h4 class="title-subtab navbar-inner">Pestaña: <span></span> <i class="pull-right icon-resize-vertical"></i></h4>
			<div class="box">
				<input type="hidden" name="SubTab_id" class="input-block-level"/>
				<input type="text" name="SubTab_title" placeholder="Título" class="input-block-level"/>
				<b>Background: </b>
				<select name="SubTab_background"/>
					<?=$options_image?>
				</select><br>
				<textarea rows="3" style="height: 300px;" name="SubTab_text" placeholder="Texto" class="input-block-level"></textarea>
			</div>
		</div>
	</div>

<script type="text/javascript">
var subTabs = <?=($tab->subTabs)?str_replace("</script>", "\<\/script\>", $tab->subTabs):"''"?>;

var placer;
$(document).ready(function(){
	placer = $("#placer");
	for(var i in subTabs) {
		var subTab = subTabs[i];
		addTab(subTab);
	}
	if(!subTabs){
		addTab(null);
	}
	
	$(".sortable").sortable({ 
			cursor: "move",
			helper : "clone",
			placeholder: "state-highlight"
	});
	$(".sortable .title-subtab").disableSelection();
	$(".editTab").submit(function(){
		$("#subTabJSON").val(getJSON());
	});
});

function addTab(subTab){
	var el = $(".repository .subTab").clone();
	if(subTabs){
		el.find("input[name=SubTab_id]").val(subTab.id);
		el.find("input[name=SubTab_title]").val(subTab.title);
		el.find("select[name=SubTab_background]").prepend("<option value='"+subTab.background+"' selected='selected'>"+subTab.background+"</option>");
		el.find("textarea[name=SubTab_text]").val(subTab.text);
		el.find(".title-subtab span").html(subTab.title);
	}
	else{
		el.find("input[name=SubTab_id]").val(makeId(20));
	}
	el.find("input[name=SubTab_title]").keyup(function(){
		$(this).closest(".subTab").find(".title-subtab span").html($(this).val());
	});
	el.find(".title-subtab").click(function(){
		var el = $(this).closest(".subTab").find(".box");
		$(".subTab .box").not(el).hide();
		$(el).toggle();
	});
	$(".subTab .box").hide();
	placer.append(el);
	$(el).find(".box").show();
}


function getJSON(){
	var res = [];
	$("#placer").children().each(function(){
		var el = $(this).closest(".subTab").find(".box");
		var subTab = {};
		subTab.id = el.find("input[name=SubTab_id]").val();
		subTab.title = el.find("input[name=SubTab_title]").val();
		subTab.background = el.find("select[name=SubTab_background]").val();
		subTab.text = el.find("textarea[name=SubTab_text]").val().replace(/\n/g, '<br />');;
		res.push(subTab); 
	});
	return JSON.stringify(res);
}
function makeId(num){
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    for( var i=0; i < num; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/css/lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet" />
