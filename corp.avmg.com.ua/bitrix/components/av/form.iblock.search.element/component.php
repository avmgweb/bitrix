<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- params ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult["REQUIRED"] = $arParams["REQUIRED"] == "Y" ? true : false;
$arResult["DISABLED"] = $arParams["DISABLED"] == "Y" ? true : false;

$arResult["NAME"]              = $arParams["NAME"];
$arResult["IBLOCK_ID"]         = (int) $arParams["IBLOCK_ID"];
$arResult["TITLE"]             = html_entity_decode($arParams["TITLE"]);
$arResult["EMPTY_RESULT_TEXT"] = html_entity_decode($arParams["EMPTY_RESULT_TEXT"]);

$arResult["VALUE"]       = "";
$arResult["VALUE_TITLE"] = "";
if($arParams["VALUE"])
	{
	$itemQuery = CIBlockElement::GetList([], ["ID" => $arParams["VALUE"]], false, ["nTopCount" => 1], ["ID", "NAME"])->GetNext();
	$arResult["VALUE"]       = $itemQuery["ID"];
	$arResult["VALUE_TITLE"] = $itemQuery["NAME"];
	}

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