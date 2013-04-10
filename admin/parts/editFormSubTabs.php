	<h5>Sub tabs</h5>
	<div id="placer" class="sortable"></div>
    <br/>
	<a href="#" onclick="addTab();" class="btn">Añadir sub pestaña</a>
	
<script type="text/javascript">
var subTabs = eval('<?=json_encode($subTabs)?>');
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
			helper : "clone"
	});
	$(".sortable .title-subtab").disableSelection();
});

function addTab(subTab){
	var el = $(".repository .subTab").clone();
	if(subTabs){
		el.find("input[name=id]").val(subTab.id);
		el.find("input[name=order]").val(subTab.order);
		el.find("input[name=title]").val(subTab.title);
		el.find("input[name=background]").val(subTab.background);
		el.find("textarea[name=text]").val(subTab.text);
	}
	el.find("input[name=title]").keyup(function(){
		$(this).closest(".subTab").find(".title-subtab span").html($(this).val());
	});
	el.find(".title-subtab").click(function(){
		var el = $(this).closest(".subTab").find(".box");
		$(".subTab .box").not(el).hide();
		$(el).toggle();
	});
	
	placer.append(el);
}

</script>

<div class="repository">
	<div class="subTab">
		<h4 class="title-subtab">Pestaña: <span></span></h4>
		<div class="box">
			<h5>Id</h5>
			<input type="text" name="id" style="width: 100%"/>
			<h5>Order</h5>
			<input type="text" name="order" style="width: 100%"/>
			<h5>Titulo</h5>
			<input type="text" name="title" style="width: 100%"/>
			<h5>Background image</h5>
			<input type="text" name="background" style="width: 100%"/>
			<h5>Text</h5>
			<textarea rows="3" style="width: 100%; height: 300px;" name="text"></textarea>
		</div>
	</div>
</div>
<style>
.repository{
	display: none;
}
.subTab{
}
.box{
	border: 1px solid #999;
	padding: 5px;
	margin: 0px;
}
.title-subtab{
	cursor: pointer;
	border: 1px solid #999;
	margin: 0;
	padding: 5px;
}
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/css/lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet" />