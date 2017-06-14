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



/*$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));*/








		
$section_props = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $arResult["SECTION"]["IBLOCK_ID"], 'ID' => $arResult["SECTION"]["ID"]), true, array("UF_DOP_HTML"));
$props_array = $section_props->GetNext(); 	
//echo "<pre>";
//print_r($props_array);		
//echo "</pre>";		



echo "

<div class='tekst'>

	{$props_array["~UF_DOP_HTML"]}

</div>
";

?>


<?
if (count($arResult["SECTIONS"])>0) {
?>




<div class="katalog_razdely">	

<? 
foreach($arResult["SECTIONS"] as $arSection){
	
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		
		echo "<a href='{$arSection["SECTION_PAGE_URL"]}'><div class='razdel' id='".$this->GetEditAreaId($arSection['ID'])."'>
			<div>
				<img src='{$arSection["PICTURE"]["SRC"]}' alt=''>
				<div class='nazv'>{$arSection["NAME"]}</div>
			</div>
		</div></a>";
}

?>
	
</div>


<?
}



/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/

?>

