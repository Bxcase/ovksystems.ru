$(document).ready(function(){



	// плавное всплывание подменю
	$(".menu_glav .punkt").mouseenter(function(){
		$(this).find(".podmenu").animate({
				opacity: "show"
			}, 250);
	});
	
	$(".menu_glav .punkt").mouseleave(function(){
		$(this).find(".podmenu").animate({
				opacity: "hide"
			}, 250);
	});
	






	
	// если есть меню каталога в колонке слева и колонка показывается сейчас, 
	// то блокируем всплывание подменю у пункта Каталог в главном меню (чтобы не дублировать), стрелку в главном меню напротив Каталога делаем повернутой
	if ($(".centr .kolonka_saita .menu_katalog").length>0 & $(".centr .kolonka_saita").css("display")=="block") {
		$(".menu_glav .punkt").eq(0).find(".podmenu").addClass("podmenu_skryto_vsegda");
		$(".menu_glav .punkt").eq(0).find("div").eq(0).find("div").addClass("aktiv");
	} else {
		$(".menu_glav .punkt").eq(0).find(".podmenu").removeClass("podmenu_skryto_vsegda");
		$(".menu_glav .punkt").eq(0).find("div").eq(0).find("div").removeClass("aktiv");
	}
	
	
	$(window).resize(function() { // повтор скрипта при изменении размеров окна браузера
		
		// если есть меню каталога в колонке слева и колонка показывается сейчас, 
		// то блокируем всплывание подменю у пункта Каталог в главном меню (чтобы не дублировать), стрелку в главном меню напротив Каталога делаем повернутой
		if ($(".centr .kolonka_saita .menu_katalog").length>0 & $(".centr .kolonka_saita").css("display")=="block") {
			$(".menu_glav .punkt").eq(0).find(".podmenu").addClass("podmenu_skryto_vsegda");
			$(".menu_glav .punkt").eq(0).find("div").eq(0).find("div").addClass("aktiv");
		} else {
			$(".menu_glav .punkt").eq(0).find(".podmenu").removeClass("podmenu_skryto_vsegda");
			$(".menu_glav .punkt").eq(0).find("div").eq(0).find("div").removeClass("aktiv");
		}
			
		
	});
	
	
	
	
	
	
	
	
	/////////// перемещение меню при перемотке
	var verh_menu_offset_top=$(".menu_glav").offset().top;	// даже если страница перемотана на низ (обновили страницу на этой позиции), 
															// меню здесь ещё не фиксированное, а обычное, поэтому строчка рабочая!
	//console.log(verh_menu_offset_top);
	
	
	$(window).resize(function(){
		if (!($(".menu_glav").hasClass("menu_fixed"))) { 
			verh_menu_offset_top=$(".menu_glav").offset().top; // если меню не фиксированное, то при изменении окна браузера вычисляем смещение как обычно
		} else {
			verh_menu_offset_top=$(".menu_podlozhka").offset().top; // если меню фиксированное, то при изменении окна браузера вычисляем смещение у подложки, которая стоит на обычном месте меню
		}
		//console.log(verh_menu_offset_top);
	});

	
	//alert(verh_menu_offset_top);

	$(window).scroll(function(){
		if ($(window).scrollTop()>verh_menu_offset_top) { 
			if($(".menu_podlozhka").length<1){ // добавляем подложку, чтобы не было скачка контента после меню (меню мы вырвали из основного слоя документа ведь, сделав фикседом)
				$(".menu_glav").after("<div class='menu_podlozhka'></div>");
				$(".menu_podlozhka").height($(".menu_glav").height());	
			}
			$(".menu_glav").addClass("menu_fixed");
		} else {
			$(".menu_podlozhka").remove();
			$(".menu_glav").removeClass("menu_fixed");
		}
	});	
	
	// теперь те же действия, но при загрузке страницы сразу (если загрузили страницу с середины - обновление страницы)
	if ($(window).scrollTop()>verh_menu_offset_top) { 
		if($(".menu_podlozhka").length<1){ // добавляем подложку, чтобы не было скачка контента после меню (меню мы вырвали из основного слоя документа ведь, сделав фикседом)
			$(".menu_glav").after("<div class='menu_podlozhka'></div>");
			$(".menu_podlozhka").height($(".menu_glav").height());	
		}
		$(".menu_glav").addClass("menu_fixed");
	} else {
		$(".menu_podlozhka").remove();
		$(".menu_glav").removeClass("menu_fixed");
	}
	
	
	


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$(".menu_adapt").click(function(){
		/*$(".verh_menu .shirina").css("display","block");*/
		$(".menu_glav .shirina").animate({opacity: 1, left: "0px"}, 500);
	});
	
	$(".menu_adapt_zakryt").click(function(){
		$(".menu_glav .shirina").animate({opacity: 0, left: "-340px"}, 500);
	});
	
	$(window).resize(function() { // при изменении размеров окна браузера
		if ($(".menu_adapt").css("display")=="none") { // если вышли из адаптивного режима или уже находимся в обычном режиме, то показываем блок с меню
			$(".menu_glav .shirina").css("opacity", "1").css("left", "0px");
		} else { // если вошли в адаптивный режим или уже находимся в нем, то скрываем блок с меню
			$(".menu_glav .shirina").css("opacity", "0").css("left", "-340px");
		}
	});
	
	
	
	


	
	
	

	


	
	
	
	
	
});