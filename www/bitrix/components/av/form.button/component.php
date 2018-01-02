<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- params ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult["DISABLED"] = $arParams["DISABLED"] == "Y" ? true : false;

$arResult["BUTTON_TYPE"]  = in_array($arParams["BUTTON_TYPE"], ["button", "submit", "link", "label"]) ? $arParams["BUTTON_TYPE"]                   : "button";
$arResult["IMG_POSITION"] = in_array($arParams["IMG_POSITION"], ["left", "right"])                    ? $arParams["IMG_POSITION"]                  : "right";
$arResult["LINK"]         = $arParams["BUTTON_TYPE"] == "link"                                        ? htmlspecialchars_decode($arParams["LINK"]) : "";

$arResult["NAME"]        = $arParams["NAME"];
$arResult["VALUE"]       = $arParams["VALUE"];
$arResult["TITLE"]       = html_entity_decode($arParams["TITLE"]);
$arResult["PLACEHOLDER"] = html_entity_decode($arParams["PLACEHOLDER"]);

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