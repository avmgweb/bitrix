<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult["SITES"] as $index => $siteInfo)
	if($siteInfo["CURRENT"] != 'Y')
		$arResult["SITES"][$index]["LINK"] = CURRENT_PROTOCOL.'://'.$siteInfo["DOMAINS"][0].$_SERVER["SCRIPT_URL"];

$newSiteList = [];
foreach($arParams["SITE_LIST"] as $site)
	foreach($arResult["SITES"] as $siteInfo)
		if($siteInfo["LID"] == $site)
			{
			$newSiteList[] = $siteInfo;
			break;
			}
$arResult["SITES"] = $newSiteList;