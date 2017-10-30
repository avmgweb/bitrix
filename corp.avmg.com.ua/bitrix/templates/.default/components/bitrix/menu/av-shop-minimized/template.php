<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$linksArray = [];
foreach($arResult as $itemInfo)
	$linksArray[$itemInfo["LINK"]] = str_repeat("&nbsp;.&nbsp;", $itemInfo["DEPTH_LEVEL"] - 1).$itemInfo["TEXT"];

$APPLICATION->IncludeComponent
	(
	"av:form.links_list", "av",
		[
		"TITLE" => Loc::getMessage("AV_MENU_CATALOG_MINIMIZED_TITLE"),
		"LIST"  => $linksArray
		],
	false, ["HIDE_ICONS" => "Y"]
	);