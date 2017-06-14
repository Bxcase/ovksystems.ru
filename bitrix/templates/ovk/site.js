/* Все мои скрипты сайта в одном месте*/
$(document).ready(function(){


	//alert(111);





	// подгонка ширины основного контента в зависимости от наличия на странице левой колонки
	if ($(".centr .kolonka_saita").length>0) {
		$(".centr .kontent").addClass("kontent_s_kolonkoi");
	}
	//console.log($(".centr .kolonka_saita").length);

	
	
	
	
	// скольжение колонки слева при перемотке страницы ниже определенного значения
	if ($(".centr .kolonka_saita").length>0) {
		
		//var centr_kolonka_offset_top=$(".centr").offset().top; // при загрузке страницы запоминаем смещение от верха левой колонки
		var centr_kolonka_offset_top=$(".verh1").height()+$(".verh2").height()+$(".menu_glav").height(); // при загрузке страницы запоминаем смещение от верха левой колонки
		//console.log(centr_kolonka_offset_top);
		
		
		$(window).scroll(function(){ // при доматывании страницы до левой колонки делаем её фиксированной со скольжением, иначе - обычной
			//console.log(centr_kolonka_offset_top);
			if ($(window).scrollTop()>centr_kolonka_offset_top-$(".menu_glav").height()) {
				$(".centr .kolonka_saita").addClass("kolonka_fiks");
				$(".centr .kolonka_saita").css("top", $(".menu_glav").height());
			} else {
				$(".centr .kolonka_saita").removeClass("kolonka_fiks");
			}
		});
		
		// те же действия, но при загрузке страницы сразу - если загрузили страницу внизу (например обновили страницу на этой позиции)
		if ($(window).scrollTop()>centr_kolonka_offset_top-$(".menu_glav").height()) {
			$(".centr .kolonka_saita").addClass("kolonka_fiks");
			$(".centr .kolonka_saita").css("top", $(".menu_glav").height());
		} else {
			$(".centr .kolonka_saita").removeClass("kolonka_fiks");
		}
	

		$(window).resize(function(){ // при изменении размеров экрана заново определяем смещение от верха левой колонки и делаем её фиксированной или обычной
									 // это нужно при загрузке страницы в адаптивном режиме и выходе из него (где вообще не было показа левой колонки) 
			var centr_kolonka_offset_top=$(".verh1").height()+$(".verh2").height()+$(".menu_glav").height();
			//console.log(centr_kolonka_offset_top);
			if ($(window).scrollTop()>centr_kolonka_offset_top-$(".menu_glav").height()) {
				$(".centr .kolonka_saita").addClass("kolonka_fiks");
				$(".centr .kolonka_saita").css("top", $(".menu_glav").height());
			} else {
				$(".centr .kolonka_saita").removeClass("kolonka_fiks");
			}
			
		});
	
	}


	
	
	
	
	
	
	
	// скрипты для работы Blueimp галереи
	$('.blueimp').click(function (event) {
		event = event || window.event;
		var target = event.target || event.srcElement,
			link = target.src ? target.parentNode : target,
			options = {index: link, event: event},
			links = this.getElementsByTagName('a');
		blueimp.Gallery(links, options);
	});


	
	
	
	
	

	
	
	
	


		//////////////////////////// ФОРМА ОНЛАЙН - НАЧАЛО
		// нажатие на кнопку - затемняем фон и выводим форму
		$('.online').click(function() {
			if ($(this).hasClass("zakazat_zvonok")) {
				$("#forma .forma_nazv").html(" &nbsp; &nbsp; &nbsp; Заказать звонок");
			}
			if ($(this).hasClass("zakazat_tovar")) {
				$("#forma .forma_nazv").html(" &nbsp; &nbsp; &nbsp; Оформить заказ");
				dopolnitelno=$("#forma_dopolnitelno").val();
				dopolnitelno=$(this).closest(".katalog_tovary .tovar").find(".nazv").text(); // если находимся на странице списка товаров
				if (dopolnitelno=="") {
					dopolnitelno=$(this).closest(".katalog_tovar").find("h1").text() // если находимся на странице конкретного товара
				}
				$("#forma_dopolnitelno").val(dopolnitelno);
			}
			$("#forma_fon").animate({
				opacity: "show"
			}, 500);
			$("#forma").css('left', $(document).width()/2-parseInt($("#forma").css('width'))/2);
			$("#forma").css('top', $(window).scrollTop()+$(window).height()/2-parseInt($("#forma").css('height'))/2);
			$("#forma").animate({
				opacity: "show"
			}, 500);
		});
		

		//Poisk
		$(".poisk input").focus(function(){
			//alert(4);
			//$(".poisk input").
			if($(this).val()=="Поиск"){
				//alert(3);
				$(this).val('');
			}
			
			
		});
		
		
		$(".poisk input").blur(function(){
			if($(this).val()==""){
				$(this).val('Поиск');
			}			
		});
		
		
		$(".poisk img").click(function(){
			$(this).closest("form").submit();
		});
		
		
		
		
		// нажатие вне всплывшей формы - всё закрываем
		$('#forma_fon, .forma_close, #forma_resultat').click(function() {
			$("#forma_fon").animate({
				opacity: "hide"
			}, 500);
			$("#forma").animate({
				opacity: "hide"
			}, 500);
			$("#forma_resultat").animate({
				opacity: "hide"
			}, 500);
		});



		// далее работа с самой формой
		
		$("#forma_imya").focus(function() {
			if ($(this).val()=="Ваше имя *") {
				$(this).val("");
			}
		});	
		$("#forma_imya").blur(function() {
			if ($(this).val()=="") {
				$(this).val("Ваше имя *");
			}
		});
		
		$("#forma_telefon").focus(function() {
			if ($(this).val()=="Номер телефона *") {
				$(this).val("");
			}
		});	
		$("#forma_telefon").blur(function() {
			if ($(this).val()=="") {
				$(this).val("Номер телефона *");
			}
		});	
		
		$("#forma_email").focus(function() {
			if ($(this).val()=="Электронная почта") {
				$(this).val("");
			}
		});	
		$("#forma_email").blur(function() {
			if ($(this).val()=="") {
				$(this).val("Электронная почта");
			}
		});	
		
		$("#forma_dopolnitelno").focus(function() {
			if ($(this).val()=="Дополнительная информация") {
				$(this).val("");
			}
		});	
		$("#forma_dopolnitelno").blur(function() {
			if ($(this).val()=="") {
				$(this).val("Дополнительная информация");
			}
		});	

		// обработчик нажатия окончательной кнопки "отправить"
		$("#otpravit").click(function() {
			error=false;
			
			$("#forma_imya").removeClass("error");
			$("#forma_telefon").removeClass("error");
			
			$("#forma_resultat").html("");
			
			if ($("#forma_imya").val()=="Ваше имя *") {
				$("#forma_imya").addClass("error");
				error=true;
			}
			if ($("#forma_telefon").val()=="Номер телефона *") {
				$("#forma_telefon").addClass("error");
				error=true;
			}

			if (error==false) { // если нет ошибок заполнения формы, то основные действия - отправляем форму аяксом

				
				$.ajax({
					type: 'POST',
					url: '/bitrix/templates/ovk/includes/online_obrabotchik.php',
					data: $('#sama_forma').serialize(),
					success: function(result){
						
						// в случае успеха аякс отправки - очищаем поля, показываем результат
						
						$("#forma_imya").val("Ваше имя *");
						$("#forma_telefon").val("Номер телефона *");
						$("#forma_email").val("Электронная почта");
						$("#forma_dopolnitelno").val("Дополнительная информация");
						
						$("#forma").animate({
							opacity: "hide"
						}, 500);
						$("#forma_resultat").css('left', $(document).width()/2-parseInt($("#forma_resultat").css('width'))/2);
						$("#forma_resultat").css('top', $(window).scrollTop()+$(window).height()/2-parseInt($("#forma_resultat").css('height'))/2);
						$("#forma_resultat").html("<div class='forma_close'></div><br><br><br><br><br><br>Спасибо,<br>мы с Вами свяжемся!");
						//$("#forma_resultat").html(result);
						$("#forma_resultat").animate({
							opacity: "show"
						}, 500);
						
					}
				});
				
				
				
				
				
			}
		});	
	
		
	//////////////////////////// ФОРМА ОНЛАЙН - КОНЕЦ


	
		
	
	



});
