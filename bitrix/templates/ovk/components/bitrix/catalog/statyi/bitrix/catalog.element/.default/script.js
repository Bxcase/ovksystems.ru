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



	
	
	
	
	
	
	
	
	
	
	// каталог - товар детально - изменение какой-либо опции товара
	$(".katalog_tovar .kartochka .opcii .opciya").click(function() {
		
		// выбираем опцию (сняв отметку с остальных опций в группе если они есть) или снимаем отметку с опции
		if ($(this).hasClass("aktivnaya_opciya")) {
			$(this).removeClass("aktivnaya_opciya")
		} else {
			$(this).closest(".gruppa_opciy").find(".opciya").removeClass("aktivnaya_opciya"); // снимаем отметку с остальных опций в выбранной группе опций если они есть
			$(this).addClass("aktivnaya_opciya")
		}
		
		
		/*kol_opciy_v_gruppe=$(this).closest(".gruppa_opciy").find(".opciya").length;  // количество опций в текущей группе опций
		if (kol_opciy_v_gruppe==1) { // если количество опций в текущей группе равно 1, т.е. опция одна в группе, то выбираем её или снимаем отметку с неё
			if ($(this).hasClass("aktivnaya_opciya")) {
				$(this).removeClass("aktivnaya_opciya")
			} else {
				$(this).addClass("aktivnaya_opciya")
			}
		} else { // иначе - количество опций в текущей группе больше 1, т.е. опция не одна в группе, то выбираем её (сняв отметку с остальных) или снимаем отметку с неё
			if ($(this).hasClass("aktivnaya_opciya")) {
				$(this).removeClass("aktivnaya_opciya")
			} else {
				$(this).closest(".gruppa_opciy").find(".opciya").removeClass("aktivnaya_opciya"); // снимаем отметку с остальных опций в выбранной группе опций
				$(this).addClass("aktivnaya_opciya")
			}
		}*/
		
	});
	
	
	
	
	
	
	
	
	// положить товар в корзину
	$(".katalog_tovar .kartochka .kupit").click(function() {
		
		var selector=$(this); // пригодится в аякс функции
		
		id_tovara="id_tovara="+$(this).attr("id"); // берем товар родитель
		//console.log(id_tovara);
		
		var opcii=""; // собираем все выбранные товары-опции
		var i=0;
		$(".katalog_tovar .kartochka .opcii .aktivnaya_opciya").each(function() {
			opcii=opcii+"&opciya["+i+"]="+$(this).attr("id");
			i=i+1;
		});
		//console.log(opcii);
		var tovary=id_tovara+opcii; // собираем все товары вместе
		//console.log(tovary);
		
		$.ajax({ // отправляем товары на сервер - кладем их в корзину аяксом
			type: 'POST',
			//processData: false,
			//contentType: false,
			url: '/bitrix/templates/vstech/includes/obrabotchik_korzina_polozhit.php',
			//data: 'id='+id_arr[1]+'&kol='+kol,
			data: tovary,
			success: function(result){
				//console.log(result);				
				if (result=="1") {
					
					korzina_status();
					//console.log("товары добавлены");
					
					// позиционируем всплывающее окно
					$(".tovar_dobavlen").css('left', selector.offset().left + "px");
					$(".tovar_dobavlen").css('top', selector.offset().top-47 + "px");

					// показываем всплывающее окно
					$(".tovar_dobavlen").animate({
						opacity: "show"
					}, 500);	

					
					// обработчик закрытия окна
					$(".tovar_dobavlen").find(".x").click(function(){
						$(".tovar_dobavlen").animate({
							opacity: "hide"
						}, 500);
					});
					
					
				} else {

				}
										
			}
		});
		

	});
	
	
	
	
	
	
	
});