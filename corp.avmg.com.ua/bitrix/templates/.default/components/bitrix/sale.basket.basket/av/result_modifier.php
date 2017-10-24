<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$firstTabGeted = false;
foreach($arResult["ITEMS"] as $blockType => $itemsArray)
	{
	if(!count($itemsArray))
		{
		unset($arResult["ITEMS"][$blockType]);
		continue;
		}

	foreach($itemsArray as $index => $itemInfo)
		$arResult["ITEMS"][$blockType][$index]["QUANTITY"] = (int) $itemInfo["QUANTITY"];
	}