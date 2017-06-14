<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();








/*echo "<pre>";
print_r($arResult);
echo "</pre>";
*/



echo "
<div class='menu_verh'>
";


$i=0;
$j=1;

while ($i<count($arResult)) {



	if ($arResult[$i]["DEPTH_LEVEL"]==1) {


		
		if ($arResult[$i]["SELECTED"]==1) {
			echo "
			<div class='punkt'><a href='{$arResult[$i]["LINK"]}'><div class='aktiv'>{$arResult[$i]["TEXT"]}</div></a>
			";
		} else {
			echo "
			<div class='punkt'><a href='{$arResult[$i]["LINK"]}'><div>{$arResult[$i]["TEXT"]}</div></a>
			";
		}
		
		
		

		if ($arResult[$i+1]["DEPTH_LEVEL"]==2) {
			
			echo "
			<div class='podmenu'>
			";
			
			$k=$i+1;
			$flog=false;
			
			while ($flog==false) {
				if ($arResult[$k]["DEPTH_LEVEL"]==2) {
					if ($arResult[$k]["SELECTED"]==1) {
						echo "<a href='{$arResult[$k]["LINK"]}'><div class='aktiv'>{$arResult[$k]["TEXT"]}</div></a>
						";
					} else {
						echo "<a href='{$arResult[$k]["LINK"]}'><div>{$arResult[$k]["TEXT"]}</div></a>
						";
					}
				} else {
					$flog=true;
				}
				$k=$k+1;
				
			}
			
			echo "
			</div>
			";
			
		
		}
		

		
		echo "
		</div>
		";
		
		if($i<count($arResult)-1){
			echo "<div class='razdelitel'></div>";
		}		
		
		
		$j=$j+1;


	}
	
	
	$i=$i+1;
}



echo "
</div>
";



?>

