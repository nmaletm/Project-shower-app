$(document).ready(function(){
	$(document).on("mobileinit", function(){
	  $.mobile.defaultPageTransition = "slide";
	});
	$("a[data-role=tab]").each(function () {
		var anchor = $(this);
		anchor.bind("click", function () {
			$.mobile.changePage(anchor.attr("href"), {
				transition: "none",
				changeHash: false
			});
			return false;
		});
	});

	$("div[data-role=page]").bind("pagebeforeshow", function (e, data) {
		$.mobile.silentScroll(0);
	});
	$(".background-change").click(function(){
		if($(this).attr("data-background")){
			$(".ui-page.TabSubTabs").css("background-image","url('"+$(this).attr("data-background")+"')");
			$(".ui-page.TabSubTabs").css("background-position","center center");
		}
		//alert("canvi background a: "+$(this).attr("data-background"));
	});
});
$(window).load(function(){
	$('.tab-ui-normal').removeClass('ui-mini');
	$('div[data-role=tab]').click(function(){
		$('.tab-ui-normal').removeClass('ui-mini');
	});
});