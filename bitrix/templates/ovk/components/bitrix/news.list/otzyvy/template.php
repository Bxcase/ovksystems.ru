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

/*echo "<pre>";
print_r($arParams);
echo "</pre>";

echo "<pre>";
print_r($arResult);
echo "</pre>";*/

?>

<div class="glav_otzyvy">
	

		<?
		$i=1;
		foreach($arResult["ITEMS"] as $arItem):?>
			<?
			/*echo "<pre>";
			print_r($arItem);
			echo "</pre>";*/
			?>

			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			
			
			if ($i==1) {
			?>

				<div class="element" id='<?=$this->GetEditAreaId($arItem['ID'])?>'>
					<p><?=$arItem["PREVIEW_TEXT"]?></p>
				</div>
				
				<div class="blueimp">
			
			<? } ?>
			
			<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></a>
			

			<?
			
			$i=$i+1;
		endforeach
		?>
	
	</div>


	<a href="<?=str_replace("#SITE_DIR#", "", $arResult["LIST_PAGE_URL"])?>"><div class="vse">Все <?=$arParams["PAGER_TITLE"]?></div></a>


</div>























