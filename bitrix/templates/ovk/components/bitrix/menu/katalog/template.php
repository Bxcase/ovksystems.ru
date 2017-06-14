<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();








/*echo "<pre>";
print_r($arResult);
echo "</pre>";
*/



echo "
<div class='menu_katalog'>
";


$i=0;

while ($i<count($arResult)) {



	if ($arResult[$i]["DEPTH_LEVEL"]==1) {


		
		if ($arResult[$i]["SELECTED"]==0) {
			echo "
			<div class='punkt'>
				<a href='{$arResult[$i]["LINK"]}'>
					<div>{$arResult[$i]["TEXT"]}<div></div></div>
				</a>
			</div>
			";
		} else {
			
			if ($arResult[$i+1]["DEPTH_LEVEL"]==2) {
				$strelka_class="aktiv";
			} else {
				$strelka_class="";
			}
			
			
			echo "
			<div class='punkt'>
				<a href='{$arResult[$i]["LINK"]}'>
					<div class='aktiv'>{$arResult[$i]["TEXT"]}<div class='$strelka_class'></div></div>
				</a>
				";
		
		
		
		

			if ($arResult[$i+1]["DEPTH_LEVEL"]==2) {
				
				echo "
				<div class='podmenu'>
				";
				
				$k=$i+1;
				$flog=false;
				
				while ($flog==false) {
					if ($arResult[$k]["DEPTH_LEVEL"]>=2) { // пока уровень вложенности снова не станет 1 - выводим подменю
						if ($arResult[$k]["DEPTH_LEVEL"]==2) { // выводим только пункты уровня вложенности 2
							if ($arResult[$k]["SELECTED"]==1) {
								echo "<a href='{$arResult[$k]["LINK"]}'><div class='aktiv'><div>&bull;</div>{$arResult[$k]["TEXT"]}</div></a>
								";
							} else {
								echo "<a href='{$arResult[$k]["LINK"]}'><div><div>&bull;</div>{$arResult[$k]["TEXT"]}</div></a>
								";
							}
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
			
		
		}

		
		


	}
	
	
	$i=$i+1;
}



echo "
</div>
";



?>

