<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult["SITES"] as $index => $siteInfo)
	if($siteInfo["CURRENT"] != 'Y')
		$arResult["SITES"][$index]["LINK"] = CURRENT_PROTOCOL.'://'.$siteInfo["DOMAINS"][0].$_SERVER["SCRIPT_URL"];