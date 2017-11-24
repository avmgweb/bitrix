<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- params ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult["REQUIRED"] = $arParams["REQUIRED"] == "Y" ? true : false;
$arResult["DISABLED"] = $arParams["DISABLED"] == "Y" ? true : false;
$arResult["CHECKED"]  = $arParams["CHECKED"]  == "Y" ? true : false;

$arResult["NAME"]  = $arParams["NAME"];
$arResult["VALUE"] = $arParams["VALUE"];
$arResult["TITLE"] = html_entity_decode($arParams["TITLE"]);

$arResult["ATTR"] = $arParams["ATTR"];
if(is_array($arResult["ATTR"]))
	{
	$attrArray = [];
	foreach($arResult["ATTR"] as $index => $value)
		$attrArray[] = $index."=\"".str_replace("\"", "'", $value)."\"";
	$arResult["ATTR"] = implode(" ", $attrArray);
	}
/* --------------------------------------------------------------------- */
/* ------------------------------- output ------------------------------ */
/* --------------------------------------------------------------------- */
$this->IncludeComponentTemplate();