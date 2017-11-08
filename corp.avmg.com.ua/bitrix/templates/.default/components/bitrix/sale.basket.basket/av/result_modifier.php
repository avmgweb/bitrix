<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$firstTabGeted = false;
foreach($arResult["ITEMS"] as $blockType => $itemsArray)
	{
	if(!count($itemsArray))
		{
		unset($arResult["ITEMS"][$blockType]);
		continue;
		}

	foreach($itemsArray as $index => $itemInfo)
		{
		$arResult["ITEMS"][$blockType][$index]["QUANTITY"] = (int) $itemInfo["QUANTITY"];
		    if($itemInfo["PREVIEW_PICTURE"])     $arResult["ITEMS"][$blockType][$index]["IMAGE"] = CFile::GetPath($itemInfo["PREVIEW_PICTURE"]);
		elseif($itemInfo["PREVIEW_PICTURE_SRC"]) $arResult["ITEMS"][$blockType][$index]["IMAGE"] = $itemInfo["PREVIEW_PICTURE_SRC"];
		elseif($itemInfo["DETAIL_PICTURE_SRC"])  $arResult["ITEMS"][$blockType][$index]["IMAGE"] = $itemInfo["DETAIL_PICTURE_SRC"];
		}
	}