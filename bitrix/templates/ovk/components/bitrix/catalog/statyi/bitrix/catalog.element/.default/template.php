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


echo "<h1>{$arResult["NAME"]} {$arResult["DISPLAY_PROPERTIES"]["KOMPLEKTACIYA"]["VALUE"]}</h1>";


if ($arResult["DETAIL_PICTURE"]['SRC']<>"") {
	echo "
	<span class='blueimp'><a href='{$arResult["DETAIL_PICTURE"]['SRC']}'><img class='img_float_right' src='{$arResult["DETAIL_PICTURE"]['SRC']}' alt='{$arResult["NAME"]}'></a></span>
	";
}

echo "
{$arResult["DETAIL_TEXT"]}
";				
			



		

echo "
<div class='nazad'><a href='{$arResult["SECTION"]["SECTION_PAGE_URL"]}'>Назад в категорию</a></div>
";






/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/


?>
