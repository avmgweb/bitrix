<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- params ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult["VALUE"] = $arParams["VALUE"];
$arResult["TITLE"] = $arParams["TITLE"];

$arResult["LIST"] = is_array($arParams["LIST"]) ? $arParams["LIST"] : [];

$arResult["ATTR"] = $arParams["ATTR"];
if(is_array($arResult["ATTR"]))
	{
	$attrArray = [];
	foreach($arResult["ATTR"] as $index => $value)
		$attrArray[] = $index.'="'.str_replace('\"', '\'', $value).'"';
	$arResult["ATTR"] = implode(' ', $attrArray);
	}
/* --------------------------------------------------------------------- */
/* ------------------------------- output ------------------------------ */
/* --------------------------------------------------------------------- */
$this->IncludeComponentTemplate();