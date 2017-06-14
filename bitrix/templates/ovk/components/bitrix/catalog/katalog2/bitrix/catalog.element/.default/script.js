$(document).ready(function(){
	
	
	
	$(".katalog_tovar .foto").find("img").mouseenter(function() {
		$(this).animate({
			opacity: 0.7
		}, 100, "swing");
		$(this).animate({
			opacity: 1
		}, 100, "swing");
	});
	
	
	
	
	




	/////////////////////////// ЗАКЛАДКИ ТОВАРА - НАЧАЛО

		
	perekluchenie_zakladok_tovara(0);
		
	$(".katalog_tovar .zakladka_nazv").click(function() {
		id = $(".katalog_tovar .zakladka_nazv").index(this); // определяем номер закладки, по которой только что кликнули (с нуля)
		//alert(id);
		perekluchenie_zakladok_tovara(id);
	});		


	function perekluchenie_zakladok_tovara(id) { // сама функция переключения
		
		// снимаем выделение со всех закладок
		$(".katalog_tovar .zakladka_nazv").removeClass("zakladka_nazv_aktiv");

		
		// скрываем все блоки с содержимым закладок
		$(".katalog_tovar .zakladka_kontent").animate({
			opacity: "hide"
		}, 0, "linear", function(){});
		
		
		// распахиваем блок, соответствующий этой закладке
		//alert(id);
		$(".katalog_tovar .zakladka_kontent").eq(id).animate({
			opacity: "show"
		}, 0, "linear", function(){});
		
		$(".katalog_tovar .zakladka_nazv").eq(id).addClass("zakladka_nazv_aktiv"); // подсвечиваем выбранную закладку
	}

	/////////////////////////// ЗАКЛАДКИ ТОВАРА - КОНЕЦ




	
	
});