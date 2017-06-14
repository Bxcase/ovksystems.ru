


$(document).ready(function(){
	
/////////////////////////// БАННЕРЫ на главной - НАЧАЛО

var kolichestvo_zakladok = 0;
var count=0;
var current=0;
var flog=false;
	
	


/*var height = $(".bannery").height();
var marginTop = height - 35;
$(".bannery .zakladki").css("marginTop", marginTop + "px");*/

kolichestvo_zakladok = $(".glav_banner .banner").length;
if(kolichestvo_zakladok>1){
	$(".glav_banner .banner").hide();
	for(var i=1; i<kolichestvo_zakladok+1; i++){
		$(".glav_banner .zakladki").append("<div class='zakladka'></div>");
	}
}

count = kolichestvo_zakladok; //количество баннеров в анимации
if(count>1){
	perekluchenie(current);
	current=current+1;
	
	$(".glav_banner .zakladka").click(function() {
		id = $(".glav_banner .zakladka").index(this); // определяем номер закладки, по которой только что кликнули(с нуля)
		//alert(id);
		perekluchenie(id);
		current = id+1;
	});		

	setInterval(function() {
		if (flog==false) {
			if (current>count-1) {
				current=0;	
			}					
			perekluchenie(current);
			current=current+1;

		}
	}, 5000);
}


$(".glav_banner").hover(
  function() {
	flog=true;
  }, function() {
	flog=false;
  }
);



function perekluchenie(id) { // сама функция переключения
	
	// снимаем выделение со всех закладок
	$(".glav_banner .zakladka").removeClass("zakladka_aktiv");

	
	// скрываем все блоки с содержимым закладок
	$(".glav_banner .banner").animate({
		opacity: "hide"
	}, 500, "linear", function(){});
	
	
	
	// распахиваем блок, соответствующий этой закладке
	//$("#zakladka"+id+"_kontent").animate({
	//alert(id);
	$(".glav_banner .banner").eq(id).animate({
		opacity: "show"
	}, 500, "linear", function(){
	
	});
	
	$(".glav_banner .zakladka").eq(id).addClass("zakladka_aktiv"); // подсвечиваем выбранную закладку
}

/////////////////////////// БАННЕРЫ на главной - КОНЕЦ	
	
	
});