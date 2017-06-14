<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);


// что есть:
// PROPERTIES и DISPLAY_PROPERTIES - свойства и выводимые свойства товаров и товарных предложений
	
	
// типы свойств
// свойства товара - фиксированные (актуальны для всех товаров инфоблока): название, цена, картинки, артикул, наличие на складе, похожие предложения, наполнение закладок
// свойства товара - гибкие (актуальны только для текущего товара): производитель и др. (не везде указываются)
	
	
	
	
	
function stroka_v_chsilo($x) { // если полученная строка похоже на число, то приводим её к нужному формату вида X XXX[,XXXX], иначе - оставляем как есть

	$v_chislo=str_replace(array(" ", ","), array("", "."), $x); // пытаемся преобразовать строку в число
	if (is_numeric($v_chislo)==1) { // если эта строка похожа на число, то приводим его к нужному формату вида X XXX[,XX]
		// подсчитываем количество знаков после запятой
		$arr=explode(".", $v_chislo);
		$decimals=strlen($arr[1]);
		$x=number_format($v_chislo, $decimals, ',', ' ');
	}
	return $x;
}

	
	


echo "


<div class='katalog_tovar'>

		<h1>{$arResult["NAME"]}</h1>
		<div class='kartochka'>
			<div class='foto blueimp'>
				<a href='{$arResult["DETAIL_PICTURE"]['SRC']}'><img src='{$arResult["DETAIL_PICTURE"]['SRC']}' alt='{$arResult["NAME"]}'></a>
				";
				
				//$i=0;
				foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $img_id) {
					//if ($i<3) {
						$img_src=CFile::GetPath($img_id);
						echo "<a href='$img_src'><img src='$img_src' alt='{$arResult["NAME"]}'></a>";
					//}
					//$i++;
				}		
				
				echo "
			</div>

			<div class='preview'>
	
				<div class='svoistva'>
					<!--<strong>Тип:</strong> -->{$arResult["PROPERTIES"]["TIP"]["VALUE"]}<br>
					<strong>Артикул:</strong> {$arResult["PROPERTIES"]["ARTIKUL"]["VALUE"]}<br>
					";

					// гибкие свойства товара
					foreach ($arResult["DISPLAY_PROPERTIES"] as $k=>$v) { // цикл по всем гибким свойствам товара, которые нужно выводить (раз есть в этом массиве, то значит нужно - указали в настройках компонента и они не пустые для данного товара)
						$svoistvo=$v;
						if (in_array($svoistvo["CODE"], array("TIP", "ARTIKUL", "CENA", "NALICHIE", "KOMPLEKTACIYA", "MORE_PHOTO", "ZAKLADKI_NAZV", "ZAKLADKI_KONTENT", "FILE", "ANCOR_FILE", "VIDEO"))==false) { // если свойство не фиксированное (не выводилось в других местах), то выводим
							echo "
							<strong>{$svoistvo["NAME"]}:</strong> ".stroka_v_chsilo($svoistvo["VALUE"])." {$svoistvo["HINT"]}<br>
							";
						}
					}
				
				echo "
				</div>
				
				{$arResult["PREVIEW_TEXT"]}
				
				";
				
					
				$cena=str_replace(array(" ", ","), array("", "."), $arResult["PROPERTIES"]["CENA"]["VALUE"]); // пытаемся преобразовать цену в число
				if (is_numeric($cena)==1) { // если эта строка похожа на число, то приводим его к нужному формату
					$cena=stroka_v_chsilo($arResult["PROPERTIES"]["CENA"]["VALUE"])." руб.";
				} else { // иначе берем как есть
					$cena=$arResult["PROPERTIES"]["CENA"]["VALUE"];
				}
				
				echo "

				
				<div class='nalichie'>{$arResult["PROPERTIES"]["NALICHIE"]["VALUE"]}</div>		
			
			
				<div class='knopki'>
					<div class='cena'>$cena</div>
					<div class='online zakazat_tovar' id='{$arResult["ID"]}'>Заказать</div>
				</div>

			</div>

			";

						

			echo "
		</div>
		";

		
		
		
		
		
		
		
		if ($arResult["DETAIL_TEXT"]<>"") {
			echo "
			<div class='podrobno'>
				{$arResult["DETAIL_TEXT"]}
			</div>";
		}
		
		
		
		if (isset($arResult["PROPERTIES"]["FILE"]["VALUE"][0])) {
			$str_files = "
			<h4>Документация</h4>
			";
			for($i=0; $i<count($arResult["PROPERTIES"]["FILE"]["VALUE"]); $i++) {
				
					if($i<1){
						$str_files .= "<div class='files'>";
					}
					$file_href = CFile::GetPath($arResult["PROPERTIES"]["FILE"]["VALUE"][$i]);
					//$file_href=$arResult["PROPERTIES"]["FILE"]["VALUE"][$i];
					$ancor = explode(";", $arResult["PROPERTIES"]["ANCOR_FILE"]["VALUE"][$i]);
					$str_files .= "<div><img src='/bitrix/templates/ovk/files/pdf.png' alt='' class='file'><a href='{$file_href}' target='_blank'>{$ancor[0]}</a> {$ancor[1]}</div>";

			}
			if(isset($arResult["PROPERTIES"]["FILE"]["VALUE"]) and count($arResult["PROPERTIES"]["FILE"]["VALUE"])){
				$str_files .= "</div>";
			}		
			//echo $str_files;
		}


		
		
		
		
		
		if(isset($arResult["PROPERTIES"]["VIDEO"]["VALUE"][0])){
			
			$str_videos = "
			<h4>Видео-материалы</h4>
			<div class='videos'>";
			
			for($i=0; $i<count($arResult["PROPERTIES"]["VIDEO"]["VALUE"]); $i++){
			

					$str_videos .= "<div><iframe src='//www.youtube.com/embed/".$arResult["PROPERTIES"]["VIDEO"]["VALUE"][$i]."?rel=0&amp;showinfo=1&amp;wmode=opaque&amp;vq=large&amp;autoplay=0' frameborder='0' allowfullscreen></iframe></div>";
					
			
			}
		
			 $str_videos .= "</div>";
			 //echo $str_videos;
		}		
		
		
		
		if ($arResult["PROPERTIES"]["ZAKLADKI_NAZV"]["VALUE"][0]<>"") { // если есть закладки, то работаем в этом режиме, иначе - в простом
			echo "
			<div class='zakladki_tovara'>
			<div class='zakladki'>
			";
			for($i=0; $i<count($arResult["PROPERTIES"]["ZAKLADKI_NAZV"]["VALUE"]); $i++) {
				echo "
				<div class='zakladka_nazv'>{$arResult["PROPERTIES"]["ZAKLADKI_NAZV"]["VALUE"][$i]}</div>
				";
				
			}
			
			if (count($arResult["PROPERTIES"]["FILE"]["VALUE"])>0) { // закладка для файлов если нужно
				echo "
				<div class='zakladka_nazv'>Файлы</div>
				";
			}
			if (count($arResult["PROPERTIES"]["FILE"]["VALUE"])>0) { // закладка для видео если нужно
				echo "
				<div class='zakladka_nazv'>Видео</div>
				";
			}
			
			echo "
			</div>
			";
			
			for($i=0; $i<count($arResult["PROPERTIES"]["ZAKLADKI_NAZV"]["VALUE"]); $i++) {
				if ($i==0) {$style="display: block";} else {$style="";}
				echo "
				<div class='zakladka_kontent' $style>{$arResult["PROPERTIES"]["ZAKLADKI_KONTENT"]["~VALUE"][$i]["TEXT"]}</div>
				";
				
			}
			if (count($arResult["PROPERTIES"]["FILE"]["VALUE"])>0) { // закладка для файлов если нужно
				echo "
				<div class='zakladka_kontent'>$str_files</div>
				";
			}
			if (count($arResult["PROPERTIES"]["FILE"]["VALUE"])>0) { // закладка для видео если нужно
				echo "
				<div class='zakladka_kontent'>$str_videos</div>
				";
			}
			echo "
			</div>
			";
		} else {
			echo "
			<div class='podrobno'>
				$str_files
				$str_videos
			</div>";
		}
		
		
		
		
		
		
		
		
		
		
		
		
		echo "
		<div class='nazad'><a href='{$arResult["SECTION"]["SECTION_PAGE_URL"]}'>Назад в категорию</a></div>


</div>
";






/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/


?>
