<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;
$aMenuLinksExt = array();

$aMenuLinksExt=$APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"IS_SEF" => "Y",
		"SEF_BASE_URL" => "/katalog/",
		"SECTION_PAGE_URL" => "#SECTION_CODE#/",
		"DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#",
		"IBLOCK_TYPE" => "ovk",
		"IBLOCK_ID" => "2",
		"DEPTH_LEVEL" => "5",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => ""
	),
false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>