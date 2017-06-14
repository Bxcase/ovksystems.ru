<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
	<title><?$APPLICATION->ShowTitle()?></title>

	<script type="text/javascript" src="<?=$APPLICATION->GetTemplatePath("files/jquery-2.0.3.min.js")?>"></script>
	
	<?$APPLICATION->ShowHead()?>

	
	
	
	<!-- Blueimp galary - в head не работает карусель -->
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/files/blueimp/blueimp-gallery.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/files/blueimp/blueimp-gallery-indicator.css">

	<script src="<?=SITE_TEMPLATE_PATH?>/files/blueimp/blueimp-gallery.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/files/blueimp/blueimp-gallery-indicator.js"></script>	
		
	<link rel="icon" href="http://metmann.ru/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://metmann.ru/favicon.ico" type="image/x-icon">
	
</head>
<body>

<div id="panel"><?$APPLICATION->ShowPanel();?></div>


<div class="verh1">
	<div class="shirina">

		<?
		$APPLICATION->IncludeComponent("bitrix:menu", "verh", Array(
			"ROOT_MENU_TYPE" => "verh",	// Тип меню для первого уровня
			"MAX_LEVEL" => "2",	// Уровень вложенности меню
			"CHILD_MENU_TYPE" => "verh2",	// Тип меню для остальных уровней
			"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
			"DELAY" => "N",	// Откладывать выполнение шаблона меню
			"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
			"MENU_CACHE_TYPE" => "N",	// Тип кеширования
			"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
			"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		),
		false
		);
		?>
		
		<div class="poisk">
			<form method="GET" action="/poisk/">
				<!--<input value="Поиск" type="submit">-->
				<img src="/bitrix/templates/ovk/files/poisk.png" alt="" /><input type="text" name="q" value="Поиск"><br>
			</form>
		</div>
	
	</div>
</div>
		



	<div class="verh2">
		<div class="shirina">
		
			<a href="/"><div class="logo"><img src="/bitrix/templates/ovk/files/logo.png" alt="" /></div></a>

			<div class="kontakty">
				<img class="tel" src="/bitrix/templates/ovk/files/tel.png" alt="">
				<div class="online zakazat_zvonok">Заказать звонок</div>
				<?$APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath("includes/verh_kontakty.php"),
					Array(),
					Array("MODE"=>"html")
				);?>
			</div>
		
		</div>
	</div>
	
	
	
	
	
	
	<?
	$APPLICATION->IncludeComponent("bitrix:menu", "glav", Array(
		"ROOT_MENU_TYPE" => "glav",	// Тип меню для первого уровня
		"MAX_LEVEL" => "2",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "glav2",	// Тип меню для остальных уровней
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
	),
	false
	);
	?>


	
	
	
	
	<?
	if ($APPLICATION->GetCurPage()!="/") { // если страница не главная - выводим обертку контента - для ширины, строку навигации, колонку слева
	?>
	
	
	<div class="centr">
		<div class="kontent">
	
	
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb", 
			"navigation", 
			array(
				"COMPONENT_TEMPLATE" => "navigation",
				"START_FROM" => "1",
				"PATH" => "",
				"SITE_ID" => "s1"
			),
			false
		);?>
		


	<? } ?>
		
			 
		
	
	



	