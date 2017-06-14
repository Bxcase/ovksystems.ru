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
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";

?>

<div class="glav_banner">
	<div class="zakladki"></div>


	<?
	foreach($arResult["ITEMS"] as $arItem):?>
	<?
	/*echo "<pre>";
	print_r($arItem);
	echo "</pre>";*/
	?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<div class="banner" style="background: url(<?=$arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"]?>) no-repeat center center !important; background-size: cover !important;"  id='<?=$this->GetEditAreaId($arItem['ID'])?>'>
		
		<div class="shirina" style="background: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) no-repeat right center; background-size: contain;">
			<div class="opis">
				<?=$arItem["PREVIEW_TEXT"]?>
				<? if ($arItem["PROPERTIES"]["SSYLKA"]["VALUE"]<>"") {?>
					<br><a href="<?=$arItem["PROPERTIES"]["SSYLKA"]["VALUE"]?>"><div class="podrobnee">Подробнее</div></a>
				<? } ?>
			</div>
		</div>
		
	</div>

	<?
	endforeach
	?>





</div>
























