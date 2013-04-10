$(document).ready(function(){
	$("div[data-role=page]").each(function(){
		var el = $(this).find("div[data-role=content]");
		if(el.length > 1){
			//alert("add tabs");
		}
	});
	$("a[data-role=prefooter-tab]").each(function () {
		var anchor = $(this);
		anchor.bind("click", function () {
			var page = $(anchor).closest("div[data-role=page]");
			$(page).find("div[data-role=content]").hide();
			$("#"+anchor.attr("data-content")).show();
		});
	});
});