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

$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));




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


<div class='katalog_tovary'>
";

	foreach ($arResult['ITEMS'] as $key => $arItem) {
		
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
		
		
	
		
		echo "
		<div class='tovar' id='".$this->GetEditAreaId($arItem['ID'])."'>
			
			<div class='nazv'><a href='{$arItem["DETAIL_PAGE_URL"]}'>{$arItem["NAME"]}</a></div>
			<a href='{$arItem["DETAIL_PAGE_URL"]}'><img src='{$arItem["PREVIEW_PICTURE"]["SRC"]}' alt='{$arItem["NAME"]}'></a>
			<div class='preview'>
				<div class='svoistva'>
					<!--<strong>Тип:</strong> -->{$arItem["PROPERTIES"]["TIP"]["VALUE"]}<br>
					<strong>Артикул:</strong> {$arItem["PROPERTIES"]["ARTIKUL"]["VALUE"]}<br>
					";
				
					// гибкие свойства товара
					foreach ($arItem["DISPLAY_PROPERTIES"] as $k=>$v) { // цикл по всем гибким свойствам товара, которые нужно выводить (раз есть в этом массиве, то значит нужно - указали в настройках компонента и они не пустые для данного товара)
						$svoistvo=$v;
						if (in_array($svoistvo["CODE"], array("TIP", "ARTIKUL", "CENA", "NALICHIE", "KOMPLEKTACIYA", "MORE_PHOTO", "ZAKLADKI_NAZV", "ZAKLADKI_KONTENT", "FILE", "ANCOR_FILE", "VIDEO"))==false) { // если свойство не фиксированное (не выводилось нами выше), то выводим
							echo "
							<strong>{$svoistvo["NAME"]}:</strong> ".stroka_v_chsilo($svoistvo["VALUE"])." {$svoistvo["HINT"]}<br>
							";
						}
					}
				
				echo "
				</div>
				{$arItem["PREVIEW_TEXT"]}
			</div>
			<div class='nalichie'>{$arItem["PROPERTIES"]["NALICHIE"]["VALUE"]}</div>
			<div class='knopki'>
				<div class='cena'>".stroka_v_chsilo($arItem["PROPERTIES"]["CENA"]["VALUE"])." руб.</div>
				<a href='{$arItem["DETAIL_PAGE_URL"]}'><div class='podrobnee'>Подробнее</div></a>
				<div class='online zakazat_tovar' id='{$arItem["ID"]}'>Заказать</div>
			</div>
			
		</div>
		";	


	}


	


echo "
</div>
";
	



echo "
<div class='tekst'>	
	{$arResult["DESCRIPTION"]}
</div>
";


/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/


?>


