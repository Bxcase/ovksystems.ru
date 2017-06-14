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

//echo "<pre>";
//print_r($arResult);
//echo "</pre>";

?>

	
	
<div class="glav_katalog">	
	<div class="shirina">	
<? 
foreach($arResult["SECTIONS"] as $arItem){
	if ($arItem["UF_ON_INDEX"]==1){
		echo "<a href='{$arItem["SECTION_PAGE_URL"]}'><div class='razdel'>
			<img src='{$arItem["PICTURE"]["SRC"]}' alt=''>
			<div class='nazv'>{$arItem["NAME"]}</div>
		</div></a>";
	}
}

?>
	</div>
</div>
