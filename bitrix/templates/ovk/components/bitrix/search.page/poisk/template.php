<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (count($arResult["SEARCH"])>0) {
	
	echo "<h2>Результаты поиска</h2>
	<br>";
	
	if ($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"];
	
	foreach($arResult["SEARCH"] as $arItem) {
		echo "
		<strong><a href='".str_replace("index.php", "",$arItem["URL"])."'>{$arItem["TITLE_FORMATED"]}</a></strong>
		<div>{$arItem["BODY_FORMATED"]}</div>
		";

		if ($arItem["CHAIN_PATH"]) {
			echo "{$arItem["CHAIN_PATH"]}";
		}
		echo "<br><br>";
	}
	
	if ($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"];
	
} else {
	echo "<h2>Ничего не найдено</h2>";
}


/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/




?>



