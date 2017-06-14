<?
//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


if (trim($_POST["forma_imya"]<>"") AND trim($_POST["forma_telefon"]<>"")) {


		// подключаем ядро Битрикса
		require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

		//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
			
	
		CModule::IncludeModule("iblock");

		//print_r($_POST);



	
		/*$name=iconv('UTF-8','CP1251', trim($_POST["name"]));
		$phone=iconv('UTF-8','CP1251', trim($_POST["phone"]));
		$email=iconv('UTF-8','CP1251', trim($_POST["email"]));
		$coment=iconv('UTF-8','CP1251', trim($_POST["coment"]));
		$capcha=iconv('UTF-8','CP1251', trim($_POST["capcha"]));*/



		$el = new CIBlockElement;

		
		/*$property_values = Array(
			"imya" => $_POST["forma_imya"],
			"telefon" => $_POST["forma_telefon"],
			"email" => $_POST["forma_email"],
			"url" => $_POST["forma_url"],
			"dopolnitelno" => array("VALUE"=>array("TEXT"=>$_POST["forma_dopolnitelno"], "TYPE"=>"text"))
		);*/
		
$text="Имя: {$_POST["forma_imya"]}
Телефон: {$_POST["forma_telefon"]}
E-mail: {$_POST["forma_email"]}
Сообщение:
{$_POST["forma_dopolnitelno"]}
";

		
		$values = Array(
			"MODIFIED_BY"   		=> $USER->GetID(), // элемент изменен текущим пользователем
			"IBLOCK_SECTION_ID" 	=> false, // если false, то элемент лежит в корне раздела
			"IBLOCK_ID"     		=> 5,
			"NAME"           		=> "Заявка",
			"ACTIVE"         		=> "Y",            // активен
			"PREVIEW_TEXT"   	=> $text,
			"PROPERTY_VALUES"   	=> ''
		  );

		$el->Add($values);
		

		
		


		
		
		// отправка уведомления на email
		
		$arFields = Array(
			"ONLINE_NAME" => $_POST["forma_imya"],
			"ONLINE_PHONE" => $_POST["forma_telefon"],
			"ONLINE_EMAIL" => $_POST["forma_email"],
			"ONLINE_MESSAGE" => $_POST["forma_dopolnitelno"]
		);
	

	
		CEvent::Send("FEEDBACK_FORM", SITE_ID, $arFields, "N", 8);
	
}	


//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");

?>