<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();








/*echo "<pre>";
print_r($arResult);
echo "</pre>";
*/


echo "
<div class='menu_knopki'>
<div class='knopki'>
";


$i=0;

while ($i<count($arResult)) {

	if ($arResult[$i]["DEPTH_LEVEL"]==1) {
		echo "
		<div class='punkt'><a href='{$arResult[$i]["LINK"]}'><div style='background: url(\"{$arResult[$i]["PARAMS"]["ikonka"]}\") no-repeat center center #fc5a0a; background-size: 50px 50px;'></div><div>{$arResult[$i]["TEXT"]}</div></a></div>
		";
	}

	
	
	$i=$i+1;
}



echo "
</div>
</div>
";



?>

