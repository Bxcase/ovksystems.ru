<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


if($_SERVER["REQUEST_URI"]!="/" and substr($_SERVER["REQUEST_URI"],1,1)!="?"){
	$strReturn = '<div class="navigation"><a href="/">ovksystems.ru</a>';



	for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
	{
		//if($index > 0)
			$strReturn .= ' &nbsp; &bull; &nbsp; ';

		$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
		if($arResult[$index]["LINK"] <> "")
			$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>';
		else
			$strReturn .= $title;
	}

	$strReturn .= "</div>";
	return $strReturn;
}else{
	return "";
}
?>