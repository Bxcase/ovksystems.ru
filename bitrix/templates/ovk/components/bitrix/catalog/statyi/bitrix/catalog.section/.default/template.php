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

//echo "<pre>";
//print_r($arResult);
//echo "</pre>";
//if(trim($arResult["IBLOCK_SECTION_ID"])!=""){

echo "<div class='statyi'>";

	foreach ($arResult['ITEMS'] as $key => $arItem) {
		
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
		
		
		
		if ($arItem["PRICES"]["BASE"]["VALUE"]<>$arItem["PRICES"]["BASE"]["DISCOUNT_VALUE"]) { // если цена со скидкой не равна обычной цене, то выводим обе цены и перечеркивание
			$cena="<strike>{$arItem["PRICES"]["BASE"]["VALUE"]} р.</strike> {$arItem["PRICES"]["BASE"]["DISCOUNT_VALUE"]} р.";
		} else {
			$cena="{$arItem["PRICES"]["BASE"]["VALUE"]} р.";
		}
		
		
		
		echo "
		<div class='statya' id='".$this->GetEditAreaId($arItem['ID'])."'>
			

			<a href='{$arItem["DETAIL_PAGE_URL"]}'><img src='{$arItem["PREVIEW_PICTURE"]["SRC"]}' alt='{$arItem["NAME"]}'></a>
			<div class='nazv'><a href='{$arItem["DETAIL_PAGE_URL"]}'>{$arItem["NAME"]} {$arItem["PROPERTIES"]["KOMPLEKTACIYA"]["VALUE"]}</a></div>			
			<div class='preview'>
				{$arItem["PREVIEW_TEXT"]}
			</div>


			
		</div>
		";	


	}



echo "
</div>
";
	//}
echo "
<div class='tekst'>	
	{$arResult["DESCRIPTION"]}
</div>
";


/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/


?>


