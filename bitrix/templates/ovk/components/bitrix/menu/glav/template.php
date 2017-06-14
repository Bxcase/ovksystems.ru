<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();








/*echo "<pre>";
print_r($arResult);
echo "</pre>";
*/



echo "
<div class='menu_glav'>
	<div class='menu_adapt'></div>
	<div class='shirina'>
		<div class='menu_adapt_zakryt'></div>
		";

	

$i=0;

while ($i<count($arResult)) {



	if ($arResult[$i]["DEPTH_LEVEL"]==1) {


		
		if ($arResult[$i]["SELECTED"]==1) {
			$class="aktiv";
		} else {
			$class="";
		}
		echo "
		<div class='punkt'><a href='{$arResult[$i]["LINK"]}'><div class='$class'>{$arResult[$i]["TEXT"]}<div></div></div></a>
		";
		
		

		if ($arResult[$i+1]["DEPTH_LEVEL"]==2) {
			
			echo "
			<div class='podmenu'>
			";
			
			$j=$i+1;
			$flog=false;
			
			while ($flog==false) {
				if ($arResult[$j]["DEPTH_LEVEL"]==2) {
					if ($arResult[$j]["SELECTED"]==1) {
						$class="aktiv";
					} else {
						$class="";
					}
					echo "
					<a href='{$arResult[$j]["LINK"]}'><div class='$class'><div></div>{$arResult[$j]["TEXT"]}</div></a>
					";
					
				} else {
					$flog=true;
				}
				$j=$j+1;
				
			}
			
			echo "
			</div>
			";
			
		
		}
		

		
		echo "
		</div>
		";
		
		if($i<count($arResult)-1){
			echo "
			<div class='razdelitel'></div>
			";
		}		
		
		


	}
	
	
	$i=$i+1;
}



	echo "
	</div>
</div>
";



?>

