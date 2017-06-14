$(document).ready(function(){
	
	$(".katalog_tovary .tovar").mouseenter(function() {
		$(this).find("img").animate({
			opacity: 0.7
		}, 100, "swing");
		$(this).find("img").animate({
			opacity: 1
		}, 100, "swing");
	});
	
	
	
	
	
	// положить товар в корзину
	$(".katalog_tovary .tovar .kupit").click(function() {
		
		var selector=$(this); // пригодится в аякс функции
		
		id_tovara="id_tovara="+$(this).attr("id"); // берем товар родитель
		//console.log(id_tovara);
		
		var tovary=id_tovara; // собираем все товары вместе
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