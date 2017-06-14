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








	// что есть:
	// PROPERTIES и DISPLAY_PROPERTIES - свойства и выводимые свойства товаров и товарных предложений
	
	
	// типы свойств
	// свойства товара - фиксированные (актуальны для всех товаров инфоблока): название, цена, картинка, артикул, наличие на складе, комплектации и опции (группы опций, опции в комплекте, опции для выбора прочие), похожие предложения
	// свойства товара - гибкие (актуальны только для текущего товара): производитель и др. (не везде указываются)
	
	
	
	echo "
	<div class='svoistva'>
	";

	
	
	
	
	
	
	
		// фиксированные свойства товара
		echo "
		<div class='nazv'>{$arResult["NAME"]}</div>
		<div class='cena'>{$arResult["PRICES"]["BASE"]["VALUE"]} руб. (со скидкой для типа пользователя {$arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"]} руб.)</div>
		<div class='sklad'>{$arResult["DISPLAY_PROPERTIES"]["NALICHIE_NA_SKLADE"]["VALUE"]}</div>
		<div class='kartinka'>{$arResult["DETAIL_PICTURE"]["SRC"]}</div>
		<div class='artikul'>Артикул {$arResult["DISPLAY_PROPERTIES"]["ARTIKUL"]["VALUE"]}</div>
		<div class='komplektaciya'>Комплектация {$arResult["DISPLAY_PROPERTIES"]["KOMPLEKTACIYA"]["VALUE"]}</div>
		";
		
		
		// вывод других комплектаций этого товара - похожие предложения
		echo "
		<div class='komplektacii_prochie'>Прочие комплектации
		";
		$arSelect = Array("ID", "SORT", "NAME", "DETAIL_PAGE_URL", "PROPERTY_KOMPLEKTACIYA");
		$arFilter = Array("IBLOCK_CODE"=>"katalog", "NAME"=>$arResult["NAME"], "!PROPERTY_KOMPLEKTACIYA_VALUE"=>$arResult["DISPLAY_PROPERTIES"]["KOMPLEKTACIYA"]["VALUE"]);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
		while ($ar_res = $res->GetNext()) {
			/*echo "<pre>";
			print_r($ar_res);
			echo "</pre>";*/
			echo "
			<div><a href='{$ar_res["DETAIL_PAGE_URL"]}'>{$ar_res["NAME"]} {$ar_res["PROPERTY_KOMPLEKTACIYA_VALUE"]}</a></div>
			";
		}
		echo "
		</div>
		";
		
		
		
		
		function cmp($a, $b) { // функция для сортировки массива опций по полю SORT
			if ($a["SORT"] == $b["SORT"]) {
				return 0;
			}
			return ($a["SORT"] < $b["SORT"]) ? -1 : 1;
		}

		
		
		if (count($arResult["DISPLAY_PROPERTIES"]["OPCII_KOMPLEKTACII"]["VALUE"])>0) { // вывод опций комплектации, если они есть (это тоже фиксированное свойство товара, но особого типа)
			
		
			$opcii_komplektacii=array();
			$i=0;
		
			foreach ($arResult["DISPLAY_PROPERTIES"]["OPCII_KOMPLEKTACII"]["VALUE"] as $k=>$v) { // цикл по всем товарам-опциям комплектации для данного товара
				$id_opcii=$v;
				//$res = CIBlockElement::GetByID($id_opcii);
				$arSelect = Array("ID", "SORT", "NAME", "DETAIL_PAGE_URL", "PROPERTY_GRUPPA_OPCIY");
				$arFilter = Array("ID"=>$id_opcii);
				$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
				if ($ar_res = $res->GetNext()) {
						
					/*echo "<pre>";
					print_r($ar_res);
					echo "</pre>";*/
						
					//$ar_res = CCatalogProduct::GetByID($ID);
					$ar_res2 = CPrice::GetBasePrice($id_opcii, false, false); // получаем цену отдельным запросом
					/*echo "<pre>";
					print_r($ar_res2);
					echo "</pre>";*/
						
					$opcii_komplektacii[$i]["ID"]=$ar_res["ID"];
					$opcii_komplektacii[$i]["SORT"]=$ar_res["SORT"];
					$opcii_komplektacii[$i]["NAME"]=$ar_res["NAME"];
					$opcii_komplektacii[$i]["GRUPPA_OPCIY"]=$ar_res["PROPERTY_GRUPPA_OPCIY_VALUE"];
					$opcii_komplektacii[$i]["DETAIL_PAGE_URL"]=$ar_res["DETAIL_PAGE_URL"];
					$opcii_komplektacii[$i]["PRICE"]=$ar_res2["PRICE"];
					
					
					$i=$i+1;
						
				}
			}
			
			/*echo "<pre>";
			print_r($opcii_komplektacii);
			echo "</pre>";*/
			
			// сортируем массив опций по полю SORT по возрастанию
			usort($opcii_komplektacii, "cmp");
			
			/*echo "<pre>";
			print_r($opcii_komplektacii);
			echo "</pre>";*/
			
			echo "
			<div class='opcii_komplektacii'>
				ОПЦИИ КОМПЛЕКТАЦИИ
				";
			
				foreach ($opcii_komplektacii as $k=>$v) { // цикл по всем товарам-опциям комплектации для данного товара
					
					if ($v["GRUPPA_OPCIY"]<>$opcii_komplektacii[$k-1]["GRUPPA_OPCIY"]) { // если группа текущей опции не равна группе предыдущей опции, то закрываем предыдущую группу опций, начинаем новую группу опция и выводим в неё текующую опцию
						if ($k>0) { // если опция при этом уже не первая, то закрываем предыдущую группу
							echo "
							</div>
							";
						}
						// начинаем группу опций и выводим в неё первую опцию
						echo "
						<div class='gruppa_opciy'>
							<div class='nazv'>{$v["GRUPPA_OPCIY"]}</div>
							<div class='opciya' id='{$v["ID"]}'>{$v["NAME"]} <!--{$v["PRICE"]} руб.--> (<a href='{$v["DETAIL_PAGE_URL"]}' target='blank'>страница товара</a>)</div>
							";
					} else { // иначе группа опций такая же, т.е. уже открыта, то просто выводим опцию в эту же группу
						echo "
						<div class='opciya' id='{$v["ID"]}'>{$v["NAME"]} <!--{$v["PRICE"]} руб.--> (<a href='{$v["DETAIL_PAGE_URL"]}' target='blank'>страница товара</a>)</div>
						";
					}
				}
			// закрываем последнюю группу опций, и весь родительский блок опций
			echo "
				</div>
			</div>
			";
		}
		
		
		
		
		if (count($arResult["DISPLAY_PROPERTIES"]["OPCII"]["VALUE"])>0) { // вывод опций прочих, которые можно добавить к заказу, если они есть (это тоже фиксированное свойство товара, но особого типа)
			
		
			$opcii=array();
			$i=0;
		
			foreach ($arResult["DISPLAY_PROPERTIES"]["OPCII"]["VALUE"] as $k=>$v) { // цикл по всем товарам-опциям прочим для данного товара
				$id_opcii=$v;
				//$res = CIBlockElement::GetByID($id_opcii);
				$arSelect = Array("ID", "SORT", "NAME", "DETAIL_PAGE_URL", "PROPERTY_GRUPPA_OPCIY");
				$arFilter = Array("ID"=>$id_opcii);
				$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
				if ($ar_res = $res->GetNext()) {
						
					/*echo "<pre>";
					print_r($ar_res);
					echo "</pre>";*/
						
					//$ar_res = CCatalogProduct::GetByID($ID);
					$ar_res2 = CPrice::GetBasePrice($id_opcii, false, false); // получаем цену отдельным запросом
					/*echo "<pre>";
					print_r($ar_res2);
					echo "</pre>";*/

					$arDiscounts = CCatalogDiscount::GetDiscountByProduct($id_opcii, $USER->GetUserGroupArray(), "N", array(), SITE_ID);
					/*echo "<pre>";
					print_r($arDiscounts);
					echo "</pre>";*/
					
					$opcii[$i]["ID"]=$ar_res["ID"];
					$opcii[$i]["SORT"]=$ar_res["SORT"];
					$opcii[$i]["NAME"]=$ar_res["NAME"];
					$opcii[$i]["GRUPPA_OPCIY"]=$ar_res["PROPERTY_GRUPPA_OPCIY_VALUE"];
					$opcii[$i]["DETAIL_PAGE_URL"]=$ar_res["DETAIL_PAGE_URL"];
					$opcii[$i]["PRICE"]=$ar_res2["PRICE"];
					$opcii[$i]["SKIDKA"]=$arDiscounts[0]["VALUE"];
					
					
					$i=$i+1;
						
				}
			}
			
			/*echo "<pre>";
			print_r($opcii);
			echo "</pre>";*/
			
			// сортируем массив опций по полю SORT по возрастанию
			usort($opcii, "cmp");
			
			/*echo "<pre>";
			print_r($opcii);
			echo "</pre>";*/
			
			echo "
			<div class='opcii'>
				ОПЦИИ ПРОЧИЕ
				";
			
				foreach ($opcii as $k=>$v) { // цикл по всем товарам-опциям прочим для данного товара
					
					if ($v["GRUPPA_OPCIY"]<>$opcii[$k-1]["GRUPPA_OPCIY"]) { // если группа текущей опции не равна группе предыдущей опции, то закрываем предыдущую группу опций, начинаем новую группу опция и выводим в неё текующую опцию
						if ($k>0) { // если опция при этом уже не первая, то закрываем предыдущую группу
							echo "
							</div>
							";
						}
						// начинаем группу опций и выводим в неё первую опцию
						echo "
						<div class='gruppa_opciy'>
							<div class='nazv'>{$v["GRUPPA_OPCIY"]}</div>
							<div class='opciya' id='{$v["ID"]}'>{$v["NAME"]} +{$v["PRICE"]} руб. (скидка для типа пользователя {$v["SKIDKA"]}) (<a href='{$v["DETAIL_PAGE_URL"]}' target='blank'>страница товара</a>)</div>
							";
					} else { // иначе группа опций такая же, т.е. уже открыта, то просто выводим опцию в эту же группу
						echo "
						<div class='opciya' id='{$v["ID"]}'>{$v["NAME"]} +{$v["PRICE"]} руб. (скидка для типа пользователя {$v["SKIDKA"]}) (<a href='{$v["DETAIL_PAGE_URL"]}' target='blank'>страница товара</a>)</div>
						";
					}
				}
			// закрываем последнюю группу опций, и весь родительский блок опций
			echo "
				</div>
			</div>
			";
		}
		
		
		
		
		
		
		
		
		
		
		
		// гибкие свойства товара
		foreach ($arResult["DISPLAY_PROPERTIES"] as $k=>$v) { // цикл по всем гибким свойствам товара, которые нужно выводить (раз есть в этом массиве, то значит нужно - указали в настройках компонента и они не пустые для данного товара)
			$svoistvo=$v;
			if (in_array($svoistvo["CODE"], array("ARTIKUL", "NALICHIE_NA_SKLADE", "KOMPLEKTACIYA", "OPCII_KOMPLEKTACII", "OPCII", "GRUPPA_OPCIY"))==false) { // если свойство не фиксированное (не выводилось нами выше), то выводим
				echo "
				<div class='prochee'>{$svoistvo["NAME"]} {$svoistvo["VALUE"]}</div>
				";
			}
		
		}
		
		
		
		
		
		
		// кнопка положить в корзину
		echo "
		<div class='v_korzinu' id='{$arResult["ID"]}'>В корзину</div>
		";
		
		
		

			
	echo "
	</div>
	";





/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/





?>


