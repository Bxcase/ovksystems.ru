
$(document).ready(function(){

$(".katalog_razdely .razdel").mouseenter(function() {
	$(this).find("img").animate({
		opacity: 0.7
	}, 100, "swing");
	$(this).find("img").animate({
		opacity: 1
	}, 100, "swing");
});



});