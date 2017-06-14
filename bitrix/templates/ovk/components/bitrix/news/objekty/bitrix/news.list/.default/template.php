<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



 
<? 
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";

?>
<div class="objekty">	
<h1>Объекты</h1>



 
<?/*if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;*/?>


<?foreach($arResult["ITEMS"] as $arItem):?>		

<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>

<div class="objekt" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
	<?if ($arItem["DETAIL_TEXT"]<>"") {?>
 	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
	<? } ?>
	<div class="element">
		<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
		<h6><?=$arItem["NAME"]?></h6>
		<p><?=$arItem["PREVIEW_TEXT"];?></p>
	</div>
	<?if ($arItem["DETAIL_TEXT"]<>"") {?>
 	</a>
	<? } ?>
</div>		
<?endforeach;?>






<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

</div>


