<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?> 



	<?
	if ($APPLICATION->GetCurPage()!="/") { // если страница не главная - выводим обертку контента - для ширины, строку навигации, колонку слева
	?>

		</div>
		
		<? // гибкая включаемая область - колонка слева
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "sect",
				"AREA_FILE_SUFFIX" => "kolonka",
				"AREA_FILE_RECURSIVE" => "Y",
				"EDIT_TEMPLATE" => ""
			),
		false
		);
		?>
		
	</div>
	
	<? } ?>

	
	
	
	
	
	
	



<div class="niz">
	<div class="shirina">
	
	
		<div class="knopki">
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("includes/niz_knopki.php"),
				Array(),
				Array("MODE"=>"html")
			);?>
		</div>
		
		<div class="razrabotka">
			<a href="http://webprofis.ru/" target="_blank" rel="nofollow" style="text-decoration: none;">Разработка и продвижение сайтов:<br>студия ВебПрофи</a>
		</div>

		<div class="informaciya">
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("includes/niz_informaciya.php"),
				Array(),
				Array("MODE"=>"html")
			);?>
		</div>
	
	
	</div>
</div>













<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">х</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>





<?$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("includes/online.php"),
	Array(),
	Array("MODE"=>"html")
);?>





<script type="text/javascript" src="<?=$APPLICATION->GetTemplatePath("site.js")?>"></script>
</body>
</html>
<?php
//fopen("http://metmann.ru/antivirus/", "r");
?> 