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
print_r($arResult);
echo "</pre>";
*/
?>

<div class="otzyvy">
	

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
			?>



		<div class="element" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
			<span class="blueimp"><a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></a></span>
			<?=$arItem["PREVIEW_TEXT"]?>
		</div>			
			
			<?
			
			$i=$i+1;
		endforeach
		?>


</div>









<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

