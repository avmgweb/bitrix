<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams              = unserialize(base64_decode($_POST["params"]));
$arParams["PAGE_TYPE"] = $_POST["pageType"];
$elements              = is_array($_POST["elements"])
	? array_values(array_diff(array_map("intval", $_POST["elements"]), ["", 0]))
	: [];

if($elements[0])
	{
	$GLOBALS["AV_CATALOG_SECTION_CHANGE_VIEW_FILTER"] = ["ID" => $elements];
	$arParams["FILTER_NAME"] = "AV_CATALOG_SECTION_CHANGE_VIEW_FILTER";
	}
$APPLICATION->IncludeComponent("bitrix:catalog.section", "av_ajax", $arParams);