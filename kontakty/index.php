<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");?>




<h1>Контакты</h1>

<p><strong>Наш телефон:</strong> <a href="tel:+74951324747">+7 (495) 132-47-47</a>, <a href="tel:+79262372828">+7 (926) 237-28-28</a></p>

<p><strong>Юр. адрес:</strong> 107076, г. Москва, пер. Колодезный, д. 14, пом. XII, комн. 41<br>
<strong>Физ. адрес (склад)</strong>: 141006, г. Мытищи, ул. Хлебозаводская, д. 4А, офис 201</p>




<p><strong>E-mail:</strong> <a href="mailto:info@ovksystems.ru">info@ovksystems.ru</a>, <a href="mailto:ovksystem@yandex.ru">ovksystem@yandex.ru</a></p>   
 
<p><strong>Режим работы офиса:</strong> пн-пт с 9 до 18</p>


	
	
	

<?$APPLICATION->IncludeFile(
	"/kontakty/karta.php",
	Array(),
	Array("MODE"=>"html")
);?>	
	
	
	
<h3>Реквизиты</h3>	
	

<table class="tablica2">
<tr>
<td>Полное наименование</td>
<td>Общество с ограниченной ответственностью <br>«ОВК СИСТЕМЫ»</td>
</tr>
<tr>
<td>Сокращенное наименование</td>
<td>«ОВК СИСТЕМЫ»</td>
</tr>
<tr>
<td>Юридический адрес</td>
<td>107076, г. Москва, пер. Колодезный, д. 14, пом. XII, комн. 41</td>
</tr>
<tr>
<td>ИНН/КПП</td>
<td>7718778488/ 771801001</td>
</tr>
<tr>
<td>ОГРН</td>
<td>1097746602227</td>
</tr>
<tr>
<td>ОКПО</td>
<td> 63642515</td>
</tr>
<tr>
<td>ОКАТО</td>
<td> 45263591000</td>
</tr>
<tr>
<td>Расчетный счет</td>
<td>40702810500100000776</td>
</tr>
<tr>
<td>Банк получателя</td>
<td> ПАО «МОСКОВСКИЙ КРЕДИТНЫЙ БАНК»  г. Москва</td>
</tr>
<tr>
<td>БИК</td>
<td>044525659</td>
</tr>
<tr>
<td>Корреспондентский счет</td>
<td>30101810300000000659</td>
</tr>


<tr>
<td>Генеральный директор</td>
<td>Кривонос Марина Викторовна</td>
</tr>

</table>	

<p style="text-align: right"><strong><a href="/upload/rekvizity.doc">Скачать реквизиты</a></strong></p>


<br><br>
	


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>