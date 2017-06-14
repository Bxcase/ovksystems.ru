<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>




<h1><?echo $arResult["NAME"]?></h1>


<?if ($arResult["DETAIL_PICTURE"]["SRC"]<>"") {?>

	<div class="blueimp">
	<a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="img_float_right" alt="<?echo $arResult["NAME"]?>" /></a>
	</div >

<? } ?>

<?echo $arResult["DETAIL_TEXT"];?>
<br>



<?

//echo "<pre>";
//print_r($arResult);
//echo "</pre>";

?>
		
		

		






	

