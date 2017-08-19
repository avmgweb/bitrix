<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$linksArray = [];
foreach($arResult as $itemInfo)
	if($itemInfo["PARAMS"]["DEPTH_LEVEL"] == 1)
		$linksArray[$itemInfo["LINK"]] = $itemInfo["TEXT"];

$APPLICATION->IncludeComponent
	(
	"av:form.links_list", 'av',
		[
		"TITLE" => GetMessage("AV_MENU_CATALOG_MINIMIZED_TITLE"),
		"LIST"  => $linksArray
		]
	);