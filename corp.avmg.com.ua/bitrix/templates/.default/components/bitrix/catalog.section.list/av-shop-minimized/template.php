<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$linksArray = [];
foreach($arResult["SECTIONS"] as $srctionInfo)
	$linksArray[$srctionInfo["SECTION_PAGE_URL"]] = $srctionInfo["NAME"];

if(count($linksArray))
	$APPLICATION->IncludeComponent
		(
		"av:form.links_list", "av-shop",
			[
			"TITLE"           => $arResult["SECTION_TITLE"],
			"LIST"            => $linksArray,
			"OPEN_LINK_BLANK" => $arParams["OPEN_LINK_BLANK"]
			],
		false, ["HIDE_ICONS" => "Y"]
		);