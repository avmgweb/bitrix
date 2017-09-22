<?
use Bitrix\Main\Localization\Loc;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arParams["PAGE_SIZE_VALUES"] = array_values(array_diff(array_map('intval', $arParams["PAGE_SIZE_VALUES"]), ['', 0]));
if(!$arParams["PAGE_SIZE_VALUES"][0]) $arParams["PAGE_SIZE_VALUES"] = [10, 20, 30];

$arResult["SECTION_PAGE_SIZE"] = $_COOKIE["avCatalogPageSize"] && in_array($_COOKIE["avCatalogPageSize"], $arParams["PAGE_SIZE_VALUES"])
	? $_COOKIE["avCatalogPageSize"]
	: $arParams["PAGE_SIZE_VALUES"][0];

$arResult["SECTION_PAGE_TYPE_VALUES"] = ["tablet" => Loc::getMessage("AV_CATALOG_SECTION_PAGE_TYPE_TABLET"), "list" => Loc::getMessage("AV_CATALOG_SECTION_PAGE_TYPE_LIST")];
$arResult["SECTION_PAGE_TYPE"]        = $_COOKIE["avCatalogPageType"] && $arResult["SECTION_PAGE_TYPE_VALUES"][$_COOKIE["avCatalogPageType"]]
	? $_COOKIE["avCatalogPageType"]
	: 'tablet';