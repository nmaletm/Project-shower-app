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

/* Preload: $(['img1.jpg','img2.jpg','img3.jpg']).preload(); */
$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}

$(window).load(function(){
	$('.tab-ui-normal').removeClass('ui-mini');
	$('div[data-role=tab]').click(function(){
		$('.tab-ui-normal').removeClass('ui-mini');
	});
});
document.ontouchmove = function(e) {e.preventDefault()};